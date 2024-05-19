<?php

namespace Database\Seeders\APV;

use App\Models\Product\Attribute;
use App\Models\Product\Product;
use App\Models\Product\value;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class APVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attribute_product_value')->insert([
           'attribute_id'   =>  Attribute::whereName('color')->first()->id,
           'value_id'       =>  value::whereName('black')->first()->id,
           'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color')->first()->id,
            'value_id'       =>  value::whereName('grey')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color')->first()->id,
            'value_id'       =>  value::whereName('white')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color')->first()->id,
            'value_id'       =>  value::whereName('brown')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color')->first()->id,
            'value_id'       =>  value::whereName('raw')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('opening_direction')->first()->id,
            'value_id'       =>  value::whereName('left')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('opening_direction')->first()->id,
            'value_id'       =>  value::whereName('right')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('HDF')->first()->id,
            'value_id'       =>  value::whereName('double frame')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('HDF')->first()->id,
            'value_id'       =>  value::whereName('american frame')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('HDF')->first()->id,
            'value_id'       =>  value::whereName('rectangle frame')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('HDF')->first()->id,
            'value_id'       =>  value::whereName('milano frame')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('HDF')->first()->id,
            'value_id'       =>  value::whereName('odesa frame')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('HDF')->first()->id,
            'value_id'       =>  value::whereName('foursome frame')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('HDF')->first()->id,
            'value_id'       =>  value::whereName('rectangle foursome frame')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('HDF')->first()->id,
            'value_id'       =>  value::whereName('mat')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('HDF')->first()->id,
            'value_id'       =>  value::whereName('jam')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('PVC')->first()->id,
            'value_id'       =>  value::whereName('0.2mm')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('PVC')->first()->id,
            'value_id'       =>  value::whereName('0.4mm')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color-material')->first()->id,
            'value_id'       =>  value::whereName('Polyester')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color-material')->first()->id,
            'value_id'       =>  value::whereName('Polyurethane')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color-material')->first()->id,
            'value_id'       =>  value::whereName('polished skin')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('frame')->first()->id,
            'value_id'       =>  value::whereName('13 loghaz')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('frame')->first()->id,
            'value_id'       =>  value::whereName('15 loghaz')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('frame')->first()->id,
            'value_id'       =>  value::whereName('17 loghaz')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('frame')->first()->id,
            'value_id'       =>  value::whereName('19 loghaz')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('local_net')->first()->id,
            'value_id'       =>  value::whereName('honeycom')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('local_net')->first()->id,
            'value_id'       =>  value::whereName('wood')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('local_net')->first()->id,
            'value_id'       =>  value::whereName('fiber')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('local_net')->first()->id,
            'value_id'       =>  value::whereName('Polyurethane foam')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('edge_door')->first()->id,
            'value_id'       =>  value::whereName('PVC Edge')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('edge_door')->first()->id,
            'value_id'       =>  value::whereName('raw')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('edge_door')->first()->id,
            'value_id'       =>  value::whereName('resin')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('edge_door')->first()->id,
            'value_id'       =>  value::whereName('ABS')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('fly_measure')->first()->id,
            'value_id'       =>  value::whereName('has_fly_measure')->first()->id,
            'product_id'     =>  Product::whereName('HDF door')->first()->id
        ]);













        ////////
        ///
        ///
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color')->first()->id,
            'value_id'       =>  value::whereName('black')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color')->first()->id,
            'value_id'       =>  value::whereName('grey')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color')->first()->id,
            'value_id'       =>  value::whereName('white')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color')->first()->id,
            'value_id'       =>  value::whereName('brown')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color')->first()->id,
            'value_id'       =>  value::whereName('raw')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('opening_direction')->first()->id,
            'value_id'       =>  value::whereName('left')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('opening_direction')->first()->id,
            'value_id'       =>  value::whereName('right')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('thickness')->first()->id,
            'value_id'       =>  value::whereName('5mm')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('thickness')->first()->id,
            'value_id'       =>  value::whereName('8mm')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('thickness')->first()->id,
            'value_id'       =>  value::whereName('12mm')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('thickness')->first()->id,
            'value_id'       =>  value::whereName('16mm')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('PVC')->first()->id,
            'value_id'       =>  value::whereName('0.2mm')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('PVC')->first()->id,
            'value_id'       =>  value::whereName('0.4mm')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color-material')->first()->id,
            'value_id'       =>  value::whereName('Polyester')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color-material')->first()->id,
            'value_id'       =>  value::whereName('Polyurethane')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color-material')->first()->id,
            'value_id'       =>  value::whereName('polished skin')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('frame')->first()->id,
            'value_id'       =>  value::whereName('13 loghaz')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('frame')->first()->id,
            'value_id'       =>  value::whereName('15 loghaz')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('frame')->first()->id,
            'value_id'       =>  value::whereName('17 loghaz')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('frame')->first()->id,
            'value_id'       =>  value::whereName('19 loghaz')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('local_net')->first()->id,
            'value_id'       =>  value::whereName('honeycom')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('local_net')->first()->id,
            'value_id'       =>  value::whereName('wood')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('local_net')->first()->id,
            'value_id'       =>  value::whereName('fiber')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('local_net')->first()->id,
            'value_id'       =>  value::whereName('Polyurethane foam')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('edge_door')->first()->id,
            'value_id'       =>  value::whereName('PVC Edge')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('edge_door')->first()->id,
            'value_id'       =>  value::whereName('resin')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('edge_door')->first()->id,
            'value_id'       =>  value::whereName('ABS')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('edge_door')->first()->id,
            'value_id'       =>  value::whereName('raw')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('fly_measure')->first()->id,
            'value_id'       =>  value::whereName('has_fly_measure')->first()->id,
            'product_id'     =>  Product::whereName('MDF door')->first()->id
        ]);
        ///////////////////
        ///
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('material')->first()->id,
            'value_id'       =>  value::whereName('oily paper')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('material')->first()->id,
            'value_id'       =>  value::whereName('galvanized paper')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color')->first()->id,
            'value_id'       =>  value::whereName('white')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color')->first()->id,
            'value_id'       =>  value::whereName('black')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color')->first()->id,
            'value_id'       =>  value::whereName('grey')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color')->first()->id,
            'value_id'       =>  value::whereName('brown')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color')->first()->id,
            'value_id'       =>  value::whereName('raw')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('opening_direction')->first()->id,
            'value_id'       =>  value::whereName('right')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('opening_direction')->first()->id,
            'value_id'       =>  value::whereName('left')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('anti_panic_handle')->first()->id,
            'value_id'       =>  value::whereName('SGS')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('anti_panic_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Black')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('anti_panic_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Silver')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('anti_panic_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Steel')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('anti_panic_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Saro')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('anti_panic_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Assa Abloy')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('back_handle')->first()->id,
            'value_id'       =>  value::whereName('simple')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('back_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Black')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('back_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Silver')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('back_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Steel')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('back_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Saro 1')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('back_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Saro 2')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('door_closer')->first()->id,
            'value_id'       =>  value::whereName('Pramce')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('door_closer')->first()->id,
            'value_id'       =>  value::whereName('Qaeni')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('door_closer')->first()->id,
            'value_id'       =>  value::whereName('Rexel')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('door_threshold')->first()->id,
            'value_id'       =>  value::whereName('with_threshold')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('door_threshold')->first()->id,
            'value_id'       =>  value::whereName('without_threshold')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('door_threshold')->first()->id,
            'value_id'       =>  value::whereName('burial_threshold')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('fly_measure')->first()->id,
            'value_id'       =>  value::whereName('has_fly_measure')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('fly_measure')->first()->id,
            'value_id'       =>  value::whereName('hasnot_fly_measure')->first()->id,
            'product_id'     =>  Product::whereName('single fire door')->first()->id
        ]);
