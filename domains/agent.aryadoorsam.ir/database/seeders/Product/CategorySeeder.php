<?php

namespace Database\Seeders\Product;

use App\Models\Gallery\Gallery;
use App\Models\Product\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name'=>'Darb Hariq',
            'title'=>'درب ضد حریق',
            'abstract'=>'',
            'description'=>'',
            'gallery_id'=>Gallery::whereName('Darb Hariq icon')->first()->id,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        DB::table('categories')->insert([
            'name'=>'Darb Serqat',
            'title'=>'درب ضد سرقت',
            'abstract'=>'',
            'description'=>'',
            'gallery_id'=>Gallery::whereName('Darb Serqat icon')->first()->id,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        DB::table('categories')->insert([
            'name'=>'Darb Dakheli',
            'title'=>'درب داخلی',
            'abstract'=>'',
            'description'=>'',
            'gallery_id'=>Gallery::whereName('Darb Dakheli icon')->first()->id,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        DB::table('categories')->insert([
            'name'=>'Darb Lobby',
            'title'=>'درب لابی',
            'abstract'=>'',
            'description'=>'',
            'gallery_id'=>Gallery::whereName('Darb Lobby icon')->first()->id,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        DB::table('categories')->insert([
            'name'=>'Cabinet',
            'title'=>'کابینت و کمد دیواری',
            'abstract'=>'',
            'description'=>'',
            'gallery_id'=>Gallery::whereName('Cabinet')->first()->id,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
