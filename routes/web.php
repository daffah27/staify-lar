<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Autentifikasi;
use App\Http\Controllers\DanaController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MailController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [Autentifikasi::class, 'login'])->name('login');
Route::post('/login', [Autentifikasi::class, 'prosesLogin']);
Route::post('/editprofile', [Autentifikasi::class, 'editprofile']);
Route::post('/logout', [Autentifikasi::class, 'logout'])->name('logout');

Route::get('/register', [Autentifikasi::class, 'register'])->name('register');
Route::post('/register', [Autentifikasi::class, 'buatUser']);


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');


Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi')->middleware('auth');
Route::get('/prestasi/{id}', [PrestasiController::class, 'show'])->name('prestasi.detail')->middleware('auth');
Route::post('/prestasi/{id}/terima', [PrestasiController::class, 'accept'])->name('prestasi.accept');
Route::post('/prestasi/{id}/tolak', [PrestasiController::class, 'reject'])->name('prestasi.reject');

Route::get('/prestasitambah', [PrestasiController::class, 'create'])->name('prestasi.tambah')->middleware('auth');
Route::post('/prestasitambah', [PrestasiController::class, 'store']);

Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan')->middleware('auth');

Route::get('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
Route::post('/kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');

Route::get('/kegiatan/{id}', [KegiatanController::class, 'show'])->name('kegiatan.show')->middleware('auth');

Route::get('/kegiatan/{id}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
Route::post('/kegiatan/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
Route::delete('/kegiatan/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');

Route::get('/pengajuan', [DanaController::class, 'index'])->name('pengajuan')->middleware('auth');
Route::post('/pengajuan/accept/{id}', [DanaController::class, 'accept'])->name('dana.accept')->middleware('auth');
Route::post('/pengajuan/reject/{id}', [DanaController::class, 'reject'])->name('dana.reject');
Route::get('/pengajuan/detail/{id}', [DanaController::class, 'detail'])->name('dana.detail');

Route::get('/send-mail', [MailController::class, 'sendMail']);

