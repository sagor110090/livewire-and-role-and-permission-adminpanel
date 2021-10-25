<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('home');
Route::view('/admin/profile', 'admin.profile');
Route::post('/admin/profile', [AdminController::class,'profileUpdate']);
//Route Hooks - Do not delete//
	Route::get('/admin/site_settings', App\Http\Livewire\SiteSettings::class)->middleware('auth');
	Route::get('/admin/posts', App\Http\Livewire\Posts::class)->middleware('auth');
	Route::get('/admin/users', App\Http\Livewire\Users::class)->middleware('auth');
	Route::get('/admin/roles', App\Http\Livewire\Roles::class)->middleware('auth');
	Route::get('/admin/permissions', App\Http\Livewire\Permissions::class)->middleware('auth');





