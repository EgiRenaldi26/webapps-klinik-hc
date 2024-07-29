<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RawatController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UsersController;
use App\Models\transaksiM;
use Illuminate\Support\Facades\Log;
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



Route::get('/', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');


// login
Route::get('login', [AuthController::class,'login'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class,'login_action'])->name('login.action')->middleware('guest');
Route::get('logout', [AuthController::class,'logout'])->name('logout')->middleware('auth');



Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index')->middleware('auth');
Route::get('/transaksi-create', [TransaksiController::class, 'create'])->name('transaksi.create')->middleware('auth');
Route::post('/transaksi-store', [TransaksiController::class, 'store'])->name('transaksi.store')->middleware('auth');
Route::put('/transaksi-update/{id}', [TransaksiController::class, 'update'])->name('transaksi.update')->middleware('auth');
Route::get('transaksi-edit/{id}',[TransaksiController::class,'edit'])->name('transaksi.edit')->middleware('auth');
Route::delete('transaksi-destroy/{id}',[TransaksiController::class,'destroy'])->name('transaksi.destroy')->middleware('auth');
Route::get('transaksi/all/pdf', [TransaksiController::class,'pdf'])->name('transaksi.pdf')->middleware('auth');
Route::get('transaksi/pdf/{id}', [TransaksiController::class,'pdfId'])->name('transaksi.pdfId')->middleware('auth');



Route::get('/laporan', [TransaksiController::class, 'laporan'])->middleware('auth');


Route::resource('users', UsersController::class)->middleware('auth');
Route::put('user/change/{id}',[UsersController::class,'change'])->name('users.change')->middleware('auth');
Route::get('user/changepassword/{id}',[UsersController::class,'changepassword'])->name('users.changepassword')->middleware('auth');



Route::get('imunisasi',[RekapController::class,'imun'])->name('rekap.imun')->middleware('auth');
Route::get('kb',[RekapController::class,'kb'])->name('rekap.kb')->middleware('auth');


Route::get('/pasien-detail/{id}', [PasienController::class, 'detail'])->name('pasien.detail')->middleware('auth');
Route::resource('pasien', PasienController::class);

Route::resource('layanan', LayananController::class)->middleware('auth');
Route::resource('obat', ObatController::class)->middleware('auth');
Route::resource('rawat', RawatController::class)->middleware('auth');
Route::resource('log', LogController::class)->middleware('auth');
