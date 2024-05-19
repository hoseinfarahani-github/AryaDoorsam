<?php

namespace App\Http\Controllers\Site\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        $products=Product::where('available_shop',1)->get();
        return view('Site.index',compact(
            'categories',
            'products'
        ));
    }
}