//////////////////////////////
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('material')->first()->id,
            'value_id'       =>  value::whereName('oily paper')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('material')->first()->id,
            'value_id'       =>  value::whereName('galvanized paper')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color')->first()->id,
            'value_id'       =>  value::whereName('white')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color')->first()->id,
            'value_id'       =>  value::whereName('black')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color')->first()->id,
            'value_id'       =>  value::whereName('grey')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color')->first()->id,
            'value_id'       =>  value::whereName('brown')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color')->first()->id,
            'value_id'       =>  value::whereName('raw')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('opening_direction')->first()->id,
            'value_id'       =>  value::whereName('right')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('opening_direction')->first()->id,
            'value_id'       =>  value::whereName('left')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('anti_panic_handle')->first()->id,
            'value_id'       =>  value::whereName('SGS')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('anti_panic_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Black')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('anti_panic_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Silver')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('anti_panic_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Steel')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('anti_panic_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Saro')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('anti_panic_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Assa Abloy')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('back_handle')->first()->id,
            'value_id'       =>  value::whereName('simple')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('back_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Black')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('back_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Silver')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('back_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Steel')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('back_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Saro 1')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('back_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Saro 2')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('door_closer')->first()->id,
            'value_id'       =>  value::whereName('Pramce')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('door_closer')->first()->id,
            'value_id'       =>  value::whereName('Qaeni')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('door_closer')->first()->id,
            'value_id'       =>  value::whereName('Rexel')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('door_threshold')->first()->id,
            'value_id'       =>  value::whereName('with_threshold')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('door_threshold')->first()->id,
            'value_id'       =>  value::whereName('without_threshold')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('door_threshold')->first()->id,
            'value_id'       =>  value::whereName('burial_threshold')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('fly_measure')->first()->id,
            'value_id'       =>  value::whereName('has_fly_measure')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('fly_measure')->first()->id,
            'value_id'       =>  value::whereName('hasnot_fly_measure')->first()->id,
            'product_id'     =>  Product::whereName('double fire door')->first()->id
        ]);
