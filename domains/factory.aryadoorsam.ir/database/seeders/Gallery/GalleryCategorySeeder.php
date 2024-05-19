<?php

namespace Database\Seeders\Gallery;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GalleryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('galleries')->insert([
            'name'=>'Darb Hariq icon',
            'title'=>'آیکون درب ضد حریق',
            'size' => number_format(filesize('public/assets/icon/Darb Hariq.svg')/1024,0),
            'galleria_id'=>'1',
            'galleria_type'=>'App\Models\Product\Category',
            'mime'=>'svg',
            'path'=>'public/assets/icon/Darb Hariq.svg',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        DB::table('galleries')->insert([
            'name'=>'Darb Serqat icon',
            'title'=>'آیکون درب ضد سرقت',
            'size' => number_format(filesize('public/assets/icon/Darb Serqat.svg')/1024,0),
            'galleria_id'=>'2',
            'galleria_type'=>'App\Models\Product\Category',
            'mime'=>'svg',
            'path'=>'public/assets/icon/Darb Serqat.svg',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        DB::table('galleries')->insert([
            'name'=>'Darb Dakheli icon',
            'title'=>'آیکون درب داخلی',
            'size' => number_format(filesize('public/assets/icon/Darb Dakheli.svg')/1024,0),
            'galleria_id'=>'3',
            'galleria_type'=>'App\Models\Product\Category',
            'mime'=>'svg',
            'path'=>'public/assets/icon/Darb Dakheli.svg',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        DB::table('galleries')->insert([
            'name'=>'Darb Lobby icon',
            'title'=>'آیکون درب لابی',
            'size' => number_format(filesize('public/assets/icon/Darb Lobby.svg')/1024,0),
            'galleria_id'=>'4',
            'galleria_type'=>'App\Models\Product\Category',
            'mime'=>'svg',
            'path'=>'public/assets/icon/Darb Lobby.svg',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        DB::table('galleries')->insert([
            'name'=>'Cabinet',
            'title'=>'آیکون ضد حریق',
            'size' => number_format(filesize('public/assets/icon/Cabinet.svg')/1024,0),
            'galleria_id'=>'5',
            'galleria_type'=>'App\Models\Product\Category',
            'mime'=>'svg',
            'path'=>'public/assets/icon/Cabinet.svg',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
