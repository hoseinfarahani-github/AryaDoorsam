<?php

namespace App\Http\Controllers\Manager\Agent;

use App\Http\Controllers\Manager\ManagerController;
use App\Models\User\Agent;
use Illuminate\Http\Request;

class AgentController extends ManagerController
{
public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setTitle('نمایندگان')
            ->setDescription('پنل مدیریت آریادرسام');
    }
	
    public function index(Request $request)
    {
        return view('Manager.Agent.index',[
            'agents'        =>Agent::all()
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

    public function update(Agent $agent,Request $request)
    {
        //
    }

    public function destroy(Agent $agent)
    {
        //
    }
}
