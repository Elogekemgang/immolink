<?php

namespace App\Http\Controllers\Bailiff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index()
{
    return view('bailiff.dashboard');
}
}
