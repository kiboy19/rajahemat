<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\PasswordResetController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;


Route::get('/', function () {
    return view('landing');
});

Route::get('/daftar', function () {
    return view('daftar');
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
});


Route::group(['middleware' => ['auth', 'check_role:admin']], function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware('auth');
});

Route::get('/logout', [AuthController::class, 'logout']);

// Rute untuk menampilkan daftar layanan
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

// Rute untuk mengambil data dari API
Route::post('/services/fetch', [ServiceController::class, 'fetchServices'])->name('services.fetch');

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