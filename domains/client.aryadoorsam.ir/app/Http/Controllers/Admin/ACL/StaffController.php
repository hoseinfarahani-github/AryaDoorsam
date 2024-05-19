<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Admin\AdminController;
use App\Models\ACL\Permission;
use App\Models\ACL\Role;
use App\Models\Location\Province;
use App\Models\User\User;
use Illuminate\Http\Request;

class StaffController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setTitle('مدیران سایت')
            ->setDescription('پنل مدیریت آریادرسام');
    }

    public function index(Request $request)
    {
        return view('Admin.Client.index',[
            'users'=>$this->PaginatePagez(User::query()
                ->where('super','==','1')
                ->orWhere('staff','==','1')
                ->latest(),$request,['username','email'],[''])
        ]);
    }

    public function permission(User $user)
    {

    }

    public function create()
    {
        return view('Admin.Client.Staff.create',[
            'roles'         =>Role::all(),
            'permissions'    =>Permission::all(),
            'province'      =>Province::all(),
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        dd('show');
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
