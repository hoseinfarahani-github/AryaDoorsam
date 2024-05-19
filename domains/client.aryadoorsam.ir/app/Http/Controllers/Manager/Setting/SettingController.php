<?php

namespace App\Http\Controllers\Manager\Setting;

use App\Http\Controllers\Manager\ManagerController;
use Illuminate\Http\Request;

class SettingController extends ManagerController
{
    public function index(Request $request)
    {
        return view('Manager.Setting.index');
    }

    public function change_light()
    {

        if (\session()->get('mode') == 'light') session()->put('mode','dark');
        else session()->put('mode','light');

        return response()->json(array('success'=>true));
    }
}
