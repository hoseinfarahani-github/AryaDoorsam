<?php

namespace App\Http\Controllers\Agent\Client;

use App\Http\Controllers\Address\AddressController;
use App\Http\Controllers\Agent\AgentController;
use App\Models\Location\Province;
use App\Models\User\Client;
use App\Models\User\Client\Juridical;
use App\Models\User\Client\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends AgentController
{

    public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setTitle('مشتریان آریادرسام')
            ->setDescription('پنل نمایندگان آریادرسام');
    }

    public function index(Request $request)
    {
        $this->seo()
            ->setTitle('لیست مشتریان');

        $client=Auth::user()->client;
        return view('Agent.Client.index',[
            'clients'       => $client
        ]);
    }

    public function show(Client $client)
    {

        return view('Agent.Client.show',[
            'orders'    => $client->order,
            'client_name' => $client->name()
        ]);
    }

    public function create()
    {
        $this->seo()
            ->setTitle('افزودن مشتری');

        return view('Agent.Client.create',[
            'provinces'     => Province::all()
        ]);
    }

    public function store(Request $request)
    {

        if(is_null($request->ClientPersonalFirstName)){
            $client=$this->create_juridical($request);
            $client_id=$this->create_client($request,$client);

        }else{
            $client=$this->create_personal($request);
            $client_id=$this->create_client($request,$client);
        }
        $address_id=$this->create_address($request,$client_id);
        Client::find($client_id)->update([
           'address_id'=>$address_id
        ]);
        return redirect(route('agent.order.create'));
    }

    public function create_address(Request $request,int $user_id)
    {
        $address=[
            'province_id'         =>$request->province_id,
            'county_id'           =>$request->province_id,
            'postal_code'         =>$request->postalCode,
            'phone'               =>$request->tel,
            'detail'              =>$request->detail,
            'addressable_type'    =>'App\Models\User\Client',
            'addressable_id'      =>$user_id
        ];
       return AddressController::store($address);
    }

    public function create_juridical(Request $request)
    {
       return [Juridical::query()->insertGetId([
               'companyName'       => $request->ClientJuridicalName,
               'nationalNumber'    => $request->ClientJuridicalNationalNumber,
               'savedNumber'       => $request->ClientJuridicalSavedNumber,
               'economicNumber'    => $request->ClientJuridicalEconomicNumber,
           ]),'App\Models\User\Client\Juridical'];
    }

    public function create_client(Request $request,array $array)
    {
        return Client::query()->insertGetId([
            'clientable_id'     => $array[0],
            'clientable_type'   => $array[1],
            'agent_id'          => Auth::user()->id,
        ]);
    }
    public function create_personal(Request $request)
    {
        return [Personal::query()->insertGetId([
            'firstName'       => $request->ClientPersonalFirstName,
            'lastName'    => $request->ClientPersonalLastName,
            'nationalNumber'       => $request->ClientPersonalNationalNumber,
            'phone'    => $request->ClientPersonalPhone,
        ]),'App\Models\User\Client\Personal'];
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect(route('agent.client.index'));
    }

    public function edit(Client $client)
    {
        return view('Agent.Client.edit',[
            'client'    => $client,
            'orders'    => $client->order
        ]);
    }

    public function update(Request $request,Client $client)
    {
        //
    }

}
