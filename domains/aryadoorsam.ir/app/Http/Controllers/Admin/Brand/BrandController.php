<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Gallery\Gallery;
use App\Models\Location\Country;
use App\Models\Product\Brand;
use Illuminate\Http\Request;

class BrandController extends AdminController
{

    public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setTitle('برند')
            ->setDescription('پنل مدیریت آریادرسام');
    }

    public function index(Request $request)
    {

        return view('Admin.Brand.index',[
           'brands'=>$this->PaginatePagez(Brand::query(),$request,['name','title'],['']),
            'galleries'=>Gallery::query()->where('galleria_type','=','App\Models\Product\Brand')->latest(),
            'countries'=>Country::all()
        ]);
    }

    public function create()
    {
        return view('Admin.Brand.create',[
           'countries'=>Country::all(),
           'galleries'=>Gallery::query()->where('galleria_type','=','App\Models\Product\Brand')->latest()
           //TODO Edit here
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Brand $brand)
    {
        //
    }

    public function edit(Brand $brand)
    {
        //
    }

    public function update(Request $request, Brand $brand)
    {
        //
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect(route('admin.brand.index'));
    }

    public function multiDestroy(Request $request)
    {
        $data=$request->except('_token','_method','deleteAll');
        foreach ($data as $key=>$value) {
            $brand=Brand::WhereName($value)->delete();
        }
        return redirect(route('admin.brand.index'));
    }
}
