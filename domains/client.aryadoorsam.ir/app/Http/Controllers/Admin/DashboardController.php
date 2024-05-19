<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Calender\Event;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends AdminController
{
    public function __construct()
    {

        parent::__construct();
        $this->seo()
            ->setTitle('پنل مدیریت آریادرسام')
            ->setDescription('پنل مدیریت آریادرسام');
    }
    public function index(Request $request)
    {
        $newEvent=Event::where('start','>=',now()->format('Y-m-d'))->orderBy('start','asc')->get();
        $newUser=User::query()->latest('created_at')->get()->take(5);
        $newUserCount=User::all()->count();

        return view('Admin.Dashboard.index',[
            'newEvents'=>$newEvent,
            'newUsers'=>$newUser,
            'newUserCount'=>$newUserCount
        ]);
    }
}
