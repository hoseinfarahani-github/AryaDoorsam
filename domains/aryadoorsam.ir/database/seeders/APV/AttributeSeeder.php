<?php

namespace Database\Seeders\APV;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attributes')->insert([//1
            'name'  =>'material',
            'title' =>'متریال'
        ]);
        DB::table('attributes')->insert([//2
            'name'  =>'color',
            'title' =>'رنگ'
        ]);
        DB::table('attributes')->insert([//3
            'name'  =>'opening_direction',
            'title' =>'جهت بازشدن'
        ]);

        DB::table('attributes')->insert([//4
            'name'  =>'anti_panic_handle',
            'title' =>'دستگیره آنتی پنیک'
        ]);
        DB::table('attributes')->insert([//5
            'name'  =>'back_handle',
            'title' =>'دستگیره پشت'
        ]);
        DB::table('attributes')->insert([//6
            'name'  =>'door_closer',
            'title' =>'جک آرامبند'
        ]);
        DB::table('attributes')->insert([//7
            'name'  =>'door_threshold',
            'title' =>'نوع آستانه'
        ]);
        DB::table('attributes')->insert([//8
            'name'  =>'thickness',
            'title' =>'ضخامت'
        ]);
        DB::table('attributes')->insert([//9
            'name'  =>'HDF',
            'title' =>'HDF'
        ]);
        DB::table('attributes')->insert([//10
            'name'  =>'PVC',
            'title' =>'PVC'
        ]);
        DB::table('attributes')->insert([//11
            'name'  =>'color-material',
            'title' =>'جنس رنگ'
        ]);

        DB::table('attributes')->insert([//12
            'name'  =>'frame',
            'title' =>'چارچوب'
        ]);
        DB::table('attributes')->insert([//13
            'name'  =>'local_net',
            'title' =>'شبکه داخلی'
        ]);
        DB::table('attributes')->insert([//14
            'name'  =>'edge_door',
            'title' =>'لبه درب'
        ]);
        DB::table('attributes')->insert([//15
            'name'=>'fly_measure',
            'title'=>'اندازه پرواز'
        ]);


    }
}
