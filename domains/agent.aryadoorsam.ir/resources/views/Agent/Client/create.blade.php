@section('css')
    <link rel="stylesheet" href="/assets/css/Address.css" />
@endsection

@section('content')
    <div class="page-body">

        <!-- New Product Add Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="row">


                        <form action="{{route('agent.client.store')}}" method="post">
                            @CSRF
                            <div class="col-sm-8 m-auto">
                                @if($errors->any())
                                    <div class="alert alert-danger" role="alert">

                                        @foreach($errors->all() as $error)
                                            <li> {{$error}} </li>
                                        @endforeach

                                    </div>
                                @endif
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-header-2">
                                            <h5><i class="fa fa-user m-r-5"></i>مشخصات مشتری</h5>
                                        </div>
                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="pills-home-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-home"
                                                        type="button">شخصیت حقیقی
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-profile-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-profile"
                                                        type="button">شخصیت حقوقی
                                                </button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                                                <div class="card-header-1">
                                                    <h5>شخصیت حقیقی</h5>
                                                </div>

                                                <div class="row g-4">

                                                    <div class="col-xxl-6">
                                                        <div class="form-floating theme-form-floating">
                                                            <input class="form-control" type="text"
                                                                   placeholder="نام مشتری"
                                                                   name="ClientPersonalFirstName"
                                                                   value="{{old('ClientPersonalFirstName')}}"
                                                                   id="ClientPersonalFirstName">
                                                            <label class="right-0"
                                                                   for="ClientPersonalFirstName">نام</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-xxl-6">
                                                        <div class="form-floating theme-form-floating">
                                                            <input class="form-control" type="text"
                                                                   placeholder="نام خانوادگی مشتری"
                                                                   name="ClientPersonalLastName"
                                                                   value="{{old('ClientPersonalLastName')}}"
                                                                   id="ClientPersonalLastName">
                                                            <label class="right-0" for="ClientPersonalLastName">نام
                                                                خانوادگی</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-xxl-6">
                                                        <div class="form-floating theme-form-floating">
                                                            <input class="form-control" type="text" placeholder="کدملی"
                                                                   name="ClientPersonalNationalNumber"
                                                                   id="ClientPersonalNationalNumber">
                                                            <label class="right-0" for="ClientPersonalNationalNumber">کدملی</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-xxl-6">
                                                        <div class="form-floating theme-form-floating">
                                                            <input class="form-control" type="tel"
                                                                   placeholder="شماره همراه" name="ClientPersonalPhone"
                                                                   id="ClientPersonalPhone">
                                                            <label class="right-0" for="ClientPersonalPhone">شماره
                                                                همراه</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="pills-profile" role="tabpanel">
                                                <div class="card-header-1">
                                                    <h5>شخصیت حقوقی</h5>
                                                </div>

                                                <div class="row g-4">

                                                    <div class="col-xxl-6">
                                                        <div class="form-floating theme-form-floating">
                                                            <input class="form-control" type="text"
                                                                   placeholder="نام شرکت" name="ClientJuridicalName"
                                                                   id="ClientJuridicalName">
                                                            <label class="right-0" for="ClientJuridicalName">نام
                                                                شرکت</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-xxl-6">
                                                        <div class="form-floating theme-form-floating">
                                                            <input class="form-control" type="text"
                                                                   placeholder="نام رابط کارخانه"
                                                                   name="ClientJuridicalContactName"
                                                                   id="ClientJuridicalContactName">
                                                            <label class="right-0" for="ClientJuridicalContactName">نام
                                                                رابط شرکت</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-xxl-6">
                                                        <div class="form-floating theme-form-floating">
                                                            <input class="form-control" type="tel"
                                                                   placeholder="شماره شرکت" name="ClientJuridicalPhone"
                                                                   id="ClientJuridicalPhone">
                                                            <label class="right-0" for="ClientJuridicalPhone">شماره
                                                                شرکت</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-xxl-6">
                                                        <div class="form-floating theme-form-floating">
                                                            <input class="form-control" type="tel"
                                                                   placeholder="شماره نماینده شرکت"
                                                                   name="ClientJuridicalContactPhone"
                                                                   id="ClientJuridicalContactPhone">
                                                            <label class="right-0" for="ClientJuridicalContactPhone">شماره
                                                                نماینده شرکت</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-xxl-4">
                                                        <div class="form-floating theme-form-floating">
                                                            <input class="form-control" type="text"
                                                                   placeholder="شناسه ملی شرکت"
                                                                   name="ClientJuridicalNationalNumber"
                                                                   id="ClientJuridicalNationalNumber">
                                                            <label class="right-0" for="ClientJuridicalNationalNumber">شناسه
                                                                ملی شرکت</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-xxl-4">
                                                        <div class="form-floating theme-form-floating">
                                                            <input class="form-control" type="text"
                                                                   placeholder="شناسه ثبت شرکت"
                                                                   name="ClientJuridicalSavedNumber"
                                                                   id="ClientJuridicalSavedNumber">
                                                            <label class="right-0" for="ClientJuridicalSavedNumber">شناسه
                                                                ثبت شرکت</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-xxl-4">
                                                        <div class="form-floating theme-form-floating">
                                                            <input class="form-control" type="text"
                                                                   placeholder="شناسه اقتصادی شرکت"
                                                                   name="ClientJuridicalEconomicNumber"
                                                                   id="ClientJuridicalEconomicNumber">
                                                            <label class="right-0" for="ClientJuridicalEconomicNumber">شناسه
                                                                اقتصادی شرکت</label>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-header-2">
                                            <h5><i class="fa fa-location-arrow m-r-5"></i>آدرس مشتری</h5>
                                        </div>
                                        <div class="row g-4">

                                            <div class="col-xxl-6 form-floating theme-form-floating dropdownAddress">


                                                    @if(old('province_id') != null)
                                                    <span onclick="showProvince()" class="form-control"
                                                          id="dropbtnProvince">{{\App\Models\Location\Province::whereId(old('province_id'))->first()->title}}</span>
                                                    <label for="dropbtnProvince"> استان </label>
                                                    <div id="myDropdownProvince"
                                                         class="dropdown-content-address  fom-control ">
                                                        <input type="text" placeholder="Search.." id="myInputProvince"
                                                               value="" name="" class="w-100"
                                                               onkeyup="filterFunctionProvince()">
                                                        <input type="text" hidden="hidden" id="myInputProvinceRequest"
                                                               value="{{\App\Models\Location\Province::whereId(old('province_id'))->first()->id}}" name="province_id">
                                                    @else
                                                            <span onclick="showProvince()" class="form-control"
                                                                  id="dropbtnProvince">انتخاب استان</span>
                                                            <label for="dropbtnProvince"> استان </label>
                                                            <div id="myDropdownProvince"
                                                                 class="dropdown-content-address  fom-control ">
                                                        <input type="text" placeholder="Search.." id="myInputProvince"
                                                               value="" name="" class="w-100"
                                                               onkeyup="filterFunctionProvince()">
                                                        <input type="text" hidden="hidden" id="myInputProvinceRequest"
                                                               value="" name="province_id">
                                                    @endif

                                                    @foreach($provinces as $province)
                                                        <span
                                                            onclick="selectProvince('{{$province->id}}','{{$province->title}}')"
                                                            id="{{$province->id}}">{{$province->title}}</span>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="col-xxl-6 form-floating theme-form-floating dropdownAddress"
                                                 id="dropdownCountyAddress">

                                                    <span onclick="showCounty()" class="form-control" id="dropbtnCounty">انتخاب شهر</span>
                                                    <label for="dropbtnCounty"> شهر </label>
                                                    <div id="myDropdownCounty" class="dropdown-content-address fom-control">
                                                        <input type="text" placeholder="Search.." id="myInputCounty"
                                                               value="" class="w-100" name=""
                                                               onkeyup="filterFunctionCounty()">
                                                        <input type="text" hidden="hidden" id="myInputCountyRequest"
                                                               value="" name="county_id">
                                                        <div id="countiesList">
                                                        </div>
                                                    </div>

                                            </div>

                                            <div class="col-xxl-6">
                                                <div class="form-floating theme-form-floating">
                                                    <input class="form-control" type="tel"
                                                           placeholder="کد پستی را وارد کنید" name="postalCode"
                                                           id="postalCode"
                                                           maxlength="10">
                                                    <label class="right-0" for="postalCode">کد پستی</label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6">

                                                <div class="form-floating theme-form-floating">
                                                    <input class="form-control" type="tel"
                                                           placeholder="تلفن ثابت را وارد کنید" name="tel" id="tel"
                                                           maxlength="10">
                                                    <label class="right-0" for="tel">تلفن</label>
                                                </div>

                                            </div>

                                            <div class="col-12">
                                                <div class="form-floating theme-form-floating">
                                                    <input type="text" class="form-control" id="address_detail"
                                                           name="address_detail"
                                                           placeholder="آدرس را وارد کنید ">
                                                    <label for="address_detail" class="right-0">آدرس کامل</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <button type="submit" data-bs-dismiss="modal" id="submitAddress"
                                            class="btn theme-bg-color btn-md fw-bold text-light">افزودن مشتری جدید
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>

            </div>


        </div>

        <!-- New Product Add End -->

    </div>
@endsection

@section('js')
    <script src="/assets/js/Address.js"></script>
@endsection

@extends('Agent.Layout.layout')


