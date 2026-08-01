<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Landlord\DashboardController as LandlordDashboardController;
use App\Http\Controllers\Tenant\DashboardController as TenantDashboardController;
use App\Http\Controllers\Bailiff\DashboardController as BailiffDashboardController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\LeaseContractController;
use App\Http\Controllers\RentalRequestController;
use App\Http\Controllers\DisputeController;
use App\Http\Controllers\Bailiff\ReportController;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/properties', [PropertyController::class, 'publicIndex'])
    ->name('properties.public.index');

Route::get('/properties/{property}', [PropertyController::class, 'publicShow'])
    ->name('properties.public.show');


/*
|--------------------------------------------------------------------------
| Authenticated Common Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Contrats (accessibles aux utilisateurs authentifiés concernés)
    Route::get('/contracts', [LeaseContractController::class, 'index'])->name('contracts.index');
    Route::get('/contracts/{leaseContract}', [LeaseContractController::class, 'show'])->name('contracts.show');
});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    });


/*
|--------------------------------------------------------------------------
| Landlord Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:landlord'])
    ->prefix('landlord')
    ->name('landlord.')
    ->group(function () {
        
        // Dashboard
        Route::get('/dashboard', [LandlordDashboardController::class, 'landlord'])->name('dashboard');

        // Propriétés & étapes de création
        Route::resource('properties', PropertyController::class);
        Route::get('/properties/create/step-1', [PropertyController::class, 'createStep1'])->name('properties.step1');
        Route::post('/properties/create/step-1', [PropertyController::class, 'storeStep1'])->name('properties.storeStep1');
        Route::get('/properties/create/step-2', [PropertyController::class, 'createStep2'])->name('properties.step2');
        Route::post('/properties/create/step-2', [PropertyController::class, 'storeStep2'])->name('properties.storeStep2');

        // Gestion des demandes de location reçues
        Route::get('/requests', [RentalRequestController::class, 'index'])->name('rental-requests.index');
        Route::patch('/requests/{request}/accept', [RentalRequestController::class, 'accept'])->name('rental-requests.accept');
        Route::patch('/requests/{request}/reject', [RentalRequestController::class, 'reject'])->name('rental-requests.reject');
    });


/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:tenant'])
    ->prefix('tenant')
    ->name('tenant.')
    ->group(function () {
        
        Route::get('/dashboard', [TenantDashboardController::class, 'index'])->name('dashboard');

        // Demandes de location (par le locataire)
        Route::get('/properties/{property}/request', [RentalRequestController::class, 'create'])->name('rental-requests.create');
        Route::post('/properties/{property}/request', [RentalRequestController::class, 'store'])->name('rental-requests.store');
    });


/*
|--------------------------------------------------------------------------
| Bailiff Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:bailiff'])
    ->prefix('bailiff')
    ->name('bailiff.')
    ->group(function () {
        Route::get('/dashboard', [BailiffDashboardController::class, 'index'])->name('dashboard');
    });

    Route::middleware('auth')->group(function () {

    Route::patch(
        '/contracts/{leaseContract}/sign',
        [LeaseContractController::class,'sign']
    )->name('contracts.sign');

});


use App\Http\Controllers\ConversationController;

Route::middleware(['auth'])->group(function () {

    Route::get('/messages', [ConversationController::class, 'index'])
        ->name('messages.index');

    Route::get('/messages/{conversation}', [ConversationController::class, 'show'])
        ->name('messages.show');

    Route::post('/messages/{conversation}', [ConversationController::class, 'store'])
        ->name('messages.store');

    Route::post('/properties/{property}/contact', [ConversationController::class, 'start'])
        ->middleware('role:tenant')
        ->name('messages.start');
});



Route::middleware(['auth'])->group(function () {

    Route::resource('disputes',DisputeController::class);

});




Route::prefix('bailiff')
    ->middleware(['auth', 'role:bailiff'])
    ->name('bailiff.')
    ->group(function () {

            Route::get('/dashboard', [BailiffDashboardController::class, 'index'])
            ->name('dashboard');


            //  Route::get('/profile', [BailiffDashboardController::class, 'index'])
            // ->name('baillif.profile');

        // Routes pour les litiges
        Route::get('/disputes', [DisputeController::class, 'index'])
            ->name('disputes.index');

                    Route::get('/reports', [DisputeController::class, 'index'])  // ← AJOUTÉ
            ->name('report.index');  // ← AJOUT

        // Routes pour les litiges
        Route::get('/disputes', [DisputeController::class, 'index'])
            ->name('disputes.index');
            
        Route::get('/disputes/{dispute}', [DisputeController::class, 'show'])
            ->name('disputes.show');

        Route::patch('/disputes/{dispute}/accept', [DisputeController::class, 'accept'])
            ->name('disputes.accept');
            
        Route::patch('/disputes/{dispute}/decline', [DisputeController::class, 'decline'])
            ->name('disputes.decline');

        // Routes pour les rapports
        Route::get('/disputes/{dispute}/report', [DisputeController::class, 'create'])
            ->name('report.create');
            
        Route::post('/disputes/{dispute}/report', [DisputeController::class, 'store'])
            ->name('report.store');
    });





Route::middleware(['auth'])->group(function () {

    Route::get('/conversations',
        [ConversationController::class,'index'])
        ->name('conversations.index');

    Route::get('/conversations/{conversation}',
        [ConversationController::class,'show'])
        ->name('conversations.show');

    Route::post('/conversations/{conversation}/message',
        [ConversationController::class,'storeMessage'])
        ->name('conversations.storeMessage');

});



Route::middleware(['auth'])->group(function () {

    Route::resource('disputes', DisputeController::class);

    Route::patch('/disputes/{dispute}/accept',
        [DisputeController::class,'accept'])
        ->name('disputes.accept');

    Route::patch('/disputes/{dispute}/decline',
        [DisputeController::class,'decline'])
        ->name('disputes.decline');

});



use App\Http\Controllers\BailiffReportController;

Route::middleware(['auth','role:bailiff'])
    ->prefix('bailiff')
    ->group(function () {

        Route::get(
            '/reports',
            [BailiffReportController::class,'index']
        )->name('bailiff-reports.index');

        Route::get(
            '/reports/create/{dispute}',
            [BailiffReportController::class,'create']
        )->name('bailiff-reports.create');

        Route::post(
            '/reports/create/{dispute}',
            [BailiffReportController::class,'store']
        )->name('bailiff-reports.store');

        Route::get(
            '/reports/{bailiffReport}',
            [BailiffReportController::class,'show']
        )->name('bailiff-reports.show');

        Route::get(
            '/reports/{bailiffReport}/edit',
            [BailiffReportController::class,'edit']
        )->name('bailiff-reports.edit');

        Route::put(
            '/reports/{bailiffReport}',
            [BailiffReportController::class,'update']
        )->name('bailiff-reports.update');

        Route::patch(
            '/reports/{bailiffReport}/submit',
            [BailiffReportController::class,'submit']
        )->name('bailiff-reports.submit');

        // Route::get(
        //     '/reports/{bailiffReport}/pdf',
        //     [BailiffReportController::class,'pdf']
        // )->name('bailiff-reports.pdf');

    });

    // Route PDF : Sortie du groupe 'bailiff' pour autoriser propriétaires et locataires
// Note: On garde le préfixe 'bailiff' pour que l'URL reste identique.
Route::middleware(['auth'])
    ->prefix('bailiff')
    ->group(function () {
        Route::get('/reports/{bailiffReport}/pdf', [BailiffReportController::class,'pdf'])->name('bailiff-reports.pdf');
    });



    use App\Http\Controllers\AssistantController;

Route::middleware('auth')->group(function(){

    Route::post(

        '/assistant/chat',

        [AssistantController::class,'chat']

    )->name('assistant.chat');

});




// Routes d'authentification Laravel Breeze/Jetstream
require __DIR__.'/auth.php';