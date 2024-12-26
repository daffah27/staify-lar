<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Autentifikasi;
use App\Http\Controllers\DanaController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Auth;

// Redirect '/' berdasarkan status login
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        return redirect()->route('login');
    }
})->name('home');

// Rute untuk autentikasi (tidak menggunakan middleware auth)
Route::get('/login', [Autentifikasi::class, 'login'])->name('login');
Route::post('/login', [Autentifikasi::class, 'prosesLogin']);
Route::get('/register', [Autentifikasi::class, 'register'])->name('register');
Route::post('/register', [Autentifikasi::class, 'buatUser']);
Route::post('/logout', [Autentifikasi::class, 'logout'])->name('logout');

// Rute dengan middleware auth
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/editprofile', [Autentifikasi::class, 'editprofile']);

    // Rute untuk prestasi
    Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi');
    Route::get('/prestasi/verifikasi', [PrestasiController::class, 'prestasiver'])->name('prestasi.verifikasi');
    Route::get('/prestasi/{id}', [PrestasiController::class, 'show'])->name('prestasi.detail');
    Route::post('/prestasi/{id}/terima', [PrestasiController::class, 'accept'])->name('prestasi.accept');
    Route::post('/prestasi/{id}/tolak', [PrestasiController::class, 'reject'])->name('prestasi.reject');
    Route::get('/prestasitambah', [PrestasiController::class, 'create'])->name('prestasi.tambah');
    Route::post('/prestasitambah', [PrestasiController::class, 'store']);

    // Rute untuk kegiatan
    Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan');
    Route::get('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
    Route::post('/kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');
    Route::get('/kegiatan/{id}', [KegiatanController::class, 'show'])->name('kegiatan.show');
    Route::get('/kegiatan/{id}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
    Route::post('/kegiatan/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
    Route::delete('/kegiatan/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');

    // Rute untuk akun
    Route::get('/akun', [DashboardController::class, 'akunview'])->name('akun');
    Route::post('/akun', [DashboardController::class, 'akunstore'])->name('akun.store');
    Route::post('/akun/{id}/reset', [DashboardController::class, 'akunreset'])->name('akun.reset');
    Route::delete('/akun/{id}', [DashboardController::class, 'akundestroy'])->name('akun.destroy');

    // Rute untuk pengajuan dana
    Route::get('/pengajuan', [DanaController::class, 'index'])->name('pengajuan');
    Route::post('/pengajuan/accept/{id}', [DanaController::class, 'accept'])->name('dana.accept');
    Route::post('/pengajuan/reject/{id}', [DanaController::class, 'reject'])->name('dana.reject');
    Route::get('/pengajuan/detail/{id}', [DanaController::class, 'detail'])->name('dana.detail');
    Route::get('/pengajuan/tambah', [DanaController::class, 'create'])->name('dana.create');
    Route::post('/pengajuan/tambah', [DanaController::class, 'store'])->name('dana.store');
});

// Rute untuk pengiriman email (opsional, bisa ditambahkan middleware jika perlu)
// Route::get('/send-mail', [MailController::class, 'sendMail']);
