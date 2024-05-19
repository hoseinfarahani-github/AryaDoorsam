<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Location\County;
use App\Models\Location\Province;
use App\Models\User\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
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
        $address['phone']=$client->address->phone;
        $address['detail']=$client->address->detail;


        return response()->json(array('success'=>true,'information'=>$aray,'address'=>$address));
    }
}
