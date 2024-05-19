<?php

namespace App\Http\Controllers\Agent\Location;

use App\Http\Controllers\Agent\AgentController;
use App\Models\Location\Address;
use Illuminate\Http\Request;

class AddressController extends AgentController
{
    public function index(Request $request)
    {
        return 0;
    }

    public function create()
    {
        return 'agent.create';
    }

    public function store(Request $request)
    {


        return 'agent.store';
    }

    public function update(Address $address,Request $request)
    {
        $address->update([
           'province_id'=>$request->province_id,
           'county_id'=>$request->county_id,
            'postal_code'=>$request->postalCode,
            'phone'=>$request->tel,
            'detail'=>$request->address_detail
        ]);
        toast('آدرس مشتری موردنظر با موفقیت ویرایش شد.');
        return redirect(route('agent.client.index'));
    }
}
