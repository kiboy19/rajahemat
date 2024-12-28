<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\EnsureAuthenticated;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
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

    // Route untuk menampilkan nama di navigasi halaman dashboard user
    Route::get('/user/user', [ServiceController::class, 'userNav'])->name('user.services.userNav');

    // Route untuk menampilkan nama di navigasi halaman deposit user
    Route::get('/user/deposit', [ServiceController::class, 'userNavDeposit'])->name('user.services.userNavDeposit');

    // Route untuk menampilkan nama di navigasi halaman deposit user
    Route::get('/user/history', [ServiceController::class, 'userNavHistory'])->name('user.services.userNavHistory');

    // Route untuk menampilkan services dan nama user yang login pada navigasi
    Route::get('/user/services', [ServiceController::class, 'userIndex'])->name('user.services.index');

    // tambahkan akses lain untuk user
});


Route::group(['middleware' => [EnsureAuthenticated::class, 'check_role:admin']], function () {
    // ADMIN
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);

    // Dashboard Admin
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Rute untuk layanan admin
    Route::get('/admin/services', [ServiceController::class, 'adminIndex'])->name('admin.services.index');
    Route::post('admin/services/fetch', [ServiceController::class, 'fetchServices'])->name('admin.services.fetch');
    Route::get('/admin/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/admin/services', [ServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/admin/services/{service}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::put('/admin/services/{service}', [ServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/admin/services/{service}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');

    // Tambahkan route untuk users
    // Rute untuk Edit, Update, dan Delete User
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
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
