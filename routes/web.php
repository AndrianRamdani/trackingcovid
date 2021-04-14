<?php

use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\DuniaController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(
    ['register'=> false]
);

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::resource('provinsi', ProvinsiController::class);
    Route::resource('kota', KotaController::class);
    Route::resource('kecamatan', KecamatanController::class);
    Route::resource('kelurahan', KelurahanController::class);
    Route::resource('rw', RwController::class);
    Route::resource('tracking', TrackingController::class);
    Route::resource('users', UserController::class)->middleware('admin');

    Route::get('report-provinsi', [ReportController::class, 'index']);
    Route::post('report-provinsi', [ReportController::class, 'ReportProvinsi']);
    Route::get('pdfreport', [ReportController::class, 'cetak_pdf'])->name('pdfreport');
});
    
Route::get('/', [FrontendController::class, 'index']);
