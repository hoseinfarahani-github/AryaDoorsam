<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Admin\AdminController;
use App\Models\ACL\Permission;
use Illuminate\Http\Request;

class PermissionController extends AdminController
{

    public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setTitle('دسترسی ها')
            ->setDescription('پنل مدیریت آریادرسام');
    }

    public function index(Request $request)

    {
        return view('Admin.ACL.Permission.index',['permissions'=>$this->PaginatePagez(Permission::query()->latest(),$request,['title','name'],[''])]);
    }

    public function show(Permission $permission)
    {

    }

    public function store(Request $request)
    {

    }

    public function destroy(Permission $permission)
    {

    }

    public function update(Permission $permission,Request $request)
    {

    }
}
