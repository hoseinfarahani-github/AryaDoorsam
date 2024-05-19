<?php

namespace App\Http\Controllers\Manager\Client;

use App\Http\Controllers\Manager\ManagerController;
use App\Models\User\Client;
use Illuminate\Http\Request;

class ClientController extends ManagerController
{

	public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setTitle('مشتریان آریادرسام')
            ->setDescription('پنل مدیرعامل آریادرسام');
    }
    public function index(Request $request)
    {
        return view('Manager.Client.index',[
            'clients'       => Client::all()
        ]);
    }
	
	 public function show(Client $client)
    {

        return view('Manager.Client.show', [
            'client'=>$client,
            'address'=>$client->address
            ]);
    }
}
