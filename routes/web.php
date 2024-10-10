<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register',[UserController::class,'register'])
->name('user.register');
Route::post('/register',[UserController::class,'register_store'])
->name('user.register_store');
Route::post('/login',[UserController::class,'login'])
->name('user.login');

Route::get('/dashboard',[DashboardController::class,'dashboard'])
->name('dashboard');

Route::resource('supplier',SupplierController::class);