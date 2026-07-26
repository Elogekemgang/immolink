<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Landlord\DashboardController as LandlordDashboardController;
use App\Http\Controllers\Tenant\DashboardController as TenantDashboardController;
use App\Http\Controllers\Bailiff\DashboardController as BailiffDashboardController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\LeaseContractController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/properties', [PropertyController::class, 'publicIndex'])
    ->name('properties.public.index');

Route::get('/properties/{property}', [PropertyController::class, 'publicShow'])
    ->name('properties.public.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

    });

Route::middleware(['auth', 'role:landlord'])
    ->prefix('landlord')
    ->name('landlord.')
    ->group(function () {
        Route::get('/dashboard', [LandlordDashboardController::class, 'index'])
            ->name('dashboard');
                Route::resource('properties', PropertyController::class);

    }); 


    Route::middleware(['auth', 'role:tenant'])
    ->prefix('tenant')
    ->name('tenant.')
    ->group(function () {

        Route::get('/dashboard', [TenantDashboardController::class, 'index'])
            ->name('dashboard');

    });


    Route::middleware(['auth', 'role:bailiff'])
    ->prefix('bailiff')
    ->name('bailiff.')
    ->group(function () {

        Route::get('/dashboard', [BailiffDashboardController::class, 'index'])
            ->name('dashboard');

    });








Route::middleware(['auth', 'role:landlord'])
    ->prefix('landlord')
    ->name('landlord.')
    ->group(function () {

        Route::resource('properties', PropertyController::class);

        Route::get('/properties/create/step-1', [PropertyController::class, 'createStep1'])->name('properties.step1');

        Route::post('/properties/create/step-1', [PropertyController::class, 'storeStep1'])->name('properties.storeStep1');

        Route::get('/properties/create/step-2', [PropertyController::class, 'createStep2'])->name('properties.step2');

        Route::post('/properties/create/step-2', [PropertyController::class, 'storeStep2'])->name('properties.storeStep2');
});


use App\Http\Controllers\RentalRequestController;

Route::middleware(['auth','role:tenant'])->group(function(){

    Route::get('/properties/{property}/request',
        [RentalRequestController::class,'create'])
        ->name('rental-requests.create');

    Route::post('/properties/{property}/request',
        [RentalRequestController::class,'store'])
        ->name('rental-requests.store');

    Route::get('/dashboard',[DashboardController::class,'tenant'])->name('dashboard');

});

Route::middleware(['auth','role:landlord'])->group(function(){

    Route::get('/requests',
        [RentalRequestController::class,'index'])
        ->name('rental-requests.index');

    Route::patch('/requests/{request}/accept',
        [RentalRequestController::class,'accept'])
        ->name('rental-requests.accept');

    Route::patch('/requests/{request}/reject',
        [RentalRequestController::class,'reject'])
        ->name('rental-requests.reject');

});



Route::middleware(['auth'])->group(function(){

    Route::get(
        '/contracts',
        [LeaseContractController::class,'index']
    )->name('contracts.index');

    Route::get(
        '/contracts/{leaseContract}',
        [LeaseContractController::class,'show']
    )->name('contracts.show');

});


Route::middleware(['auth','role:landlord'])
    ->prefix('landlord')
    ->name('landlord.')
    ->group(function(){

        Route::get('/dashboard',
            [DashboardController::class,'landlord'])
            ->name('dashboard');

});

require __DIR__.'/auth.php';
