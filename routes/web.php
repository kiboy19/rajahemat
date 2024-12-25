<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController; // Tambahkan UserController
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Middleware\EnsureAuthenticated;

Route::get('/', fn() => view('landing'))->name('landing');
Route::post('/', [AuthController::class, 'login']);

Route::get('/register', fn() => view('auth.register'))->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/reset-password', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');

Route::get('/auth-google-redirect', [AuthController::class, 'google_redirect']);
Route::get('/auth-google-callback', [AuthController::class, 'google_callback']);

Route::group(['middleware' => ['auth', 'check_role:user']], function () {
    Route::get('/user/user', fn() => view('user/user'))->name('user');
    Route::get('/user/deposit', fn() => view('user/deposit'));
    Route::get('/user/history', fn() => view('user/history'));
    Route::get('/user/services', fn() => view('user/services'));
});

Route::group(['middleware' => [EnsureAuthenticated::class, 'check_role:admin']], function () {
    // Dashboard Admin
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Rute untuk Edit, Update, dan Delete User
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    // Rute Services
    Route::get('/admin/services', [ServiceController::class, 'adminIndex'])->name('admin.services.index');
    Route::post('admin/services/fetch', [ServiceController::class, 'fetchServices'])->name('admin.services.fetch');
    Route::get('/admin/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/admin/services', [ServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/admin/services/{service}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::put('/admin/services/{service}', [ServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/admin/services/{service}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');
});

Route::get('/logout', [AuthController::class, 'logout']);

// Rute CRUD untuk kategori
Route::resource('categories', CategoryController::class);
