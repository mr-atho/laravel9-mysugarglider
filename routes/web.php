<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SugargliderController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ShelterController;
use App\Http\Controllers\DashboardController;

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
Route::get('/home', [PageController::class, 'index'])->name('home');

Auth::routes(['verify' => true]);

//Route::get('register', [LoginController::class, 'register'])->name('userRegister')->middleware(['DisableBackBtn', 'guest']);
//Route::post('register', [LoginController::class, 'store'])->name('userStore')->middleware(['DisableBackBtn', 'guest']);
//Route::get('login', [LoginController::class, 'index'])->name('login')->middleware(['DisableBackBtn', 'guest']);
//Route::post('login', [LoginController::class, 'authenticate'])->name('authenticate')->middleware(['DisableBackBtn', 'guest']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/password-forget', [LoginController::class, 'password_forget'])->name('password.forget')->middleware(['DisableBackBtn', 'guest']);
Route::post('/password-link', [LoginController::class, 'password_link'])->name('password.link')->middleware('DisableBackBtn', 'guest');
Route::get('/password-reset/{token}', [LoginController::class, 'password_reset_form'])->name('password.reset')->middleware('guest');
Route::post('/password-reset', [LoginController::class, 'password_reset'])->name('password.reset.action')->middleware('guest');

Route::get('/sugargliders', [SugargliderController::class, 'index'])->name('sugargliders');
Route::get('/sugargliders/create', [SugargliderController::class, 'create'])->name('sugargliderCreate')->middleware('auth');
Route::get('/sugargliders/create', [SugargliderController::class, 'create'])->name('sugargliderCreate')->middleware('auth');
Route::post('/sugargliders/store', [SugargliderController::class, 'store'])->name('sugargliderStore')->middleware('auth');
Route::get('/sugargliders/{id}', [SugargliderController::class, 'show'])->name('sugargliderShow');
Route::get('/sugargliders/{id}/edit', [SugargliderController::class, 'edit'])->name('sugargliderEdit')->middleware('auth');
Route::put('/sugargliders/{id}', [SugargliderController::class, 'update'])->name('sugargliderUpdate')->middleware('auth');
Route::delete('/sugargliders/{id}', [SugargliderController::class, 'destroy'])->name('sugargliderDestroy')->middleware('auth');



//only authenticated can access this group
Route::group(['middleware' => ['auth']], function () {
    /**
     * Verification Routes
     */
    Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

    //only verified account can access with this group
    Route::group(['middleware' => ['verified']], function () {
        /**
         * Dashboard Routes
         */
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::post('/profile', [DashboardController::class, 'profile_update'])->name('dashboard.profile.update');
        Route::post('/password', [DashboardController::class, 'password_change'])->name('dashboard.password.change');


        /**
         * Shelter Routes
         */
        Route::get('/shelters/create', [ShelterController::class, 'create'])->name('shelterCreate');
        Route::post('/shelters', [ShelterController::class, 'store'])->name('shelterStore');
        Route::get('/shelters/{id}/edit', [ShelterController::class, 'edit'])->name('shelterEdit');
        Route::put('/shelters/{id}', [ShelterController::class, 'update'])->name('shelterUpdate');
        Route::delete('/shelters/{id}', [ShelterController::class, 'destroy'])->name('shelterDestroy');

        /**
         * Owner Routes
         */

        Route::get('/owners/create', [OwnerController::class, 'create'])->name('owner.create');
        Route::post('/owners', [OwnerController::class, 'store'])->name('owner.store');
        Route::get('/owners/{id}/edit', [OwnerController::class, 'edit'])->name('owner.edit');
        Route::put('/owners/{id}', [OwnerController::class, 'update'])->name('owner.update');
        Route::delete('/owners/{id}', [OwnerController::class, 'destroy'])->name('owner.destroy');
    });
});


Route::get('/shelters', [ShelterController::class, 'index'])->name('shelters');
Route::get('/shelters/{id}', [ShelterController::class, 'show'])->name('shelterShow');

Route::get('/owners', [OwnerController::class, 'index'])->name('owners');
Route::get('/owners/{id}', [OwnerController::class, 'show'])->name('owner.show');
