<?php


use App\Http\Controllers\Factory\DashboardController;
use App\Http\Controllers\Factory\Order\OrderController;
use App\Http\Controllers\Factory\Calender\CalenderController;
use App\Http\Controllers\Factory\Setting\SettingController;
use App\Http\Controllers\Factory\Order\OrderDetailController;
use \App\Http\Controllers\Factory\Ticket\TicketController;
use App\Http\Controllers\Factory\Ticket\MessageController;
use Elibyy\TCPDF\Facades\TCPDF;



use App\Models\Order\Order;

use App\Models\Calender\Event;
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
Route::name('factory.')->middleware(['auth','factory'])->group(function (){


    Route::get('/',[DashboardController::class,'index'])->name('dashboard.index');
    Route::post('/',[DashboardController::class,'index']);

	Route::get('/ss',function(){
		$ss=Order::all();
		foreach($ss as $s) $s->update(['production_period' == null]);
		return 'ok';
	});
    Route::prefix('order')->name('order.')->group(callback: function (){
        Route::get('/',[OrderController::class,'index'])->name('index');
        Route::post('/',[OrderController::class,'index']);
		Route::get('/graphic/index',[OrderController::class,'graphic_index'])->name('graphic.index');
        Route::get('/show/{order}',[OrderController::class,'show_detail'])->name('detail');
        Route::post('/approved/order/{order}',[OrderController::class,'approved'])->name('approved');
		Route::post('/change/status/{order}',[OrderController::class,'change_status'])->name('change.status');
        Route::get('factor/{order}',[OrderController::class,'all'])->name('factor.all');

		Route::prefix('/detail')->name('detail.')->group(callback: function (){
           Route::get('print/{orderDetail}',[OrderDetailController::class,'print'])->name('print');
           Route::get('factor/{orderDetail}',[OrderDetailController::class,'factorShow'])->name('factor.show');
           ;
        });
    });

    Route::prefix('setting')->name('setting.')->group(callback: function (){
        Route::get('/',[SettingController::class,'index'])->name('index');
        Route::post('/',[SettingController::class,'index']);
        Route::get('/change/light',[SettingController::class,'change_light'])->name('change.light');
		Route::post('/change/password',[SettingController::class,'change_password'])->name('change_password');
    });

	Route::prefix('ticket')->name('ticket.')->group(callback: function (){
        Route::get('/',[TicketController::class,'index'])->name('index');
        Route::get('create',[TicketController::class,'create'])->name('create');
        Route::get('{ticket}',[TicketController::class,'show'])->name('show');
        Route::post('store',[TicketController::class,'store'])->name('store');
				   Route::post('gettype_id',[TicketController::class,'gettype_id'])->name('gettype_id');

    });

	 Route::prefix('message')->name('message.')->group(callback: function (){
       Route::post('send/{ticket}',[MessageController::class,'send'])->name('send');
    });

    Route::prefix('calender')->name('calender.')->group(callback: function (){
        Route::get('/',[CalenderController::class,'index'])->name('index');
        Route::post('/',[CalenderController::class,'index']);
    });

	Route::prefix('export')->name('export.')->group(callback: function (){
           Route::prefix('excel')->name('excel.')->group(callback: function (){
                Route::get('approved_order',[\App\Exports\ExportOrders::class,'export'])->name('download');
           });
    });
    Route::get('test',function (){
        $order=\App\Models\Order\Order::find(10)->order_detail;
        $orderDetail=$order->first();
        $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf::reset();


        $filename = str_replace('/','',$orderDetail->tracking_serial).'.pdf';
        $html=view()->make('Factory.Order.data_sheet2',['order_detail'=>$orderDetail,'order'=>$orderDetail->order])->render();
        $pdf::SetTitle($orderDetail->tracking_serial);
        $pdf::SetMargins(0, 10, 10,10);
        $pdf::SetAutoPageBreak(true, 0);
        $pdf::AddPage('L', 'C6');
        //dd(file_exists(public_path('/storage/assets/font/BTITRBD.TTF')));
        /*$fontname = TCPDF_FONTS::addTTFfont(public_path('/storage/assets/font/BTITRBD.TTF'), 'TrueTypeUnicode', '', 96);
        dd($fontname);*/

        $pdf::SetFont('dejavusans', '', 11, '', true);
        $pdf::writeHTML($html,true,0,true,0,'C');
        $path=public_path('factor/test/').$filename;
        $pdf::Output($path, 'F');
        dd('ok');
    });

});





require __DIR__.'/auth.php';

