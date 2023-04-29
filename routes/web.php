<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Master\MuridController;
use App\Http\Controllers\Master\PaketBimbelController;
use App\Http\Controllers\Master\PembayaranController;
use App\Http\Controllers\Master\PerkembanganController;
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

// ###################################################### Murid
Route::resource('/murid', MuridController::class);
Route::patch('/murid/{murid}/update', [MuridController::class, 'update'])->name('murid.update');

// ###################################################### Perkembangan
Route::resource('/perkembangan', PerkembanganController::class);
Route::get('perkembangan/detail/{id_murid}', [PerkembanganController::class, 'detail'])->name('perkembangan.detail');
Route::post('perkembangan/filter', [PerkembanganController::class, 'filter'])->name('perkembangan.filter');

// ###################################################### Pembayaran
Route::get('/pembayaran', [PembayaranController::class, 'showPembayaran'])->name('pembayaran');
Route::get('/report', [PembayaranController::class, 'showReport'])->name('report');

// ###################################################### Paket Bimbel
// Route::get('/paket', [PaketBimbelController::class, 'index'])->name('paket');
// Route::post('/paket', [PaketBimbelController::class, 'store'])->name('paket.store');
Route::resource('/paket', PaketBimbelController::class);
