

@section('css')
    <link rel="stylesheet" href="/assest/Admin/css/GalleryFileUploader.css" />
@endsection
@section('content')

    <h2 class="intro-y text-lg font-medium rtl mt-2 mr-2">
        تیکت ها
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-2">

        <!-- START: Query URL -->
        <div class="intro-y rtl col-span-12 flex-reverese-end flex-wrap sm:flex-no-wrap items-center mt-2  border-gray-200">
            <div class="flex-justify-start flex-col lg:flex-row">
                @if(isset($query))
                    @foreach($query as $key=>$value)
                        @if(is_array($value))
                            @foreach($value as $k=>$v)
                                <div class="button pointer-events-none flex justify-center  border shadow-md  mb-2 bg-gray-200 text-gray-600 ml-2">
                                    <a  href="{{str_replace($key.'[]='.$v,'',request()->getRequestUri())}}" class="pointer-events-auto">
                                        <i data-feather="x" class="h-4 w-4 mr-2"></i></a>{{__('query.'.$key)}} : {{__('query.'.$v)}}</div>
                            @endforeach
                        @else
                            <div class="button pointer-events-none flex justify-center  border shadow-md  mb-2 bg-gray-200 text-gray-600 ml-2">
                                <a  href="{{str_replace($key.'='.$value,'',request()->getRequestUri())}}" class="pointer-events-auto">
                                    <i   data-feather="x" class="h-4 w-4 mr-2"></i></a>{{__('query.'.$key)}} : {{__('query.'.$value)}}</div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
        <!-- END: Query URL -->
        <div class="col-span-12 lg:col-span-3 xxl:col-span-2">


            <!-- BEGIN: Inbox Menu -->
            <div class="intro-y box bg-theme-1 p-5 mt-6">

                <div class="border-theme-3 text-white">
                    <a href="" class="flex justify-start items-center px-3 py-2 rounded-md bg-theme-22 font-medium"> <i class="w-4 h-4 ml-2" data-feather="mail"></i>همه تیکت ها</a>
                    <a href="" class="flex justify-start items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 ml-2" data-feather="archive"></i> تیکت های  </a>
                    <a href="" class="flex justify-start items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 ml-2" data-feather="user-check"></i> تیکت های احرازهویت </a>
                    <a href="" class="flex justify-start items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 ml-2" data-feather="send"></i> تیکت های سایر موارد </a>
                </div>
                <div class="border-t border-theme-3 mt-4 box bg-white  pt-5 pb-5 text-black">
{{--
bg-gray-500 box
--}}
                    <a href="" class="flex justify-start mr-3 ml-3 items-center  px-3 py-2 truncate">
                        <div class="w-2 h-2 bg-theme-12 rounded-full ml-3"></div>
                        تیکت ارسال شده
                    </a>
                    <a href="" class="flex justify-start mr-3 ml-3 items-center px-3 py-2 mt-2 rounded-md truncate">
                        <div class="w-2 h-2 bg-theme-7 rounded-full ml-3"></div>
                         در حال پاسخگویی
                    </a>
                    <a href="" class="flex justify-start mr-3 ml-3 items-center px-3 py-2 mt-2 rounded-md truncate">
                        <div class="w-2 h-2 bg-theme-42 rounded-full ml-3"></div>
                        پاسخ داده شده
                    </a>
                    <a href="" class="flex justify-start mr-3 ml-3 items-center px-3 py-2 mt-2  rounded-md truncate">
                        <div class="w-2 h-2 bg-theme-6 rounded-full ml-3"></div>
                        بسته شده
                    </a>

                </div>
            </div>
            <!-- END: Inbox Menu -->
        </div>
        <div class="col-span-12 lg:col-span-9 xxl:col-span-10">
            <!-- BEGIN: Inbox Content -->
            <div class="intro-y inbox box mt-5">
                <div class="p-5 flex flex-col-reverse sm:flex-row text-gray-600 border-b border-gray-200">
                    <div class="flex items-center border-t sm:border-0 border-gray-200 pt-5 sm:pt-0 mt-5 sm:mt-0 -mx-5 sm:mx-0 px-5 sm:px-0">

                    </div>

                </div>
                <div class="overflow-x-auto sm:overflow-x-visible">
                    @if($tickets->count() < 1)
                        <div class="text-center">تیکت معتبری وجود ندارد</div>
                    @endif
                    @foreach($tickets as $ticket)
                        <div class="intro-y">

                            <div class="inbox__item inbox__item--active inline-block sm:block text-gray-700 bg-gray-100 border-b border-gray-200">
                                <div  class="flex px-5 py-3">
                                    <div class="w-56 flex-none flex items-center mr-4">
                                        <input class="input flex-none border border-gray-500" type="checkbox" >
                                        <a href="javascript:;" class="w-5 h-5 flex-none mr-2 flex items-center justify-center text-gray-500">
                                            <i class="w-4 h-4" data-feather="bookmark"></i> </a>
                                        <div class="w-6 h-6 flex-none image-fit relative ml-5">
                                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                                 src="{{str_replace('public','/storage',optional($ticket->sender_user->gallery)->path)}}">
                                            <div class="w-3 h-3
                                            bg-{{$ticket->status['theme']}}
                                    absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                        </div>
                                        <div class="inbox__item--sender truncate ml-3 w-25">{{$ticket->sender_user->username}}</div>
                                    </div>
                                    <div class="w-64 sm:w-auto truncate">
                                        <a href="{{route('admin.ticket.show',$ticket)}}">
                                        <span class="inbox__item--highlight">{{$ticket->title}}</span>
                                        </a>
                                    </div>

                                    <div class="inbox__item--time whitespace-no-wrap mr-auto pl-10">
                                        <a href="javascript:;" class=" h-5 flex-none ml-4 flex items-center justify-center text-gray-500 tooltip" title="{{$ticket->importance['fa']}}">
                                            @php
                                            $star=$ticket->importance['num'];
                                            $nonStar=4-$star;
                                            @endphp
                                        @for( $i=0 ; $i <$star ; $i++ )
                                            <i class="w-4 h-4 text-yellow-500 " data-feather="star" style="fill:yellow;!important;"></i>
                                        @endfor
                                            @for( $i=0 ; $i <$nonStar ; $i++ )
                                                <i class="w-4 h-4 text-yellow-400 " data-feather="star"></i>
                                            @endfor

                                        </a>
                                       {{-- @if($ticket->importance =='1') کم
                                        @elseif($ticket->importance =='2') متوسط
                                        @elseif($ticket->importance =='3') زیاد
                                        @elseif($ticket->importance =='4') خیلی زیاد
                                        @endif--}}
                                    </div>


                                    <div class="inbox__item--time whitespace-no-wrap mr-auto pl-10 rtl"> {{$ticket->created_at->diffForHumans()}}</div>
                                </div>

                            </div>
                        </div>

                    @endforeach

                </div>
                <div class="p-5 flex flex-col sm:flex-row items-center text-center sm:text-left text-gray-600">

                </div>
            </div>
            <!-- END: Inbox Content -->
        </div>
    </div>

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
            <a  class="" >محصولات</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('admin.dashboard.index')}}" class="breadcrumb--active">صفحه اصلی</a> </div>
    @endslot
@endcomponent
