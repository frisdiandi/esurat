<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\BidangController;
use App\Http\Controllers\Admin\RuanganController;
use App\Http\Controllers\Admin\RabController;
use App\Http\Controllers\Admin\PermintaanController;

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

Route::get('/', function () {
    return view('auth.login');
});

// Authentication
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/keluar', [HomeController::class, 'keluar']);
Route::get('/admin/home', [HomeController::class, 'index']);
Route::get('/admin/change', [HomeController::class, 'change']);
Route::post('/admin/change_password', [HomeController::class, 'change_password']);

// Data Jabatan
Route::prefix('admin/jabatan')->middleware('cekLevel:1 2')->controller(JabatanController::class)->group(function () {
    Route::get('/', 'read');
    Route::get('/add', 'add');
    Route::post('/create', 'create');
    Route::get('/edit/{id}', 'edit');
    Route::get('/detail/{id}', 'detail');
    Route::post('/update/{id}', 'update');
    Route::get('/delete/{id}', 'delete');
    Route::post('/import', 'import');
    Route::get('/export', 'export');
    Route::get('/cetak', 'cetak');
});

// Data Pegawai
Route::prefix('admin/pegawai')->middleware('cekLevel:1 2')->controller(PegawaiController::class)->group(function () {
    Route::get('/', 'read');
    Route::get('/add', 'add');
    Route::post('/create', 'create');
    Route::get('/edit/{id}', 'edit');
    Route::post('/update/{id}', 'update');
    Route::get('/delete/{id}', 'delete');
    Route::post('/import', 'import');
});

// Data Bidang
Route::prefix('admin/bidang')->middleware('cekLevel:1 2')->controller(BidangController::class)->group(function () {
    Route::get('/','read');
    Route::get('/add', 'add');
    Route::post('/create', 'create');
    Route::get('/edit/{id}', 'edit');
    Route::post('/update/{id}', 'update');
    Route::get('/delete/{id}', 'delete');
    Route::post('/import', 'import');
});

//Data Ruangan
Route::prefix('admin/ruangan')->middleware('cekLevel:1 2')->controller(RuanganController::class)->group(function () {
    Route::get('/','read');
    Route::get('/add', 'add');
    Route::post('/create', 'create');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
    Route::get('/delete/{id}', 'delete');
    
});

// Data RAB
Route::prefix('admin/rab')->middleware('cekLevel:1 2')->controller(RabController::class)->group(function () {
    Route::get('/','read');
    Route::get('/add', 'add');
    Route::post('/create', 'create');
    Route::get('/edit/{id}', 'edit');
    Route::post('/update/{id}', 'update');
    Route::get('/delete/{id}', 'delete');
    Route::post('/import', 'import');

}); 


//Data permintaan
Route::prefix('admin/permintaan')->middleware('cekLevel:1,2')->controller(PermintaanController::class)->group(function () {
    Route::get('/', 'read')->name('permintaan.index');
    Route::get('/add', 'create')->name('permintaan.create'); // Menampilkan form tambah
    Route::post('/create', 'store')->name('permintaan.store'); // Menyimpan data permintaan
    Route::get('/edit/{id}', 'edit')->name('permintaan.edit');
    Route::post('/update/{id}', 'update')->name('permintaan.update');
    Route::get('/delete/{id}', 'delete')->name('permintaan.delete');
});
