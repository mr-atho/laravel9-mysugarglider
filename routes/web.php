<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\Auth\LoginController;
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

Auth::routes(['verify' => true]);

//Route::get('register', [LoginController::class, 'register'])->name('userRegister')->middleware(['DisableBackBtn', 'guest']);
//Route::post('register', [LoginController::class, 'store'])->name('userStore')->middleware(['DisableBackBtn', 'guest']);
//Route::get('login', [LoginController::class, 'index'])->name('login')->middleware(['DisableBackBtn', 'guest']);
//Route::post('login', [LoginController::class, 'authenticate'])->name('authenticate')->middleware(['DisableBackBtn', 'guest']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
//Route::post('password', [LoginController::class, 'password_change'])->name('passwordChange')->middleware('auth');
Route::get('password-forget', [LoginController::class, 'password_forget'])->name('passwordForget')->middleware(['DisableBackBtn', 'guest']);
Route::post('password-link', [LoginController::class, 'password_link'])->name('passwordLink')->middleware('DisableBackBtn', 'guest');
Route::post('password-reset', [LoginController::class, 'password_reset'])->name('passwordReset')->middleware('guest');
//Route::get('password-reset/{token}', [LoginController::class, 'password_reset_form'])->name('password.reset')->middleware('guest');
Route::get('profile', [LoginController::class, 'profile'])->name('profile')->middleware('auth', 'verified');
//Route::post('profile', [LoginController::class, 'prodile_update'])->name('profileUpdate')->middleware('auth', 'verified');

Route::get('/sugargliders', [SugargliderController::class, 'index'])->name('sugargliders');
Route::get('/sugargliders/create', [SugargliderController::class, 'create'])->name('sugargliderCreate')->middleware('auth');
Route::get('/sugargliders/create', [SugargliderController::class, 'create'])->name('sugargliderCreate')->middleware('auth');
Route::post('/sugargliders/store', [SugargliderController::class, 'store'])->name('sugargliderStore')->middleware('auth');
Route::get('/sugargliders/{id}', [SugargliderController::class, 'show'])->name('sugargliderShow');
Route::get('/sugargliders/{id}/edit', [SugargliderController::class, 'edit'])->name('sugargliderEdit')->middleware('auth');
Route::put('/sugargliders/{id}', [SugargliderController::class, 'update'])->name('sugargliderUpdate')->middleware('auth');
Route::delete('/sugargliders/{id}', [SugargliderController::class, 'destroy'])->name('sugargliderDestroy')->middleware('auth');

Route::get('/owners', [OwnerController::class, 'index'])->name('owners');
Route::get('/owners/create', [OwnerController::class, 'create'])->name('ownerCreate')->middleware('auth');
Route::post('/owners', [OwnerController::class, 'store'])->name('ownerStore')->middleware('auth');
Route::get('/owners/{id}', [OwnerController::class, 'show'])->name('ownerShow');
Route::get('/owners/{id}/edit', [OwnerController::class, 'edit'])->name('ownerEdit')->middleware('auth');
Route::put('/owners/{id}', [OwnerController::class, 'update'])->name('ownerUpdate')->middleware('auth');
Route::delete('/owners/{id}', [OwnerController::class, 'destroy'])->name('ownerDestroy')->middleware('auth');

Route::get('/shelters', [ShelterController::class, 'index'])->name('shelters');
Route::get('/shelters/create', [ShelterController::class, 'create'])->name('shelterCreate')->middleware('auth');
Route::post('/shelters', [ShelterController::class, 'store'])->name('shelterStore')->middleware('auth');
Route::get('/shelters/{id}', [ShelterController::class, 'show'])->name('shelterShow');
Route::get('/shelters/{id}/edit', [ShelterController::class, 'edit'])->name('shelterEdit')->middleware('auth');
Route::put('/shelters/{id}', [ShelterController::class, 'update'])->name('shelterUpdate')->middleware('auth');
Route::delete('/shelters/{id}', [ShelterController::class, 'destroy'])->name('shelterDestroy')->middleware('auth');
