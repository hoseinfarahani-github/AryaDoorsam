<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Models\Location\Address;
use App\Models\Location\Province;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    static public function store(array $array)
    {
       return Address::query()->insertGetId($array);

    }

    public function getProvince_setCity(Request $request)
    {
        $counties=Province::query()->find($request->id)->county->all();
        return response()->json(array('success'=>true,'cities'=>$counties));
    }
}
