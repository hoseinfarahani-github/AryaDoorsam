<?php

namespace Database\Seeders\User;

use App\Models\User\Client;
use App\Models\User\Client\Juridical;
use App\Models\User\Client\Personal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $person=Personal::query()->insertGetId([
           'firstName'      =>'عرفان',
           'lastName'       =>'قالی باف',
           'nationalNumber' =>'0022348557',
           'phone'          =>'09309447576',
           'created_at'     =>now(),
           'updated_at'     =>now()

        ]);
        Client::query()->insertGetId([
           'clientable_type'    =>'App\Models\User\Client\Personal',
           'clientable_id'      =>$person,
           'agent_id'           =>'1',
           'address_id'         =>'1',
           'created_at'         =>now(),
           'updated_at'         =>now()
        ]);
        $person=Juridical::query()->insertGetId([
           'companyName'            =>  'شرکت آریا درسام',
           'nationalNumber'         =>  '12345',
           'savedNumber'            =>  '12345',
           'economicNumber'         =>  '12345',
           'phone'                  =>  '021223995391',
           'created_at'             =>now(),
           'updated_at'             =>now()
        ]);
        Client::query()->insertGetId([
            'clientable_type'    =>'App\Models\User\Client\Juridical',
            'clientable_id'      =>$person,
            'agent_id'           =>'1',
            'address_id'         =>'2',
            'created_at'         =>now(),
            'updated_at'         =>now()
        ]);
    }
}
