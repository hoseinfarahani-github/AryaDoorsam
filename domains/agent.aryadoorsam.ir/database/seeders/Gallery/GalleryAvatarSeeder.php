<?php

namespace Database\Seeders\Gallery;

use App\Models\Gallery\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GalleryAvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('galleries')->insert([
            'name'=>'default_man_avatar',
            'title'=>'تصویر پیش فرض آقا',
            'size' => 0,
            'galleria_type'=>'App\Models\User\User',
            'mime'=>'png',
            'path'=>'public/assets/image/avatar/default_man_avatar01.png',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        DB::table('galleries')->insert([
            'name'=>'default_woman_avatar',
            'title'=>'تصویر پیش فرض خانم',
            'size' => 0,
            'galleria_type'=>'App\Models\User\User',
            'mime'=>'png',
            'path'=>'public/assets/image/avatar/default_woman_avatar01.png',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        DB::table('galleries')->insert([
            'name'=>'default_company_avatar',
            'title'=>'تصویر پیش فرض حقوقی',
            'size' => 0,
            'galleria_type'=>'App\Models\User\Client\Juridical',
            'mime'=>'png',
            'path'=>'public/assets/image/avatar/default_company_avatar01.png',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        DB::table('galleries')->insert([
            'name'=>'default_personal_avatar',
            'title'=>'تصویر پیش فرض حقیقی',
            'size' => 0,
            'galleria_type'=>'App\Models\User\Client\Personal',
            'mime'=>'png',
            'path'=>'public/assets/image/avatar/default_personal_avatar01.png',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
