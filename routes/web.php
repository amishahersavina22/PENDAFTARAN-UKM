<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController, PendaftaranController, UkmController, 
    JadwalUkmController, FotoUkmController, AdminController, NewsController, HomeController
};

// --- Halaman Publik ---
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/register', fn() => view('register'))->name('register');
Route::get('/news', [NewsController::class, 'index'])->name('news'); 

// Ini untuk detailnya
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.detail');
Route::get('/ukm/{nama}', [UkmController::class, 'show'])->name('ukm.show');

// Kategori UKM
Route::get('/kategori/dzikir', [UkmController::class, 'olahDzikir'])->name('kategori/dzikir');
Route::get('/kategori/raga', [UkmController::class, 'olahraga'])->name('kategori/raga');
Route::get('/kategori/rasa', [UkmController::class, 'olahRasa'])->name('kategori/rasa');
Route::get('/kategori/fikir', [UkmController::class, 'olahFikir'])->name('kategori/fikir');

// Pendaftaran
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

// --- AUTH ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- ADMIN AREA (Gunakan Grouping agar Rapi) ---
Route::middleware('auth')->prefix('admin')->group(function () {
    
    Route::get('/main', [AuthController::class, 'admin'])->name('admin.main');

    // Route JADWAL
    Route::get('/jadwal', [AdminController::class, 'jadwal'])->name('admin.jadwal');
    Route::post('/jadwal/store', [JadwalUkmController::class, 'store'])->name('jadwal.store');
    Route::delete('/jadwal/{id}', [JadwalUkmController::class, 'destroy'])->name('jadwal.destroy');
    Route::delete('/admin/rekap/{id}', [AdminController::class, 'destroyPendaftar'])->name('admin.destroyPendaftar');

    // Route NEWS
    Route::get('/news', [NewsController::class, 'create'])->name('admin.news');
    Route::post('/news/store', [NewsController::class, 'store'])->name('news.store');

    // Route REKAP PENDAFTAR
    Route::get('/rekap', [AdminController::class, 'rekap'])->name('admin.rekap');
    Route::delete('/rekap/{id}', [AdminController::class, 'destroyPendaftar'])->name('pendaftaran.destroy');
    Route::delete('/jadwal/{id}', [JadwalUkmController::class, 'destroy'])->name('jadwal.destroy');

    // Route FOTO UKM (Gunakan FotoUkmController agar logic store/destroy jalan)
    Route::get('/foto', [FotoUkmController::class, 'create'])->name('foto.create'); // Ini yang dipanggil sidebar
    Route::post('/foto/store', [FotoUkmController::class, 'store'])->name('foto.store'); // Ini target form
    Route::delete('/foto/{id}', [FotoUkmController::class, 'destroy'])->name('foto.destroy'); // Ini tombol hapus
});