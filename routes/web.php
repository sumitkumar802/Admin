<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationSuccessMail;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\WelcomeController;

Route::get('/', function () {
    return view('landing.index');
});

Route::get('/about', [WelcomeController::class, 'about'])->name('about');
Route::get('/contact', [WelcomeController::class, 'contact'])->name('contact');
Route::get('/services', [WelcomeController::class, 'services'])->name('services');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'is_active'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// google register
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.register');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


// for testing purpoe
Route::get('/test-mail', function () {
    $user = User::find(24);
    Mail::to($user->email)->send(new RegistrationSuccessMail($user));
    return 'Email sent!';
});

require __DIR__.'/auth.php';

// admin routes
Route::middleware(['auth', 'role:superadmin'])->prefix('superadmin')->name('superadmin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'superAdminDashboard'])->name('dashboard');
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard');
    Route::get('/UserList', [DashboardController::class, 'UserList'])->name('UserList');
});