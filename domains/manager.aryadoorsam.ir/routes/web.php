<?php

use App\Http\Controllers\Address\AddressController;
use App\Http\Controllers\Manager\Report\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\SupportController;
use App\Http\Controllers\Manager\DashboardController;
use App\Models\Calender\Event;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manager\Agent\AgentController;
use App\Http\Controllers\Manager\Client\ClientController;
use App\Http\Controllers\Manager\Order\OrderController;
use App\Http\Controllers\Manager\Product\ProductController;
use App\Http\Controllers\Manager\Setting\SettingController;
use App\Http\Controllers\Manager\Ticket\TicketController;
use App\Http\Controllers\Manager\Ticket\MessageController;



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

Route::name('manager.')->middleware(['manager','auth'])->group(function(){
    return abort('403','the website is under maintenance');

 Route::get('/',[DashboardController::class,'index'])->name('dashboard.index');
    Route::post('/',[DashboardController::class,'index']);

    Route::prefix('clients')->name('client.')->group(callback: function (){
        Route::get('/',[ClientController::class,'index'])->name('index');
        Route::post('/',[ClientController::class,'index']);
		Route::get('/show/{client}',[ClientController::class,'show'])->name('show');
    });

    Route::prefix('agents')->name('agents.')->group(callback: function (){
        Route::get('/',[AgentController::class,'index'])->name('index');
        Route::post('/',[AgentController::class,'index']);
        Route::get('/create',[AgentController::class,'create'])->name('create');
        Route::post('/store',[AgentController::class,'store'])->name('store');
    });

    Route::prefix('order')->name('order.')->group(callback: function (){
        Route::get('/',[OrderController::class,'index'])->name('index');
		Route::get('/graphic/index',[OrderController::class,'graphic_index'])->name('graphic.index');
        Route::post('/',[OrderController::class,'index']);
        Route::get('/show/{order}',[OrderController::class,'show_detail'])->name('detail');
        Route::post('/reject/{order}',[OrderController::class,'reject'])->name('reject');
        Route::post('/approved/{order}',[OrderController::class,'approved'])->name('approved');

    });

    Route::prefix('setting')->name('setting.')->group(callback: function (){
        Route::get('/',[SettingController::class,'index'])->name('index');
        Route::post('/',[SettingController::class,'index']);
        Route::get('/change/light',[SettingController::class,'change_light'])->name('change.light');
		Route::post('/change_password',[SettingController::class,'change_password'])->name('change_password');

    });

	Route::prefix('ticket')->name('ticket.')->group(callback: function (){
        Route::get('/',[TicketController::class,'index'])->name('index');
        Route::get('create',[TicketController::class,'create'])->name('create');
        Route::get('{ticket}',[TicketController::class,'show'])->name('show');
        Route::post('store',[TicketController::class,'store'])->name('store');
    });

	 Route::prefix('message')->name('message.')->group(callback: function (){
       Route::post('send/{ticket}',[MessageController::class,'send'])->name('send');
    });

    Route::prefix('product')->name('product.')->group(callback: function (){
        Route::get('/',[ProductController::class,'index'])->name('index');
        Route::post('/',[ProductController::class,'index']);
    });

    Route::prefix('report')->name('report.')->group(callback: function (){
       Route::get('/',[ReportController::class,'index'])->name('index');
       Route::post('/set',[ReportController::class,'set'])->name('set');
    });
});

require __DIR__.'/auth.php';
