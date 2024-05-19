<?php

namespace App\Http\Controllers\Factory\Setting;

use App\Http\Controllers\Factory\FactoryController;
use Illuminate\Http\Request;

class SettingController extends FactoryController
{
    public function index(Request $request)
    {
        return view('Factory.Setting.index');
    }

    public function change_light()
    {

        if (\session()->get('mode') == 'light') session()->put('mode','dark');
        else session()->put('mode','light');

        return response()->json(array('success'=>true));
    }
}
