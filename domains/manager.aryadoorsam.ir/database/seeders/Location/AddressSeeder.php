<?php

namespace Database\Seeders\Location;

use App\Models\Location\County;
use App\Models\Location\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('addresses')->insert([
            'province_id'       => Province::whereTitle('تهران')->first()->id,
            'county_id'         => County::whereTitle('تهران')->first()->id,
            'postal_code'       => '0123456789',
            'detail'            => ' کوچه پس کوچه های میلانو',
            'phone'             =>'+989309447576',
            'addressable_type'  => 'App\Models\User\User',
            'addressable_id'    => '1',
            'created_at'        => now(),
            'updated_at'        => now()
        ]);
        DB::table('addresses')->insert([
            'province_id'       => Province::whereTitle('یزد')->first()->id,
            'county_id'         => County::whereTitle('یزد')->first()->id,
            'postal_code'       => '0123456789',
            'detail'            => 'تهران، قیطریه، نبش کوچه تواضعی، پلاک 1، واحد 4',
            'phone'             =>'+9892122395391',
            'addressable_type'  => 'App\Models\User\User',
            'addressable_id'    => '2',
            'created_at'        => now(),
            'updated_at'        => now()
        ]);
    }
}
