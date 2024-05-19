@section('content')
    <div class="intro-y box overflow-hidden mt-5 rtl text-right" dir="rtl">
        <div class="flex flex-col lg:flex-row pt-10 px-5 sm:px-20 sm:pt-20 lg:pb-20 text-center sm:text-left">
            <div class="font-semibold text-theme-1 text-3xl">سفارشات</div>
            <div class="mt-20 lg:mt-0 lg:mr-auto lg:text-right">
                <div class="text-xl text-theme-1 font-medium">Left4code</div>
                <div class="mt-1">left4code@gmail.com</div>
                <div class="mt-1">8023 Amerige Street Harriman, NY 10926.</div>
            </div>
        </div>
        <div class="flex flex-col lg:flex-row border-b px-5 sm:px-20 pt-10 pb-10 sm:pb-20 text-center sm:text-left">
            <div dir="rtl" class="text-right">
                <div class="text-base text-gray-600">مشخصات مشتری</div>
                <div class="text-lg font-medium text-theme-1 mt-2"></div>
                <div class="mt-1"></div>
                <div class="mt-1">260 W. Storm Street New York, NY 10025.</div>
            </div>
            <div class="mt-10 lg:mt-0 lg:mr-auto lg:text-right" dir="rtl">
                <div class="text-base text-gray-600">Receipt</div>
                <div class="text-lg text-theme-1 font-medium mt-2">#1923195</div>
                <div class="mt-1">Jan 02, 2021</div>
            </div>
        </div>
        <div class="px-5 sm:px-16 py-10 sm:py-20 text-right">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                    <tr class="rtl text-right" dir="rtl">
                        <th class="border-b-2 rtl">ردیف</th>
                        <th class="border-b-2 text-right whitespace-no-wrap">وضعیت</th>
                        <th class="border-b-2 text-right whitespace-no-wrap">نماینده</th>
                        <th class="border-b-2 text-right whitespace-no-wrap">مشتری</th>
                        <th class="border-b-2 text-right whitespace-no-wrap">تاریخ ثبت</th>
                        <th class="border-b-2 text-right whitespace-no-wrap"> تلفن مشتری</th>
                    </tr>
                    </thead>
                    <tbody dir="rtl">
                    @foreach($orders as $order)

                        <tr>
                            <td class="border-b rtl text-right d-inline" dir="rtl">{{$order->id}}</td>
                            <td class="text-right border-b ">{{__('status.' . $order->status)}}</td>
                            <td class="text-right border-b ">{{__('users.'. $order->agent->user->username )}}</td>
                            <td class="text-right border-b  font-medium">{{$order->client->name()}}</td>
                            <td class="text-right border-b  font-medium">{{$order->created_at}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="px-5 sm:px-20 pb-10 sm:pb-20 flex flex-col-reverse sm:flex-row">
            <div class="text-center sm:text-left mt-10 sm:mt-0">
                <div class="text-base text-gray-600">Bank Transfer</div>
                <div class="text-lg text-theme-1 font-medium mt-2">Elon Musk</div>
                <div class="mt-1">Bank Account : 098347234832</div>
                <div class="mt-1">Code : LFT133243</div>
            </div>
            <div class="text-center sm:text-right sm:ml-auto">
                <div class="text-base text-gray-600">Total Amount</div>
                <div class="text-xl text-theme-1 font-medium mt-2">$20.600.00</div>
                <div class="mt-1 tetx-xs">Taxes included</div>
            </div>
        </div>
    </div>

    @can('delete-product')
        @foreach($orders as $order)

            {{--    DELETE product--}}
            <div class="modal" id="UserDelete{{$order->id}}">
                <div class="modal__content">
                    <form action="{{route('admin.order.destroy',$order->id)}}" method="post">
                        @csrf
                        @method('DELETE')

                        <div class="p-5 text-center"><i data-feather="x-circle"
                                                        class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">حذف مشتری <span style="color: #8b0000">{{$order->status}}</span>
                            </div>
                            {{--                        <div class="mt-3 ">--}}
                            {{--                            <div class="mt-2  flex" data-theme="light">--}}
                            {{--                                <p>حذف به همراه زیر دسته ها </p>--}}
                            {{--                                <input type="checkbox" class="tooltip input input--switch border" value="1" name="DeleteAll" title="با انتخاب این گزینه تمامی زیر دسته های این برند نیز حذف خواهد شد "> </div>--}}
                            {{--                        </div>--}}
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">
                                انصراف
                            </button>
                            <button type="submit" class="button w-24 bg-theme-6 text-white">حذف</button>
                        </div>
                    </form>
                </div>

            </div>
        @endforeach
    @endcan
@endsection
@section('js')
    <script language="JavaScript">
        function toggle(source) {
            checkboxes = document.getElementsByClassName('marked');
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = source.checked;
                multidelete(source);
            }
        }

        $("#deleteAll").hide();

        function multidelete(source) {
            ggs = document.getElementsByClassName('marked');
            for (var i = 0, n = ggs.length; i < n; i++) {
                $("#deleteAll").hide();
                if (ggs[i].checked) {
                    $("#deleteAll").show();
                    break;
                }
            }
        }


    </script>
@endsection
@component('Admin.Layout.layout')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a class="">مشتریان</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('admin.dashboard.index')}}" class="breadcrumb--active">صفحه اصلی</a></div>
    @endslot
@endcomponent
