<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HrdController;
use App\Http\Controllers\KarywanController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'role:hrd'])->group(function () {
    Route::get('/hrd', [HrdController::class, 'index'])->name('hrd');
    Route::get('/hrd-detail/{id}', [HrdController::class, 'detail']);
    Route::put('/detail/{id}', [HrdController::class, 'update']);
});

Route::middleware(['auth', 'verified', 'role:karyawan'])->group(function () {
    Route::get('/karyawan', [KarywanController::class, 'create'])->name('karyawan');
    Route::post('/karyawan-create', [KarywanController::class, 'store']);
    Route::get('/karyawan-detail', [KarywanController::class, 'index']);
    Route::get('/karyawan-edit/{id}', [KarywanController::class, 'edit']);
    Route::put('/karyawan/{id}', [KarywanController::class, 'update']);
});

require __DIR__ . '/auth.php';
