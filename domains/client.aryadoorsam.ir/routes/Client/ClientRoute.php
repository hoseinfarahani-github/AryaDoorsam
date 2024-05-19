<?php

use App\Http\Controllers\Client\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

$domain='user.'.parse_url(config('app.url'),PHP_URL_HOST);

Route::domain($domain)->name('client.')->group(function (){

    Route::get('/',[DashboardController::class,'index'])->name('dashboard.index');
    Route::post('/',[DashboardController::class,'index']);

});





