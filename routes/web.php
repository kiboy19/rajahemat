<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', fn() => view('auth.login'))->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware'=> ['auth', 'check_role:user']], function(){
    Route::get('/customer', fn () => 'Halaman customer');

});


Route::group(['middleware'=> ['auth', 'check_role:admin,staff']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

});

Route::get('/logout',[ AuthController::class, 'logout']);