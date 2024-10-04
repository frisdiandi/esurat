<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\BidangController;
use App\Http\Controllers\Admin\RuanganController;
use App\Http\Controllers\Admin\RabContoller;
use App\Http\Controllers\Admin\PermintaanController;
use App\Http\Controllers\Admin\AnggaranContoller;

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
Route::prefix('admin/rab')->middleware('cekLevel:1 2')->controller(RabContoller::class)->group(function () {
    Route::get('/', 'read');
    Route::get('/add', 'add');
    Route::post('/create', 'create');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'delete');
}); 


//Data permintaan
Route::prefix('admin/permintaan')->middleware('cekLevel: 2')->controller(PermintaanController::class)->group(function () {
    Route::get('/', 'read');
    Route::get('/add', 'add');
    Route::post('/create', 'create');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'delete');
});

//Data anggaran
Route::prefix('admin/anggaran')->middleware('cekLevel: 2')->controller(AnggaranContoller::class)->group(function () {
    Route::get('/', 'read');
    Route::get('/add', 'add');
    Route::post('/create', 'create');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'delete');
});