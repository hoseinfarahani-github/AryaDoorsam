@section('css')
    <link rel="stylesheet" href="/Admin/assets/css/ProductGalleryUploader.css" type="text/css"/>
@endsection
@section('content')
    <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="intro-y flex-reverse flex-col sm:flex-row items-center mt-8 rtl ml-auto">
        <h2 class="text-lg font-medium ml-auto">
            محصول جدید
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <div class="dropdown relative mr-2">
                <a class="dropdown-toggle button box text-gray-700 flex items-center"> English <i class="w-4 h-4 ml-2" data-feather="chevron-down"></i> </a>
                <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                    <div class="dropdown-box__content box p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="activity" class="w-4 h-4 mr-2"></i> <span class="truncate">English</span> </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="activity" class="w-4 h-4 mr-2"></i> <span class="truncate">Indonesian</span> </a>
                    </div>
                </div>
            </div>
            <button type="button" class="button box text-gray-700 mr-2 flex items-center ml-auto sm:ml-0"> <i class="w-4 h-4 mr-2" data-feather="eye"></i> Preview </button>
            <div class="dropdown relative">
                <a class="dropdown-toggle button text-white bg-theme-1 shadow-md flex items-center"> ذخیره <i class="w-4 h-4 ml-2" data-feather="chevron-down"></i> </a>
                <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                    <div class="dropdown-box__content box p-2">
                        <button type="submit" href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> ذخیره محصول جدید </button>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> As Draft </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Word </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Post Info -->
        <div class="col-span-12 lg:col-span-4  mt-0">
            <div class="box pb-5 ">
                <div class="font-medium  pr-2 pl-2 pt-2 flex-justify-profile  rtl items-center border-b border-gray-200 pb-5"> <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> عکس محصول و گالری محصول </div>
                {{--                slider upload--}}
                <div class="btcd-f-input">
                    <div class="btcd-f-wrp">
                        <button class="btcd-inpBtn" type="button"><span> آپلود </span> <img src="" alt="" class="float-left"> </button>
                        <span class="btcd-f-title">بدون فایل</span>
                        <small class="f-max"> (Max 100 MB)</small>
                        <input multiple type="file" name="multiple[]" id=""onchange="func()">
                    </div>
                    <div class="btcd-files">
                    </div>
                </div>
                <section class="carousel h-96" aria-label="Gallery">
                    <ol class="carousel__viewport ">

                    </ol>
                </section>

            </div>
            <div class="mt-5">
                <div class="intro-y box p-5">
                    <div class="mt-3">
                        <label>دسته بندی </label>
                        <div class="mt-2">
                            <select data-placeholder="دسته بندی مورد نظر را انتخاب کنید" class="select2 w-full m-auto items-center"  name="category" style="width: 100%;">
                                @foreach($categories as $category)

                                                        <option style="background-color: #99a4eb !important;" value="{{$category->id}}">{{$category->title}}</option>

                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label>برند محصول</label>
                        <div class="mt-2">
                            <select data-placeholder="برند مورد نظر را انتخاب کنید" class="select2 w-full m-auto items-center" name="brand" style="width: 100%;">
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}"> {{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label>هشتگ محصول</label>
                        <div class="mt-2">
                            <select data-placeholder="Select your favorite actors" class="select2 w-full" multiple>
                                <option value="1" selected>Leonardo DiCaprio</option>
                                <option value="2">Johnny Deep</option>
                                <option value="3" selected>Robert Downey, Jr</option>
                                <option value="4">Samuel L. Jackson</option>
                                <option value="5">Morgan Freeman</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Post Info -->
        <!-- BEGIN: Post Content -->
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="flex">
                <input type="text" name="name" id="name" class="intro-y ml-2 col-span-6 input input--lg w-1/2 box pr-10 placeholder-theme-13" placeholder="نام محصول " value="{{old('name')}}">
                <input type="text" name="title" id="title" class="intro-y col-span-6 input input--lg w-1/2 box pr-10 placeholder-theme-13 " value="{{old('title')}}" style="text-align:left;direction: ltr !important;" placeholder="English Name ">

            </div>

            <div class="post intro-y overflow-hidden box mt-5 rtl">
                <div class="post__tabs nav-tabs flex flex-col sm:flex-row bg-gray-200 text-gray-600  ">
                    <a title="Fill in the article content" data-toggle="tab" data-target="#content" href="javascript:;" class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center active"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> درباره محصول </a>
                    <a title="Adjust the meta title" data-toggle="tab" data-target="#abstract" href="javascript:;" class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center"> <i data-feather="code" class="w-4 h-4 mr-2"></i> توضیحات مختصر </a>
                    <a title="Use search keywords" data-toggle="tab" data-target="#attribute" href="javascript:;" class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center"> <i data-feather="align-left" class="w-4 h-4 mr-2"></i> ویژگی ها  </a>
                    <a title="Use search keywords" data-toggle="tab" data-target="#extraAttribute" href="javascript:;" class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center"> <i data-feather="align-left" class="w-4 h-4 mr-2"></i> ویژگی های متغییر  </a>
                </div>
                <div class="post__content tab-content ">
                    <div class="tab-content__pane p-5 active" id="content">
                        <div class="border border-gray-200 rounded-md p-5">
                            <div class="font-medium mr-0 flex items-center border-b border-gray-200 pb-5"> درباره محصول پایین صفحه محصول نمایش داده میشود </div>
                            <div class="mt-5">
                                <textarea data-feature="all" class="summernote" data-height="250" name="long_description" id="long_description" value="{{old('long_description')}}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content__pane p-5 " id="abstract">
                        <div class="border border-gray-200 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-gray-200 pb-5">  توضیحات مختصر در بالای صفحه محصول نمایش داده میشود </div>
                            <div class="mt-5">
                                <textarea data-feature="all" class="summernote" data-height="250" name="short_description" id="short_description" value="{{old('short_description')}}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content__pane p-5 " id="attribute">
                        <div class="border border-gray-200 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-gray-200 pb-5" >ویژگی های محصول  </div>
                            <div class="mt-5 grid-cols-12 grid">
                                <div class="mt-3 col-span-6">
                                    <label for="price">قیمت</label>
                                    <div class="relative mt-2">
                                        <input type="text" class="input pr-12 w-full border col-span-4" placeholder="قیمت را وارد کنید" name="price" id="price" value="{{old('price')}}">
                                        <div class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">تومان</div>
                                    </div>
                                </div>
                                <div class="mt-3 col-span-6 mr-2">
                                    <label for="">کد بین الملل محصول</label>
                                    <div class="relative mt-2">
                                        <input type="text" name="UPC" id="UPC" value="{{old('UPC')}}" class="input w-full border " placeholder="UPC را وارد کنید">
                                    </div>
                                </div>
                                <div class="mt-3 col-span-6 mr-2 flex">
                                    <div class="relative mt-2 mr-2">
                                        <label for="">طول</label>
                                        <input type="number" name="volume[1]"  value="{{old('volume[1]')}}" class="input w-full border " placeholder="طول ">
                                    </div>
                                    <div class="relative mt-2 mr-2">
                                        <label for="">عرض</label>
                                        <input type="number" name="volume[2]"  value="{{old('volume[2]')}}" class="input w-full border " placeholder="عرض ">
                                    </div>
                                    <div class="relative mt-2">
                                        <label for="">ارتفاع</label>
                                        <input type="number" name="volume[3]"  value="{{old('volume[3]')}}" class="input w-full border " placeholder="ارتفاع ">
                                    </div>
                                </div>
                                <div class="mt-3 col-span-6 mr-2">
                                    <label for="">وزن</label>
                                    <div class="relative mt-2">
                                        <input type="number" name="weight" id="weight" value="{{old('weight')}}" class="input pr-12 w-full border col-span-4" placeholder="وزن را وارد کنید" >
                                        <div class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">گرم</div>
                                    </div>
                                </div>
                                <div class="mt-3 col-span-6 mr-2">
                                    <label for="">تعداد</label>
                                    <div class="relative mt-2">
                                        <input type="number" name="quantity" id="quantity" value="{{old('quantity')}}" class="input w-full border col-span-4" placeholder="تعداد محصول را وارد کنید">
                                    </div>
                                </div>
                                <div class="mt-3 col-span-6 mr-2">
                                    <label for="">حداکثر تعداد سفارش</label>
                                    <div class="relative mt-2">
                                        <input type="number" name="maxOrder" id="maxOrder" value="{{old('maxOrder')}}" class="input w-full border col-span-4" placeholder=" حداکثر تعداد سفارش" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content__pane p-5 " id="extraAttribute">
                        <div class="border border-gray-200 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-gray-200 pb-5" >ویژگی های متغییر محصول  </div>
                            <div id="attributes" data-attributes = "{{json_encode(\App\Models\Product\Attribute::all()->pluck('title'))}}"></div>
                            <div class="mt-5 grid-cols-12 grid">
                                <div class="col-span-12" id="attribute_section">

                                </div>
                                <div class="col-span-12">
                                <button class="button text-white bg-theme-1 shadow-md w-full mt-3" type="button" id="add_product_attribute">ویژگی جدید</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Post Content -->
    </div>
    </form>
@endsection
@section('js')
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
    <script src="https://unpkg.com/create-file-list@1.0.1/dist/create-file-list.min.js"></script>
    <script src="/Admin/assets/js/ProductGalleryUploader.js"></script>
    <script src="/Admin/assets/js/productAttribute.js"></script>
@endsection
@component('Admin.Layout.layout')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" disabled >ایجاد محصول</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('admin.product.index')}}" class="breadcrumb--active" >محصولات </a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('admin.dashboard.index')}}" class="breadcrumb--active">صفحه اصلی</a> </div>
    @endslot
@endcomponent

