<?php

namespace App\Http\Controllers\Factory\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Factory\FactoryController;
use Illuminate\Http\Request;

class SettingController extends FactoryController
{
	 public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setTitle('تنظیمات')
            ->setDescription('پنل کارخانه آریادرسام');
    }
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
        return redirect(route('factory.dashboard.index'));
       }
       else
        {
            return Redirect::back()->withErrors(['password'=>'رمز عبور فعلی به درستی وارد نشده است.']);
        }
    }
}
