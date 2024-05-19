<?php

use App\Http\Controllers\Agent\Client\ClientController;
use App\Http\Controllers\Agent\DashboardController;
use App\Http\Controllers\Agent\Location\AddressController;
use App\Http\Controllers\Agent\Order\OrderController;
use App\Http\Controllers\Agent\Product\ProductController;
use App\Http\Controllers\Agent\Setting\SettingController;
use App\Http\Controllers\Agent\Ticket\MessageController;
use App\Http\Controllers\Agent\Ticket\TicketController;
use App\Http\Controllers\ProfileController;
use app\Http\Controllers\Site\Support\SupportController;
use Ghasedak\GhasedakApi;
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
	Route::name('agent.')->middleware(['agent','auth'])->group(function(){
		Route::get('/',[DashboardController::class,'index'])->name('dashboard.index');
    Route::post('/',[DashboardController::class,'index']);


	Route::get('test/',function (){
    $api = new GhasedakApi(env('GHASEDAK_API_KEY'));
    $api->SendSimple(
        "09309447576",  // receptor
        "اس ام اس تست خط", // message
        "50001212125056"    // choose a line number from your account
    );
});

    //Product
    Route::prefix('product')->name('product.')->group(function (){
            Route::prefix('change')->name('change.')->group(callback: function (){
                Route::post('photo',[\App\Http\Controllers\Agent\Product\ProductController::class,'changePhoto'])->name('photo');
            });

        Route::get('/',[ProductController::class,'index'])->name('index');
        Route::post('/',[ProductController::class]);

    });

    //Order
    Route::prefix('order')->name('order.')->group(function (){
        Route::get('',[OrderController::class,'index'])->name('index');
		Route::get('/graphic/index',[OrderController::class,'graphic_index'])->name('graphic.index');
        Route::get('/create',[OrderController::class,'create'])->name('create');
        Route::post('/store/step/1',[OrderController::class,'storeClient'])->name('step1');
        Route::post('/store/step/2',[OrderController::class,'storeClient2'])->name('step2');
        Route::get('/store/step/3/{order}',[OrderController::class,'create3'])->name('step3');
        Route::post('store/step/final/{order}',[OrderController::class,'finalStore'])->name('finalStore');
        Route::get('/show/{order}',[OrderController::class,'show_detail'])->name('detail');
		Route::delete('/delete/detail/multi',[OrderController::class,'multiDestroy'])->name('detail.multi.destroy');
        Route::delete('/delete/order/{order}',[OrderController::class,'destroy'])->name('destroy');
        Route::delete('/delete/detail/{orderDetail}',[OrderController::class,'destroyDetail'])->name('detail.destroy');
        Route::get('/store/{order}',[OrderController::class,'create2'])->name('create2'); //TODO for session
        Route::post('/store/add/{product}',[OrderController::class,'addProduct'])->name('addProduct');
		Route::post('/store/add/multi/{product}',[OrderController::class,'addProductMulti'])->name('addProductMulti');
        Route::patch('/store/update/{orderDetail}',[OrderController::class,'updateOrderDetail'])->name('updateOrderDetail');
		Route::post('/set/support_serial',[OrderController::class,'set_support_serial']);

       // Route::post('/store/step2',[OrderController::class,'storeProduct'])->name('storeProduct'); //TODO for session
    });


    Route::prefix('address')->name('address.')->group(callback: function (){
       Route::get('/',[AddressController::class,'index'])->name('index');
       Route::post('/',[AddressController::class,'index']);
       Route::post('/store',[AddressController::class,'store'])->name('store');
       Route::post('/store',[AddressController::class,'store'])->name('store');
	   Route::patch('/update/{address}',[AddressController::class,'update'])->name('update');
    });

    Route::prefix('clients')->name('client.')->group(callback: function (){
        Route::get('/',[ClientController::class,'index'])->name('index');
		Route::post('/get_info/',[ClientController::class,'get_info'])->name('get_info');
        Route::post('/',[ClientController::class,'index']);
        Route::get('/create',[ClientController::class,'create'])->name('create');
        Route::get('/edit/{client}',[ClientController::class,'edit'])->name('edit');
        Route::patch('/update/{client}',[ClientController::class,'update'])->name('update');
        Route::get('/show/{client}',[ClientController::class,'show'])->name('show');
        Route::post('/store',[ClientController::class,'store'])->name('store');
        Route::delete('/delete/{client}',[ClientController::class,'destroy'])->name('destroy');
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
		   Route::post('gettype_id',[TicketController::class,'gettype_id'])->name('gettype_id');

    });

    Route::prefix('report')->name('report')->group(callback: function (){
       Route::get('revenue',[DashboardController::class,'revenue_report']);
    });

	 Route::prefix('message')->name('message.')->group(callback: function (){
       Route::post('send/{ticket}',[MessageController::class,'send'])->name('send');
    });


Route::prefix('address')->name('address.')->group(function (){
    Route::post('/getProvince_setCity',[App\Http\Controllers\Address\AddressController::class,'getProvince_setCity']);
});

Route::prefix('support')->name('support.')->group(function (){

    Route::prefix('tracking')->name('tracking.')->group(function (){
        Route::get('',[SupportController::class,'trackingIndex'])->name('index');
        Route::post('/call_up',[SupportController::class,'call_up'])->name('call_up');

    });
});

Route::prefix('export')->name('export.')->group(callback: function (){
        Route::prefix('excel')->name('excel.')->group(callback: function (){
            Route::get('order/{order}',[\App\Exports\ExportOrders::class,'export'])->name('download');
        });
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

});
require __DIR__.'/auth.php';
  


