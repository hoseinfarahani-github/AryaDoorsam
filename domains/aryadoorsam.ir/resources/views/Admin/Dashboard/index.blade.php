


@section('content')
        <input    disabled hidden="hidden" id="report_pie_chart_agent" value="{{$report_pie_chart_agent}}">
        <input    disabled hidden="hidden" id="report_pie_chart_manager" value="{{$report_pie_chart_manager}}">
        <input    disabled hidden="hidden" id="report_pie_chart_factory" value="{{$report_pie_chart_factory}}">
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        گزارش عمومی سایت
                    </h2>
                    <a href="" class="mr-auto flex text-theme-1"> <i data-feather="refresh-ccw" class="w-4 h-4 ml-3"></i> بارگزاری مجدد </a>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="tool" class="report-box__icon "></i>
                                    <div class="mr-auto">
                                        <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="33% Higher than last month"> 33% <i data-feather="chevron-up" class="w-4 h-4"></i> </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">{{$newOrderDetailCount}}</div>
                                <div class="text-base text-gray-600 mt-1">محصولات در حال تولید</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                                    <div class="mr-auto">
                                        <div class="report-box__indicator bg-theme-6 tooltip cursor-pointer" title="2% Lower than last month"> 2% <i data-feather="chevron-down" class="w-4 h-4"></i> </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">{{$newOrderCount}}</div>
                                <div class="text-base text-gray-600 mt-1">تعداد سفارش ها</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="users" class="report-box__icon text-theme-12"></i>
                                    <div class="mr-auto">
                                        <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="12% Higher than last month"> 12% <i data-feather="chevron-up" class="w-4 h-4"></i> </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">{{$newUserCount}}</div>
                                <div class="text-base text-gray-600 mt-1">تعداد کاربران سایت</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="user" class="report-box__icon text-theme-9"></i>
                                    <div class="mr-auto">
                                        <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="22% Higher than last month"> 22% <i data-feather="chevron-up" class="w-4 h-4"></i> </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">{{$newClientCount}}</div>
                                <div class="text-base text-gray-600 mt-1">تعداد مشتریان</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: General Report -->

            <!-- BEGIN: Factory Status -->
            <div class="col-span-12 sm:col-span-6 lg:col-span-4 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        <div class="flex items-center justify-center ">
                            <i data-feather="tool" class="w-5 h-5 ml-1"></i>
                             سفارش های کارخانه
                        </div>

                    </h2>
                    <a href="" class="mr-auto text-theme-1 truncate">نمایش بیشتر</a>
                </div>
                <div class="intro-y box p-5 mt-5">
                    <canvas class="mt-3" id="report-pie-chart-factory" height="280"></canvas>
                    <div class="mt-8">
                        <?php $color_factory=["#FF8B26", "#FFC533", "#285FD3",'#dc85ff','#ff4000','#0095a6','#9500ff','#474c4f']; ?>
                        @foreach(json_decode($report_pie_chart_factory) as $key=>$value)
                            @if($value !=0)
                            <div class="flex items-center">
                                <div class="w-2 h-2  rounded-full mr-3  " style="background-color: {{$color_factory[$loop->index]}}"></div>
                                <span class="truncate"> : {{$key}} </span>
                                <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                                <span class="font-medium xl:ml-auto">{{$value}}</span>
                            </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
            <!-- END: Factory Status -->

            <!-- BEGIN: Manager Status -->
            <div class="col-span-12 sm:col-span-6 lg:col-span-4 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        <div class="flex items-center justify-center ">
                            <i data-feather="smile" class="w-5 h-5 ml-1"></i>
                            سفارش های مدیرعامل
                        </div>

                    </h2>
                    <a href="" class="mr-auto text-theme-1 truncate">نمایش بیشتر</a>
                </div>
                <div class="intro-y box p-5 mt-5">
                    <canvas class="mt-3" id="report-pie-chart-manager" height="280"></canvas>
                    <div class="mt-8">
                        <?php $color_manager=["#FF8B26", "#FFC533", "#285FD3","#9500ff"]; ?>
                        @foreach(json_decode($report_pie_chart_manager) as $key=>$value)
                            @if($value !=0)
                                <div class="flex items-center">
                                    <div class="w-2 h-2  rounded-full mr-3 " style="background-color: {{$color_factory[$loop->index]}}"></div>
                                    <span class="truncate"> : {{$key}} </span>
                                    <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                                    <span class="font-medium xl:ml-auto">{{$value}}</span>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- END: Manager Status -->

            <!-- BEGIN: Agent Status -->
            <div class="col-span-12 sm:col-span-6 lg:col-span-4 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        <div class="flex items-center justify-center ">
                            <i data-feather="users" class="w-5 h-5 ml-1"></i>
                            سفارش های نماینده ها
                        </div>

                    </h2>
                    <a href="" class="mr-auto text-theme-1 truncate">نمایش بیشتر</a>
                </div>
                <div class="intro-y box p-5 mt-5">
                    <canvas class="mt-3" id="report-pie-chart-agent" height="280"></canvas>
                    <div class="mt-8">
                        <?php $color_manager=["#FF8B26", "#FFC533", "#285FD3"]; ?>

                        @foreach(json_decode($report_pie_chart_agent) as $key=>$value)
                            @if($value !=0)
                                <div class="flex items-center">
                                    <div class="w-2 h-2  rounded-full mr-3 " style="background-color: {{$color_factory[$loop->index]}}"></div>
                                    <span class="truncate"> : {{$key}} </span>
                                    <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                                    <span class="font-medium xl:ml-auto">{{$value}}</span>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- END: Agent Status -->

            <!-- BEGIN: Official Store -->
            <div class="col-span-12 xl:col-span-8 mt-6">
                <div class="intro-y block sm:flex-reverse items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Official Store
                    </h2>
                    <div class="sm:mr-auto mt-3 sm:mt-0 relative text-gray-700">
                        <i data-feather="map-pin" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                        <input type="text" class="input w-full sm:w-40 box pl-10" placeholder="Filter by city">
                    </div>
                </div>
                <div class="intro-y box p-5 mt-12 sm:mt-5">
                    <div>250 Official stores in 21 countries, click the marker to see location details.</div>
                    <div class="report-maps mt-5 bg-gray-200 rounded-md" data-center="-6.2425342, 106.8626478" data-sources="//Admin/json/location.json"></div>
                </div>
            </div>
            <!-- END: Official Store -->

            <!-- BEGIN: Weekly Best Sellers -->
            <div class="col-span-12 xl:col-span-4 mt-6">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        پرفروش ترین محصولات هفته
                    </h2>
                </div>
                <div class="mt-5">
                    <div class="intro-y">
                        <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                            <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                <img alt="Midone Tailwind HTML Admin Template" src="/Admin/images/profile-14.jpg">
                            </div>
                            <div class="mr-4 ml-auto">
                                <div class="font-medium">Leonardo DiCaprio</div>
                                <div class="text-gray-600 text-xs">6 August 2022</div>
                            </div>
                            <div class="py-1 px-2 rounded-full text-xs bg-theme-9 text-white cursor-pointer font-medium">137 Sales</div>
                        </div>
                    </div>
                    <div class="intro-y">
                        <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                            <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                <img alt="Midone Tailwind HTML Admin Template" src="/Admin/images/profile-10.jpg">
                            </div>
                            <div class="mr-4 ml-auto">
                                <div class="font-medium">Tom Cruise</div>
                                <div class="text-gray-600 text-xs">21 July 2020</div>
                            </div>
                            <div class="py-1 px-2 rounded-full text-xs bg-theme-9 text-white cursor-pointer font-medium">137 Sales</div>
                        </div>
                    </div>
                    <div class="intro-y">
                        <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                            <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                <img alt="Midone Tailwind HTML Admin Template" src="/Admin/images/profile-12.jpg">
                            </div>
                            <div class="mr-4 ml-auto">
                                <div class="font-medium">Al Pacino</div>
                                <div class="text-gray-600 text-xs">5 January 2021</div>
                            </div>
                            <div class="py-1 px-2 rounded-full text-xs bg-theme-9 text-white cursor-pointer font-medium">137 Sales</div>
                        </div>
                    </div>
                    <div class="intro-y">
                        <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                            <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                <img alt="Midone Tailwind HTML Admin Template" src="/Admin/images/profile-6.jpg">
                            </div>
                            <div class="mr-4 ml-auto">
                                <div class="font-medium">Russell Crowe</div>
                                <div class="text-gray-600 text-xs">22 April 2020</div>
                            </div>
                            <div class="py-1 px-2 rounded-full text-xs bg-theme-9 text-white cursor-pointer font-medium">137 Sales</div>
                        </div>
                    </div>
                    <a href="" class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-theme-15 text-theme-16">نمایش بیشتر</a>
                </div>
            </div>
            <!-- END: Weekly Best Sellers -->
            <!-- BEGIN: General Report -->
            <div class="col-span-12 grid grid-cols-12 gap-6 mt-8">
                <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                    <div class="mini-report-chart box p-5 zoom-in">
                        <div class="flex items-center">
                            <div class="w-2/4 flex-none">
                                <div class="text-lg font-medium truncate">Target Sales</div>
                                <div class="text-gray-600 mt-1">300 Sales</div>
                            </div>
                            <div class="flex-none mr-auto relative">
                                <canvas id="report-donut-chart-1" width="90" height="90"></canvas>
                                <div class="font-medium absolute w-full h-full flex items-center justify-center top-0 left-0">20%</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                    <div class="mini-report-chart box p-5 zoom-in">
                        <div class="flex">
                            <div class="text-lg font-medium truncate mr-3">Social Media</div>
                            <div class="py-1 px-2 rounded-full text-xs bg-gray-200 text-gray-600 cursor-pointer mr-auto truncate">320 Followers</div>
                        </div>
                        <div class="mt-4">
                            <canvas class="simple-line-chart-1 -ml-1" height="60"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                    <div class="mini-report-chart box p-5 zoom-in">
                        <div class="flex items-center">
                            <div class="w-2/4 flex-none">
                                <div class="text-lg font-medium truncate">New Products</div>
                                <div class="text-gray-600 mt-1">1450 Products</div>
                            </div>
                            <div class="flex-none mr-auto relative">
                                <canvas id="report-donut-chart-2" width="90" height="90"></canvas>
                                <div class="font-medium absolute w-full h-full flex items-center justify-center top-0 left-0">45%</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                    <div class="mini-report-chart box p-5 zoom-in">
                        <div class="flex">
                            <div class="text-lg font-medium truncate mr-3">Posted Ads</div>
                            <div class="py-1 px-2 rounded-full text-xs bg-gray-200 text-gray-600 cursor-pointer mr-auto truncate">180 Campaign</div>
                        </div>
                        <div class="mt-4">
                            <canvas class="simple-line-chart-1 -ml-1" height="60"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: General Report -->
            <!-- BEGIN: Weekly Top Seller -->

            <div class="col-span-12 mt-6 ">
                <div class="intro-y block sm:flex items-center h-10 rtl">
                    <h2 class="text-lg font-medium truncate mr-5">
                        آخرین سفارشات
                    </h2>
                    <div class="flex items-center sm:mr-auto mt-3 sm:mt-0">
                        <button class="button box flex items-center text-gray-700"> <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel </button>
                        <button class="ml-3 button box flex items-center text-gray-700"> <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to PDF </button>
                    </div>
                </div>




                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                    <table class="table table-report sm:mt-2">
                        <thead>
                        <tr>
                            <th class="text-c whitespace-no-wrap">
                                <div class="flex items-center justify-center ">   </div>
                            </th>

                            <th class="text-center whitespace-no-wrap">
                                <div class="flex items-center justify-center "> <i data-feather="calendar" class="w-4 h-4 ml-1"></i> تاریخ سفارش </div>
                            </th>

                            <th class="text-center whitespace-no-wrap">
                                <div class="flex items-center justify-center "> <i data-feather="package" class="w-4 h-4 ml-1"></i> تعداد محصولات </div>
                            </th>

                            <th class="text-center whitespace-no-wrap">
                                <div class="flex items-center justify-center "> <i data-feather="loader" class="w-4 h-4 ml-1"></i>  وضعیت </div>
                            </th>

                            <th class="text-center whitespace-no-wrap">
                                <div class="flex items-center justify-start "> <i data-feather="user" class="w-4 h-4 ml-1"></i>  نام مشتری </div>
                            </th>

                            <th class="text-center whitespace-no-wrap">
                                <div class="flex items-center justify-start "> <i data-feather="hash" class="w-4 h-4 ml-1"></i> شماره پیگیری </div>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="rtl">
                        @foreach($newOrder as $no)
                            <tr class="intro-x">
                                <td class="w-40">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center ml-3" href=""> <i data-feather="eye" class="w-4 h-4 mr-1"></i> مشاهده </a>
                                    </div>
                                </td>
                                <td class="w-40">
                                    <a href="" class="font-medium whitespace-no-wrap flex-justify-center">{{$no->created_at->format('Y/m/d')}}</a>
                                    <div class="text-gray-600 text-xs whitespace-no-wrap flex-justify-center">{{$no->created_at->format('h:m:s')}}</div>
                                </td>
                                <td class="w-40">
                                    <div class="flex items-center justify-center ">{{$no->order_detail->count()}} عدد </div>
                                </td>
                                <td class="text-center">{{__('status.'.$no->status)}}</td>

                                <td>
                                    <a href="" class="font-medium whitespace-no-wrap flex-justify-end">{{$no->client->name()}}</a>
                                    <div class="text-gray-600 text-xs whitespace-no-wrap flex-justify-ce">{{$no->client->type()}}</div>
                                </td>
                                <td class="table-report__action w-10 bg-theme-18">
                                    <a href="" class="font-medium whitespace-no-wrap flex-justify-center">
                                        {{is_null($no->tracking_serial) ? $no->id : '#'.$no->tracking_serial }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
                    @if($newOrderCount >5)
                        <a href="" class="intro-y zoom-in w-full block text-center rounded-md py-4  border border-dotted border-theme-15 text-theme-16">نمایش بیشتر
                            +
                            {{$newOrderCount}}
                        </a>
                    @endif
                </div>

            </div>
            <!-- END: Weekly Top Seller -->
        </div>
        <div class="col-span-12 xxl:col-span-3 xxl:border-l border-theme-5 -mb-10 pb-10">
            <div class="xxl:pl-6 grid grid-cols-12 gap-6">
                <!-- BEGIN: Transactions -->
                <div class="col-span-12 md:col-span-6 xl:col-span-3 xxl:col-span-12 mt-3 xxl:mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class=" font-medium truncate mr-5">
                            جدیدترین کاربران
                        </h2>

                    </div>
                    <div class="mt-5">
                        @foreach($newUsers as $user)
                            <div class="intro-x">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                        <img alt="Midone Tailwind HTML Admin Template" src="{{str_replace('public','storage',optional($user->gallery)->path)}}">
                                    </div>
                                    <div class="mr-4 ml-auto">
                                        <div class="font-medium">{{__('users.'.$user->username)}}</div>
                                        <div class="text-gray-600 text-xs">{{\Illuminate\Support\Str::limit($user->email,'20')}}</div>
                                    </div>
                                    <div class="text-theme-3 text-xs rtl">{{\Morilog\Jalali\Jalalian::forge($user->created_at)->ago()}}</div>
                                </div>
                            </div>
                        @endforeach

                        <a href="{{route('admin.user.index')}}" class="intro-x w-full block text-center rounded-md py-3 border border-dotted border-theme-15 text-theme-16">نمایش بیشتر</a>
                    </div>
                </div>
                <!-- END: Transactions -->

                <!-- BEGIN: Transactions -->
                <div class="col-span-12 md:col-span-6 xl:col-span-3 xxl:col-span-12 mt-3 xxl:mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class=" font-medium truncate mr-5">
                            جدیدترین مشتریان
                        </h2>

                    </div>
                    <div class="mt-5">
                        @foreach($newClients as $client)
                            <div class="intro-x">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                        <img alt="Midone Tailwind HTML Admin Template"
                                             @if($client->type() == 'حقوقی')
                                                 src="{{str_replace('public','storage','public/assets/image/avatar/default_company_avatar01.png')}}">
                                        @elseif($client->type() == 'حقیقی')
                                            src="{{str_replace('public','storage','public/assets/image/avatar/default_personal_avatar01.png')}}">
                                        @endif
                                    </div>
                                    <div class="mr-4 ml-auto">
                                        <div class="font-medium">{{$client->name()}}</div>
                                        <div class="text-gray-600 text-xs">{{$client->phone}}</div>
                                    </div>
                                    <div class="text-theme-3 text-xs rtl">{{\Morilog\Jalali\Jalalian::forge($client->created_at)->ago()}}</div>
                                </div>
                            </div>
                        @endforeach

                        <a href="{{route('admin.user.index')}}" class="intro-x w-full block text-center rounded-md py-3 border border-dotted border-theme-15 text-theme-16">نمایش بیشتر</a>
                    </div>
                </div>
                <!-- END: Transactions -->

                <!-- BEGIN: Recent Activities -->
                @if(count($newEvents)>0)
                    <div class="col-span-12 md:col-span-6 xl:col-span-4 xxl:col-span-12 mt-3 ">
                        <div class="intro-y flex items-center h-10">
                            <h2 class=" font-medium truncate mr-5">
                                رویداد های اخیر
                            </h2>
                            <a href="{{route('admin.event.index')}}" class="mr-auto text-theme-1 truncate text-xs tooltip" title="نمایش بیشتر"><i data-feather="plus" class="w-4 h-4"></i></a>
                        </div>
                        <div class="report-timeline mt-5 relative">

                            @dd()
                            @php
                                $carbonFirst=\Carbon\Carbon::parse($newEvents->first()->start);
                                $jalaliFirst=\Morilog\Jalali\Jalalian::fromCarbon($carbonFirst)->format(' l d F');
                            @endphp

                            <div class="intro-x text-gray-500 text-xs text-center my-4">{{$jalaliFirst}}</div>

                            @foreach($newEvents as $ne)

                                @php
                                    $carbon=\Carbon\Carbon::parse($ne->start);
                                    $jalali=\Morilog\Jalali\Jalalian::fromCarbon($carbon)->format(' l d F');
                                @endphp

                                @if($jalaliFirst != $jalali)
                                    <div class="intro-x text-gray-500 text-xs text-center my-4">{{$jalali}}</div>
                                    @php
                                        $jalaliFirst = $jalali;
                                    @endphp

                                @endif

                                <div class="intro-x relative flex-reverse items-center mb-3">
                                    <div class="report-timeline__image">
                                        <div class="w-12 h-12 flex-none image-fit rounded-full overflow-hidden">
                                            <p class="w-8 h-8 rounded-full flex border-gray-500  items-center justify-center border-4 ml-2 text-gray-500 zoom-in tooltip" title="تاریخ ایجاد{{$ne->created_at}}">
                                                <span class="font-bold "> {{$loop->index+1}}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                        <div class="flex-reverse items-center">

                                            <div class="text-xs text-gray-500 mr-auto">07:00 PM</div>
                                            <div class="font-medium">{{$ne->title}}</div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                @endif
                <!-- END: Recent Activities -->
                <!-- BEGIN: Important Notes -->
                <div class="col-span-12 md:col-span-6 xl:col-span-12 xxl:col-span-12 xl:col-start-1 xl:row-start-1 xxl:col-start-auto xxl:row-start-auto mt-3">
                    <div class="intro-x flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-auto">
                            Important Notes
                        </h2>
                        <button data-carousel="important-notes" data-target="prev" class="slick-navigator button px-2 border border-gray-400 flex items-center text-gray-700 mr-2"> <i data-feather="chevron-right" class="w-4 h-4"></i> </button>
                        <button data-carousel="important-notes" data-target="next" class="slick-navigator button px-2 border border-gray-400 flex items-center text-gray-700"> <i data-feather="chevron-left" class="w-4 h-4"></i> </button>
                    </div>
                    <div class="mt-5 intro-x">
                        <div class="slick-carousel box zoom-in" id="important-notes">
                            <div class="p-5">
                                <div class="text-base font-medium truncate">Lorem Ipsum is simply dummy text</div>
                                <div class="text-gray-500 mt-1">20 Hours ago</div>
                                <div class="text-gray-600 text-justify mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
                                <div class="font-medium flex mt-5">
                                    <button type="button" class="button button--sm bg-gray-200 text-gray-600">View Notes</button>
                                    <button type="button" class="button button--sm border border-gray-300 text-gray-600 ml-auto">Dismiss</button>
                                </div>
                            </div>
                            <div class="p-5">
                                <div class="font-medium truncate">Lorem Ipsum is simply dummy text</div>
                                <div class="text-gray-500 mt-1">20 Hours ago</div>
                                <div class="text-gray-600 text-justify mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
                                <div class="font-medium flex mt-5">
                                    <button type="button" class="button button--sm bg-gray-200 text-gray-600">View Notes</button>
                                    <button type="button" class="button button--sm border border-gray-300 text-gray-600 ml-auto">Dismiss</button>
                                </div>
                            </div>
                            <div class="p-5">
                                <div class="font-medium truncate">Lorem Ipsum is simply dummy text</div>
                                <div class="text-gray-500 mt-1">20 Hours ago</div>
                                <div class="text-gray-600 text-justify mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
                                <div class="font-medium flex mt-5">
                                    <button type="button" class="button button--sm bg-gray-200 text-gray-600">View Notes</button>
                                    <button type="button" class="button button--sm border border-gray-300 text-gray-600 ml-auto">Dismiss</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Important Notes -->
                <!-- BEGIN: Schedules -->
                <div class="col-span-12 md:col-span-6 xl:col-span-5 xxl:col-span-12 xl:col-start-1 xl:row-start-2 xxl:col-start-auto xxl:row-start-auto mt-3">
                    <div class="intro-x flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Schedules
                        </h2>
                        <a href="" class="ml-auto text-theme-1 truncate flex items-center"> <i data-feather="plus" class="w-4 h-4 mr-1"></i> Add New Schedules </a>
                    </div>
                    <div class="mt-5">
                        <div class="intro-x box">
                            <div class="p-5">
                                <div class="flex">
                                    <i data-feather="chevron-left" class="w-5 h-5 text-gray-600"></i>
                                    <div class="font-medium mx-auto">April</div>
                                    <i data-feather="chevron-right" class="w-5 h-5 text-gray-600"></i>
                                </div>
                                <div class="grid grid-cols-7 gap-9 mt-5 text-center">
                                    <div class="font-medium">جمعه</div>
                                    <div class="font-medium">پنجشنبه</div>
                                    <div class="font-medium">چهارشنبه</div>
                                    <div class="font-medium">سه شنبه</div>
                                    <div class="font-medium">دوشنبه</div>
                                    <div class="font-medium">یکشنبه</div>
                                    <div class="font-medium">شنبه</div>
                                    <div class="py-1 rounded relative text-gray-600">29</div>
                                    <div class="py-1 rounded relative text-gray-600">30</div>
                                    <div class="py-1 rounded relative text-gray-600">31</div>
                                    <div class="py-1 rounded relative">1</div>
                                    <div class="py-1 rounded relative">2</div>
                                    <div class="py-1 rounded relative">3</div>
                                    <div class="py-1 rounded relative">4</div>
                                    <div class="py-1 rounded relative">5</div>
                                    <div class="py-1 bg-theme-18 rounded relative">6</div>
                                    <div class="py-1 rounded relative">7</div>
                                    <div class="py-1 bg-theme-1 text-white rounded relative">8</div>
                                    <div class="py-1 rounded relative">9</div>
                                    <div class="py-1 rounded relative">10</div>
                                    <div class="py-1 rounded relative">11</div>
                                    <div class="py-1 rounded relative">12</div>
                                    <div class="py-1 rounded relative">13</div>
                                    <div class="py-1 rounded relative">14</div>
                                    <div class="py-1 rounded relative">15</div>
                                    <div class="py-1 rounded relative">16</div>
                                    <div class="py-1 rounded relative">17</div>
                                    <div class="py-1 rounded relative">18</div>
                                    <div class="py-1 rounded relative">19</div>
                                    <div class="py-1 rounded relative">20</div>
                                    <div class="py-1 rounded relative">21</div>
                                    <div class="py-1 rounded relative">22</div>
                                    <div class="py-1 bg-theme-17 rounded relative">23</div>
                                    <div class="py-1 rounded relative">24</div>
                                    <div class="py-1 rounded relative">25</div>
                                    <div class="py-1 rounded relative">26</div>
                                    <div class="py-1 bg-theme-14 rounded relative">27</div>
                                    <div class="py-1 rounded relative">28</div>
                                    <div class="py-1 rounded relative">29</div>
                                    <div class="py-1 rounded relative">30</div>
                                    <div class="py-1 rounded relative text-gray-600">1</div>
                                    <div class="py-1 rounded relative text-gray-600">2</div>
                                    <div class="py-1 rounded relative text-gray-600">3</div>
                                    <div class="py-1 rounded relative text-gray-600">4</div>
                                    <div class="py-1 rounded relative text-gray-600">5</div>
                                    <div class="py-1 rounded relative text-gray-600">6</div>
                                    <div class="py-1 rounded relative text-gray-600">7</div>
                                    <div class="py-1 rounded relative text-gray-600">8</div>
                                    <div class="py-1 rounded relative text-gray-600">9</div>
                                </div>
                            </div>
                            <div class="border-t border-gray-200 p-5">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-theme-11 rounded-full mr-3"></div>
                                    <span class="truncate">UI/UX Workshop</span>
                                    <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                                    <span class="font-medium xl:ml-auto">23th</span>
                                </div>
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-theme-1 rounded-full mr-3"></div>
                                    <span class="truncate">VueJs Frontend Development</span>
                                    <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                                    <span class="font-medium xl:ml-auto">10th</span>
                                </div>
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-theme-12 rounded-full mr-3"></div>
                                    <span class="truncate">Laravel Rest API</span>
                                    <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                                    <span class="font-medium xl:ml-auto">31th</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Schedules -->
            </div>
        </div>
    </div>

@endsection


@component('Admin.Layout.layout')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" >صفحه اصلی</a>
        </div>
    @endslot
@endcomponent
