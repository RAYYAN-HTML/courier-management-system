<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourierController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Models\Status;

Route::get('/', function () {
    $statuses = Status::all();
    return view('couriers', compact('statuses'));
});


Route::resource('couriers', CourierController::class);


Route::resource('couriers', CourierController::class);
Route::get('/couriers', [CourierController::class, 'index'])->name('couriers.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


