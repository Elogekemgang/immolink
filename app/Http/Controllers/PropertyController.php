<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePropertyRequest;
Use Illuminate\Support\Str;

class PropertyController extends Controller
{
    /**
     * Liste des biens du bailleur connecté
     */
    public function index()
    {
        $properties = Property::with('images')
    ->where('user_id', Auth::id())
    ->latest()
    ->paginate(10);

        return view('properties.index', compact('properties'));
    }

    /**
     * Formulaire d'ajout
     */
    public function create()
    {
        return view('properties.create');
    }

    /**
     * Enregistrer un bien
     */
public function store(StorePropertyRequest $request)    {
        $data = $request->validated();

                // Génère le slug à partir du titre
        $slug = Str::slug($data['title']);
        
        // Assure que le slug est unique
        $slug = $this->generateUniqueSlug($slug);

        $property = Property::create([

    'user_id' => auth()->id(),

    'title' => $data['title'],

    'description' => $data['description'],

    'type' => $data['type'],

    'price' => $data['price'],

    'deposit' => $data['deposit'],

    'bedrooms' => $data['bedrooms'],

    'living_rooms' => $data['living_rooms'],

    'bathrooms' => $data['bathrooms'],

    'kitchens' => $data['kitchens'],

    'parking' => $request->boolean('parking'),

    'surface' => $data['surface'] ?? null,

    'city' => $data['city'],

    'district' => $data['district'],

    'address' => $data['address'],
    
    'slug' => $slug, // ← AJOUT DU SLUG

]);

    foreach ($request->file('images') as $index => $image) {

    $path = $image->store('properties', 'public');

    $property->images()->create([

        'image' => $path,

        'is_primary' => $index === 0,

        'position' => $index + 1,

    ]);
}

        return redirect()
            ->route('landlord.properties.index')
            ->with('success', 'Bien ajouté avec succès.');
    }

    /**
     * Afficher un bien
     */
    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }

    /**
     * Formulaire de modification
     */
    public function edit(Property $property)
    {
        abort_if($property->user_id != Auth::id(), 403);

        return view('properties.edit', compact('property'));
    }

    /**
     * Mise à jour
     */
    public function update(Request $request, Property $property)
    {
        abort_if($property->user_id != Auth::id(), 403);

        $request->validate([

            'title'=>'required|max:255',

            'description'=>'required',

            'type'=>'required',

            'price'=>'required|numeric',

            'deposit'=>'required|numeric',

            'bedrooms'=>'required|integer',

            'living_rooms'=>'required|integer',

            'bathrooms'=>'required|integer',

            'kitchens'=>'required|integer',

            'city'=>'required',

            'district'=>'required',

            'address'=>'required'

        ]);
        

                // Génère un nouveau slug si le titre change
        $slug = $property->slug;
        if ($request->title !== $property->title) {
            $slug = Str::slug($request->title);
            $slug = $this->generateUniqueSlug($slug, $property->id);
        }

        $property->update([

            'title'=>$request->title,

            'description'=>$request->description,

            'type'=>$request->type,

            'price'=>$request->price,

            'deposit'=>$request->deposit,

            'bedrooms'=>$request->bedrooms,

            'living_rooms'=>$request->living_rooms,

            'bathrooms'=>$request->bathrooms,

            'kitchens'=>$request->kitchens,

            'parking'=>$request->has('parking'),

            'surface'=>$request->surface,

            'city'=>$request->city,

            'district'=>$request->district,

            'address'=>$request->address,

            'latitude'=>$request->latitude,

            'longitude'=>$request->longitude,

            'slug'=>$slug,

        ]);

        return redirect()
            ->route('landlord.properties.index')
            ->with('success','Bien modifié.');
    }

    /**
     * Supprimer
     */
    public function destroy(Property $property)
    {
        abort_if($property->user_id != Auth::id(),403);

        $property->delete();

        return redirect()
            ->route('landlord.properties.index')
            ->with('success','Bien supprimé.');
    }

    /**
     * Génère un slug unique
     */
    private function generateUniqueSlug($slug, $excludeId = null)
    {
        $originalSlug = $slug;
        $count = 1;

        while (Property::where('slug', $slug)
            ->when($excludeId, function ($query) use ($excludeId) {
                return $query->where('id', '!=', $excludeId);
            })
            ->exists()
        ) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }


    public function createStep1()
{
    return view('properties.steps.step1');
}

public function storeStep1(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'type' => 'required',
    ]);

    session([
        'property.title' => $request->title,
        'property.type' => $request->type,
    ]);

    return redirect()->route('landlord.properties.step2');
}

public function createStep2()
{
    return view('properties.steps.step2');
}

public function storeStep2(Request $request)
{
    $request->validate([
        'city' => 'required',
        'district' => 'required',
        'address' => 'required',
    ]);

    session([
        'property.city' => $request->city,
        'property.district' => $request->district,
        'property.address' => $request->address,
    ]);

    return redirect()->route('landlord.properties.create');
}


public function publicIndex()
{
    $properties = Property::with(['images', 'owner'])
        ->where('status', 'available')
        ->latest()
        ->paginate(12);

    return view('properties.public.index', compact('properties'));
}

public function publicShow(Property $property)
{
    $property->load(['images', 'owner']);

    return view('properties.public.show', compact('property'));
}
}