<?php

use App\Http\Controllers\TenantController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    BranchController,
    BusinessController,
    BackupController,
};

Route::get('/', function () {
    return view('tenant.welcome');
});

Route::get('/dashboard', [TenantController::class, 'dashboard'])->name('dashboard');

Route::middleware(['auth', 'verified', 'role:admin|super-admin'])->group(function () {});
Route::middleware(['auth', 'verified', 'role:super-admin'])->group(function () {
    // Business
    Route::resource('businesses', BusinessController::class);

    // branches
    Route::resource('branches', BranchController::class);

    // Tenant Management Routes
    Route::prefix('tenants')->group(function () {
        Route::get('/', [TenantController::class, 'index'])->name('tenants.index');
        Route::get('/create', [TenantController::class, 'create'])->name('tenants.create');
        Route::post('/', [TenantController::class, 'store'])->name('tenants.store');
        Route::get('/{tenant}', [TenantController::class, 'show'])->name('tenants.show');
        Route::get('/{tenant}/edit', [TenantController::class, 'edit'])->name('tenants.edit');
        Route::put('/{tenant}', [TenantController::class, 'update'])->name('tenants.update');
        Route::delete('/{tenant}', [TenantController::class, 'destroy'])->name('tenants.destroy');
        Route::get('/{tenant}/dashboard', [TenantController::class, 'showTenant'])->name('tenants.dashboard');
    });


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
