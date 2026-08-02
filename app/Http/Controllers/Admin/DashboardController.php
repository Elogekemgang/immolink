<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Property;
use App\Models\LeaseContract;
use App\Models\Dispute;
use App\Models\Conversation;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard',[

            'users'=>User::count(),

            'landlords'=>User::role('landlord')->count(),

            'tenants'=>User::role('tenant')->count(),

            'bailiffs'=>User::role('bailiff')->count(),

            'properties'=>Property::count(),

            'contracts'=>LeaseContract::count(),

            'activeContracts'=>LeaseContract::where('status','active')->count(),

            'disputes'=>Dispute::count(),

            'messages'=>Conversation::count(),

            'latestUsers'=>User::latest()->take(8)->get(),

            'latestProperties'=>Property::latest()->take(5)->get(),

            'latestContracts'=>LeaseContract::latest()->take(5)->get(),

            'latestDisputes'=>Dispute::latest()->take(5)->get()

        ]);
    }
}
