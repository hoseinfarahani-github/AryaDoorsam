<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Admin\AdminController;
use App\Models\User\User;
use Illuminate\Http\Request;

class Usercontroller extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setTitle('کاربران')
            ->setDescription('پنل مدیریت آریادرسام');
    }

    public function index(Request $request)
    {
        return view('Admin.Client.index',[
            'users'=>$this->PaginatePagez(User::query()->latest(),$request,['username','email'],[''])
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        dd('show user');
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
