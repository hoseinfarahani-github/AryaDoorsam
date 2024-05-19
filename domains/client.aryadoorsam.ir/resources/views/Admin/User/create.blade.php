
{{--TODO input ha roo doros konam bara save admin--}}
@section('css')
    <link rel="stylesheet" href="/assest/Admin/css/GalleryFileUploader.css" />
@endsection
@section('content')
    <h2 class="intro-y text-lg font-medium mt-10 rtl">
        مشتری جدید
    </h2>
    <!-- BEGIN: Wizard Layout -->
    <div class="intro-y box py-10 sm:py-20 mt-5">
        <div class=" nav-tabs pos__tabs wizard flex flex-col lg:flex-row justify-center px-5 sm:px-20 rtl">
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <a id="s1" data-toggle="tab" data-target="#step1" href="javascript:;"  class="button w-10 h-10 rounded-full  active bg-theme-1 text-white activated" >1</a>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-gray-700">ثبت نام اصلی</div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <a id="s2" data-toggle="tab" data-target="#step2" href="javascript:;"  class=" disabled  w-10 h-10 rounded-full button text-gray-600 bg-gray-200 ">2</a>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-gray-700">مشخصات احراز هویت</div>
            </div>

            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <a id="s3" data-toggle="tab" data-target="#step3" href="javascript:;" class=" disabled w-10 h-10 rounded-full button text-gray-600 bg-gray-200 ">3</a>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-gray-700">تکمیل مشخصات </div>
            </div>



            <div class="wizard__line hidden lg:block w-2/3 bg-gray-200 absolute mt-5"></div>
        </div>

        <form action="{{route('admin.user.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="tab-content pos">
                <div id="step1" class="tab-content__pane active px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200" >
                    <div class="font-medium text-base">اطلاعات ثبت نام</div>
                    <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5 rtl">
                        {{--                    TODO label ha sakhte shavad--}}
                        <div class="intro-y col-span-12 sm:col-span-5">
                            <div class="mb-2"><label for="email"><i data-feather="mail" class="w-4 h-4 float-right ml-2 text-blue-400"></i>ایمیل</label></div>
                            <input type="text" name="email" class="input w-full border flex-1" placeholder="example@gmail.com" id="email">
                        </div>
                        <div class="intro-y col-span-12 sm:col-span-1">
                            <div class="mb-2"><label for="email">تایید ایمیل</label></div>
                            <input type="checkbox" class="tooltip input input--switch border " style="direction: ltr !important;" value="1" name="verifyEmail" title="با انتخاب این گزینه ایمیل فعال خواهد شد  "> </div>
                        <div class="intro-y col-span-12 sm:col-span-6">
                            <div class="mb-2"><label for="phone"><i data-feather="phone" class="w-4 h-4 float-right ml-2 text-blue-400"></i>شماره موبایل</label></div>
                            <input type="text" name="phone" class="input w-full border flex-1" placeholder="09124805562" id="phone">
                        </div>
                        <div class="intro-y col-span-12 sm:col-span-3">
                            <div class="mb-2"><label for="username">نام کاربری<i data-feather="user" class="w-4 h-4 float-right ml-2 text-blue-400"></i></label></div>
                            <input type="text" name="username" class="input w-full border flex-1" placeholder="userName" id="username">
                        </div>
                        <div class="intro-y col-span-12 sm:col-span-3">
                            <label for="birthday"><i data-feather="calendar" class="w-4 h-4 float-right ml-2  text-blue-400"></i>تاریخ تولد</label>
                            <input name="birthday" id="birthday"   type="date" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="تاریخ تولد">
                        </div>
                        <div class="intro-y col-span-12 sm:col-span-3">
                            <div class="mb-2"><label for="password"><i data-feather="alert-triangle" class="w-4 h-4 float-right ml-2 text-red-600"></i>رمز عبور</label></div>
                            <input type="password" name="password" id="password" onkeyup='check();' class="input w-full border flex-1" placeholder="*******">
                        </div>
                        <div class="intro-y col-span-12 sm:col-span-3">
                            <div class="mb-2"><label for="verifyPassword">تکرار رمز عبور<i data-feather="alert-triangle" class="w-4 h-4 float-right ml-2 text-red-600"></i></label></div>
                            <input type="password" name="verifyPassword" id="verifyPassword" onkeyup='check();' class="input w-full border flex-1" placeholder="********">
                            <span id='message'></span>
                        </div>

                        <div class=" ml-2 col-span-4">
                            <label for="province"><i data-feather="map" class="w-4 h-4 float-right ml-2 text-blue-400"></i>استان</label>
                            <select id="province"  class="mt-2 input select-2 block w-full border"name="province" onchange="selectProvince()">

                                <option value="0" disabled label="انتخاب استان ..." selected="selected" class="align-right" style="direction: rtl">انتخاب استان ..</option>
                                @foreach($province as $pro)

                                    <option  value="{{$pro->id}}" label="{{$pro->name}}">{{$pro->name}}</option>
                                @endforeach


                            </select>
                        </div>
                        <div class=" ml-2 col-span-4">
                            <label for="city"><i data-feather="map" class="w-4 h-4 float-right ml-2 text-blue-400"></i>شهر</label>
                            <select id="city"  disabled   class="mt-2 input select-2 block w-full border" name="city">

                                <option value="0" disabled   label="انتخاب شهر ..." selected="selected" class="align-right" style="direction: rtl">انتخاب شهر ..</option>

                            </select>
                        </div>

                        <div class="intro-y col-span-4 ">
                            <div class="mb-2"><label for="postalCode"><i data-feather="mail" class="w-4 h-4 float-right ml-2 text-blue-400"></i>کد پستی</label></div>
                            <input type="postalCode" name="postalCode" id="postalCode"  class="input w-full border flex-1" placeholder="123456789">
                        </div>

                        <div class="intro-y col-span-12 ">
                            <div class="mb-2"><label for="postalCode"><i data-feather="map-pin" class="w-4 h-4 float-right ml-2 text-blue-400"></i>آدرس</label></div>
                            <input type="address" name="address" id="address"  class="input w-full border flex-1" placeholder="خیابان شریعتی, کوچه ...">
                        </div>

                        <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5 mr-auto">
                            <a data-toggle="tab"   data-target="#step2" href="#/s2"  id="s1next" class="disabled button w-24 justify-center block bg-gray-600 text-white ml-2 mr-2">بعدی</a>
                        </div>
                    </div>
                </div>
                <div id="step2" class="tab-content__pane  px-5 sm:px-10 mt-10 pt-10 border-t border-gray-200 " >
                    <div class="col-span-12 lg:col-span-12">

                        <div class="intro-y pr-1">

                            <div class="box p-2">
                                <div class="pos__tabs nav-tabs justify-center flex">
                                    <a data-toggle="tab" data-target="#juridical" href="javascript:;" onclick="select('juridical')"  class="flex-1 py-2 rounded-md text-center ">شخصیت حقوقی</a>
                                    <a data-toggle="tab" data-target="#personal" href="javascript:;" onclick="select('personal')" class="flex-1 py-2 rounded-md text-center">شخصیت حقیقی</a>
                                    <input name="AuthenticationUser" id="AuthenticationUser" hidden="hidden" value="">
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">

                            <div class="tab-content__pane " id="juridical" >
                                <div class="pos__ticket box p-2 mt-5">
                                    <div class="intro-y box">

                                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200  bg-indigo-100 rounded">
                                            <p>در این بخش مشخصات کاربر حقوقی را وارد کنید</p>
                                        </div>
                                        <div class="p-5 " id="input">
                                            <div class="preview rtl grid grid-cols-12">

                                                <div class=" ml-2 col-span-4">
                                                    <label for="companyName"><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>نام شرکت</label>
                                                    <input name="companyName" id="companyName"  type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="نام"  >
                                                </div>

                                                <div class=" ml-2 col-span-4">
                                                    <label for="nationalCompany"><i data-feather="credit-card" class="w-4 h-4 float-right ml-2 text-blue-400"></i>شناسه ملی شرکت</label>
                                                    <input name="nationalCompany" id="nationalCompany"  type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="شناسه ثبت شرکت"  >
                                                </div>

                                                <div class=" ml-2 col-span-4">
                                                    <label for="companyRegistrationCompany"><i data-feather="credit-card" class="w-4 h-4 float-right ml-2 text-blue-400"></i>شناسه ملی حقوقی</label>
                                                    <input name="companyRegistrationCompany" id="companyRegistrationCompany"  type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="شناسه ملی حقوقی"  >
                                                </div>

                                                <div class=" ml-2 mt-2 col-span-4">
                                                    <label for="activity"><i data-feather="credit-card" class="w-4 h-4 float-right ml-2 text-blue-400"></i>حوزه فعالیت شرکت</label>
                                                    <input name="activity" id="activity"  type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="حوزه فعالیت شرکت"  >
                                                </div>

                                                <div class=" ml-2 mt-2 col-span-4">
                                                    <label for="CEOFirstName"><i data-feather="user" class="w-4 h-4 float-right ml-2 text-blue-400"></i>نام مدیرعامل</label>
                                                    <input name="CEOFirstName" id="CEOFirstName"  type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="نام مدیرعامل" >
                                                </div>

                                                <div class=" ml-2 mt-2 col-span-4">
                                                    <label for="CEOLastName"><i data-feather="user" class="w-4 h-4 float-right ml-2 text-blue-400"></i> نام خانوادگی مدیرعامل</label>
                                                    <input name="CEOLastName" id="CEOLastName"  type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="نام خانوادگی مدیرعامل" >
                                                </div>

                                                <div class=" ml-2 mt-2 col-span-4">
                                                    <label for="proxyFirstName"><i data-feather="user" class="w-4 h-4 float-right ml-2 text-blue-400"></i>نام نماینده</label>
                                                    <input name="proxyFirstName" id="proxyFirstName"  type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="نام نماینده" >
                                                </div>

                                                <div class=" ml-2 mt-2 col-span-4">
                                                    <label for="proxyLastName"><i data-feather="user" class="w-4 h-4 float-right ml-2 text-blue-400"></i> نام خانوادگی نماینده</label>
                                                    <input name="proxyLastName" id="proxyLastName"  type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="نام خانوادگی نماینده" >
                                                </div>


                                                <div class=" ml-2 mt-2 col-span-4">
                                                    <label for="companyPhone"><i data-feather="phone-call" class="w-4 h-4 float-right ml-2  text-blue-400"></i>شماره تلفن ثابت شرکت</label>
                                                    <input name="companyPhone" id="companyPhone"  type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="شماره تلفن ثابت شرکت"  >
                                                </div>
                                                <div class=" ml-2 mt-2 col-span-4">
                                                    <label for="present_id"><i data-feather="user" class="w-4 h-4 float-right ml-2  text-blue-400"></i>کد معرف</label>
                                                    <input name="present_id" id="present_id"  type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="کد معرف" >
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-content__pane" id="personal" >
                                <div class="pos__ticket box p-2 mt-5">
                                    <div class="intro-y box">
                                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200  bg-indigo-100 rounded">
                                            <p>اطلاعات شخصیت حقیقی را با دقت پر کنید</p>

                                        </div>
                                        <div class="p-5 " id="input">
                                            <div class="preview rtl grid grid-cols-12">
                                                <div class=" ml-2 col-span-4">
                                                    <label for="national"><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>کد ملی</label>
                                                    <input name="national" id="national"  type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="کد ملی">
                                                </div>

                                                <div class=" ml-2 col-span-4">
                                                    <label for="firstName"><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>نام</label>
                                                    <input name="firstName" id="firstName" type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="نام">
                                                </div>

                                                <div class=" ml-2 col-span-4">
                                                    <label for="lastName"><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>نام خانوادگی</label>
                                                    <input name="lastName" id="lastName" type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="نام خانوادگی">
                                                </div>

                                                <div class=" ml-2 mt-2 col-span-4">
                                                    <label for="occupation"><i data-feather="edit-2" class="w-4 h-4 float-right ml-2  text-blue-400"></i>شغل</label>
                                                    <input name="occupation" id="occupation"  type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="تاریخ تولد">
                                                </div>
                                                <div class=" ml-2 mt-2 col-span-4">
                                                    <label for="present_id"><i data-feather="user" class="w-4 h-4 float-right ml-2  text-blue-400"></i>کد معرف</label>
                                                    <input name="present_id" id="present_id"   type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="کد معرف" >
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5 mr-auto">

                        <a data-toggle="tab" data-target="#step1" href="#/s1"id="s2perv" class="button w-24 justify-center block bg-gray-200 text-gray-600">قبلی</a>
                        <a data-toggle="tab"   data-target="#step3" href="#/s3"  id="s2next" class=" button w-24 justify-center block bg-gray-600 text-white ml-2 mr-2">بعدی</a>
                    </div>
                </div>
                <div id="step3" class="tab-content__pane  px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200 " >
                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200  bg-indigo-100 rounded">
                        <p>در این بخش درباره کاربر و عکس کاربر را انتخاب کنید</p>
                    </div>
                    <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5 rtl">
                        <div class="intro-y col-span-12 sm:col-span-6">
                            <div class="mb-2">درباره کاربر</div>
                            <textarea class="summernote" name="note"></textarea>
                        </div>

                        <div class="intro-y col-span-12 sm:col-span-6">
                            <div class="intro-y ">
                                <div id="uploadArea1" class="upload-area ">
                                    <!-- Headedd -->
                                    <div class="upload-area__header">
                                        <h1 class="upload-area__title" id="dropZoneNameHype1">عکس کاربر</h1>
                                        <p class="upload-area__paragraph">
                                            <strong class="upload-area__tooltip">
                                                فرمت مجاز فایل ها
                                                <span id="upload-area__tooltip-data1" class="upload-area__tooltip-data"></span> <!-- Data Will be Comes From Js -->
                                            </strong>
                                        </p>
                                    </div>
                                    <!-- End Header -->
                                    <!-- Drop Zoon -->
                                    <div id="dropZoon1" class="upload-area__drop-zoon drop-zoon" >
                                <span class="drop-zoon__icon" >
                                  <i class='bx bxs-file-image'></i>
                                </span>
                                        <p class="drop-zoon__paragraph" onclick="addOrSelectGallery(1)" style="height: inherit; line-height: 10;">عکس خود را به انجا بکشید یا بارگزاری کنید </p>
                                        <span id="loadingText1" class="drop-zoon__loading-text">Please Wait</span>
                                        <img src="" alt="Preview Image" id="previewImage1" class="drop-zoon__preview-image" draggable="false" >
                                        <input type="file" id="fileInput1" name="userImage" class="drop-zoon__file-input" accept="image/*" >
                                    </div>
                                    <!-- End Drop Zoon -->

                                    <!-- File Details -->
                                    <div id="fileDetails1" class="upload-area__file-details file-details">

                                        <div id="uploadedFile1" class="uploaded-file">
                                            <div class="uploaded-file__icon-container">
                                                <i class='bx bxs-file-blank uploaded-file__icon'></i>
                                                <span class="uploaded-file__icon-text"></span> <!-- Data Will be Comes From Js -->
                                            </div>

                                            <div id="uploadedFileInfo1" class="uploaded-file__info">
                                                <span id="uploaded-file__name1" class="uploaded-file__name">Proejct 1</span>
                                                <span id="uploaded-file__counter1"class="uploaded-file__counter">0%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End File Details -->
                                    <div class="mt-4 hidden" id="changeDetails1">
                                        <label class="  w-full h-full text-right float-right ml-2 text-blue-400" id="labelFileName1">نام عکس </label>
                                        <input class="  input w-full rtl border mt-2 align-right" readonly value="" id="FileName1" name="title">
                                        <label class="  w-full h-full text-right float-right ml-2 mt-2 text-blue-400" id="labelFileَAlt1">َمتن جایگزین</label>
                                        <input class="  input w-full rtl border mt-2 align-right" value="" readonly id="FileAlt1" name="alt" placeholder="alt عکس را وارد کنید ">
                                    </div>

                                </div>                                    <!-- End Upload Area -->
                            </div>

                        </div>


                        <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5 mr-auto">

                            <input type="submit" class="button w-24 justify-center block bg-theme-1 text-white ml-2 mr-2" value="ثبت">
                            <a data-toggle="tab" data-target="#step2" href="#/s2" id="s3perv" class="button w-24 justify-center block bg-gray-200 text-gray-600">قبلی</a>
                        </div>
                    </div>
                </div>


            </div>
        </form>
    </div>
    <!-- END: Wizard Layout -->



    <!-- BEGIN: Delete Confirmation Modal -->
    <div class="modal" id="delete-confirmation-modal">
        <div class="modal__content">
            <div class="p-5 text-center">
                <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                <div class="text-3xl mt-5">Are you sure?</div>
                <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot be undone.</div>
            </div>
            <div class="px-5 pb-8 text-center">
                <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
                <button type="button" class="button w-24 bg-theme-6 text-white">Delete</button>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="/assest/Admin/js/GallertFileUploader.js"></script>
    <script src="/assest/Admin/js/Address.js"></script>
    <script src="/Admin/js/CategoryImageUploader.js"> </script>
    <script>

        function select(authentication){
            document.getElementById('AuthenticationUser').value=authentication
        }

        $('#s1next').click(function() {
            $('#s2').addClass('active');
            $('#s1').removeClass('active');
            $('#s1').addClass('text-gray-600');
            $('#s2').addClass('text-white');
            $('#s2').addClass('bg-theme-1');
            $('#s2').removeClass('text-gray-600');
            $('#s2').removeClass('bg-gray-200');
            $('#s1').removeClass('text-white');
            $('#s1').removeClass('bg-theme-1');
            $('#s1').addClass('text-gray-600');
            $('#s1').addClass('bg-gray-200');

        });
        $('#s2next').click(function() {
            $('#s3').addClass('active');
            $('#s3').removeClass('text-gray-600');
            $('#s3').removeClass('bg-gray-200');
            $('#s3').addClass('text-white');
            $('#s3').addClass('bg-theme-1');

            $('#s2').removeClass('active');
            $('#s2').addClass('text-gray-600');
            $('#s2').removeClass('bg-theme-1');
            $('#s2').removeClass('text-white');
            $('#s2').addClass('bg-gray-200');
            $('#s2').addClass('text-gray-600');
        });
        $('#s3next').click(function() {
            $('#s4').addClass('active');
            $('#s3').removeClass('active');
            $('#s3').addClass('text-gray-600');
            $('#s4').addClass('text-white');
            $('#s4').addClass('bg-theme-1');
            $('#s4').removeClass('text-gray-600');
            $('#s4').removeClass('bg-gray-200');
            $('#s3').removeClass('bg-theme-1');
            $('#s3').removeClass('text-white');
            $('#s3').addClass('bg-gray-200');
            $('#s3').addClass('text-gray-600');

        });
        $('#s2perv').click(function() {
            $('#s1').addClass('active');
            $('#s2').removeClass('active');
            $('#s2').addClass('text-gray-600');
            $('#s2').removeClass('text-white');
            $('#s2').removeClass('bg-theme-1');
            $('#s2').addClass('bg-gray-200')
            $('#s2').addClass('text-gray-600');
            $('#s1').addClass('text-white');
            $('#s1').addClass('bg-theme-1',);
            $('#s1').removeClass('text-gray-600');
            $('#s1').removeClass('bg-gray-200');
        });
        $('#s3perv').click(function() {
            $('#s2').addClass('active');
            $('#s3').removeClass('active');
            $('#s3').addClass('text-gray-600');
            $('#s2').removeClass('text-gray-600');
            $('#s2').removeClass('bg-gray-200');
            $('#s2').addClass('text-white');
            $('#s2').addClass('bg-theme-1');
            $('#s3').removeClass('text-white');
            $('#s3').removeClass('bg-theme-1');
            $('#s3').addClass('bg-gray-200');
            $('#s3').addClass('bg-gray-200');
        });
        $('#s4perv').click(function() {
            $('#s3').addClass('active');
            $('#s4').removeClass('active');
            $('#s4').addClass('text-gray-600');
            $('#s3').removeClass('text-gray-600');
            $('#s3').removeClass('bg-gray-200');
            $('#s3').addClass('text-white');
            $('#s3').addClass('bg-theme-1');

        });
        $('#s1').click(function() {
            $('#s1').addClass('text-white');
            $('#s1').addClass('bg-theme-1');
            $('#s1').removeClass('bg-gray-200');
            $('#s1').removeClass('text-gray-600');

            $('#s2').removeClass('text-white');
            $('#s2').removeClass('bg-theme-1');

            $('#s3').removeClass('text-white');
            $('#s3').removeClass('bg-theme-1');

            $('#s2').addClass('text-gray-600');
            $('#s2').addClass('bg-gray-200');

            $('#s3').addClass('bg-gray-200');
            $('#s3').addClass('text-gray-600');

        });
        $('#s2').click(function() {
            $('#s2').addClass('bg-theme-1');
            $('#s2').addClass('text-white');
            $('#s2').removeClass('bg-gray-200');
            $('#s2').removeClass('text-gray-600');
            $('#s1').removeClass('bg-theme-1');
            $('#s1').removeClass('text-white');
            $('#s3').removeClass('bg-theme-1');
            $('#s3').removeClass('text-white');
            $('#s3').addClass('text-gray-600');
            $('#s3').addClass('bg-gray-200');
            $('#s1').addClass('bg-gray-200');
            $('#s1').addClass('text-gray-600');

        });
        $('#s3').click(function() {
            $('#s3').addClass('bg-theme-1');
            $('#s3').addClass('text-white');
            $('#s3').removeClass('bg-gray-200');
            $('#s3').removeClass('text-gray-600');
            $('#s2').removeClass('text-white');
            $('#s2').removeClass('bg-theme-1');

            $('#s1').removeClass('text-white');
            $('#s1').removeClass('bg-theme-1');



            $('#s2').addClass('text-gray-600');
            $('#s2').addClass('bg-gray-200');

            $('#s1').addClass('text-gray-600');
            $('#s1').addClass('bg-gray-200');



        });
        // document.getElementById('s1next').disabled = true;

        var check = function() {
            if (document.getElementById('password').value ===
                document.getElementById('verifyPassword').value && document.getElementById('password').value != '' && document.getElementById('verifyPassword').value != '')
            {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'درست زدی';
                document.getElementById('s1next').classList.remove("disabled");
                document.getElementById('s1next').classList.remove("bg-gray-600");
                document.getElementById('s1next').classList.add("bg-theme-1");
                document.getElementById('step2').classList.remove("disabled");
                document.getElementById('step3').classList.remove("disabled");
            }
            else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = ' پسورد را صحیح وارد کنید';
                document.getElementById('s1next').classList.add("disabled");
                document.getElementById('step2').classList.add("disabled");
                document.getElementById('step3').classList.add("disabled");
                document.getElementById('s1next').style.backgroundColor = "gray";
            }
            if(document.getElementById('password').value === null ||
                document.getElementById('verifyPassword').value === null){
                document.getElementById('message').innerHTML = '';
            }
        }
    </script>
@endsection

@component('Admin.Layout.Layout1')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" >مشتری جدید</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('admin.user.index')}}" class="breadcrumb--active">لیست مشتریان</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('dashboard')}}" class="breadcrumb--active">صفحه اصلی</a> </div>
    @endslot
@endcomponent
