<?php

use App\Http\Controllers\Address\AddressController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\ProfileController;
use app\Http\Controllers\Site\Support\SupportController;
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

Route::get('/', function () {
    return redirected(route('login'));
})->name('home');

Route::prefix('address')->name('address.')->group(function (){
    Route::post('/getProvince_setCity',[AddressController::class,'getProvince_setCity']);
});

Route::prefix('support')->name('support.')->group(function (){

    Route::prefix('tracking')->name('tracking.')->group(function (){
        Route::get('',[SupportController::class,'trackingIndex'])->name('index');
        Route::post('/call_up',[SupportController::class,'call_up'])->name('call_up');

    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('client')->name('client.')->group(callback: function (){
   Route::post('get_info',[ClientController::class,'get_info'])->name('get_info');
});



require __DIR__.'/auth.php';
