<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\LulusanController;
use App\Http\Controllers\ProgramController;


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

Route::controller(HomeController::class)->prefix('/')->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/daftar', [DaftarController::class, 'index']);
Route::post('/daftar-siswa', [DaftarController::class, 'store']);

Route::post('/login-proses', [LoginController::class, 'authenticate'])->middleware('guest');

Route::middleware(['auth'])->group(function () {

    Route::get('/logout', [LoginController::class, 'logout']);

    Route::get('/data', [DataController::class, 'index'])->name('data.index');
    Route::get('/data/edit/{id}', [DataController::class, 'edit']);
    Route::put('/data/update/{id}', [DataController::class, 'update']);
    Route::get('/data/delete/{id}', [DataController::class, 'destroy']);

    Route::get('/program', [ProgramController::class, 'index']);
    Route::get('/program/tambah', [ProgramController::class, 'create']);
    Route::get('/program/edit/{id}', [ProgramController::class, 'edit']);
    Route::post('/program/store', [ProgramController::class, 'store']);
    Route::put('/program/update/{id}', [ProgramController::class, 'update']);
    Route::get('/program/delete/{id}', [ProgramController::class, 'destroy']);

    Route::get('/lulusan', [LulusanController::class, 'index']);
    Route::get('/lulusan/tambah', [LulusanController::class, 'create']);
    Route::get('/lulusan/edit/{id}', [LulusanController::class, 'edit']);
    Route::post('/lulusan/store', [LulusanController::class, 'store']);
    Route::put('/lulusan/update/{id}', [LulusanController::class, 'update']);
    Route::get('/lulusan/delete/{id}', [LulusanController::class, 'destroy']);
});
