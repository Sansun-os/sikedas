<?php

use App\Http\Controllers\KelolaadminController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\RiwayatpemakaianController;
use App\Http\Controllers\Riwayatpengembaliancontroller;
use App\Models\Login;
use App\Models\Riwayatpemakaian;
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

// Route::get('/', function () {
//     return view('welcome');
// })->name('dashboard')->middleware('auth');
Route::get('/',[HomeController::class,'index'])->name('dashboard')->middleware('auth');
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/loginproses',[LoginController::class,'loginproses'])->name('loginproses');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

//Pegawai

Route::get('/pegawai',[PegawaiController::class,'index'])->name('pegawai')->middleware('auth','ceklevel:admin');
Route::get('/pegawaitambah',[PegawaiController::class,'insert'])->name('pegawaitambah');
Route::post('/pegawaiinsert',[PegawaiController::class,'store'])->name('pegawaiinsert');
Route::get('/pegawaiedit/{id}',[PegawaiController::class,'edit'])->name('pegawaiedit');
Route::post('/pegawaiupdate/{id}',[PegawaiController::class,'update'])->name('pegawaiupdate');
Route::get('/pegawaidelete/{id}',[PegawaiController::class,'delete'])->name('pegawaidelete');

//Kendaraan
Route::get('/kendaraan',[KendaraanController::class,'index'])->name('kendaraan')->middleware('auth');
Route::get('/kendaraan/tambah',[KendaraanController::class,'tambah'])->name('kendaraantambah')->middleware('auth');
Route::post('/kendaraan/insert',[KendaraanController::class,'insert'])->name('kendaraaninsert')->middleware('auth');
Route::get('/kendaraan/edit/{id}',[KendaraanController::class,'edit'])->name('kendaraanedit')->middleware('auth');
Route::post('/kendaraan/update/{id}',[KendaraanController::class,'update'])->name('kendaraanupdate');
Route::get('/delete/{id}',[KendaraanController::class,'delete']);

//bbm
// Route::get('/bbm',[BbmController::class,'index'])->name('bbm')->middleware('auth');

// //service
// Route::get('/service',[ServiceController::class,'index'])->name('service')->middleware('auth');

//Peminjaman Kendaraan
Route::middleware(['auth'])->group(function () {
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman');
    Route::get('/peminjaman/tambah', [PeminjamanController::class, 'insert'])->name('tambahpeminjaman.insert');
    Route::get('/peminjaman/get-kendaraan', [PeminjamanController::class, 'getSelectKendaraan']);
    Route::get('/peminjaman/getedit-kendaraan', [PeminjamanController::class, 'getSelectEditKendaraan']);
    Route::get('/peminjaman/merk-kendaraan', [PeminjamanController::class, 'getMerk']);
    Route::get('/peminjaman/tipe-kendaraan', [PeminjamanController::class, 'getTipe']);
    Route::get('/peminjaman/find-kendaraan', [PeminjamanController::class, 'findKendaraan']);
    Route::get('/peminjaman/get-peminjaman', [PeminjamanController::class, 'getPeminjaman']);
    Route::post('/peminjaman/insert-pengembalian', [PeminjamanController::class, 'insertPengembalian']);
// Route::get('/peminjaman',[PeminjamanController::class,'index'])->name('peminjaman')->middleware('auth');
Route::get('/peminjaman/tambah',[PeminjamanController::class,'tambah'])->name('peminjamantambah')->middleware('auth');
Route::post('/peminjaman/insert',[PeminjamanController::class,'insert'])->name('peminjamaninsert')->middleware('auth');
Route::get('/peminjaman/edit-{id}',[PeminjamanController::class,'edit'])->name('peminjamanedit')->middleware('auth');
Route::post('/peminjaman/update{id}',[PeminjamanController::class,'update'])->name('peminjamanupdate')->middleware('auth');
Route::get('/peminjamandelete/{id}',[PeminjamanController::class,'delete'])->name('peminjaman.delete')->middleware('auth');
});


//kelola admin

    Route::get('/kelolaadmin', [KelolaadminController::class, 'index'])->name('kelolaadmin')->middleware('auth');
    Route::get('/tambahadmin', [KelolaadminController::class, 'tambah'])->name('tambahadmin')->middleware('auth');
    Route::post('/insertadmin', [KelolaadminController::class, 'insert'])->name('insertadmin')->middleware('auth');
    Route::get('/editadmin/{id}', [KelolaadminController::class, 'edit'])->name('editadmin')->middleware('auth');
    Route::get('/updateadmin/{id}', [KelolaadminController::class, 'update'])->name('updateadmin')->middleware('auth');

// Route::get('/kelolaadmin',[KelolaadminController::class,'index'])->name('kelolaadmin')->middleware('auth');

//riwayat peminjaman
Route::get('/riwayatpemakaian', [RiwayatpemakaianController::class, 'index'])->name('riwayatpemakaian')->middleware('auth');

//riwayat pengembalian
Route::get('/riwayatpengembalian', [Riwayatpengembaliancontroller::class, 'index'])->name('riwayatpengembalian')->middleware('auth');

//ajax javascript
// Route::get('/get-options', 'Peminjaman@getOptions');
Route::get('/peminjaman/insert',[PeminjamanController::class,'getOptions'])->name('getOptions')->middleware('auth');