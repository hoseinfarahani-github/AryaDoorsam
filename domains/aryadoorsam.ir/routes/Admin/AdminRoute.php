<?php

use App\Http\Controllers\Admin\ACL\PermissionController;
use App\Http\Controllers\Admin\ACL\RoleController;
use App\Http\Controllers\Admin\ACL\StaffController;
use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\Admin\Calender\EventController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\User\ClientController;
use App\Http\Controllers\Admin\Gallery\GalleryController;
use App\Http\Controllers\Admin\Product\APVController;
use App\Http\Controllers\Admin\Ticket\TicketController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\User\Usercontroller;
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


Route::prefix('dashboard')->name('admin.')->group(function (){

    Route::get('/',[DashboardController::class,'index'])->name('dashboard.index');
    Route::post('/',[DashboardController::class,'index']);
    //user
    Route::prefix('user')->name('user.')->group(function (){
        Route::get('/',[Usercontroller::class,'index'])->name('index');
        Route::post('/',[Usercontroller::class,'index']);
        Route::get('/create',[Usercontroller::class,'create'])->name('create');
        Route::get('{Gallery}',[Usercontroller::class,'show'])->name('show');
        Route::post('store',[Usercontroller::class,'store'])->name('store');
        Route::patch('/edit/{user}',[Usercontroller::class,'edit'])->name('edit');
        Route::delete('delete/{user}',[Usercontroller::class,'destroy'])->name('destroy');
        Route::patch('update/{user}',[Usercontroller::class,'update'])->name('update');
    });
	//Order
    Route::prefix('order')->name('order.')->group(function (){
        Route::get('/',[OrderController::class,'index'])->name('index');
        Route::post('/',[OrderController::class,'index']);
        Route::get('/create',[OrderController::class,'create'])->name('create');
        Route::get('{order}',[OrderController::class,'show'])->name('show');
        Route::post('store',[OrderController::class,'store'])->name('store');
        Route::patch('/edit/{order}',[OrderController::class,'edit'])->name('edit');
        Route::delete('delete/{order}',[OrderController::class,'destroy'])->name('destroy');
        Route::patch('update/{order}',[OrderController::class,'update'])->name('update');
    });

   //Client
    Route::prefix('client')->name('client.')->group(function (){
        Route::get('/',[ClientController::class,'index'])->name('index');
        Route::post('/',[ClientController::class,'index']);
        Route::get('/create',[ClientController::class,'create'])->name('create');
        Route::get('{client}',[ClientController::class,'show'])->name('show');
        Route::post('store',[ClientController::class,'store'])->name('store');
        Route::patch('/edit/{client}',[ClientController::class,'edit'])->name('edit');
        Route::delete('delete/{client}',[ClientController::class,'destroy'])->name('destroy');
        Route::patch('update/{client}',[ClientController::class,'update'])->name('update');
    });

    //Gallery
    Route::prefix('gallery')->name('gallery.')->group(function (){
       Route::get('/',[GalleryController::class,'index'])->name('index');
       Route::post('/',[GalleryController::class,'index']);
       Route::get('{Gallery}',[GalleryController::class,'show'])->name('show');
       Route::post('store',[GalleryController::class,'store'])->name('store');
       Route::delete('delete/{gallery}',[GalleryController::class,'destroy'])->name('destroy');
       Route::patch('update/{gallery}',[GalleryController::class,'update'])->name('update');
    });
    //permission
    Route::prefix('permission')->name('permission.')->group(function (){
       Route::get('/',[PermissionController::class,'index'])->name('index');
       Route::post('/',[PermissionController::class,'index']);
       Route::get('{Gallery}',[PermissionController::class,'show'])->name('show');
       Route::post('store',[PermissionController::class,'store'])->name('store');
       Route::delete('delete/{permission}',[PermissionController::class,'destroy'])->name('destroy');
       Route::patch('update/{permission}',[PermissionController::class,'update'])->name('update');
    });
    //Role
    Route::prefix('role')->name('role.')->group(function (){
        Route::get('/',[RoleController::class,'index'])->name('index');
        Route::post('/',[RoleController::class,'index']);
        Route::get('{Gallery}',[RoleController::class,'show'])->name('show');
        Route::post('store',[RoleController::class,'store'])->name('store');
        Route::delete('delete/{role}',[RoleController::class,'destroy'])->name('destroy');
        Route::patch('update/{role}',[RoleController::class,'update'])->name('update');
    });
    //product
    Route::prefix('product')->name('product.')->group(function (){
        Route::get('/',[ProductController::class,'index'])->name('index');
        Route::post('/',[ProductController::class,'index']);
        Route::get('/create',[ProductController::class,'create'])->name('create');
        Route::get('{Gallery}',[ProductController::class,'show'])->name('show');
        Route::post('store',[ProductController::class,'store'])->name('store');
        Route::get('/edit/{product}',[ProductController::class,'edit'])->name('edit');
        Route::delete('delete/{product}',[ProductController::class,'destroy'])->name('destroy');
        Route::patch('update/{product}',[ProductController::class,'update'])->name('update');
        Route::get('/gallery/{product}',[ProductController::class,'gallery'])->name('gallery.index'); //TODO Edit this route
        Route::post('/attribute/value',[APVController::class,'getValue']);
    });
    //brand
    Route::prefix('brand')->name('brand.')->group(function (){
        Route::get('/',[BrandController::class,'index'])->name('index');
        Route::post('/',[BrandController::class,'index']);
        Route::get('/create',[BrandController::class,'create'])->name('create');
        Route::get('{Gallery}',[BrandController::class,'show'])->name('show');
        Route::post('store',[BrandController::class,'store'])->name('store');
        Route::patch('/edit/{brand}',[BrandController::class,'edit'])->name('edit');
        Route::delete('delete/{brand}',[BrandController::class,'destroy'])->name('destroy');
        Route::patch('update/{brand}',[BrandController::class,'update'])->name('update');
    });
    //category
    Route::prefix('category')->name('category.')->group(function (){
        Route::get('/',[CategoryController::class,'index'])->name('index');
        Route::post('/',[CategoryController::class,'index']);
		Route::get('/create',[CategoryController::class,'create'])->name('create');
        Route::get('{category}',[CategoryController::class,'show'])->name('show');
        Route::post('store',[CategoryController::class,'store'])->name('store');
        Route::delete('delete/{category}',[CategoryController::class,'destroy'])->name('destroy');
        Route::patch('update/{category}',[CategoryController::class,'update'])->name('update');
    });
    //event
    Route::prefix('event')->name('event.')->group(function (){
        Route::get('/',[EventController::class,'index'])->name('index');
        Route::post('/',[EventController::class,'index']);
        Route::post('/edit',[EventController::class,'edit'])->name('edit');

    });
	//ticket
	Route::prefix('ticket')->name('ticket.')->group(function (){
        Route::get('/',[TicketController::class,'index'])->name('index');
        Route::post('/',[TicketController::class,'index']);
        Route::get('/{ticket}',[TicketController::class,'show'])->name('show');
        Route::post('/{ticket}/sent',[TicketController::class,'sentMessage'])->name('sent.message');
    });
	//news
	Route::prefix('news')->name('news.')->group(function (){
       Route::get('/',[NewsController::class,'index'])->name('index');
       Route::post('/',[NewsController::class,'index']);
    });
	//hints
	Route::prefix('hints')->name('hints.')->group(function (){
        Route::get('/',[HintController::class,'index'])->name('index');
        Route::post('/',[HintController::class,'index']);
    });
});
