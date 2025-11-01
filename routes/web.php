<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Frontend;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\TeamController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

// URL::forceScheme('https'); // aktifkan kalau pakai HTTPS

/* HALAMAN VERIFIKASI EMAIL / OTP
*/

Route::prefix('verification')->name('verification.')->group(function () {
    Route::get('/', [VerificationController::class, 'index'])->name('index');
    Route::post('/', [VerificationController::class, 'store'])->name('store');
});

/*LUPA PASSWORD
*/
Route::prefix('password')->name('password.')->group(function () {
    Route::get('forgot', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('request');
    Route::post('email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('email');
    Route::get('reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('reset');
    Route::post('reset', [ResetPasswordController::class, 'reset'])->name('update');
});

/*TEAM MEMBERS (/auth)
*/
Route::get('/team-members', [TeamController::class, 'index'])->name('team-members.index');
Route::post('/team-members', [TeamController::class, 'store'])->name('team-members.store');

/*
FRONTEND
*/
Route::get('/', [Frontend\LandingController::class, 'index'])->name('frontend.landing');

Route::controller(Frontend\CompetitionController::class)
    ->name('frontend.competition.')
    ->group(function () {
        Route::get('/competition', 'index')->middleware('guest')->name('index');
        Route::get('/competition/{slug}', 'show')->name('show');
    });

/*INCLUDE ROUTE TAMBAHAN (pindah ke paling bawah)
*/
foreach (glob(dirname(__FILE__) . '/web/*.php', GLOB_NOSORT) as $route_file) {
    require $route_file;
}

/*
 HALAMAN STATUS / HEALTH
*/
Route::view('uptime', 'pages.health-up')->name('uptime');
