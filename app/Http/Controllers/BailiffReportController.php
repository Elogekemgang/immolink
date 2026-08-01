<?php

namespace App\Http\Controllers;

use App\Models\Dispute;
use App\Models\BailiffReport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BailiffReportController extends Controller
{
    /**
     * Liste des rapports de l'huissier connecté
     */
    public function index()
    {
        $reports = BailiffReport::with([
                'dispute',
                'dispute.leaseContract.property'
            ])
            ->where('bailiff_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('bailiff_reports.index', compact('reports'));
    }

    /**
     * Formulaire de rédaction
     */
    public function create(Dispute $dispute)
    {
        if ($dispute->bailiff_id != auth()->id()) {
            abort(403);
        }

        if ($dispute->report) {
            return redirect()->route(
                'bailiff-reports.edit',
                $dispute->report
            );
        }

        return view(
            'bailiff_reports.create',
            compact('dispute')
        );
    }

    /**
     * Enregistrer un rapport
     */
    public function store(Request $request, Dispute $dispute)
    {
        if ($dispute->bailiff_id != auth()->id()) {
            abort(403);
        }

        $request->validate([

            'title' => 'required|max:255',

            'findings' => 'required',

            'decision' => 'nullable',

            'recommendations' => 'nullable',

        ]);

        $report = BailiffReport::create([

            'dispute_id' => $dispute->id,

            'bailiff_id' => auth()->id(),

            'title' => $request->title,

            'findings' => $request->findings,

            'decision' => $request->decision,

            'recommendations' => $request->recommendations,

            'status' => 'draft'

        ]);

        return redirect()
            ->route(
                'bailiff-reports.show',
                $report
            )
            ->with(
                'success',
                'Rapport enregistré.'
            );
    }

    /**
     * Voir le rapport
     */
    public function show(BailiffReport $bailiffReport)
    {
        if ($bailiffReport->bailiff_id != auth()->id()) {
            abort(403);
        }

        
        $bailiffReport->load([
            'dispute',
            'dispute.leaseContract.property'
        ]);

        return view(
            'bailiff_reports.show',
            compact('bailiffReport')
        );
    }

    /**
     * Modifier le rapport
     */
    public function edit(BailiffReport $bailiffReport)
    {
        if ($bailiffReport->bailiff_id != auth()->id()) {
            abort(403);
        }

        return view(
            'bailiff_reports.edit',
            compact('bailiffReport')
        );
    }

    /**
     * Sauvegarder les modifications
     */
    public function update(
        Request $request,
        BailiffReport $bailiffReport
    )
    {
        if ($bailiffReport->bailiff_id != auth()->id()) {
            abort(403);
        }

        $request->validate([

            'title' => 'required',

            'findings' => 'required',

            'decision' => 'nullable',

            'recommendations' => 'nullable'

        ]);

        $bailiffReport->update([

            'title' => $request->title,

            'findings' => $request->findings,

            'decision' => $request->decision,

            'recommendations' => $request->recommendations

        ]);

        return redirect()
            ->route(
                'bailiff-reports.show',
                $bailiffReport
            )
            ->with(
                'success',
                'Rapport modifié.'
            );
    }

    /**
     * Soumettre définitivement
     */
    public function submit(BailiffReport $bailiffReport)
    {
        if ($bailiffReport->bailiff_id != auth()->id()) {
            abort(403);
        }

        $bailiffReport->update([

            'status' => 'submitted',

            'submitted_at' => now()

        ]);

        $bailiffReport
            ->dispute
            ->update([

                'status' => 'resolved'

            ]);

        return back()->with(
            'success',
            'Rapport soumis définitivement.'
        );
    }

    /**
     * Export PDF
     */
    public function pdf(BailiffReport $bailiffReport)
{

    if (!auth()->check()) {
        abort(401, 'Non authentifié');
    }

    $user = auth()->user();

    
    // Charger les relations nécessaires pour les vérifications
    $bailiffReport->load([
        'dispute.leaseContract.landlord',
        'dispute.leaseContract.tenant'
    ]);

    // Vérifier les autorisations
    $isBailiff = $user->user_type === 'bailiff' && $bailiffReport->bailiff_id === $user->id;
    $isLandlord = $user->user_type === 'landlord' && 
                  $bailiffReport->dispute->leaseContract->landlord_id === $user->id;
    $isTenant = $user->user_type === 'tenant' && 
                $bailiffReport->dispute->leaseContract->tenant_id === $user->id;

    if (!$isBailiff && !$isLandlord && !$isTenant) {
        abort(403, 'Vous n\'êtes pas autorisé à consulter ce rapport');
    }
    
    $bailiffReport->load([
        'bailiff',
        'dispute.leaseContract.property',
        'dispute.leaseContract.landlord',
        'dispute.leaseContract.tenant'
    ]);

    $pdf = Pdf::loadView(
        'bailiff_reports.pdf',
        compact('bailiffReport')
    );

        $fileName = 'Rapport_Huissier_'.substr($bailiffReport->title, 0, 10).'.pdf';

    return $pdf->download(
        $fileName
    );
}
}