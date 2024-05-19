<?php

namespace App\Http\Controllers\Manager\Report;

use App\Http\Controllers\Manager\ManagerController;
use App\Models\Order\Order;
use App\Models\Order\OrderStatus;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;

class ReportController extends ManagerController
{

    public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setTitle('گزارش ها آریادرسام')
            ->setDescription('پنل مدیرعامل آریادرسام');
    }

    public function index(Request $request)
    {
        return view('Manager.Report.index');
    }

    public function set(Request $request)
    {
        if($request->selectedValue == 'order') $this->order($request);
    }

    public function getPeriodCarbon(string $start_at,string $end_at)
    {
        $start_at=explode('/',$start_at);
        $start_at=(new Jalalian($start_at[2],$start_at[1],$start_at[0]))->toCarbon();

        $end_at=explode('/',$end_at);
        $end_at=(new Jalalian($end_at[2],$end_at[1],$end_at[0]))->toCarbon();

        return CarbonPeriod::create($start_at,$end_at);
    }

    public function order(Request $request)
    {

        foreach (OrderStatus::all() as $os){
            dd($os);
            $date=explode(' ',$os->created_at)[0];
            $time=explode(' ',$os->created_at)[1];
            $date=explode('-',$date);
            $time=explode(':',$time);
            $new_time=(new Jalalian($date[0],$date[1],$date[2],$time[0],$time[1],$time[2]))->toCarbon();
            DB::table('order_status_log')->where('order_id',$os->order_id)->where('status',$os->status)->update(['created_at'=>$new_time]);

        }
    }
}
