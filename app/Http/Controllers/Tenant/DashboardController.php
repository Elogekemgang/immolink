<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\RentalRequest;
use App\Models\LeaseContract;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
public function index()
{
    $user = Auth::user();

    $totalRequests = RentalRequest::where('tenant_id', $user->id)->count();

    $acceptedRequests = RentalRequest::where('tenant_id', $user->id)
        ->where('status', 'accepted')
        ->count();

    $activeContracts = LeaseContract::where('tenant_id', $user->id)
        ->where('status', 'active')
        ->count();

    $availableProperties = Property::where('status', 'available')
        ->latest()
        ->take(6)
        ->get();

    $latestRequests = RentalRequest::with('property')
        ->where('tenant_id', $user->id)
        ->latest()
        ->take(5)
        ->get();

    return view('dashboard.tenant', compact(
        'totalRequests',
        'acceptedRequests',
        'activeContracts',
        'availableProperties',
        'latestRequests'
    ));
}
}
