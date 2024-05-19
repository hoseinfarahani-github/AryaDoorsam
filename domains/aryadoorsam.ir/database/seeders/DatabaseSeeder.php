<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\ACL\PermissionSeeder;
use Database\Seeders\APV\APVSeeder;
use Database\Seeders\APV\AttributeSeeder;
use Database\Seeders\APV\ValueSeeder;
use Database\Seeders\Brand\BrandSedder;
use Database\Seeders\Gallery\GalleryAvatarSeeder;
use Database\Seeders\Gallery\GalleryCategorySeeder;
use Database\Seeders\Gallery\GalleryProductSeeder;
use Database\Seeders\Location\AddressSeeder;
use Database\Seeders\Product\CategorySeeder;
use Database\Seeders\Product\ProductSeeder;
use Database\Seeders\Settings\MetakeySeeder;
use Database\Seeders\Settings\SettingSeeder;
use Database\Seeders\User\ClientSeeder;
use Database\Seeders\User\UserSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::unprepared(file_get_contents('database/files/country.sql'));
        DB::unprepared(file_get_contents('database/files/province.sql'));
        DB::unprepared(file_get_contents('database/files/counties.sql'));

        $this->call([
            GalleryAvatarSeeder::class,
            AddressSeeder::class,
            UserSeeder::class,
            PermissionSeeder::class,
            SettingSeeder::class,
            MetakeySeeder::class,
            GalleryCategorySeeder::class,
            CategorySeeder::class,
            GalleryProductSeeder::class,
            BrandSedder::class,
            AttributeSeeder::class,
            ValueSeeder::class,
            ProductSeeder::class,
            ClientSeeder::class,
            APVSeeder::class,

        ]);

        // \App\Models\Client::factory(10)->create();

        // \App\Models\Client::factory()->create([
        //     'name' => 'Test Client',
        //     'email' => 'test@example.com',
        // ]);
    }
}
