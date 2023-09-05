<?php

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransaksiController;
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

Route::resource('/',\App\Http\Controllers\LoginController::class);
// Route::get('/', [LoginController::class, 'index']);

Route::post('/login', [LoginController::class, 'Login']);
Route::get('/logout', [LoginController::class, 'Logout']);
Route::get('/Register', [LoginController::class, 'Register']);
Route::get('/dashboard', [LoginController::class, 'dashboard']);

// Route::get('/dashboard', function () {
//     return view('welcome');
// });

Route::resource('/games',\App\Http\Controllers\GameController::class);
Route::resource('/ruangans',\App\Http\Controllers\RuanganController::class); 
Route::resource('/pakets',\App\Http\Controllers\PaketController::class); 
Route::resource('/menus',\App\Http\Controllers\MenuController::class); 
Route::resource('/menus',\App\Http\Controllers\MenuController::class); 

// Route::resource('/transaksis',\App\Http\Controllers\TransaksiController::class); 

Route::get('/transaksis', [TransaksiController::class, 'index']);
Route::get('/transaksis/{id}', [TransaksiController::class, 'show']);
Route::get('/transaksi/create', [TransaksiController::class, 'create']);
Route::post('/transaksis/cek_nomor', [TransaksiController::class, 'cek_nomor']);
Route::post('/transaksi/select_member', [TransaksiController::class, 'select_member']);
Route::post('/transaksis/select_nonmember', [TransaksiController::class, 'select_nonmember']);
Route::get('/transaksis/hapus_item/{id}/{id_item}', [TransaksiController::class, 'hapus_item']);
Route::get('/transaksis/tambah_item/{id}/{id_item}', [TransaksiController::class, 'tambah_item']);
Route::get('/transaksis/save_transaksi/{id}/{total}/{tgl}', [TransaksiController::class, 'save_transaksi']);

Route::get('/laporan/jurnal_umum', [LaporanController::class, 'jurnal_umum']);