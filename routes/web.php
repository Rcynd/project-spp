<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Login
// Auth::routes();

Route::middleware('auth')->group(function(){
    // Dashboard
    // Route::get('/', [HomeController::class, 'index'])->name('home');
    // Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
    
    
    // Histori Pembayaran
    Route::get('/histori', [HistoriController::class, 'index']);
    Route::post('/histori', [HistoriController::class, 'cari']);
    
});
Route::middleware('petugas')->group(function(){
    // Transaksi Pembayaran
    Route::get('/transaksi', [TransaksiController::class, 'index']);
    Route::get('/transaksi/create', [TransaksiController::class, 'create']);
    Route::post('/transaksi/create', [TransaksiController::class, 'store']);
    Route::get('/transaksi/edit/{transaksi:id}', [TransaksiController::class, 'edit']);
    Route::post('/transaksi/edit/{transaksi:id}', [TransaksiController::class, 'update']);
    Route::post('/transaksi/reset/{transaksi:id}', [TransaksiController::class, 'reset']);
    Route::get('/transaksi/hapus/{transaksi:id}', [TransaksiController::class, 'destroy']);
    
    
});
Route::middleware('admin')->group(function(){
    // Data Siswa
    Route::get('/siswa', [SiswaController::class, 'index']);
    Route::get('/siswa/create', [SiswaController::class, 'create']);
    Route::post('/siswa/create', [SiswaController::class, 'store']);
    Route::get('/siswa/edit/{siswa:nisn}', [SiswaController::class, 'edit']);
    Route::post('/siswa/edit/{siswa:nisn}', [SiswaController::class, 'update']);
    Route::get('/siswa/hapus/{siswa:nisn}', [SiswaController::class, 'destroy']);
    
    // Data Petugas
    Route::get('/petugas', [PetugasController::class, 'index']);
    Route::get('/petugas/create', [PetugasController::class, 'create']);
    Route::post('/petugas/create', [PetugasController::class, 'store']);
    Route::get('/petugas/edit/{user:id}', [PetugasController::class, 'edit']);
    Route::post('/petugas/edit/{user:id}', [PetugasController::class, 'update']);
    Route::get('/petugas/hapus/{user:id}', [PetugasController::class, 'destroy']);
    
    // Data Kelas
    Route::get('/kelas', [KelasController::class, 'index']);
    Route::get('/kelas/create', [KelasController::class, 'create']);
    Route::post('/kelas/create', [KelasController::class, 'store']);
    Route::get('/kelas/edit/{kelas:id}', [KelasController::class, 'edit']);
    Route::post('/kelas/edit/{kelas:id}', [KelasController::class, 'update']);
    Route::get('/kelas/hapus/{kelas:id}', [KelasController::class, 'destroy']);

    // Data SPP
    Route::get('/spp', [SppController::class, 'index']);
    Route::get('/spp/create', [SppController::class, 'create']);
    Route::post('/spp/create', [SppController::class, 'store']);
    Route::get('/spp/edit/{spp:id}', [SppController::class, 'edit']);
    Route::post('/spp/edit/{spp:id}', [SppController::class, 'update']);
    Route::get('/spp/hapus/{spp:id}', [SppController::class, 'destroy']);
});
// Route Login
Route::get('/', [LoginController::class, 'index'])->middleware('guest');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);