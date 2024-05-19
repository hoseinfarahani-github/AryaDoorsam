<?php

namespace Database\Seeders\Brand;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert([
            'name'=>'Aryadoorsom',
            'title'=>'آریادرسام',
            'description'=>'best door in Iran',
        ]);
    }
}
