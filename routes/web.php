<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SugargliderController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ShelterController;

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
Route::get('/sugargliders/{id}', [SugargliderController::class, 'show'])->name('sugargliderShow');
Route::get('/sugargliders/{id}/edit', [SugargliderController::class, 'edit'])->name('sugargliderEdit');
Route::put('/sugargliders/{id}', [SugargliderController::class, 'update'])->name('sugargliderUpdate');
Route::delete('/sugargliders/{id}', [SugargliderController::class, 'destroy'])->name('sugargliderDestroy');

Route::get('/owners', [OwnerController::class, 'index'])->name('owners');
Route::get('/owners/create', [OwnerController::class, 'create'])->name('ownerCreate');
Route::post('/owners', [OwnerController::class, 'store'])->name('ownerStore');
Route::get('/owners/{id}', [OwnerController::class, 'show'])->name('ownerShow');
Route::get('/owners/{id}/edit', [OwnerController::class, 'edit'])->name('ownerEdit');
Route::put('/owners/{id}', [OwnerController::class, 'update'])->name('ownerUpdate');
Route::delete('/owners/{id}', [OwnerController::class, 'destroy'])->name('ownerDestroy');

Route::get('/shelters', [ShelterController::class, 'index'])->name('shelters');
Route::get('/shelters/create', [ShelterController::class, 'create'])->name('shelterCreate');
Route::post('/shelters', [ShelterController::class, 'store'])->name('shelterStore');
Route::get('/shelters/{id}', [ShelterController::class, 'show'])->name('shelterShow');
Route::get('/shelters/{id}/edit', [ShelterController::class, 'edit'])->name('shelterEdit');
Route::put('/shelters/{id}', [ShelterController::class, 'update'])->name('shelterUpdate');
Route::delete('/shelters/{id}', [ShelterController::class, 'destroy'])->name('shelterDestroy');
