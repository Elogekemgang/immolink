<?php

namespace App\Http\Controllers;

use App\Models\Dispute;
use App\Models\LeaseContract;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisputeController extends Controller
{
    /**
     * Liste des litiges
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('bailiff')) {

            $disputes = Dispute::with([
                'contract.property',
                'contract.landlord',
                'contract.tenant',
                'opener',
                'bailiff'
            ])
            ->where('bailiff_id', $user->id)
            ->latest()
            ->get();

            return view('bailiff.disputes.index', compact('disputes'));
        }

        $disputes = Dispute::with([
            'contract.property',
            'bailiff'
        ])
        ->where('opened_by', $user->id)
        ->latest()
        ->get();

        return view('disputes.index', compact('disputes'));
    }

    /**
     * Formulaire de création
     */
    public function create(Request $request)
    {
        $contract = LeaseContract::with([
            'property',
            'tenant',
            'landlord'
        ])->findOrFail($request->lease_contract);

        $user = Auth::user();

        if (
            $contract->tenant_id != $user->id &&
            $contract->landlord_id != $user->id
        ) {
            abort(403);
        }

        $bailiffs = User::role('bailiff')
            ->orderBy('name')
            ->get();

        return view('disputes.create', compact(
            'contract',
            'bailiffs'
        ));
    }

    /**
     * Enregistrement
     */
    public function store(Request $request)
    {
        $request->validate([

            'lease_contract_id' => 'required|exists:lease_contracts,id',

            'title' => 'required|string|max:255',

            'description' => 'required|string',

            'bailiff_id' => 'required|exists:users,id'

        ]);

        $contract = LeaseContract::findOrFail(
            $request->lease_contract_id
        );

        $user = Auth::user();

        if (
            $contract->tenant_id != $user->id &&
            $contract->landlord_id != $user->id
        ) {
            abort(403);
        }

        Dispute::create([

            'lease_contract_id' => $contract->id,

            'opened_by' => $user->id,

            'bailiff_id' => $request->bailiff_id,

            'title' => $request->title,

            'description' => $request->description,

            'status' => 'open',

            'bailiff_status' => 'pending'

        ]);

        return redirect()
            ->route('disputes.index')
            ->with(
                'success',
                'Litige créé avec succès.'
            );
    }

    /**
     * Afficher un litige
     */
    public function show(Dispute $dispute)
    {
        $dispute->load([
            'contract.property',
            'contract.landlord',
            'contract.tenant',
            'opener',
            'bailiff'
        ]);

        $user = Auth::user();

        if ($user->hasRole('bailiff')) {

            if ($dispute->bailiff_id != $user->id) {
                abort(403);
            }

            return view('bailiff.disputes.show', compact('dispute'));
        }

        if ($dispute->opened_by != $user->id) {
            abort(403);
        }

        return view('disputes.show', compact('dispute'));
    }

    /**
     * Accepter la mission
     */
    public function accept(Dispute $dispute)
    {
        $user = Auth::user();

        if ($dispute->bailiff_id != $user->id) {
            abort(403);
        }

        $dispute->update([

            'bailiff_status' => 'accepted',

            'status' => 'investigating',

            'accepted_at' => now()

        ]);

        return back()->with(
            'success',
            'Mission acceptée.'
        );
    }

    /**
     * Refuser la mission
     */
    public function decline(Dispute $dispute)
    {
        $user = Auth::user();

        if ($dispute->bailiff_id != $user->id) {
            abort(403);
        }

        $dispute->update([

            'bailiff_status' => 'declined'

        ]);

        return back()->with(
            'success',
            'Mission refusée.'
        );
    }

    /**
     * Modifier
     */
    public function edit(Dispute $dispute)
    {
        $user = Auth::user();

        if ($dispute->opened_by != $user->id) {
            abort(403);
        }

        $bailiffs = User::role('bailiff')->get();

        return view('disputes.edit', compact(
            'dispute',
            'bailiffs'
        ));
    }

    /**
     * Mise à jour
     */
    public function update(Request $request, Dispute $dispute)
    {
        $user = Auth::user();

        if ($dispute->opened_by != $user->id) {
            abort(403);
        }

        if ($dispute->status != 'open') {

            return back()->withErrors(
                'Impossible de modifier un litige déjà pris en charge.'
            );
        }

        $request->validate([

            'title' => 'required',

            'description' => 'required',

            'bailiff_id' => 'required|exists:users,id'

        ]);

        $dispute->update([

            'title' => $request->title,

            'description' => $request->description,

            'bailiff_id' => $request->bailiff_id,

            'bailiff_status' => 'pending'

        ]);

        return redirect()
            ->route('disputes.show', $dispute)
            ->with(
                'success',
                'Litige modifié.'
            );
    }

    /**
     * Supprimer
     */
    public function destroy(Dispute $dispute)
    {
        $user = Auth::user();

        if ($dispute->opened_by != $user->id) {
            abort(403);
        }

        if ($dispute->status != 'open') {

            return back()->withErrors(
                'Impossible de supprimer ce litige.'
            );
        }

        $dispute->delete();

        return redirect()
            ->route('disputes.index')
            ->with(
                'success',
                'Litige supprimé.'
            );
    }
}