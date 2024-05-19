<?php

namespace App\Http\Controllers\Manager\Client;

use App\Http\Controllers\Manager\ManagerController;
use App\Models\User\Client;
use Illuminate\Http\Request;

class ClientController extends ManagerController
{
    public function index(Request $request)
    {
        return view('Manager.Client.index',[
            'clients'       => Client::all()
        ]);
    }
}
