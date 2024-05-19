<?php

namespace App\Http\Controllers\Manager\Product;

use App\Http\Controllers\Manager\ManagerController;
use App\Models\Product\Category;
use Illuminate\Http\Request;

class ProductController extends ManagerController
{
    public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setTitle('محصولات آریادرسام')
            ->setDescription('پنل مدیرعامل آریادرسام');
    }

    public function index(Request $request)
    {
        // dd(Category::all()->first()->product);
        return view('Manager.Product.index',[
            'categories' => Category::all(),
        ]);
    }
}
