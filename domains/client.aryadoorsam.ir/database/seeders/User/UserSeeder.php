<?php

namespace Database\Seeders\User;

use App\Models\Gallery\Gallery;
use App\Models\User\Agent;
use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            'username'=>'Erfan Qalibaf',
            'email'=>'erfanwmb@gmail.com',
            'agent_id'=>Agent::query()->insertGetId([
                'code'=>'11',
                'created_at'=> now(),
                'updated_at'=> now()
            ]),
            'super'=>1,
            'staff'=>1,
            'email_verified_at'=>now(),
            'gallery_id'=>Gallery::whereName('default_man_avatar')->first()->id,
            'address_id'=>'1',
            'password'=>Hash::make('25425413'),
        ]);

        User::query()->create([
            'username'=>'Mr.Entekhabi',
            'email'=>'entekhabi@aryadorsoom.com',
            'email_verified_at'=>now(),
            'gallery_id'=>Gallery::whereName('default_man_avatar')->first()->id,
            'address_id'=>'2',
            'password'=>Hash::make('1234'),
        ]);

    }
}
