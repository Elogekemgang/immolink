<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\RentalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LeaseContract;

class RentalRequestController extends Controller
{
    public function create(Property $property)
    {
        return view('rental_requests.create', compact('property'));
    }

    public function store(Request $request, Property $property)
    {
        $request->validate([
            'message' => 'nullable|string|max:1000',
        ]);

        RentalRequest::create([

            'property_id' => $property->id,

            'tenant_id' => Auth::id(),

            'landlord_id' => $property->user_id,

            'message' => $request->message,

            'status' => 'pending'

        ]);

        return redirect()
            ->route('properties.public.show', $property)
            ->with('success','Votre demande a été envoyée.');
    }

    public function index()
    {
        $requests = RentalRequest::with(['property','tenant'])
            ->where('landlord_id', Auth::id())
            ->latest()
            ->get();

        return view('rental_requests.index', compact('requests'));
    }

    public function accept(RentalRequest $request)
{
    if ($request->landlord_id !== auth()->id()) {
        abort(403);
    }

    $request->update([
        'status' => 'accepted'
    ]);

    LeaseContract::create([

        'property_id' => $request->property_id,

        'landlord_id' => $request->landlord_id,

        'tenant_id' => $request->tenant_id,

        'rental_request_id' => $request->id,

        'start_date' => now(),

        'monthly_rent' => $request->property->price,

        'deposit' => $request->property->deposit,

        'status' => 'pending_signature'

    ]);

    $request->property->update([
        'status' => 'pending'
    ]);

    return back()->with(
        'success',
        'La demande est acceptée et le contrat a été créé.'
    );
}

    public function reject(RentalRequest $request)
    {
        $request->update([
            'status'=>'rejected'
        ]);

        return back()->with('success','Demande refusée.');
    }
}