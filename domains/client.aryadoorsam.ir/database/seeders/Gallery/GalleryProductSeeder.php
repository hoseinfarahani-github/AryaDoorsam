<?php

namespace Database\Seeders\Gallery;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GalleryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('galleries')->insert([
            'name'=>'firebox',
            'title'=>'باکس آتش نشانی',
            'size' => number_format(filesize('public/Image/Product/firebox.jpeg')/1024,0),
            'galleria_id'=>'1',
            'galleria_type'=>'App\Models\Product\Product',
            'mime'=>'jpeg',
            'path'=>'public/Image/Product/firebox.jpeg',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('galleries')->insert([
            'name'=>'click-door-black-left',
            'title'=>'درب کلیک سیاه',
            'size' => number_format(filesize('public/Image/Product/click-door/blackl.jpeg')/1024,0),
            'galleria_id'=>'2',
            'galleria_type'=>'App\Models\Product\Product',
            'mime'=>'jpeg',
            'attribute'=>json_encode(['color'=>'black','opening_direction'=>'left']),
            'path'=>'public/Image/Product/click-door/blackl.jpeg',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('galleries')->insert([
            'name'=>'click-door-black-right',
            'title'=>'درب کلیک سیاه',
            'size' => number_format(filesize('public/Image/Product/click-door/blackr.jpeg')/1024,0),
            'galleria_id'=>'2',
            'galleria_type'=>'App\Models\Product\Product',
            'mime'=>'jpeg',
            'attribute'=>json_encode(['color'=>'black','opening_direction'=>'right']),
            'path'=>'public/Image/Product/click-door/blackr.jpeg',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        DB::table('galleries')->insert([
            'name'=>'click-door-brown-left',
            'title'=>'درب کلیک قهوه ای',
            'size' => number_format(filesize('public/Image/Product/click-door/brownl.jpeg')/1024,0),
            'galleria_id'=>'2',
            'galleria_type'=>'App\Models\Product\Product',
            'mime'=>'jpeg',
            'attribute'=>json_encode(['color'=>'brown','opening_direction'=>'left']),
            'path'=>'public/Image/Product/click-door/brownl.jpeg',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('galleries')->insert([
            'name'=>'click-door-brown-right',
            'title'=>'درب کلیک قهوه ای',
            'size' => number_format(filesize('public/Image/Product/click-door/brownr.jpeg')/1024,0),
            'galleria_id'=>'2',
            'galleria_type'=>'App\Models\Product\Product',
            'mime'=>'jpeg',
            'attribute'=>json_encode(['color'=>'brown','opening_direction'=>'right']),
            'path'=>'public/Image/Product/click-door/brownr.jpeg',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('galleries')->insert([
            'name'=>'click-door-grey-left',
            'title'=>'درب کلیک خاکستری',
            'size' => number_format(filesize('public/Image/Product/click-door/greyl.jpeg')/1024,0),
            'galleria_id'=>'2',
            'galleria_type'=>'App\Models\Product\Product',
            'mime'=>'jpeg',
            'attribute'=>json_encode(['color'=>'grey','opening_direction'=>'left']),
            'path'=>'public/Image/Product/click-door/greyl.jpeg',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('galleries')->insert([
            'name'=>'click-door-grey-right',
            'title'=>'درب کلیک خاکستری',
            'size' => number_format(filesize('public/Image/Product/click-door/greyr.jpeg')/1024,0),
            'galleria_id'=>'2',
            'galleria_type'=>'App\Models\Product\Product',
            'mime'=>'jpeg',
            'attribute'=>json_encode(['color'=>'grey','opening_direction'=>'right']),
            'path'=>'public/Image/Product/click-door/greyr.jpeg',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('galleries')->insert([
            'name'=>'click-door-white-left',
            'title'=>'درب کلیک سفید',
            'size' => number_format(filesize('public/Image/Product/click-door/whitel.jpeg')/1024,0),
            'galleria_id'=>'2',
            'galleria_type'=>'App\Models\Product\Product',
            'mime'=>'jpeg',
            'attribute'=>json_encode(['color'=>'white','opening_direction'=>'left']),
            'path'=>'public/Image/Product/click-door/whitel.jpeg',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('galleries')->insert([
            'name'=>'click-door-white-right',
            'title'=>'درب کلیک سفید',
            'size' => number_format(filesize('public/Image/Product/click-door/whiter.jpeg')/1024,0),
            'galleria_id'=>'2',
            'galleria_type'=>'App\Models\Product\Product',
            'mime'=>'jpeg',
            'attribute'=>json_encode(['color'=>'white','opening_direction'=>'right']),
            'path'=>'public/Image/Product/click-door/whiter.jpeg',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);




        DB::table('galleries')->insert([
            'name'=>'serqat-luxury-door',
            'title'=>'درب ضدسرقت مدرن',
            'size' => number_format(filesize('public/Image/Product/serqat-luxury-door.jpeg')/1024,0),
            'galleria_id'=>'3',
            'galleria_type'=>'App\Models\Product\Product',
            'mime'=>'jpeg',
            'path'=>'public/Image/Product/serqat-luxury-door.jpeg',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('galleries')->insert([
            'name'=>'bad-bezani-door',
            'title'=>'درب بادبزنی',
            'size' => number_format(filesize('public/Image/Product/bad-bezani-door.jpeg')/1024,0),
            'galleria_id'=>'4',
            'galleria_type'=>'App\Models\Product\Product',
            'mime'=>'jpeg',
            'path'=>'public/Image/Product/bad-bezani-door.jpeg',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

    }

}
