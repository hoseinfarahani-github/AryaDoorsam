<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Location\Address;
use App\Models\Location\Province;
use App\Models\User\Agent;
use App\Models\User\Client;
use App\Models\User\Client\Juridical;
use Illuminate\Http\Request;
use App\Models\User\Client\Personal;
class ClientController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->seo()->setTitle('ایجاد کاربر جدید')
        ->setDescription('پنل ادمین آریادرسام');
    }

    public function index(Request $request)
    {

        return view('Admin.Client.index',[
            'clients'=>$this->PaginatePagez(Client::query()->latest(),$request,['name'],[''])]);
    }

    public function create()
    {
        $agents = Agent::all();
        $provinces = Province::all();
        return view('Admin.Client.create',[
            'agents' => $agents,
            'provinces'=> $provinces
        ]);
    }

    public function show(Client $client)
    {
        //
    }

    public function store(Request $request)
    {
        if (!!$request->companyName){
            $juridical = Juridical::create([
                'companyName'=>$request->companyName,
                'nationalNumber'=>$request->nationalNumber,
                'contactPerson'=>$request->contactPerson,
                'contactPhone'=>$request->contactPhone,
                'savedNumber'=>$request->savedNumber,
                'economicNumber'=>$request->economicNumber,
            ]);
            $address = Address::create([
               'province_id'=>$request->province,
                'county_id'=>$request->city,
                'postal_code'=>$request->postalCode,
                'phone'=>$request->contactPhone,
            ]);
            Client::create([
                'clientable_id'=>$juridical->id,
                'clientable_type'=>'App\Models\User\Client\Juridical',
                'agent_id'=>$request->agent,
                'phone'=>$request->phone,
                'address_id'=>$address->id,
            ]);


        }

    }

    public function update(Client $client,Request $request)
    {
        $inputs = $request->all();
        $client->update($inputs);
        return redirect()->back();
    }

    public function destroy(Client $client)
    {

        if ($client->status['eng'] == 'active'){
            $client->update([
               'status'=>0
            ]);
        }elseif ($client->status['eng'] == 'deactive'){
            $client->update([
               'status'=>1
            ]);
        }
        //toast('عملیات با موفقیت انجام شد','success');
        return back();

    }

}
