<?php

use App\Http\Controllers\AlatAngkutController;
use App\Http\Controllers\BiayaPerdinController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\DataAnggaranController;
use App\Http\Controllers\DataPerdinController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KetentuanController;
use App\Http\Controllers\KotaKabupatenController;
use App\Http\Controllers\LaporanPerdinController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PangkatController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PerdinPdfController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\SeksiController;
use App\Http\Controllers\StatusPerdinController;
use App\Http\Controllers\TandaTanganController;
use App\Http\Controllers\UangHarianController;
use App\Http\Controllers\UangKeluarController;
use App\Http\Controllers\UangMasukController;
use App\Http\Controllers\UangPenginapanController;
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

Route::middleware('can:isAdmin')->group(function(){
	Route::resource('/dashboard/alat-angkut', AlatAngkutController::class)->middleware('auth');
	Route::resource('/dashboard/biaya-perdin', BiayaPerdinController::class)->middleware('auth');
	Route::resource('/dashboard/bidang', BidangController::class)->middleware('auth');
	Route::resource('/dashboard/golongan', GolonganController::class)->middleware('auth');
	Route::resource('/dashboard/jabatan', JabatanController::class)->middleware('auth');
	Route::resource('/dashboard/area', AreaController::class)->middleware('auth');
	Route::resource('/dashboard/kegiatan', KegiatanController::class)->middleware('auth');
	Route::resource('/dashboard/ketentuan', KetentuanController::class)->except('create', 'store')->middleware('auth');
	Route::resource('/dashboard/kota-kabupaten', KotaKabupatenController::class)->middleware('auth');
	Route::resource('/dashboard/pangkat', PangkatController::class)->middleware('auth');
	Route::resource('/dashboard/pegawai', PegawaiController::class)->middleware('auth');
	Route::resource('/dashboard/provinsi', ProvinsiController::class)->middleware('auth');
	Route::resource('/dashboard/seksi', SeksiController::class)->middleware('auth');
	Route::resource('/dashboard/tanda-tangan', TandaTanganController::class)->middleware('auth');
	Route::resource('/dashboard/uang-harian', UangHarianController::class)->middleware('auth');
	Route::resource('/dashboard/uang-transport', UangTransportController::class)->middleware('auth');
	Route::resource('/dashboard/uang-penginapan', UangPenginapanController::class)->middleware('auth');
	Route::resource('/dashboard/user', UserController::class)->middleware('auth');
});

Route::middleware('can:isApproval')->group(function(){
	Route::controller(StatusPerdinController::class)->group(function(){
		Route::put('/dashboard/status-perdin/approve/{id}', 'approve')->name('status-perdin.approve')->middleware('auth');
		Route::put('/dashboard/status-perdin/tolak/{id}', 'tolak')->name('status-perdin.tolak')->middleware('auth');
	});
});


Route::middleware('can:isOperator')->group(function(){
	Route::controller(DataPerdinController::class)->group(function(){
		Route::get('/dashboard/data-perdin/status/{status}', 'index')->name('data-perdin.index')->middleware('auth');
		Route::get('/get-kota-kabupaten/{areaId}', 'getKotaKabupaten')->name('data-perdin.area')->middleware('auth');
		Route::get('/get-pegawai-info/{kotaKabupatenId}/{alatAngkutId}/{pegawaiId}', 'getPegawaiInfo')->name('data-perdin.uangHarian')->middleware('auth');
	});	
	
	
	Route::controller(PerdinPdfController::class)->group(function(){
		Route::get('/dashboard/status-perdin/spt/pdf/{slug}', 'spt')->name('spt-pdf')->middleware('auth');
		Route::get('/dashboard/status-perdin/visum1/pdf/{slug}', 'visum1')->name('visum1-pdf')->middleware('auth');
		Route::get('/dashboard/status-perdin/visum2/pdf/{slug}', 'visum2')->name('visum2-pdf')->middleware('auth');
		Route::get('/dashboard/status-perdin/lap/pdf/{id}', 'lap')->name('lap-pdf')->middleware('auth');
	});

	Route::resource('/dashboard/data-anggaran', DataAnggaranController::class)->except('create', 'edit', 'update', 'destroy')->middleware('auth');
	Route::resource('/dashboard/uang-masuk', UangMasukController::class)->except('index')->middleware('auth');
	Route::resource('/dashboard/uang-keluar', UangKeluarController::class)->except('index')->middleware('auth');
	Route::resource('/dashboard/laporan-perdin', LaporanPerdinController::class)->except('create', 'store', 'show', 'destroy')->middleware('auth');
});

Route::middleware('can:isOperator')->group(function(){
	Route::resource('/dashboard/data-perdin', DataPerdinController::class)->except('index')->middleware('auth');
});

Route::redirect('/dashboard', '/');