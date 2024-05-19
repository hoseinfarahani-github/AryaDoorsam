<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Product\Attribute;
use Illuminate\Http\Request;

class APVController extends AdminController
{
    public function getValue(Request $request)
    {
        //TODO Validation

       // dd($request->value);
        $attribute=Attribute::whereTitle($request->value)->first();

        if (is_null($attribute)) return response([]);
        else return  response(['success'=>true,'data'=>$attribute->value->pluck('title')]);
    }
}
