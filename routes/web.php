<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\EnsureAuthenticated;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\PasswordResetController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('landing');
});

Route::get('/', fn() => view('landing'))->name('landing');
Route::post('/', [AuthController::class, 'login']);

Route::get('/register', fn() => view('auth.register'))->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/reset-password', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');

Route::get('/auth-google-redirect', [AuthController::class, 'google_redirect']);
Route::get('/auth-google-callback', [AuthController::class, 'google_callback']);

Route::group(['middleware' => ['auth', 'check_role:user']], function () {
    Route::get('/user/user', function () {
        return view('user/user');
    })->name('user');

    Route::get('/user/deposit', function () {
        return view('user/deposit');
    });

    Route::get('/user/history', function () {
        return view('user/history');
    });

    Route::get('/user/services', function () {
        return view('user/services');
    });

    // tambahkan akses lain untuk user
});


Route::group(['middleware' => [EnsureAuthenticated::class, 'check_role:admin']], function () {
    // ADMIN
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);

    // Ganti route statis dengan method adminIndex di ServiceController
    Route::get('/admin/services', [ServiceController::class, 'adminIndex'])->name('admin.services.index');

    // Rute untuk mengambil data dari API
    Route::post('admin/services/fetch', [ServiceController::class, 'fetchServices'])->name('admin.services.fetch');

    // Operasi CRUD di admin tetap mengacu pada ServiceController
    Route::get('/admin/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/admin/services', [ServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/admin/services/{service}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::put('/admin/services/{service}', [ServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/admin/services/{service}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');

    // tambahkan akses lain untuk admin
});

Route::get('/logout', [AuthController::class, 'logout']);

// Rute untuk menampilkan daftar layanan
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
// Rute untuk menampilkan form membuat layanan baru
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
// Rute untuk menyimpan layanan baru
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
// Rute untuk menampilkan form edit layanan
Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
// Rute untuk memperbarui layanan
Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
// Rute untuk menghapus layanan
Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
// Rute CRUD untuk kategori
Route::resource('categories', CategoryController::class);
