<?php

namespace App\Http\Controllers\Manager\Setting;

use App\Http\Controllers\Manager\ManagerController;
use Illuminate\Http\Request;
use App\Http\Middleware\Manager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;

class SettingController extends ManagerController
{

	  public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setTitle('تنظیمات')
            ->setDescription('پنل مدیرعامل آریادرسام');
    }

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

	public function change_password(Request $request)
    {

        $request->validate([
            'current_password' => ['required',],
            'password' => ['required','confirmed'],
        ]);

      if (password_verify($request->current_password,Auth::user()->getAuthPassword()))
      {
        Auth::user()->update([
           'password'=> Hash::make($request->password)
        ]);
          toast('تغییر رمز عبور با موفقیت انجام شد','success');
        return redirect(route('agent.dashboard.index'));
       }
       else
        {
            return Redirect::back()->withErrors(['password'=>'رمز عبور فعلی به درستی وارد نشده است.']);
        }
    }
}
