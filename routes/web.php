<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);



Route::get('/', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'index'])->name('home');
Route::view('/admin/profile', 'admin.profile');
Route::post('/admin/profile', [AdminController::class, 'profileUpdate']);
//Route Hooks - Do not delete// 

Route::get('/admin/site_settings', App\Http\Livewire\SiteSettings::class)->middleware('auth');
Route::get('/admin/users', App\Http\Livewire\Users::class)->middleware('auth');
Route::get('/admin/roles', App\Http\Livewire\Roles::class)->middleware('auth');
Route::get('/admin/permissions', App\Http\Livewire\Permissions::class)->middleware('auth');
