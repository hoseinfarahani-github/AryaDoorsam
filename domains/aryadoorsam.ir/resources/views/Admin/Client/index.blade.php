


@section('content')
    <h2 class="intro-y text-lg font-medium mt-10 rtl">
        لیست مشتریان
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            @can('create-product')
                <a href="{{route('admin.client.create')}}" class="button text-white bg-theme-1 shadow-md ml-2">افزودن مشتری جدید</a>
            @endcan
            <div class="dropdown relative">
                <button class="dropdown-toggle button px-2 box text-gray-700">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                </button>
                <div class="dropdown-box mt-10 absolute w-40 top-0 left-0 z-20">
                    <div class="dropdown-box__content box p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block mx-auto text-gray-600"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-gray-700">
                    <form>
                        <input type="text"   name="search" class="input w-56 box pr-10 placeholder-theme-13 rtl" placeholder="جست و جو ..." value="{{request('search')}}">
                        <button type="submit" class=" absolute my-auto inset-y-0 mr-3 right-0 foc"><i class="w-4 h-4" data-feather="search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="col-span-12 mt-6">
            <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <table class="table table-report sm:mt-2">
                        <thead>
                        <tr>
                            <th class="flex  text-center whitespace-no-wrap">تغییرات
                                <button id="deleteAll" type="submit" name="deleteAll" class=" mr-5 ml-auto tooltip items-center text-theme-6" title="حذف موارد انتخاب شده " > <i data-feather="trash" class="  w-5 h-5 ml-1"></i> </button>

                            </th>
                            <th class="text-center whitespace-no-wrap">وضعیت</th>
                            <th class="text-center whitespace-no-wrap"> نوع مشتری</th>
                            <th class="text-center whitespace-no-wrap"> نماینده </th>
                            <th class="whitespace-no-wrap text-right">
                                @if((request()->query('chevron') == 'descending' && request()->query('order_by') == 'title'))
                                    <a href="{{request()->fullUrlWithQuery(['chevron' => 'ascending','order_by'=> 'title'])}}"> <i data-feather="chevron-down" class="w-4 h-4 float-right"></i><span> نام مشتری</span></a>
                                @else
                                    <a href="{{request()->fullUrlWithQuery(['chevron' => 'descending','order_by'=> 'title'])}}"> <i data-feather="chevron-up" class="w-4 h-4 float-right"></i><span> نام مشتری</span></a>
                                @endif
                            </th>
                            <th class="whitespace-no-wrap text-right ">
                                @if((request()->query('chevron') == 'descending' && request()->query('order_by') == 'id'))
                                    <a href="{{request()->fullUrlWithQuery(['chevron' => 'ascending','order_by'=> 'id'])}}"> <i data-feather="chevron-down" class="w-4 h-4 float-right"></i><span>ردیف</span></a>
                                @else
                                    <a href="{{request()->fullUrlWithQuery(['chevron' => 'descending','order_by'=> 'id'])}}"> <i data-feather="chevron-up" class="w-4 h-4 float-right"></i><span>ردیف</span></a>

                                @endif
                            </th>
                            <th class="whitespace-no-wrap">
                                <div class="ml-0 w-full col-span-12 flex-justify-profile">
                                    <input type="checkbox" title="انتخاب همه" onClick="toggle(this)" class=" tooltip input border border-gray-500 marked mt-5 ml-0 float-right" /> <br>

                                </div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients  as $client)

                            {{--                        <form method="get" action="{{route('products.edit',$client->id)}}">--}}
                            {{--                            @csrf--}}
                            <tr class="intro-x">
                                <td class="w-40">
                                    <div class="flex justify-center items-center">
                                        @can('edit-product')
                                            <a href="{{route('admin.product.edit',$client->id)}}" class="flex items-center ml-3" > <i data-feather="check-square" class="w-4 h-4 ml-1 "></i> </a>
                                        @endcan
                                        @can('delete-product')
                                            <a data-toggle="modal" id="submit" data-target="#UserDelete{{$client->id}}" class="flex items-center text-theme-6" href="javascript:;"> <admin.i data-feather="trash-2" class="w-4 h-4 ml-1"></admin.i> </a>@endcan
                                    </div>
                                </td>

                                <td class="text-center @if($client->status['eng'] == 'active') text-theme-3 @else text-theme-5 @endif">{{$client->status['fa']}} </td>
                                <td class="text-center">
                                     <a class="button w-24 rounded-full mr-1 mb-2 @if($client->type() =='حقوقی') bg-theme-2 @else bg-theme-8 @endif text-black text-xs"> {{$client->type()}}</a>
                                </td>

                                <td class="table-report__action w-56">
                                    <div class="flex w-10 m-auto">
                                        <div class="text-gray-600 text-xs whitespace-no-wrap flex-justify-start">  {{__('users.'. $client->agent->user->username)}}</div>
                                    </div>
                                </td>
                                <td>
                                    <a href="" class="font-medium whitespace-no-wrap flex-justify-start">{{$client->name()}}</a>
                                    <div class="text-gray-600 text-xs whitespace-no-wrap flex-justify-start"><a href="tel:{{$client->phone}}">{{$client->phone}}</a> </div>
                                </td>
                                <td>
                                    <a href="" class="font-medium whitespace-no-wrap flex-justify-start text-center">{{$client->id}}</a>
                                </td>
                                <td class="table-report__action w-5">
                                    @can('delete-product')
                                        <input onclick="multidelete(this);" value="{{$client->productname}}" name="{{$client->id}}" class="marked input border border-gray-500" type="checkbox">
                                    @endcan
                                </td>
                            </tr>
                            {{--                        </form>--}}
                        @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="mt-5 flex-justify-profile intro-y col-span-12 sm:flex-row sm:flex-no-wrap items-center ">
            {{--                {{$brands->links()}}--}}
            @include('Admin.Pagination.index', ['paginator' => $clients,'route' => 'admin.client'])
        </div>
        <!-- END: Pagination -->
    </div>
    <!-- BEGIN: Delete Confirmation Modal -->

    @can('delete-product')
        @foreach($clients as $client)


            {{--    DELETE product--}}
            <div class="modal" id="UserDelete{{$client->id}}">
                <div class="modal__content">
                    <form action="{{route('admin.client.destroy',$client->id)}}" method="post" >
                        @csrf
                        @method('DELETE')

                        <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">حذف مشتری  <span style="color: #8b0000">{{$client->productname}}</span></div>
                            {{--                        <div class="mt-3 ">--}}
                            {{--                            <div class="mt-2  flex" data-theme="light">--}}
                            {{--                                <p>حذف به همراه زیر دسته ها </p>--}}
                            {{--                                <input type="checkbox" class="tooltip input input--switch border" value="1" name="DeleteAll" title="با انتخاب این گزینه تمامی زیر دسته های این برند نیز حذف خواهد شد "> </div>--}}
                            {{--                        </div>--}}
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">انصراف</button>
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
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
                multidelete(source);
            }
        }
        $("#deleteAll").hide();
        function multidelete(source) {
            ggs = document.getElementsByClassName('marked');
            for(var i=0, n=ggs.length;i<n;i++) {
                $("#deleteAll").hide();
                if(ggs[i].checked) {
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
            <a  class="" >مشتریان</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('admin.dashboard.index')}}" class="breadcrumb--active">صفحه اصلی</a> </div>
    @endslot
@endcomponent
