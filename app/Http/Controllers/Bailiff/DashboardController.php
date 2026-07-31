<?php

namespace App\Http\Controllers\Bailiff;

use App\Http\Controllers\Controller;
use App\Models\Dispute;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $bailiff = Auth::user();

        $pendingCount = Dispute::where('bailiff_id', $bailiff->id)
            ->where('bailiff_status', 'pending')
            ->count();

        $investigatingCount = Dispute::where('bailiff_id', $bailiff->id)
            ->where('status', 'investigating')
            ->count();

        $resolvedCount = Dispute::where('bailiff_id', $bailiff->id)
            ->where('status', 'resolved')
            ->count();

        $declinedCount = Dispute::where('bailiff_id', $bailiff->id)
            ->where('bailiff_status', 'declined')
            ->count();

        $recentDisputes = Dispute::with([
                'contract.property',
                'opener'
            ])
            ->where('bailiff_id', $bailiff->id)
            ->latest()
            ->take(5)
            ->get();

        return view('bailiff.dashboard', compact(
            'pendingCount',
            'investigatingCount',
            'resolvedCount',
            'declinedCount',
            'recentDisputes'
        ));
    }
}