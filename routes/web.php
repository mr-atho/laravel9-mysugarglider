<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SugargliderController;

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

Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('home', [PageController::class, 'index'])->name('home');

Route::get('/sugargliders', [SugargliderController::class, 'index'])->name('sugargliders');
Route::get('/sugargliders/create', [SugargliderController::class, 'create'])->name('sugargliderCreate');
Route::post('/sugargliders/store', [SugargliderController::class, 'store'])->name('sugargliderStore');

Route::get('/sugargliders/{id}/edit', [SugargliderController::class, 'edit'])->name('sugargliderEdit');
Route::put('/sugargliders/{id}', [SugargliderController::class, 'update'])->name('sugargliderUpdate');
Route::delete('/sugargliders/{id}', [SugargliderController::class, 'destroy'])->name('sugargliderDestroy');
Route::get('/sugargliders/{id}', [SugargliderController::class, 'show'])->name('sugargliderShow');
