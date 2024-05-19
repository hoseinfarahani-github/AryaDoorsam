<?php

namespace Database\Seeders\Settings;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetakeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('metakeys')->insert([//1
            'key'=>'site_name',
            'setting_id'=>1
        ]);
        DB::table('metakeys')->insert([//2
            'key'=>'site_phone',
            'setting_id'=>2
        ]);
        DB::table('metakeys')->insert([//3
            'key'=>'site_tel',
            'setting_id'=>3
        ]);
        DB::table('metakeys')->insert([//4
            'key'=>'site_email',
            'setting_id'=>4
        ]);
        DB::table('metakeys')->insert([//5
            'key'=>'site_address',
            'setting_id'=>5
        ]);
        DB::table('metakeys')->insert([//6
            'key'=>'site_description',
            'setting_id'=>6
        ]);
    }
}
