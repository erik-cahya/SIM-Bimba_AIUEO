<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Master\AlokasiMuridController;
use App\Http\Controllers\Master\JenisPaketController;
use App\Http\Controllers\Master\MuridController;
use App\Http\Controllers\Master\PaketBimbelController;
use App\Http\Controllers\Master\PembayaranController;
use App\Http\Controllers\Master\PerkembanganController;
use App\Http\Controllers\Master\ReportPembayaranController;
use App\Http\Controllers\PdfGeneratorContoller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Wali\WaliPembayaranController;
use App\Http\Controllers\Wali\WaliPerkembanganContoller;
use App\Models\AlokasiMurid;
use Illuminate\Support\Facades\Auth;
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
// Route::get('dashboard', [LoginController::class, 'dashboard']);
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [LoginController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [LoginController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [LoginController::class, 'signOut'])->name('signout');

// ###################################################### Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// ###################################################### Murid
Route::resource('/murid', MuridController::class);
Route::patch('/murid/{murid}/update', [MuridController::class, 'update'])->name('murid.update');

// ###################################################### Perkembangan
Route::resource('/perkembangan', PerkembanganController::class);
Route::get('/perkembangan/detail/{id_murid}', [PerkembanganController::class, 'detail'])->name('perkembangan.detail');
Route::post('perkembangan/filter', [PerkembanganController::class, 'filter'])->name('perkembangan.filter');
Route::patch('perkembangan/update/{id_perkembangan}', [PerkembanganController::class, 'update'])->name('perkembangan.update');

// ###################################################### Pembayaran
Route::delete('/pembayaran/{id_pembayaran}', [PembayaranController::class, 'destroy'])->name('pembayaran.delete');
Route::get('/pembayaran/filter', [PembayaranController::class, 'index']);
Route::post('pembayaran/filter', [PembayaranController::class, 'index'])->name('pembayaran.filter');
Route::resource('/pembayaran', PembayaranController::class);
Route::delete('/pembayaran/{id_pembayaran}', [PembayaranController::class, 'destroy']);


// ###################################################### Report Pembayaran
Route::get('/report', [ReportPembayaranController::class, 'index'])->name('report');
Route::post('report/filter', [ReportPembayaranController::class, 'filter'])->name('report.filter');


// ###################################################### Paket Bimbel
Route::resource('/paket', PaketBimbelController::class);

// ###################################################### Jenis Paket Bimbel
Route::delete('/jenis/{id_jenis}', [JenisPaketController::class, 'destroy'])->name('jenis.delete');
Route::resource('/jenis', JenisPaketController::class);

// ###################################################### Alokasi Murid
Route::get('/alokasi', [AlokasiMuridController::class, 'index'])->name('alokasi');
Route::get('/alokasi/detail/{id_user}', [AlokasiMuridController::class, 'detail'])->name('alokasi.detail');
Route::post('/alokasi/store', [AlokasiMuridController::class, 'store'])->name('alokasi.addmurid');
Route::delete('/alokasi/{id_alokasi}', [AlokasiMuridController::class, 'destroy']);

// ###################################################### Data User
Route::resource('/user', UserController::class);

// ###################################################### Menu Wali Murid
// ###################################################### Data Perkembangan Murid
Route::get('/perkembanganwali', [WaliPerkembanganContoller::class, 'index']);
Route::get('/pembayaranwali', [WaliPembayaranController::class, 'index']);
Route::post('/pembayaranwali/filter', [WaliPembayaranController::class, 'filter'])->name('wali.pembayaran.filter');

// Generate PDF
Route::POST('/reportPerkembangan', [PdfGeneratorContoller::class, 'generatePerkembangan'])->name('perkembangan.convert');
Route::POST('/reportPembayaran', [PdfGeneratorContoller::class, 'generatePembayaran'])->name('pembayaran.convert');
