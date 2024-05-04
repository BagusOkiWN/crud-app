<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\JenisKelaminController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\StatusPegawaiController;
use App\Http\Controllers\JenisPegawaiController;
use App\Http\Controllers\AgamaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tablepegawai', [PegawaiController::class, 'indexapi']);
Route::get('/tablepegawai/{id}', [PegawaiController::class, 'showapi']);
Route::post('/prosesaddpegawai', [PegawaiController::class, 'storeapi']);
Route::put('/tablepegawai/{id}', [PegawaiController::class, 'updateapi']);
Route::delete('/tablepegawai/{id}', [PegawaiController::class, 'destroyapi']);

//Endpoint Jenis Kelamin Pegawai
Route::get('/tablejeniskelaminpegawai', [JenisKelaminController::class, 'indexapi']);
Route::get('/tablejeniskelaminpegawai/{id}', [JenisKelaminController::class, 'showapi']);
Route::post('/prosesaddjeniskelaminpegawai', [JenisKelaminController::class, 'storeapi']);
Route::put('/tablejeniskelaminpegawai/{id}', [JenisKelaminController::class, 'updateapi']);
Route::delete('/tablejeniskelaminpegawai/{id}', [JenisKelaminController::class, 'destroyapi']);

//Endpoint Pendidikan Pegawai
Route::get('/tablependidikanpegawai', [PendidikanController::class, 'indexapi']);
Route::get('/tablependidikanpegawai/{id}', [PendidikanController::class, 'showapi']);
Route::post('/prosesaddpendidikanpegawai', [PendidikanController::class, 'storeapi']);
Route::put('/tablependidikanpegawai/{id}', [PendidikanController::class, 'updateapi']);
Route::delete('/tablependidikanpegawai/{id}', [PendidikanController::class, 'destroyapi']);


//Endpoint Status Pegawai
Route::get('/tablestatuspegawai', [StatusPegawaiController::class, 'indexapi']);
Route::get('/tablestatuspegawai/{id}', [StatusPegawaiController::class, 'showapi']);
Route::post('/prosesaddstatuspegawai', [StatusPegawaiController::class, 'storeapi']);
Route::put('/tablestatuspegawai/{id}', [StatusPegawaiController::class, 'updateapi']);
Route::delete('/tablestatuspegawai/{id}', [StatusPegawaiController::class, 'destroyapi']);


//Endpoint Jenis Pegawai
Route::get('/tablejenispegawai', [JenisPegawaiController::class, 'indexapi']);
Route::get('/tablejenispegawai/{id}', [JenisPegawaiController::class, 'showapi']);
Route::post('/prosesaddjenispegawai', [JenisPegawaiController::class, 'storeapi']);
Route::put('/tablejenispegawai/{id}', [JenisPegawaiController::class, 'updateapi']);
Route::delete('/tablejenispegawai/{id}', [JenisPegawaiController::class, 'destroyapi']);

//Endpoint Agama
//          nama endpoint
Route::get('/tableagama', [AgamaController::class, 'indexapi']);
Route::get('/tableagama/{id}', [AgamaController::class, 'showapi']);
Route::post('/prosesaddagama', [AgamaController::class, 'storeapi']);
Route::put('/tableagama/{id}', [AgamaController::class, 'updateapi']);
Route::delete('/tableagama/{id}', [AgamaController::class, 'destroyapi']);

