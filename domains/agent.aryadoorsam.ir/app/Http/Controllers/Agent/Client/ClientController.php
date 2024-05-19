<?php

namespace App\Http\Controllers\Agent\Client;

use App\Http\Controllers\Address\AddressController;
use App\Http\Controllers\Agent\AgentController;
use App\Models\Location\Province;
use App\Models\User\Client;
use App\Models\User\Client\Juridical;
use App\Models\User\Client\Personal;
use Illuminate\Http\Request;
use App\Models\Location\County;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

        if(Auth::user()->agent->client->count() == 0) return view('Agent.Client.index',['clients'=>[]]);

        return view('Agent.Client.index',[
            'clients'       => $this->SortByColumn(Auth::user()->agent->client->toQuery())->get()
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
            $request['phone']=$request->ClientJuridicalPhone;
            $request->validate([
                'province_id' =>['required'],
                'county_id' =>['required'],
                'address_detail' =>['required'],
                'phone' => ['required','unique:clients']
            ]);
            $client=$this->create_juridical($request);
            $client_id=$this->create_client($request,$client);

        }else{
            $request['phone']=$request->ClientPersonalPhone;
            $request->validate([
                'province_id' =>['required'],
                'phone' => ['required','unique:clients'],
                'county_id' =>['required'],
                'address_detail' =>['required'],
            ]);
            $client=$this->create_personal($request);
            $client_id=$this->create_client($request,$client);
        }
        $address_id=$this->create_address($request,$client_id);
        Client::find($client_id)->update([
           'address_id'=>$address_id
        ]);
		toast('مشتری موردنظر با موفقیت افزوده شده.','success');
        return redirect(route('agent.order.create'));
    }

    public function create_address(Request $request,int $user_id)
    {
        $address=[
            'province_id'         =>$request->province_id,
            'county_id'           =>$request->county_id,
            'postal_code'         =>$request->postalCode,
            'phone'               =>$request->tel,
            'detail'      =>$request->address_detail,
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
               'contactPerson'    => $request->ClientJuridicalContactPerson,
               'contactPhone'    => $request->ClientJuridicalContactPhone,
           ]),'App\Models\User\Client\Juridical'];
    }

    public function create_client(Request $request,array $array)
    {
        if($array[1] == 'App\Models\User\Client\Juridical') $phone=$request->ClientJuridicalPhone;
        elseif ($array[1] == 'App\Models\User\Client\Personal') $phone=$request->ClientPersonalPhone;
        else return Redirect::back()->withErrors(['phone'=>'شماره تلفن را به درستی وارد نکردید']);

        return Client::query()->insertGetId([
            'clientable_id'     => $array[0],
            'clientable_type'   => $array[1],
            'phone'             => $phone,
            'agent_id'          => Auth::user()->agent->id,
        ]);
    }
    public function create_personal(Request $request)
    {
        return [Personal::query()->insertGetId([
            'firstName'       => $request->ClientPersonalFirstName,
            'lastName'    => $request->ClientPersonalLastName,
            'nationalNumber'       => $request->ClientPersonalNationalNumber,
        ]),'App\Models\User\Client\Personal'];
    }

    public function destroy(Client $client)
    {
        if($client->order->count() ==0){
            $client->clientable()->delete();
            $client->delete();
            toast('مشتری مورد نظر با موفقیت حذف شد','success');
        }
        else{
            toast('مشتری مورد نظر با موفقیت حذف نشد!','error');
        }

        return redirect(route('agent.client.index'));
    }

    public function edit(Client $client)
    {
        return view('Agent.Client.edit',[
            'client'    => $client,
            'orders'    => $client->order,
            'address'   =>$client->address,
            'provinces' =>Province::all()
        ]);
    }

    public function update(Request $request,Client $client)
    {
        if($client->clientable_type == 'App\Models\User\Client\Personal'){
        $client->clientable->update([
            'nationalNumber' =>$request->nationalNumber
        ]);

        }elseif($client->clientable_type == 'App\Models\User\Client\Juridical')
        {
            $client->clientable->update([
                'nationalNumber' => $request->nationalNumber,
                'contactPerson'  => $request->contactPerson,
                'contactPhone'   => $request->contactPhone,
                'savedNumber'    => $request->savedNumber,
                'economicNumber' => $request->economicNumber
            ]);

        }else abort(403);
        toast('مشتری موردنظر با موفقیت ویرایش شد','success');
        return redirect(route('agent.client.index'));
    }

	    public function get_info(Request $request)
    {

        $aray=[];

        $client=Client::find($request->id);
        if($client->clientable_type == 'App\Models\User\Client\Personal'){
        $aray['client_id']=$client->id;
        $aray['name']= $client->clientable->firstName;
        $aray['national']= $client->clientable->nationalNumber;
        $aray['type']='حقیقی';
       // $address=$client->address;


            //  $aray['phone']== $client->clientable->phone;
        }elseif ($client->clientable_type == 'App\Models\User\Client\Juridical'){
            $aray['client_id']=$client->id;
            $aray['name']= $client->clientable->companyName;
            $aray['national']= $client->clientable->nationalNumber;
            $aray['type']='حقوقی';
          //  $aray['phone']== $client->clientable->phone;
        }
        $address['province']=Province::find($client->address->province_id)->title;
        $address['county']=County::find($client->address->county_id)->title;
        $address['postalCode']=$client->address->postal_code;
        $address['phone']=$client->phone;
        $address['detail']=$client->address->detail;


        return response()->json(array('success'=>true,'information'=>$aray,'address'=>$address));
    }


}
