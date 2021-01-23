<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\DuniaController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test',function(){
    return view('layouts.master');
});
Route::get('/dashboard',function(){
    return view('admin.dashboard');
});
Route::resource('negara', DuniaController::class);

Route::resource('provinsi', ProvinsiController::class);

Route::resource('kota', KotaController::class);

Route::resource('kecamatan', KecamatanController::class);

Route::resource('kelurahan', KelurahanController::class);

Route::resource('rw', RwController::class);

Route::get('/laporan',function(){
    return view('admin.laporan.index');
});