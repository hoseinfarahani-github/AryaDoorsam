<?php

namespace App\Http\Controllers\Agent\Setting;

use App\Http\Middleware\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Agent
{
    public function index(Request $request)
    {
        return view('Agent.Setting.index');
    }

    public function change_light()
    {

        if (\session()->get('mode') == 'light') session()->put('mode','dark');
        else session()->put('mode','light');

        return response()->json(array('success'=>true));
    }

}
