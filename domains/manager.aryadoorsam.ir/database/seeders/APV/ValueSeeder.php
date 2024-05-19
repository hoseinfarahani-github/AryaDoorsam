<?php

namespace Database\Seeders\APV;

use App\Models\Product\Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   //Material
        DB::table('values')->insert([
            'name'          =>'oily paper',
            'title'         =>'ورق روغنی',
            'attribute_id'  =>'1',
        ]);
        DB::table('values')->insert([
            'name'          =>'galvanized paper',
            'title'         =>'ورق گالوانیزه',
            'attribute_id'  =>'1',
        ]);
        //Color
        DB::table('values')->insert([
            'name'          =>'white',
            'title'         =>'سفید',
            'attribute_id'  =>'2',
        ]);
        DB::table('values')->insert([
            'name'          =>'black',
            'title'         =>'مشکی',
            'attribute_id'  =>'2',
        ]);
        DB::table('values')->insert([
            'name'          =>'grey',
            'title'         =>'خاکستری',
            'attribute_id'  =>'2',
        ]);
        DB::table('values')->insert([
            'name'          =>'brown',
            'title'         =>'قهوه ای',
            'attribute_id'  =>'2',
        ]);
        DB::table('values')->insert([
            'name'          =>'raw',
            'title'         =>'خام',
            'attribute_id'  =>'2',
        ]);
        //Opening_direction
        DB::table('values')->insert([
            'name'          =>'right',
            'title'         =>'راست',
            'attribute_id'  =>'3',
        ]);
        DB::table('values')->insert([
            'name'          =>'left',
            'title'         =>'چپ',
            'attribute_id'  =>'3',
        ]);
        //anti_panic_handle
        DB::table('values')->insert([
            'name'          =>'SGS',
            'title'         =>'SGS',
            'attribute_id'  =>'4',
        ]);
        DB::table('values')->insert([
            'name'          =>'HTN Prime Black',
            'title'          =>'HTN Prime Black',
            'attribute_id'  =>'4',
        ]);
        DB::table('values')->insert([
            'name'          =>'HTN Prime Silver',
            'title'          =>'HTN Prime Silver',
            'attribute_id'  =>'4',
        ]);
        DB::table('values')->insert([
            'name'          =>'HTN Prime Steel',
            'title'          =>'HTN Prime Steel',
            'attribute_id'  =>'4',
        ]);
        DB::table('values')->insert([
            'name'          =>'HTN Prime Saro',
            'title'          =>'HTN Prime Saro',
            'attribute_id'  =>'4',
        ]);
        DB::table('values')->insert([
            'name'          =>'HTN Prime Assa Abloy',
            'title'          =>'HTN Prime Assa Abloy',
            'attribute_id'  =>'4',
        ]);
        //Back_handle
        DB::table('values')->insert([
            'name'          =>'simple',
            'title'         =>'ساده',
            'attribute_id'  =>'5',
        ]);
        DB::table('values')->insert([
            'name'          =>'HTN Prime Black',
            'title'          =>'HTN Prime Black',
            'attribute_id'  =>'5',
        ]);
        DB::table('values')->insert([
            'name'          =>'HTN Prime Silver',
            'title'          =>'HTN Prime Silver',
            'attribute_id'  =>'5',
        ]);
        DB::table('values')->insert([
            'name'          =>'HTN Prime Steel',
            'title'          =>'HTN Prime Steel',
            'attribute_id'  =>'5',
        ]);
        DB::table('values')->insert([
            'name'          =>'HTN Prime Saro 1',
            'title'          =>'HTN Prime Saro 1',
            'attribute_id'  =>'5',
        ]);
        DB::table('values')->insert([
            'name'          =>'HTN Prime Saro 2',
            'title'          =>'HTN Prime Saro 2',
            'attribute_id'  =>'5',
        ]);
        //door_closer
        DB::table('values')->insert([
            'name'          =>'Pramce',
            'title'          =>'Pramce',
            'attribute_id'  =>'6',
        ]);
        DB::table('values')->insert([
            'name'          =>'Qaeni',
            'title'          =>'Qaeni',
            'attribute_id'  =>'6',
        ]);
        DB::table('values')->insert([
            'name'          =>'Rexel',
            'title'          =>'Rexel',
            'attribute_id'  =>'6',
        ]);
        //Door_threshold
        DB::table('values')->insert([
            'name'          =>'with_threshold',
            'title'          =>'با آستانه',
            'attribute_id'  =>'7',
        ]);
        DB::table('values')->insert([
            'name'          =>'without_threshold',
            'title'          =>'بی آستانه',
            'attribute_id'  =>'7',
        ]);
        DB::table('values')->insert([
            'name'          =>'burial_threshold',
            'title'          =>'دفنی',
            'attribute_id'  =>'7',
        ]);

        DB::table('values')->insert([
            'name'          =>'5mm',
            'title'          =>'5میلیمتر',
            'attribute_id'  =>'8',
        ]);
        DB::table('values')->insert([
            'name'          =>'8mm',
            'title'          =>'8میلیمتر',
            'attribute_id'  =>'8',
        ]);
        DB::table('values')->insert([
            'name'          =>'12mm',
            'title'          =>'12میلیمتر',
            'attribute_id'  =>'8',
        ]);
        DB::table('values')->insert([
            'name'          =>'16mm',
            'title'          =>'16میلیمتر',
            'attribute_id'  =>'8',
        ]);

        DB::table('values')->insert([
            'name'          =>'single frame',
            'title'          =>'تک قاب',
            'attribute_id'  =>'9',
        ]);
        DB::table('values')->insert([
            'name'          =>'double frame',
            'title'          =>'دو قاب',
            'attribute_id'  =>'9',
        ]);
        DB::table('values')->insert([
            'name'          =>'american frame',
            'title'          =>'قاب آمریکایی',
            'attribute_id'  =>'9',
        ]);
        DB::table('values')->insert([
            'name'          =>'rectangle frame',
            'title'          =>'قاب مستطیلی',
            'attribute_id'  =>'9',
        ]);
        DB::table('values')->insert([
            'name'          =>'milano frame',
            'title'          =>'میلانو',
            'attribute_id'  =>'9',
        ]);
        DB::table('values')->insert([
            'name'          =>'odesa frame',
            'title'          =>'ادسا',
            'attribute_id'  =>'9',
        ]);
        DB::table('values')->insert([
            'name'          =>'foursome frame',
            'title'          =>'چهار قاب',
            'attribute_id'  =>'9',
        ]);
        DB::table('values')->insert([
            'name'          =>'rectangle foursome frame',
            'title'          =>'چهار قاب مستطیلی',
            'attribute_id'  =>'9',
        ]);
        DB::table('values')->insert([
            'name'          =>'mat',
            'title'          =>'حصیری',
            'attribute_id'  =>'9',
        ]);
        DB::table('values')->insert([
            'name'          =>'jam',
            'title'          =>'جام',
            'attribute_id'  =>'9',
        ]);

        DB::table('values')->insert([
            'name'          =>'0.2mm',
            'title'          =>'0.2میلی متر',
            'attribute_id'  =>'10',
        ]);
        DB::table('values')->insert([
            'name'          =>'0.4mm',
            'title'          =>'0.4میلی متر',
            'attribute_id'  =>'10',
        ]);

        DB::table('values')->insert([
            'name'          =>'Polyester',
            'title'          =>'پلی استر',
            'attribute_id'  =>'11',
        ]);
        DB::table('values')->insert([
            'name'          =>'Polyurethane',
            'title'          =>'پلی اورتان',
            'attribute_id'  =>'11',
        ]);
        DB::table('values')->insert([
            'name'          =>'polished skin',
            'title'          =>'پوست پلیش',
            'attribute_id'  =>'11',
        ]);

        DB::table('values')->insert([
            'name'          =>'13 loghaz',
            'title'          =>'13 لغاز',
            'attribute_id'  =>'12',
        ]);
        DB::table('values')->insert([
            'name'          =>'15 loghaz',
            'title'          =>'15 لغاز',
            'attribute_id'  =>'12',
        ]);
        DB::table('values')->insert([
            'name'          =>'17 loghaz',
            'title'          =>'17 لغاز',
            'attribute_id'  =>'12',
        ]);
        DB::table('values')->insert([
            'name'          =>'19 loghaz',
            'title'          =>'19 لغاز',
            'attribute_id'  =>'12',
        ]);

        DB::table('values')->insert([
            'name'          =>'honeycom',
            'title'          =>'هانیکام',
            'attribute_id'  =>'13',
        ]);
        DB::table('values')->insert([
            'name'          =>'wood',
            'title'          =>'چوب',
            'attribute_id'  =>'13',
        ]);
        DB::table('values')->insert([
            'name'          =>'fiber',
            'title'          =>'فیبر',
            'attribute_id'  =>'13',
        ]);
        DB::table('values')->insert([
            'name'          =>'Polyurethane foam',
            'title'          =>'فوم پلی اورتان',
            'attribute_id'  =>'13',
        ]);

        DB::table('values')->insert([
            'name'          =>'PVC Edge',
            'title'          =>'لبه PVC',
            'attribute_id'  =>'14',
        ]);
        DB::table('values')->insert([
            'name'          =>'resin',
            'title'          =>'رزین',
            'attribute_id'  =>'14',
        ]);
        DB::table('values')->insert([
            'name'          =>'ABS',
            'title'          =>'ABS',
            'attribute_id'  =>'14',
        ]);
        DB::table('values')->insert([
            'name'          =>'raw',
            'title'          =>'خام',
            'attribute_id'  =>'14',
        ]);
        DB::table('values')->insert([
            'name'          =>'has_fly_measure',
            'title'          =>'دارد',
            'attribute_id'  =>'15',
        ]);
        DB::table('values')->insert([
            'name'          =>'hasnot_fly_measure',
            'title'          =>'ندارد',
            'attribute_id'  =>'15',
        ]);
    }
}
