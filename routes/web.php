<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController, PendaftaranController, UkmController,
    JadwalUkmController, FotoUkmController, AdminController,
    NewsController, HomeController
};

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', [AuthController::class, 'showLogin'])->name('login');

// Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.detail');

Route::get('/ukm/{nama}', [UkmController::class, 'show'])->name('ukm.show');

Route::get('/kategori/dzikir', [UkmController::class, 'olahDzikir'])->name('kategori.dzikir');
Route::get('/kategori/raga', [UkmController::class, 'olahraga'])->name('kategori.raga');
Route::get('/kategori/rasa', [UkmController::class, 'olahRasa'])->name('kategori.rasa');
Route::get('/kategori/fikir', [UkmController::class, 'olahFikir'])->name('kategori.fikir');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', [AuthController::class, 'showLogin'])->name('login');

Route::get('/pendaftaran.form', function () {
    return view('register');
})->name('pendaftaran.form');

Route::post('/pendaftaran.form', [PendaftaranController::class, 'store'])
    ->name('pendaftaran.store');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/loginuser', [AuthController::class, 'showRegisterUser'])->name('loginuser');
Route::post('/loginuser', [AuthController::class, 'registerUser'])->name('loginuser.store');

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/main', fn () => view('admin.main'))->name('admin.main');

    Route::get('/jadwal', [AdminController::class, 'jadwal'])->name('admin.jadwal');
    Route::post('/jadwal/store', [JadwalUkmController::class, 'store'])->name('jadwal.store');
    Route::delete('/jadwal/{id}', [JadwalUkmController::class, 'destroy'])->name('jadwal.destroy');

    Route::get('/news', [NewsController::class, 'create'])->name('admin.news');
    Route::post('/news/store', [NewsController::class, 'store'])->name('news.store');

    Route::get('/rekap', [AdminController::class, 'rekap'])->name('admin.rekap');
    Route::delete('/rekap/{id}', [AdminController::class, 'destroyPendaftar'])->name('pendaftaran.destroy');

    Route::get('/foto', [FotoUkmController::class, 'create'])->name('foto.create');
    Route::post('/foto/store', [FotoUkmController::class, 'store'])->name('foto.store');
    Route::delete('/foto/{id}', [FotoUkmController::class, 'destroy'])->name('foto.destroy');
});
