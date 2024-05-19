<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Dictionary\Metakey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as view;

class AgentController extends Controller
{
    public function query(): array
    {
        return \request()->query();
    }

    public function paginatePages($object)
    {

    }

    public function SortByColumn($object)
    {
   //  dd($this->query()['sort']);


        if(array_key_exists('sort',$this->query())){
            if($this->query()['sort']['order_by'] == 'ascending')return $object->oldest($this->query()['sort']['sort_by']);
            else if($this->query()['sort']['order_by'] == 'descending')return $object->latest($this->query()['sort']['sort_by']);

        }

        else return $object;
    }

}