///////////////////////
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('material')->first()->id,
            'value_id'       =>  value::whereName('oily paper')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('material')->first()->id,
            'value_id'       =>  value::whereName('galvanized paper')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color')->first()->id,
            'value_id'       =>  value::whereName('white')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color')->first()->id,
            'value_id'       =>  value::whereName('black')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color')->first()->id,
            'value_id'       =>  value::whereName('grey')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color')->first()->id,
            'value_id'       =>  value::whereName('brown')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('color')->first()->id,
            'value_id'       =>  value::whereName('raw')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('opening_direction')->first()->id,
            'value_id'       =>  value::whereName('right')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('opening_direction')->first()->id,
            'value_id'       =>  value::whereName('left')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('anti_panic_handle')->first()->id,
            'value_id'       =>  value::whereName('SGS')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('anti_panic_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Black')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('anti_panic_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Silver')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('anti_panic_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Steel')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('anti_panic_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Saro')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('anti_panic_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Assa Abloy')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('back_handle')->first()->id,
            'value_id'       =>  value::whereName('simple')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('back_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Black')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('back_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Silver')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('back_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Steel')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('back_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Saro 1')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('back_handle')->first()->id,
            'value_id'       =>  value::whereName('HTN Prime Saro 2')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('door_closer')->first()->id,
            'value_id'       =>  value::whereName('Pramce')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('door_closer')->first()->id,
            'value_id'       =>  value::whereName('Qaeni')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('door_closer')->first()->id,
            'value_id'       =>  value::whereName('Rexel')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);

        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('door_threshold')->first()->id,
            'value_id'       =>  value::whereName('with_threshold')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('door_threshold')->first()->id,
            'value_id'       =>  value::whereName('without_threshold')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('door_threshold')->first()->id,
            'value_id'       =>  value::whereName('burial_threshold')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('fly_measure')->first()->id,
            'value_id'       =>  value::whereName('has_fly_measure')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);
        DB::table('attribute_product_value')->insert([
            'attribute_id'   =>  Attribute::whereName('fly_measure')->first()->id,
            'value_id'       =>  value::whereName('hasnot_fly_measure')->first()->id,
            'product_id'     =>  Product::whereName('data center door')->first()->id
        ]);
    }
}
