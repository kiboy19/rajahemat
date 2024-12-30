<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\EnsureAuthenticated;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\SaldoController;
use App\Http\Controllers\Auth\PasswordResetController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Landing Page
Route::get('/', fn() => view('landing'))->name('landing');
Route::post('/', [AuthController::class, 'login']);

// Authentication Routes
Route::get('/register', fn() => view('auth.register'))->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/reset-password', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');

Route::get('/auth-google-redirect', [AuthController::class, 'google_redirect']);
Route::get('/auth-google-callback', [AuthController::class, 'google_callback']);

// Routes untuk User
Route::group(['middleware' => ['auth', 'check_role:user']], function () {
    // Dashboard User
    Route::get('/user/user', [SaldoController::class, 'showSaldo'])->name('user.showSaldo');

    // Deposit
    Route::get('/user/deposit', [SaldoController::class, 'depositForm'])->name('user.depositForm');
    Route::post('/user/deposit', [SaldoController::class, 'deposit'])->name('user.deposit');

    // History
    Route::get('/user/history', [ServiceController::class, 'userNavHistory'])->name('user.services.userNavHistory');

    // Services
    Route::get('/user/services', [ServiceController::class, 'userIndex'])->name('user.services.index');

    // Tambahkan akses lain untuk user jika diperlukan
});

// Routes untuk Admin
Route::group(['middleware' => [EnsureAuthenticated::class, 'check_role:admin']], function () {
    // Dashboard Admin
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Layanan Admin
    Route::get('/admin/services', [ServiceController::class, 'adminIndex'])->name('admin.services.index');
    Route::post('/admin/services/fetch', [ServiceController::class, 'fetchServices'])->name('admin.services.fetch');
    Route::get('/admin/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/admin/services', [ServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/admin/services/{service}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::put('/admin/services/{service}', [ServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/admin/services/{service}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');

    // Users Admin
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    // Tambah Saldo oleh Admin
    Route::get('/admin/tambahsaldo', [SaldoController::class, 'tambahSaldoForm'])->name('admin.tambahsaldo.form');
    Route::post('/admin/tambahsaldo', [SaldoController::class, 'tambahSaldo'])->name('admin.tambahsaldo');
});

// Logout
Route::get('/logout', [AuthController::class, 'logout']);

// Layanan Umum
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');

// CRUD untuk Kategori
Route::resource('categories', CategoryController::class);
