<?php

namespace App\Http\Controllers\Factory\Calender;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Factory\FactoryController;
use Illuminate\Http\Request;

class CalenderController extends FactoryController
{
	 public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setTitle('تایم لاین')
            ->setDescription('پنل کارخانه آریادرسام');
    }
    public function index(Request $request)
    {
        return view('Factory.Calender.index');
    }
}
