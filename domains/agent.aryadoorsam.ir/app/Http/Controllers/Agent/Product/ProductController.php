<?php

namespace App\Http\Controllers\Agent\Product;

use App\Http\Controllers\Agent\AgentController;
use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class ProductController extends AgentController
{
    public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setTitle('محصولات آریادرسام')
            ->setDescription('پنل نمایندگان آریادرسام');
    }

    public function index(Request $request)
    {
       // dd(Category::all()->first()->product);
        return view('Agent.Product.index',[
            'categories' => Category::all(),
        ]);
    }

    public function changePhoto(Request $request)
    {

       // dd($request);
        $product_id=$request->product_id;
        $product_value=$request->product_value;
        $product_attribute=$request->product_attribute;
        $image_name=$request->image_name;

        $gallery=Product::find($product_id)->gallery;
        $image_before_attribute=json_decode($gallery->where('name','==',$image_name)->first()->attribute);
       // $image_new_attribute[$product_attribute]=$product_value;
     //   $image_before_attribute=$image_before_attribute->$product_attribute=$product_value;

        $image_before_attribute->$product_attribute=$product_value;


        $new_image=$gallery->where('attribute','==',json_encode($image_before_attribute))->first();
      //  dd($image_before_attribute);
                return response()->json(array('success'=>true,
                    'path'=>str_replace('public','/storage',$new_image->path),
                    'image_name'=>$new_image->name

                ));

    }
}
