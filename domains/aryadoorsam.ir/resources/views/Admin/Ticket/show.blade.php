

@section('css')
    <link rel="stylesheet" href="/assest/Admin/css/GalleryFileUploader.css" />
@endsection
@section('content')
    <!DOCTYPE html>

    <!-- END: Head -->
    <body class="app">

    <div class="flex">
        <!-- BEGIN: Side Menu -->

        <!-- BEGIN: Content -->
        <div class="content">

            <div class="intro-y chat grid grid-cols-12 gap-5 mt-5">
                <!-- BEGIN: Chat Side Menu -->
                <div class="col-span-12 lg:col-span-4 xxl:col-span-3">
                    <div class="intro-y pr-1">
                        <div class="box p-2">
                            <div class="chat__tabs nav-tabs justify-center flex">
                                <a data-toggle="tab" data-target="#chats" href="javascript:;" class="flex-1 py-2 rounded-md text-center active">تیکت ها</a>
                                @if($ticket->type == 'creditRequest')
                                <a data-toggle="tab" data-target="#profile" href="javascript:;" class="flex-1 py-2 rounded-md text-center">مشخصات</a>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="tab-content">
                        <div class="tab-content__pane active" id="chats">
                            <div class="chat__chat-list overflow-y-auto scrollbar-hidden pr-1 pt-1 mt-4">
                                <div class="intro-x cursor-pointer box relative flex items-center p-5 mt-5" style="justify-content: normal">
                                    <div class="w-12 h-12 flex-none image-fit mr-1 ml-2">
                                        @if($ticket->type == 'درخواست اعتبار')
                                        <img alt="{{optional($ticket->ticketable->creditRequestType->gallery)->alt}}" class="rounded-full" src="{{str_replace('public','/storage',$ticket->ticketable->creditRequestType->gallery->path)}}">
                                        @elseif($ticket->type == 'سفارش')
                                            <img alt="{{optional($ticket->ticketable->credit->creditRequest->creditRequestType->gallery)->alt}}" class="rounded-full" src="{{str_replace('public','/storage',$ticket->ticketable->credit->creditRequest->creditRequestType->gallery->path)}}">
                                        @endif
                                        <div class="w-3 h-3
                                    @if($ticket->status == 'closed')
                                    bg-theme-6
                                    @elseif($ticket->status == 'pending' || $ticket->status == 'sent')
                                    bg-theme-12
                                    @else
                                    bg-theme-9
                                    @endif
                                    absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                    </div>
                                    <div class="ml-2 overflow-hidden w-full">
                                        <div class="flex items-center">
                                            <a href="javascript:;" class="font-medium ml-5">{{$ticket->title}}</a>
                                            <div class="text-xs text-gray-500 mr-auto rtl">{{$ticket->message->last()->created_at->diffForHumans()}}</div>
                                        </div>
                                        <div class="w-full truncate text-gray-600 mr-auto">{{$ticket->message->last()->context}}</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{--TODO inja bara creditRequest hast--}}
                        @if($ticket->type == 'creditRequest')

                        <div class="tab-content__pane" id="profile">
                            <div class="pr-1">
                                <div class="box px-5 py-10 mt-5">
                                    <div class="w-20 h-20 flex-none image-fit rounded-full overflow-hidden mx-auto">
                                        <img alt="Midone Tailwind HTML Admin Template" src="{{str_replace('public','/storage',$ticket->ticketable->creditRequestType->gallery->path)}}">
                                    </div>


                                    <div class="text-center mt-3">
                                        <a href="{{route('admin.credit.request.show',$ticket->ticketable->id)}}">
                                        <div class="font-medium text-lg">{{$ticket->ticketable->creditRequestType->name}}</div>
                                        <div class="text-gray-600 mt-1">{{$ticket->ticketable->creditRequestType->title}}</div>
                                        </a>
                                    </div>
                                </div>
                                <div class="box p-5 mt-5 rtl">

                                    <div class="flex items-center border-b pb-5" style="justify-content: flex-end">
                                        <div class="">
                                            <div class="text-gray-600 mr-2">مکان</div>
                                            <div class="mr-2">{{$ticket->ticketable->creditable->province->name}} ,
                                                {{$ticket->ticketable->creditable->city->name}}</div>
                                        </div>
                                        <i data-feather="map-pin" class="w-4 h-4 text-gray-600"></i>
                                    </div>

                                    <div class="flex items-center border-b pb-5 mt-2" style="justify-content: flex-end">
                                        <div class="">
                                            <div class="text-gray-600 mr-2"> ‌نوع محصول درخواست شده</div>
                                            <div class="mr-2">{{$ticket->ticketable->product_type}}</div>
                                        </div>
                                        <i data-feather="list" class="w-4 h-4 text-gray-600"></i>
                                    </div>

                                    <div class="flex items-center border-b pb-5 mt-2" style="justify-content: flex-end">
                                        <div class="">
                                            <div class="text-gray-600 mr-2">مقدار محصول درخواست شده</div>
                                            <div class="mr-2">{{$ticket->ticketable->amount_by_ton}}</div>
                                        </div>
                                        <i data-feather="archive" class="w-4 h-4 text-gray-600"></i>
                                    </div>

                                    <div class="flex items-center border-b pb-5 mt-2" style="justify-content: flex-end">
                                        <div class="">
                                            <div class="text-gray-600 mr-2">توضیحات</div>
                                            <div class="mr-2">@if(!!$ticket->ticketable->note){!! $ticket->ticketable->note !!}@else توضیحاتی وجود ندارد @endif</div>
                                        </div>
                                        <i data-feather="bookmark" class="w-4 h-4 text-gray-600"></i>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <!-- END: Chat Side Menu -->
                <!-- BEGIN: Chat Content -->
                <div class="intro-y col-span-12 lg:col-span-8 xxl:col-span-9">
                    <div class="chat__box box">
                        <!-- BEGIN: Chat Active -->
                        <div class=" h-full flex flex-col">
                            <div class="flex flex-col sm:flex-row border-b border-gray-200 px-5 py-4 " style="justify-content: flex-end">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 sm:w-12 sm:h-12 flex-none image-fit relative">

                                        @if($ticket->type == 'درخواست اعتبار')
                                            <img alt="{{optional($ticket->ticketable->creditRequestType->gallery)->alt}}" class="rounded-full" src="{{str_replace('public','/storage',$ticket->ticketable->creditRequestType->gallery->path)}}">
                                        @elseif($ticket->type == 'سفارش')
                                            <img alt="{{optional($ticket->ticketable->credit->creditRequest->creditRequestType->gallery)->alt}}" class="rounded-full" src="{{str_replace('public','/storage',$ticket->ticketable->credit->creditRequest->creditRequestType->gallery->path)}}">
                                        @endif

                                    </div>
                                    <div class="ml-3 mr-auto">
                                        <div class="font-medium text-base mr-2">{{$ticket->title}}</div>
                                        <div class="text-gray-600 text-xs sm:text-sm rtl mr-2"><span>تاریخ ایجاد: </span> {{$ticket->created_at}} </div>
                                    </div>
                                </div>
                            </div>
                            <div class="overflow-y-scroll px-5 pt-5 flex-1">
                                @foreach($messages as $message)
                                    @if($message->user == \Illuminate\Support\Facades\Auth::user())
                                        <div class="chat__box__text-box flex items-end float-right mb-4">
                                            <div class="bg-theme-1 px-4 py-3 text-white rounded-l-md rounded-t-md">
                                                {{$message->context}}
                                                <div class="mt-1 text-xs text-theme-25 rtl">{{$message->created_at->diffForHumans()}}</div>
                                            </div>
                                            <div class="w-10 h-10 hidden sm:block flex-none image-fit relative mr-2">
                                                <img alt="{{$message->user->gallery->alt}}" src="{{str_replace('public','/storage',$message->user->gallery->path)}}">
                                            </div>
                                            <div class="hidden sm:block flex-none image-fit relative mr-2">
                                                    <small class="block mt-1">{{__('users.'.$message->user->username)}}</small>
                                            </div>
                                        </div>
                                        <div class="clear-both"></div>
                                    @else
                                        <div class="chat__box__text-box flex items-end float-left mb-4">
                                            <div class="hidden sm:block flex-none image-fit relative ml-2">
                                                    <small class="block mt-1">{{__('users.'.$message->user->username)}}</small>
                                            </div>
                                            <div class="w-10 h-10 hidden sm:block flex-none image-fit relative ml-2">

                                                <img alt="{{$message->user->gallery->alt}}" class="rounded-full" src="{{str_replace('public','/storage',$message->user->gallery->path)}}">
                                            </div>

                                            <div class="bg-gray-200 px-4 py-3 text-gray-700 rounded-r-md rounded-t-md">
                                                {{$message->context}}
                                                <div class="mt-1 text-xs text-gray-600 rtl">{{$message->created_at->diffForHumans()}}</div>
                                            </div>
                                        </div>
                                        <div class="clear-both"></div>
                                    @endif
                                @endforeach
                                @if($ticket->status == 'closed')
                                    <div class="chat__box__text-box flex items-end float-left mb-4">
                                        <div class="bg-theme-1 px-4 py-3 text-white rounded-l-md rounded-t-md">
                                            تیکت شما بسته شده است و دیگر امکان ارسال پیام نیست در صورتی که میخواهید میتوانید تیکت دیگری ثبت کنید
                                            <div class="mt-1 text-xs text-theme-25 rtl">{{$ticket->updated_at->diffForHumans()}}</div>
                                        </div>
                                        <div class="w-10 h-10 hidden sm:block flex-none image-fit relative ml-5">
                                            <img alt="{{$message->user->gallery->alt}}" src="{{str_replace('public','/storage',$message->user->gallery->path)}}">
                                        </div>
                                    </div>
                                    <div class="clear-both"></div>
                                @endif
                            </div>
                        </div>
                        <!-- END: Chat Active -->

                    </div>
                </div>
                <!-- END: Chat Content -->
            </div>
        </div>
        <!-- END: Content -->
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
