<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\CourierTrackingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AgentController;

/*
|--------------------------------------------------------------------------
| Landing Selector Route (NO AUTH)
|--------------------------------------------------------------------------
| Shows the "Are you Customer / Admin / Agent?" page
*/
Route::get('/', function () {
    return view('login-selector');
})->name('login.selector');

/*
|--------------------------------------------------------------------------
| Public Customer Tracking Routes (NO AUTH)
|--------------------------------------------------------------------------
*/
Route::get('/track', [CourierTrackingController::class, 'showForm'])->name('track.form');
Route::post('/track', [CourierTrackingController::class, 'lookup'])->name('track.lookup');

/*
|--------------------------------------------------------------------------
| Custom Login + Logout
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('custom.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Admin-Protected Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::resource('couriers', CourierController::class);
});

/*
|--------------------------------------------------------------------------
| Agent-Protected Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/agent', [AgentController::class, 'index'])->name('agent.index');
    Route::post('/agent/update-status/{courier}', [AgentController::class, 'updateStatus'])->name('agent.updateStatus');
});
