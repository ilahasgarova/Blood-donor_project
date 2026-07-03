<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DonorController;
use App\Http\Controllers\Admin\BloodRequestController;
use App\Http\Controllers\Admin\BloodInventoryController as AdminBloodInventoryController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\HospitalController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DonorRegistrationController;
use App\Http\Controllers\DonorListController;
use App\Http\Controllers\HospitalPublicController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BloodRequestPublicController;
use App\Http\Controllers\BloodInventoryPublicController;

// Public səhifələr
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/donorlar', [DonorListController::class, 'index'])->name('donorlar');
Route::get('/donor-ol', [DonorRegistrationController::class, 'create'])->name('donor.create');
Route::post('/donor-ol', [DonorRegistrationController::class, 'store'])->name('donor.store');
Route::get('/qan-teleb', [BloodRequestPublicController::class, 'create'])->name('qan-teleb');
Route::post('/qan-teleb', [BloodRequestPublicController::class, 'store'])->name('qan-teleb.store');
Route::get('/elaqe', [ContactController::class, 'index'])->name('elaqe');
Route::view('/haqqimizda', 'haqqimizda')->name('haqqimizda');
Route::get('/xestexanalar', [HospitalPublicController::class, 'publicIndex'])->name('xestexanalar');
Route::get('/qan-ehtiyati', [BloodInventoryPublicController::class, 'index'])->name('qan-ehtiyati');

// Admin login
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

// Admin panel — yalnız admin girə bilər
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('donors', DonorController::class);
    Route::resource('blood-requests', BloodRequestController::class);
    Route::resource('blood-inventory', AdminBloodInventoryController::class);
    Route::resource('donations', DonationController::class);
    Route::resource('hospitals', HospitalController::class);

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
});