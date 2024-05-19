<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\User\Certificate;
use App\Models\User\Position;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {

        $array=[
            'email'=>'erfanwmb@gmail.com',
            'mobile'=>'+989309447576'
        ];
//



        $postions=Position::all();
        $crtification=Certificate::all();
        return view('Site.Staff.index',compact(
            'postions',
          'crtification'
        ));
    }
}
