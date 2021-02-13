<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProvinsiController;
use App\Http\Controllers\Api\ApiController;
use App\Models\Tracking;
use App\Models\Provinsi;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// API Provinsi
Route::get('provinsi', [ProvinsiController::class, 'index']);
Route::post('provinsi/store', [ProvinsiController::class, 'store']);
Route::get('provinsi/{id}', [ProvinsiController::class, 'show']);
Route::post('provinsi/update/{id}', [ProvinsiController::class, 'update']);
Route::delete('/provinsi/{id}', [ProvinsiController::class, 'destroy']);

// API Controller 
Route::get('hari', [ApiController::class, 'hari']);
Route::get('prov/{id}', [ApiController::class, 'provinssi']);
Route::get('prov', [ApiController::class, 'provinsii']);
Route::get('indonesia', [ApiController::class, 'indonesia']);
Route::get('global', [ApiController::class, 'global']);
Route::get('kota', [ApiController::class, 'kota']);
Route::get('kota/{id}', [ApiController::class , 'kota1']);
Route::get('camat', [ApiController::class , 'kecamatan']);
Route::get('camat/{id}', [ApiController::class , 'kecamatan1']);
Route::get('lurah', [ApiController::class , 'kelurahan']);
Route::get('lurah/{id}', [ApiController::class , 'kelurahan1']);
Route::get('rw', [ApiController::class , 'rw']);
Route::get('rw/{id}', [ApiController::class , 'rw1']);
