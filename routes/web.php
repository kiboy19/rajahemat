<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SaldoController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\EnsureAuthenticated;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
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

    // History Pemesanan
    Route::get('/user/history', [OrderController::class, 'userHistory'])->name('user.history');

    // Services
    Route::get('/user/services', [ServiceController::class, 'userIndex'])->name('user.services.index');

    // Pemesanan Layanan
    Route::post('/user/order', [OrderController::class, 'store'])->name('user.order.store');

     // History Pemesanan
     Route::get('/user/history', [OrderController::class, 'userHistory'])->name('user.history');

    // Edit Profile
    Route::get('/user/profile/edit', [App\Http\Controllers\User\ProfileController::class, 'edit'])->name('user.profile.edit');
    Route::post('/user/profile/update', [App\Http\Controllers\User\ProfileController::class, 'update'])->name('user.profile.update');

    // Tambahkan akses lain untuk user jika diperlukan
});

// Routes untuk Admin
Route::group(['middleware' => [EnsureAuthenticated::class, 'check_role:admin']], function () {

    // Route untuk Download PDF
    Route::get('/admin/users/pdf', [UserController::class, 'exportPdf'])->name('admin.users.exportPdf');

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

    // History Pemesanan Admin
    Route::get('/admin/history', [OrderController::class, 'adminHistory'])->name('admin.history');

    // Aksi Admin pada Pemesanan
    Route::post('/admin/order/{order}/process', [OrderController::class, 'processOrder'])->name('admin.order.process');
    Route::post('/admin/order/{order}/cancel', [OrderController::class, 'cancelOrder'])->name('admin.order.cancel');
    Route::post('/admin/order/{order}/complete', [OrderController::class, 'completeOrder'])->name('admin.order.complete');

    // Edit Profile Admin
    Route::get('/admin/profile/edit', [App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::post('/admin/profile/update', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('admin.profile.update');
});

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Layanan Umum
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');

// CRUD untuk Kategori
Route::resource('categories', CategoryController::class);