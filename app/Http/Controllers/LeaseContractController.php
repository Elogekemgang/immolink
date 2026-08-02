<?php

namespace App\Http\Controllers;

use App\Models\LeaseContract;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class LeaseContractController extends Controller
{
    /**
     * Liste des contrats
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('landlord')) {

            $contracts = LeaseContract::with([
                    'property',
                    'tenant'
                ])
                ->where('landlord_id', $user->id)
                ->latest()
                ->get();

        } elseif ($user->hasRole('tenant')) {

            $contracts = LeaseContract::with([
                    'property',
                    'landlord'
                ])
                ->where('tenant_id', $user->id)
                ->latest()
                ->get();

        } else {

            $contracts = LeaseContract::with([
                    'property',
                    'tenant',
                    'landlord'
                ])
                ->latest()
                ->get();
        }

        return view('lease_contracts.index', compact('contracts'));
    }

    /**
     * Afficher un contrat
     */
    public function show(LeaseContract $leaseContract)
    {
        $leaseContract->load([
            'property',
            'tenant',
            'landlord',
            'rentalRequest'
        ]);

        $user = Auth::user();
        
        $leaseContract->refresh();

        if (
            $user->hasRole('landlord') &&
            $leaseContract->landlord_id != $user->id
        ) {
            abort(403);
        }

        if (
            $user->hasRole('tenant') &&
            $leaseContract->tenant_id != $user->id
        ) {
            abort(403);
        }

        return view('lease_contracts.show', compact('leaseContract'));
    }

    public function sign(LeaseContract $leaseContract)
{
    $user = auth()->user();

    if ($user->id == $leaseContract->landlord_id) {

        $leaseContract->update([

            'landlord_signed' => true,

            'landlord_signed_at' => now()

        ]);

    }

    if ($user->id == $leaseContract->tenant_id) {

        $leaseContract->update([

            'tenant_signed' => true,

            'tenant_signed_at' => now()

        ]);

    }

    if (
        $leaseContract->landlord_signed &&
        $leaseContract->tenant_signed
    ) {

        $leaseContract->update([

            'status' => 'active'

        ]);

        $leaseContract->property->update([

            'status' => 'rented'

        ]);

    }

    return back()->with(
        'success',
        'Votre signature a été enregistrée.'
    );
}

public function downloadPdf(LeaseContract $leaseContract)
{
    $leaseContract->load([

        'property',

        'tenant',

        'landlord'

    ]);

    $pdf = Pdf::loadView(

        'lease_contracts.pdf',

        compact('leaseContract')

    );

    return $pdf->download(

        'Contrat_ImmoLink_'.$leaseContract->id.'_'.$leaseContract->tenant->name.'_'.$leaseContract->landlord->name.'_'.$leaseContract->created_at->format('Y-m-d').'.pdf'

    );
}
}