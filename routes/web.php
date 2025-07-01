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
use App\Models\Courier; 



Route::redirect('/', '/couriers')->middleware(['auth']);

Route::middleware(['auth'])->group(function () {
    Route::resource('couriers', CourierController::class);
});




