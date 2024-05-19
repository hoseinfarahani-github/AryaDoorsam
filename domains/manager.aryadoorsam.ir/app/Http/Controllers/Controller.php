<?php

namespace App\Http\Controllers;

use App\Models\Dictionary\Metakey;
use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View as view;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests,SEOTools;

    public function __construct()
    {
        view::share('site_name',json_decode(Metakey::where('key','site_name')->first()->setting->object));

        view::share('site_description',json_decode(Metakey::where('key','site_description')->first()->setting->object));

    }
}
