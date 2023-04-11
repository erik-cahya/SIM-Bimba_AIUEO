<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Master\PaketBimbelController;
use App\Http\Controllers\Master\PembayaranController;
use App\Http\Controllers\Master\SiswaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LoginController::class, 'index']);


// ###################################################### Authentication
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'authenticate']);

// ###################################################### Dashboard
Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');

// ###################################################### Master Apps -> Siswa
Route::get('/siswa', [SiswaController::class, 'showSiswa'])->name('siswa');
Route::get('/perkembangan', [SiswaController::class, 'showPerkembangan'])->name('siswa.perkembangan');
Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');


// ###################################################### Master Apps -> Pembayaran
Route::get('/pembayaran', [PembayaranController::class, 'showPembayaran'])->name('pembayaran');
Route::get('/report', [PembayaranController::class, 'showReport'])->name('report');

// ###################################################### Master Apps -> Paket Bimbel
Route::get('/paket', [PaketBimbelController::class, 'index'])->name('paket');
Route::post('/paket', [PaketBimbelController::class, 'store'])->name('paket.store');

