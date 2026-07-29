<?php
namespace App\Http\Controllers\Landlord;

use App\Models\Property;
use App\Models\RentalRequest;
use App\Models\LeaseContract;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

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

        return view('landlord.dashboard', compact(

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
}