<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\JenisKelaminController;
use App\Http\Controllers\JenisPegawaiController;
use App\Http\Controllers\StatusPegawaiController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgamaController;


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

Route::get('/', function () {
    return view('crud-app.home');
});

Route::get('/login', [AuthController::class, 'index'])->name('crud-app.login');
Route::get('/register', [AuthController::class, 'create']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/prosesadduser', [AuthController::class, 'store']);
Route::post('/proseslogin', [AuthController::class, 'authuser']);

Route::middleware(['auth'])->group(function () {
    // Routes for Jenis Kelamin Pegawai
    Route::get('/formjeniskelaminpegawai', [JenisKelaminController::class, 'create']);
    Route::get('/tablejeniskelaminpegawai', [JenisKelaminController::class, 'index']);
    Route::post('/prosesaddjeniskelaminpegawai', [JenisKelaminController::class, 'store']);
    Route::get('/{id}jeniskelaminpegawai', [JenisKelaminController::class, 'edit'])->name('crud-app.editjeniskelaminpegawai');
    Route::put('/tablejeniskelaminpegawai/{id}', [JenisKelaminController::class, 'update'])->name('crud-app.updatejeniskelaminpegawai');
    Route::delete('/tablejeniskelaminpegawai/{id}', [JenisKelaminController::class, 'destroy'])->name('crud-app.destroyjeniskelaminpegawai');

    // Routes for Pendidikan Pegawai
    Route::get('/formpendidikanpegawai', [PendidikanController::class, 'create']);
    Route::get('/tablependidikanpegawai', [PendidikanController::class, 'index']);
    Route::post('/prosesaddpendidikanpegawai', [PendidikanController::class, 'store']);
    Route::get('/{id}pendidikanpegawai', [PendidikanController::class, 'edit'])->name('crud-app.editpendidikanpegawai');
    Route::put('/tablependidikanpegawai/{id}', [PendidikanController::class, 'update'])->name('crud-app.updatependidikanpegawai');
    Route::delete('/tablependidikanpegawai/{id}', [PendidikanController::class, 'destroy'])->name('crud-app.destroypendidikanpegawai');

    // Routes for Status Pegawai
    Route::get('/formstatuspegawai', [StatusPegawaiController::class, 'create']);
    Route::get('/tablestatuspegawai', [StatusPegawaiController::class, 'index']);
    Route::post('/prosesaddstatuspegawai', [StatusPegawaiController::class, 'store']);
    Route::get('/{id}statuspegawai', [StatusPegawaiController::class, 'edit'])->name('crud-app.editstatuspegawai');
    Route::put('/tablestatuspegawai/{id}', [StatusPegawaiController::class, 'update'])->name('crud-app.updatestatuspegawai');
    Route::delete('/tablestatuspegawai/{id}', [StatusPegawaiController::class, 'destroy'])->name('crud-app.destroystatuspegawai');

    // Routes for Jenis Pegawai
    Route::get('/formjenispegawai', [JenisPegawaiController::class, 'create']);
    Route::get('/tablejenispegawai', [JenisPegawaiController::class, 'index']);
    Route::post('/prosesaddjenispegawai', [JenisPegawaiController::class, 'store']);
    Route::get('/{id}jenispegawai', [JenisPegawaiController::class, 'edit'])->name('crud-app.editjenispegawai');
    Route::put('/tablejenispegawai/{id}', [JenisPegawaiController::class, 'update'])->name('crud-app.updatejenispegawai');
    Route::delete('/tablejenispegawai/{id}', [JenisPegawaiController::class, 'destroy'])->name('crud-app.destroyjenispegawai');

    // Route for Pegawai
    Route::get('/formpegawai', [PegawaiController::class, 'create']);
    Route::post('/prosesaddpegawai', [PegawaiController::class, 'store']);
    Route::get('/tablepegawai', [PegawaiController::class, 'index']);
    Route::get('/{id}pegawai', [PegawaiController::class, 'edit'])->name('crud-app.editpegawai');
    Route::delete('/tablepegawai/{id}', [PegawaiController::class, 'destroy'])->name('crud-app.destroypegawai');
    Route::put('/tablepegawai/{id}', [PegawaiController::class, 'update'])->name('crud-app.updatepegawai');

    // Routes for Agama
    Route::get('/formagama', [AgamaController::class, 'create']);
    Route::get('/tableagama', [AgamaController::class, 'index']);
    Route::post('/prosesaddagama', [AgamaController::class, 'store']);
    Route::get('/{id}agama', [AgamaController::class, 'edit'])->name('crud-app.edit');
    Route::put('/tableagama/{id}', [AgamaController::class, 'update'])->name('crud-app.update');
    Route::delete('/tableagama/{id}', [AgamaController::class, 'destroy'])->name('crud-app.destroy');
});
