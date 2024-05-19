<?php

namespace App\Http\Controllers\Factory\Calender;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Factory\FactoryController;
use Illuminate\Http\Request;

class CalenderController extends FactoryController
{
    public function index(Request $request)
    {
        return view('Factory.Calender.index');
    }
}
