<?php

use App\Http\Controllers\Address\AddressController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\Dashboard\DashboardController;
use app\Http\Controllers\Site\Support\SupportController;
use App\Http\Controllers\Staff\StaffController;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\Category\CategoryController;
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

    Route::prefix('/')->controller(DashboardController::class)->group(callback: function (){
        Route::get('','index')->name('home');
        Route::get('about-us','about_us')->name('about_us');
        Route::get('contact_us','contact_us')->name('contact_us');
        Route::get('faq','faq')->name('faq');
    });

Route::prefix('address')->name('address.')->group(function (){
    Route::post('/getProvince_setCity',[AddressController::class,'getProvince_setCity']);
});

Route::prefix('support')->name('support.')->group(function (){

    Route::prefix('tracking')->name('tracking.')->group(function (){
        Route::get('',[SupportController::class,'trackingIndex'])->name('index');
		Route::get('/call_up',[SupportController::class,'trackingIndex']);
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

Route::get('staff',[StaffController::class,'index'])->name('site.staff.index');


//Route::prefix('category')->name('categories.')->group(function (){
//    Route::get('/',[CategoryController::class,'index'])->name('index');
//    Route::get('/{category}',[CategoryController::class,'showByCategory'])->name('show_by_category');
//    Route::get('/{category}',[CategoryController::class])->name('showByCategory');
//});
//
//


require __DIR__.'/auth.php';
