<?php

use App\Http\Controllers\ArsipController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeluarController;
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

Route::get('/', [DashboardController::class, 'index']);

Route::get('/masuk-list',[ArsipController::class,'index'])->name('masuk-list');
Route::get('/add-masuk', [ArsipController::class, 'create'])->name('masuk-create');
Route::post('/store-masuk', [ArsipController::class, 'store']);
Route::get('/edit-masuk/{id}', [ArsipController::class, 'edit'])->name('masuk-edit');
Route::put('/masuk-froome/{id}', [ArsipController::class, 'update'])->name('masuk-update');
Route::delete('/delete-masuk/{id}', [ArsipController::class, 'destroy'])->name('masuk-destroy');

Route::get('/keluar-list',[KeluarController::class,'index'])->name('keluar-list');
Route::get('/add-keluar', [KeluarController::class, 'create'])->name('keluar-create');
Route::post('/store-keluar', [KeluarController::class, 'store']);
Route::get('/edit-keluar/{id}', [KeluarController::class, 'edit'])->name('keluar-edit');
Route::put('/keluar-froome/{id}', [KeluarController::class, 'update'])->name('keluar-update');
Route::delete('/delete-keluar/{id}', [KeluarController::class, 'destroy'])->name('keluar-destroy');
