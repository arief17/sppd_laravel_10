<?php

use App\Http\Controllers\AlatAngkutController;
use App\Http\Controllers\BiayaPerdinController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JenisPerdinController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KetentuanController;
use App\Http\Controllers\KotaKabupatenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\SeksiController;
use App\Http\Controllers\TandaTanganController;
use App\Http\Controllers\UangHarianController;
use App\Http\Controllers\UangTransportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(PageController::class)->group(function(){
	Route::get('/', 'index')->name('dashboard')->middleware('auth');
});

Route::controller(LoginController::class)->group(function(){
	Route::get('/login', 'index')->name('login')->middleware('guest');
	Route::post('/login', 'authenticate');
	Route::get('/logout', 'logout')->name('logout')->middleware('auth');
});

Route::resource('/dashboard/login', LoginController::class)->middleware('auth');

Route::resource('/dashboard/alat-angkut', AlatAngkutController::class)->middleware('auth');
Route::resource('/dashboard/biaya-perdin', BiayaPerdinController::class)->middleware('auth');
Route::resource('/dashboard/bidang', BidangController::class)->middleware('auth');
Route::resource('/dashboard/golongan', GolonganController::class)->middleware('auth');
Route::resource('/dashboard/jabatan', JabatanController::class)->middleware('auth');
Route::resource('/dashboard/jenis-perdin', JenisPerdinController::class)->middleware('auth');
Route::resource('/dashboard/kegiatan', KegiatanController::class)->middleware('auth');
Route::resource('/dashboard/ketentuan', KetentuanController::class)->middleware('auth');
Route::resource('/dashboard/kota-kabupaten', KotaKabupatenController::class)->middleware('auth');
Route::resource('/dashboard/pegawai', PegawaiController::class)->middleware('auth');
Route::resource('/dashboard/provinsi', ProvinsiController::class)->middleware('auth');
Route::resource('/dashboard/seksi', SeksiController::class)->middleware('auth');
Route::resource('/dashboard/tanda-tangan', TandaTanganController::class)->middleware('auth');
Route::resource('/dashboard/uang-harian', UangHarianController::class)->middleware('auth');
Route::resource('/dashboard/uang-transport', UangTransportController::class)->middleware('auth');
Route::resource('/dashboard/user', UserController::class)->middleware('auth');

Route::redirect('/dashboard', '/');