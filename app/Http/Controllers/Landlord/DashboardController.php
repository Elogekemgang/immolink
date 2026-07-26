<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\RentalRequest;
use App\Models\LeaseContract;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function landlord()
    {
        $user = Auth::user();

        $totalProperties = Property::where('user_id', $user->id)->count();

        $availableProperties = Property::where('user_id', $user->id)
            ->where('status', 'available')
            ->count();

        $rentedProperties = Property::where('user_id', $user->id)
            ->where('status', 'rented')
            ->count();

        $pendingRequests = RentalRequest::where('landlord_id', $user->id)
            ->where('status', 'pending')
            ->count();

        $activeContracts = LeaseContract::where('landlord_id', $user->id)
            ->where('status', 'active')
            ->count();

        $monthlyRevenue = LeaseContract::where('landlord_id', $user->id)
            ->where('status', 'active')
            ->sum('monthly_rent');

        $latestProperties = Property::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        $latestRequests = RentalRequest::with(['tenant','property'])
            ->where('landlord_id',$user->id)
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.landlord', compact(

            'totalProperties',

            'availableProperties',

            'rentedProperties',

            'pendingRequests',

            'activeContracts',

            'monthlyRevenue',

            'latestProperties',

            'latestRequests'

        ));
    }


    public function tenant()
{
    $user = auth()->user();

    $totalRequests = RentalRequest::where(
        'tenant_id',
        $user->id
    )->count();

    $acceptedRequests = RentalRequest::where(
        'tenant_id',
        $user->id
    )
    ->where('status','accepted')
    ->count();

    $activeContracts = LeaseContract::where(
        'tenant_id',
        $user->id
    )
    ->where('status','active')
    ->count();

    $latestProperties = Property::with('mainImage')
        ->where('status','available')
        ->latest()
        ->take(6)
        ->get();

    return view(
        'dashboard.tenant',
        compact(
            'totalRequests',
            'acceptedRequests',
            'activeContracts',
            'latestProperties'
        )
    );
}


}