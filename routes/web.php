<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\DuniaController;
use App\Http\Controllers\TrackingController;
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
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test',function(){
    return view('layouts.master');
});
Route::get('/test1',function(){
    return view('layouts.admin');
});
Route::get('/front', [App\Http\Controllers\FrontendController::class, 'index'])->name('index');
Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('welcome');
Route::get('/dashboard',function(){
    return view('admin.dashboard');
});
    Route::resource('provinsi', ProvinsiController::class);
    Route::resource('kota', KotaController::class);
    Route::resource('kecamatan', KecamatanController::class);
    Route::resource('kelurahan', KelurahanController::class);
    Route::resource('rw', RwController::class);
    Route::resource('tracking', TrackingController::class);













Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
