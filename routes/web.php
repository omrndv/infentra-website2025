<?php

use App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureOtpVerified;
use App\Http\Controllers\Auth\TeamController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Frontend\ReuploadController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\TeamController as AdminTeamController;

//URL::forceScheme('https');

Route::prefix('team')->name('frontend.team.')->middleware(['auth', 'role:team', EnsureOtpVerified::class,])->group(function () {
    Route::get('dashboard', function () {
        $user = Auth::user();
        return view('pages.team.dashboard', compact('user'));
    })->name('dashboard');
});



Route::prefix('verification')->name('verification.')->group(function () {
    Route::get('/', [VerificationController::class, 'index'])->name('index');
    Route::post('/', [VerificationController::class, 'store'])->name('store');
});


Route::prefix('password')->name('password.')->group(function () {
    Route::get('forgot', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('request');
    Route::post('email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('email');
    Route::get('reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('reset');
    Route::post('reset', [ResetPasswordController::class, 'reset'])->name('update');
});


Route::get('/team-members', [TeamController::class, 'index'])->name('team-members.index');
Route::post('/team-members', [TeamController::class, 'store'])->name('team-members.store');


Route::get('/', [Frontend\LandingController::class, 'index'])->name('frontend.landing');

Route::controller(Frontend\CompetitionController::class)
    ->name('frontend.competition.')
    ->group(function () {
        Route::get('/competition', 'index')->middleware('guest')->name('index');
        Route::get('/competition/{slug}', 'show')->name('show');
    });


Route::prefix('reupload')->name('reupload.')->group(function () {
    Route::get('/{team}', [ReuploadController::class, 'index'])->name('index');
    Route::post('/{team}', [ReuploadController::class, 'store'])->name('store');
});


foreach (glob(dirname(__FILE__) . '/web/*.php', GLOB_NOSORT) as $route_file) {
    require $route_file;
}


Route::view('uptime', 'pages.health-up')->name('uptime');
