<?php

namespace App\Http\Controllers\Agent\Location;

use App\Http\Controllers\Agent\AgentController;
use Illuminate\Http\Request;

class AddressController extends AgentController
{
    public function index(Request $request)
    {
        return 0;
    }

    public function create()
    {
        return 'agent.create';
    }

    public function store(Request $request)
    {


        return 'agent.store';
    }
}
