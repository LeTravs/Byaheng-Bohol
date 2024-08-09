<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\TourAgencyAdminController;
use App\Http\Controllers\TransportOperatorAdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterTourController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/landing', function () {
    return view('clients.landing');
})->name('landing');

// Dashboard route for authenticated and verified users
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile management routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Role-based routes
    Route::middleware(['role:superAdmin'])->group(function () {
        Route::get('/superadmin', [SuperAdminController::class, 'index'])->name('superadmin.index');
    });

    Route::middleware(['role:tourAgencyAdmin'])->group(function () {
        Route::get('/touragency', [TourAgencyAdminController::class, 'index'])->name('touragency.index');
        Route::get('/touragency/create-package', [TourAgencyAdminController::class, 'createPackageForm'])->name('touragency.create-package');
        Route::post('/touragency/store-package', [TourAgencyAdminController::class, 'storePackage'])->name('touragency.store-package');
    });

    Route::middleware(['role:transportOperatorAdmin'])->group(function () {
        Route::get('/transportoperator', [TransportOperatorAdminController::class, 'index'])->name('transportoperator.index');
        Route::get('/transportoperator/create-vehicle', [TransportOperatorAdminController::class, 'createVehicleForm'])->name('transportoperator.create-vehicle');
        Route::post('/transportoperator/store-vehicle', [TransportOperatorAdminController::class, 'storeVehicle'])->name('transportoperator.store-vehicle');
    });

    Route::middleware(['role:user'])->group(function () {
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
    });
});

// Publicly accessible route for registering as a tour agency or operator
Route::get('/register/tour', [RegisterTourController::class, 'showRegistrationForm'])->name('register.tour');
Route::post('/register/tour', [RegisterTourController::class, 'register'])->name('register.tour');

// Optional: Fallback route for home if needed
Route::get('/home', function () {
    return view('home');
})->name('home');

// Include the default authentication routes
require __DIR__.'/auth.php';
