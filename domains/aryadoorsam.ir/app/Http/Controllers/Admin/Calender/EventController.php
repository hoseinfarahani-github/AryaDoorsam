<?php

namespace App\Http\Controllers\Admin\Calender;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Models\Calender\Event;
use Illuminate\Http\Request;

class EventController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setTitle('تقویم رویدادها')
            ->setDescription('پنل مدیریت آریادرسام');
    }

    public function index(Request $request)
    {
        if ($request->ajax()){
            $data=Event::whereDate('start','>=',$request->start)
                       ->whereDate('end','<=',$request->end)
                       ->get(['id','title','start','end']);
            return response()->json($data);
        }

        return view('Admin.Calender.Event.index');
    }

    public function edit(Request $request)
    {

        //dd($request);

        switch ($request->type){
            case 'add':
                $event=Event::create([
                    'title' =>$request->title,
                    'start' =>$request->start,
                    'end'   =>$request->end
                ]);
                return response()->json($event);

            case 'delete':

               $event= Event::find($request->id)->delete();
                return response()->json($event);

            case 'update':

                $event= Event::find($request->id)->update([
                    'start' => $request->start,
                    'end'   => $request->end
                ]);
                return response()->json($event);

            default:

                #code
                break;

        }
    }
}

