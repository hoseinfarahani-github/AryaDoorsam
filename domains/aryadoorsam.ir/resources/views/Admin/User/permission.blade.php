

@section('css')
    <link rel="stylesheet" href="/assest/Admin/css/GalleryFileUploader.css" />
@endsection
@section('content')
    {{--@foreach($user->permissions() as $us)
        <h1>{{$us->permission_id}}</h1>
    @endforeach--}}

    <div class="pos intro-y grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12 lg:col-span-12">
            <h2 class="intro-y text-lg font-medium mt-10 flex">
                {{$user->username}} دسترسی و مقام های </h2>
            <p class="intro-y text-xs font-medium  flex mb-5 " style="color: #4a5568">برای مقام  مورد نظر دسترسی ها  را پر کرده و در نهایت اطلاعات را ذخیره کنید</p>
            <hr>
        </div>
        {{--Begin new Category--}}

        <div class="col-span-12 lg:col-span-12">
            <form action="{{route('admin.user.permission.store',$user)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="intro-y pr-1">
                    <div class="box p-2">
                        <div class="pos__tabs nav-tabs justify-center flex">
                            <a data-toggle="tab" data-target="#Role" href="javascript:;" class="flex-1 py-2 rounded-md text-center active"> مقام ها </a>
                            <a data-toggle="tab" data-target="#Permission" href="javascript:;" class="flex-1 py-2 rounded-md text-center"> دسترسی ها </a>
                            {{--                            <a data-toggle="tab" data-target="#image" href="javascript:;" class="flex-1 py-2 rounded-md text-center">عکس مقام</a>--}}
                        </div>
                    </div>
                </div>
                <x-auth-validation-errors class="text-danger mt-3 list-disc list-inside text-sm-start rtl mr-2" :errors="$errors" />

                <div class="tab-content">
                    <div class="tab-content__pane active" id="Role">
                        <div class="pos__ticket box p-2 mt-5">

                            <div class="intro-y box">
                                <div class="p-5 " id="input">
                                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-600 bg-indigo-200 rounded">
                                        <p> در این قسمت مقام کاربر را انتخاب کنید</p>
                                    </div>
                                    <div class="p-5 col-span-12">
                                        <select data-placeholder="مقام مورد نظر را انتخاب کنید" class="select2 w-full m-auto items-center" multiple name="Role[]" style="width: 100%;">

                                            @foreach($roles as $role)

                                                <option value="{{$role->id}}"
                                                        {{in_array($role->id,$user->Roles->pluck('id')->toArray()) ? 'selected' : '' }}
                                                >{{$role->label}}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>





                        </div>                    </div>
                    <div class="tab-content__pane" id="Permission">
                        <div class="pos__ticket box p-2 mt-5">

                            <div class="intro-y box">
                                <div class="p-5 " id="input">
                                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-600 bg-indigo-200 rounded">
                                        <p> در این قسمت دسترسی های عمومی کاربر را انتخاب کنید</p>
                                    </div>
                                    <div class="p-5 col-span-12">
                                        <select data-placeholder="دسترسی مورد نظر را انتخاب کنید" class="select2 w-full m-auto items-center" multiple name="publicPermissions[]" style="width: 100%;">

                                            @foreach($publicPermissions as $pp)

                                                <option value="{{$pp->id}}"
                                                        {{in_array($pp->id,$user->publicPermissions->pluck('id')->toArray()) ? 'selected' : '' }}
                                                >{{$pp->label}}</option>

                                            @endforeach
                                        </select>
                                        {{--@if($company->id ==2)
                                            @dd($user->roles,$user->roles[array_search(1 , $user->roles->pluck('id')->toArray())])
                                        @endif--}}
                                        {{--<option value="{{$permission->id}}" {{$r=in_array([$role->id,$company->id] ,$s)
                                                                  ? 'selected' : '' }}>{{$role->label}}</option>--}}
                                    </div>
                                </div>
                            </div>


                            @foreach($companies as $company)
                                <br>
                                <div class="intro-y box">
                                    <div class="p-5 " id="input">
                                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-600 bg-indigo-200 rounded">
                                            <p> در این قسمت دسترسی های خصوصی کاربر را در کارخانه
                                             <span class="font-bold">   {{$company->name}} </span>
                                                انتخاب کنید</p>
                                        </div>


                                        <div class="p-5 col-span-12">
                                            <select data-placeholder="دسترسی مورد نظر را انتخاب کنید" class="select2 w-full m-auto items-center" multiple name="privatePermissions_{{$company->title}}[]" style="width: 100%;">

                                                @foreach($privatePermissions as $pp)

                                                    <option value="{{$pp->id}}"
                                                        {{in_array($pp->id,$user->PUC->where('company_id','=',$company->id)->pluck('permission_id')->toArray()) ? 'selected' : '' }}
                                                    >{{$pp->label}}</option>

                                                @endforeach
                                            </select>
                                            {{--@if($company->id ==2)
                                                @dd($user->roles,$user->roles[array_search(1 , $user->roles->pluck('id')->toArray())])
                                            @endif--}}
                                            {{--<option value="{{$permission->id}}" {{$r=in_array([$role->id,$company->id] ,$s)
                                                                      ? 'selected' : '' }}>{{$role->label}}</option>--}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                </div>
                <div class="flex mt-5">
                    <a href="{{route('admin.user.index')}}"   class="button w-32 border shadow-md mr-1 mb-2 bg-gray-200 text-gray-600 ml-2">انصراف</a>
                    <input   type="submit"  name="submit"  value="ذخیره اطلاعات" class="button w-32 text-white bg-theme-1  shadow-md mr-1 mb-2 bg-theme-1  ml-auto">
                </div>
            </form>
        </div>

    </div>

@endsection
@section('js')
    <script src="/Admin/js/CategoryImageUploader.js"> </script>
@endsection

@component('Admin.Layout.Layout1')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" > {{$role->name}} دسترسی مقام </a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            {{--TODO make page for Admin List--}}
            <a href="{{route('admin.role.index')}}" class="breadcrumb--active">لیست مقام ها</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('dashboard')}}" class="breadcrumb--active">صفحه اصلی</a> </div>
    @endslot
@endcomponent
