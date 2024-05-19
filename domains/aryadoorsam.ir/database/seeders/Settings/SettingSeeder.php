<?php

namespace Database\Seeders\Settings;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([//1
            'object'=>'{"Persian_name":"آریادرسام","English_name":"Aryadoorsam"}'
        ]);
        DB::table('settings')->insert([//2
            'object'=>'{"title":"شماره تماس همراه","value":"+989309447576"}'
        ]);
        DB::table('settings')->insert([//3
            'object'=>'{"title":"شماره تماس ثابت","value":"+9892122395391"}'
        ]);
        DB::table('settings')->insert([//4
            'object'=>'{"title":"ایمیل مجموعه","value":"info@aryadoorsam.com"}'
        ]);
        DB::table('settings')->insert([//5
            'object'=>'{"title":"نشانی","value":"تهران، قیطریه، نبش کوچه تواضعی، پلاک 1 ،واحد 4"}'
        ]);
        DB::table('settings')->insert([//6
            'object'=>'{"title":"توضیحات","value":"شرکت آریا درسام با تکیه بر سالها تجربه ی موسسین و سابقه ی درخشان با بیش از یک دهه فعالیت در زمینه ی تولید و عرضه ی دربهای ساختمانی، در سال 1397 با نام تجاری"}'
        ]);
    }
}
