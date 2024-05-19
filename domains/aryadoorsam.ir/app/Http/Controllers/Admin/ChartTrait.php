<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order\Order;

trait ChartTrait
{

    public function report_pie_chart_agent(): array
    {
        $report_pie_chart_agent['معلق در حال اضافه کردن محصول'] = Order::query()->whereIn('status', [
            'create-order-step-1',
            'create-order-step-2'
        ])->count();

        $report_pie_chart_agent['معلق در حال نوشتن توضیحات'] = Order::query()->whereIn('status', [
            'create-order-step3'
        ])->count();

        $report_pie_chart_agent['تکمیل شده'] = Order::query()->whereIn('status', [
            'sent-order-agent'
        ])->count();

        return $report_pie_chart_agent;
    }

    public function report_pie_chart_manager(): array
    {
        $report_pie_chart_manager['بررسی نشده'] = Order::query()
            ->where('status', '=', 'sent-order-agent')->count();
        $report_pie_chart_manager['در حال بررسی'] = Order::query()
            ->where('status', '=', 'pending-order-CEO')->count();
        $report_pie_chart_manager['تایید شده'] = Order::query()
            ->where('status', '=', 'approved-order-CEO')->count();
        $report_pie_chart_manager['رد شده'] = Order::query()
            ->where('status', '=', 'reject-order-CEO')->count();

        return $report_pie_chart_manager;
    }

    public function report_pie_chart_factory(): array
    {
        $report_pie_chart_factory['بررسی نشده'] = Order::query()
            ->where('status', '=', 'approved-order-CEO')->count();
        $report_pie_chart_factory['در حال بررسی'] = Order::query()
            ->where('status', '=', 'pending-order-factory')->count();
        $report_pie_chart_factory['خم کاری']=Order::query()
            ->where('status','=','approved-order-factory')->count();
        $report_pie_chart_factory['جوش کاری']=Order::query()
            ->where('status','=','bending-order-factory')->count();
        $report_pie_chart_factory['رنگ آمیزی']=Order::query()
            ->where('status','=','welding-order-factory')->count();
        $report_pie_chart_factory['بسته بندی']=Order::query()
            ->where('status','=','coloring-order-factory')->count();
        $report_pie_chart_factory['در حال ارسال']=Order::query()
            ->where('status','=','packing-order-factory')->count();
        $report_pie_chart_factory['تمام شده']=Order::query()
            ->where('status','=','sent-order-factory')->count();

        return $report_pie_chart_factory;
    }

}
