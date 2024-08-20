
<?php

use App\Http\Controllers\Dosen\DosenDashboardController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Halaman Utama
Route::get('/', function () {
    return view('auth.login');
});

// Autentikasi
Auth::routes();

// Rute untuk Admin
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/user', App\Http\Controllers\UserController::class);
    Route::resource('/dosen', App\Http\Controllers\DosenController::class);
    Route::resource('/fakultas', App\Http\Controllers\FakultasController::class);
    Route::resource('/departemen', App\Http\Controllers\DepartemenController::class);
    Route::resource('/skim', App\Http\Controllers\SkimController::class);
});

// Rute untuk Login dan Logout dengan Google
Route::middleware(['guest'])->group(function () {
    Route::get('google/redirect', [SocialiteController::class, 'redirect'])->name('redirect');
    Route::get('google/callback', [SocialiteController::class, 'callback'])->name('callback');
});

// Rute Logout
Route::post('logout', [SocialiteController::class, 'logout'])->middleware(['auth'])->name('logout');

// Rute untuk Dosen (Memerlukan Middleware Auth Dosen)
Route::middleware('auth:dosen')->prefix('dashboard')->group(function () {
    Route::get('/', [DosenDashboardController::class, 'index'])->name('dashboard.index');
    
    // Profil
    Route::resource('/detail', App\Http\Controllers\DetailController::class);
    Route::resource('/jabatan', App\Http\Controllers\JabatanController::class);
    Route::resource('/studi', App\Http\Controllers\StudiController::class);
    Route::resource('/kompetensi', App\Http\Controllers\KompetensiController::class);
    
    // Pengajaran
    Route::resource('/pengajaran', App\Http\Controllers\PengajaranController::class);
    Route::resource('/bimbingan', App\Http\Controllers\BimbinganController::class);
    Route::resource('/pengujian', App\Http\Controllers\PengujianController::class);
    Route::resource('/bahan', App\Http\Controllers\BahanController::class);
    Route::resource('/pembinaan', App\Http\Controllers\PembinaanController::class);
    Route::resource('/pembimbingan', App\Http\Controllers\PembimbinganController::class);
    Route::resource('/kunjungan', App\Http\Controllers\KunjunganController::class);
    Route::resource('/eksternal', App\Http\Controllers\EksternalController::class);
    
    // Penelitian
    Route::resource('/penelitian', App\Http\Controllers\PenelitianController::class);
    Route::resource('/jurnal', App\Http\Controllers\JurnalController::class);
    Route::resource('/publikasi', App\Http\Controllers\PublikasiController::class);
    Route::resource('/buku', App\Http\Controllers\BukuController::class);
    
    // Lainnya
    Route::resource('/haki', App\Http\Controllers\HakiController::class);
    Route::resource('/pengabdian', App\Http\Controllers\PengabdianController::class);
    Route::resource('/pkm', App\Http\Controllers\PkmController::class);
    Route::resource('/pengelola', App\Http\Controllers\PengelolaController::class);
    Route::resource('/profesi', App\Http\Controllers\ProfesiController::class);
    Route::resource('/penghargaan', App\Http\Controllers\PenghargaanController::class);
    Route::resource('/penunjang', App\Http\Controllers\PenunjangController::class);
    Route::resource('/delegasi', App\Http\Controllers\DelegasiController::class);
    Route::resource('/pertemuan', App\Http\Controllers\PertemuanController::class);
});
