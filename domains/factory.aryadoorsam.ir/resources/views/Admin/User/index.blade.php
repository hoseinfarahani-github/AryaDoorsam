

@section('css')
    <link rel="stylesheet" href="/assest/Admin/css/GalleryFileUploader.css" />
@endsection
@section('content')
    <div class="content">
    <h2 class="intro-y text-lg font-medium mt-10 rtl">
        {{request()->is('dashboard/user') ? 'لیست مشتریان' : ''}}
        {{request()->is('dashboard/user/staff') ? 'لیست مدیران' : ''}}
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5 rtl">
        @canany(['create-admin','create-user','show-admins','show-users'])
        <div class="intro-y rtl col-span-12 flex-reverese-end flex-wrap sm:flex-no-wrap items-center mt-2">
            @if(request()->is('dashboard/user'))
                <div class="flex-justify-start flex-col lg:flex-row p-5">
                    @can('create-user')
                        <a href="{{route('admin.user.create')}}" class="flex button text-white bg-theme-1 shadow-md ">
                            مشتری جدید
                            <i data-feather="plus" class="text-white text-xs ml-2"></i>
                        </a>
                    @endcan
                    @can('show-admins')
                        <a href="{{route('admin.user.staff.index')}}" class="flex button border text-theme-1 border-theme-1 shadow-md mr-2">
                            لیست مدیران سایت
                            <i data-feather="list" class="text-theme-1 text-xs ml-2"></i>
                        </a>
                    @endcan
                </div>
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

            @elseif(request()->is('dashboard/user/staff'))
                <div class="flex-justify-start flex-col lg:flex-row p-5">
                    @can('create-admin')
                        <a href="{{route('admin.user.staff.create')}}" class="flex button text-white bg-theme-1 shadow-md ">
                        مدیر جدید
                        <i data-feather="plus" class="text-white text-xs ml-2"></i>
                        </a>
                    @endcan
                    @can('show-users')
                        <a href="{{route('admin.user.index')}}" class="flex button border text-theme-1 border-theme-1 shadow-md mr-2">
                            لیست مشتریان سایت
                            <i data-feather="list" class="text-theme-1 text-xs ml-2"></i>
                        </a>
                    @endcan
                </div>
            @endif
        </div>
        @endcanany
        <!-- BEGIN: Users Layout -->
        @foreach($users as $user)
        <div class="intro-y col-span-12 md:col-span-4">
            <div class="box">
                <div class="flex flex-col lg:flex-row items-center p-5">

                    <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">

                        <img alt="{{optional($user->gallery)->alt}}" class="rounded-full" src="{{str_replace('public','/storage',optional($user->gallery)->path)}}">
                    </div>

                    <div class="lg:mr-2 lg:ml-auto text-center lg:text-right mt-3 lg:mt-0">


                        <a href="{{route('admin.user.show',$user)}}" class="font-medium mr-auto">{{$user->username}}</a>

                        <div class="text-gray-600 text-xs">{{$user->phone}}</div>
                    </div>
                    <div class="flex mt-4 lg:mt-0">
                        @if(!$user->is_superUser())
                            <a  href="{{route('admin.user.staff.permission.index',$user)}}" class="button button--sm text-white bg-theme-1 mr-2">نقش</a>
                        @endif
                        <a href="{{route('admin.user.show',$user)}}" class="button button--sm text-gray-700 border border-gray-300">پروفایل</a>
                    </div>
                    <div class=" mb-10 mr-2 report-box__indicator  tooltip cursor-pointer" title="{{$user->created_at}} تاریخ عضویت">
                        <i data-feather="alert-circle" class="w-4 h-4 text-theme-7"></i>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

        <!-- BEGIN: Users Layout -->
    </div>
    </div>



    @if(request()->is('dashboard/user'))
        <!-- BEGIN: Pagination -->
        <div class="mt-5 flex-justify-profile intro-y col-span-12 sm:flex-row sm:flex-no-wrap items-center ">
            {{--                {{$brands->links()}}--}}
            @include('Admin.Pagination.index', ['paginator' => $users,'route' => 'admin.user'])
        </div>
        <!-- END: Pagination -->
    @elseif(request()->is('dashboard/user/admin'))
        <!-- BEGIN: Pagination -->
        <div class="mt-5 flex-justify-profile intro-y col-span-12 sm:flex-row sm:flex-no-wrap items-center ">
            {{--                {{$brands->links()}}--}}
            @include('Admin.Paginator.index', ['paginator' => $users,'route' => 'admin.user.admin'])
        </div>
        <!-- END: Pagination -->
    @endif


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
            @if(request()->is('dashboard/user'))
            <a  class="" >لیست مشتریان</a>
            @elseif(request()->is('dashboard/user/admin'))
                <a  class="" >لیست مدیران</a>
            @endif
                <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('admin.dashboard.index')}}" class="breadcrumb--active">صفحه اصلی</a> </div>
    @endslot
@endcomponent
