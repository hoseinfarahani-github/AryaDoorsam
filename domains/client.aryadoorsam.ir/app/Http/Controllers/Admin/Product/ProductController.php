<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Product\APV;
use App\Models\Product\Attribute;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Models\Product\value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setTitle('محصولات')
            ->setDescription('پنل مدیریت آریادرسام');
    }

    public function index(Request $request)
    {
        return view('Admin.Product.index',[
            'products'=>$this->PaginatePagez(Product::query()->latest(),$request,['title'],[''])]);
    }
    public function  create()
    {
        return view('Admin.Product.create',[
            'categories'=>Category::all(),
            'brands'=>Brand::all()
        ]);

    }

    public function show(Product $product)
    {

    }

    public function store(Request $request)
    {
        //TODO unique array for tomorrow
        dd();
        $id=Product::query()->insertGetId([
            'name'                  => $request->name,
            'title'                 => $request->title,
            'short_description'     => $request->short_description,
            'long_description'      => $request->long_description,
            'brand_id'              => $request->brand,
            'category_id'           => $request->category,
        ]);

        $attribute=array_unique($request->get('attributes'));

        foreach ($attribute as $key=>$value){
            DB::transaction(function () use ($key,$value,$id){
                APV::query()->insertGetId([
                    'product_id'    => $id,
                    'value_id'      => value::query()->where('title','=',$value['value'])->first()->id,
                    'attribute_id'  => Attribute::query()->Where('title','=',$value['name'])->first()->id
                ]);
            });

        }
        return redirect(route('admin.dashboard.index'));
    }

    public function update(Request $request,Product $product)
    {

    }

    public function edit(Product $product)
    {
        return view('Admin.Product.edit',[
            'product'       =>$product,
            'categories'    =>Category::all(),
            'brands'        =>Brand::all()
        ]);

    }

    public function destroy(Product $product)
    {

    }

}
