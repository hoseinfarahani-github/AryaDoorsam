<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Admin\AdminController;
use App\Models\ACL\Role;
use Illuminate\Http\Request;

class RoleController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setTitle('مقام ها')
            ->setDescription('پنل مدیریت آریادرسام');
    }

    public function index(Request $request)

    {
        return view('Admin.ACL.Role.index',['roles'=>$this->PaginatePagez(Role::query()->latest(),$request,['title','name'],[''])]);
    }

    public function show(Role $role)
    {

    }

    public function store(Request $request)
    {
        $validated=$request->validate([
           'name'   =>'required',
           'title'  =>'required',
        ]);
        Role::query()->create([
            'name'=>$validated['name'],
            'title'=>$validated['title']
        ]);

        return redirect(route('admin.role.index'));


    }

    public function destroy(Role $role)
    {

    }

    public function update(Role $role,Request $request)
    {

    }
}
