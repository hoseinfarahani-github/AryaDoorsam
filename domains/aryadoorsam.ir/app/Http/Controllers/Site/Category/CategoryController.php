<?php

namespace App\Http\Controllers\Site\Category;

use App\Http\Controllers\Controller;
use App\Models\Product\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('Site.Category.main',compact('categories'));
    }
    public function showByCategory(Category $category)
    {
        $products = $category->product;
        $categories = $category->all();
        return view('Site.Category.index', [
            'products' => $products,
            'categories' => $categories
        ]);
    }


    public function searchCategory(Request $request)
    {
        $categories = Category::all();
        if ($request->keyword != '') {
            $employees = Category::where('name', 'LIKE', '%' . $request -> keyword . '%')->get();
        }
        return response()->json([
            'categories' => $categories,
        ]);
    }
}
