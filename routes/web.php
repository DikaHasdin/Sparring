<?php

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

Route::get('/dashboard', function () {
    return view('welcome');
});
Route::resource('/games',\App\Http\Controllers\GameController::class);
Route::resource('/ruangans',\App\Http\Controllers\RuanganController::class);