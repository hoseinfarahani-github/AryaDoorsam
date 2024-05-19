<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Artesaos\SEOTools\Traits\SEOTools;

class DashboardController extends ClientController
{
    use  SEOTools;
    public function index(Request $request)
    {
        $this->seo()
        ->setTitle('پنل کاربری آریادرسام')
        ->setDescription('پنل کاربری آریادرسام');
        return view('Client.Dashboard.index');
    }
}
