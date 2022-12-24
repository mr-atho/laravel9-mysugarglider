<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SugargliderController;
use App\Http\Controllers\ShelterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;

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

Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/password-forget', [LoginController::class, 'password_forget'])->name('password.forget')->middleware(['DisableBackBtn', 'guest']);
Route::post('/password-link', [LoginController::class, 'password_link'])->name('password.link')->middleware('DisableBackBtn', 'guest');
Route::get('/password-reset/{token}', [LoginController::class, 'password_reset_form'])->name('password.reset')->middleware('guest');
Route::post('/password-reset', [LoginController::class, 'password_reset'])->name('password.reset.action')->middleware('guest');

//only authenticated can access this group
Route::group(['middleware' => ['auth']], function () {

    /**
     * Logout Routes
     */
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

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

        /**
         * Profile Routes
         */
        Route::get('/dashboard/profile', [ProfileController::class, 'show'])->name('profile');
        Route::post('/dashboard/profile', [ProfileController::class, 'update_profile'])->name('profile.update');
        Route::post('/dashboard/profile/user', [ProfileController::class, 'update_user'])->name('profile.update.user');
        Route::post('/dashboard/password', [ProfileController::class, 'password_change'])->name('profile.password.change');
        Route::post('/dashboard/profile/avatar', [ProfileController::class, 'update_avatar'])->name('profile.update.avatar');

        /**
         * Shelter Routes
         */
        Route::get('/dashboard/shelters', [ShelterController::class, 'backend_shelters_index'])->name('shelter.index');
        Route::get('/dashboard/shelters/create', [ShelterController::class, 'create'])->name('shelter.create');
        Route::post('/dashboard/shelters', [ShelterController::class, 'store'])->name('shelter.store');
        Route::get('/dashboard/shelters/{id}/edit', [ShelterController::class, 'edit'])->name('shelter.edit');
        Route::put('/dashboard/shelters/{id}', [ShelterController::class, 'update'])->name('shelter.update');
        Route::delete('/dashboard/shelters/{id}', [ShelterController::class, 'destroy'])->name('shelter.destroy');

        /**
         * Collection Sugar Glider Routes
         */
        Route::get('/dashboard/sugargliders', [SugargliderController::class, 'backend_sugarglider_index'])->name('sugarglider.index');
        Route::get('/dashboard/sugargliders/create', [SugargliderController::class, 'create'])->name('sugarglider.create');
        Route::post('/dashboard/sugargliders', [SugargliderController::class, 'store'])->name('sugarglider.store');
        Route::get('/dashboard/sugargliders/{id}/edit', [SugargliderController::class, 'edit'])->name('sugarglider.edit');
        Route::put('/dashboard/sugargliders/{id}', [SugargliderController::class, 'update'])->name('sugarglider.update');
        Route::delete('/dashboard/sugargliders/{id}', [ugargliderController::class, 'destroy'])->name('sugarglider.destroy');
    });
});


Route::get('/shelters', [ShelterController::class, 'index'])->name('shelters');
Route::get('/shelters/{id}', [ShelterController::class, 'show'])->name('shelterShow');

Route::get('/sugargliders', [SugargliderController::class, 'index'])->name('sugargliders');
Route::get('/sugargliders/{id}', [SugargliderController::class, 'show'])->name('sugargliderShow');
Route::get('/sugargliders/{id}', [SugargliderController::class, 'show'])->name('sugarglider.show');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::post('/contact', [ContactController::class, 'contactPost'])->name('contact.post');
