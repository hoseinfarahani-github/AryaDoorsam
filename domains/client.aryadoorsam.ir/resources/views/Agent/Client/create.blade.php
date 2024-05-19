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
                        <div class="col-sm-8 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>مشخصات مشتری</h5>
                                    </div>
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-home-tab"
                                                    data-bs-toggle="pill" data-bs-target="#pills-home"
                                                    type="button">شخصیت حقیقی</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-profile-tab"
                                                    data-bs-toggle="pill" data-bs-target="#pills-profile"
                                                    type="button">شخصیت حقوقی</button>
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
                                                        <input class="form-control" type="text" placeholder="نام مشتری" name="ClientPersonalFirstName" id="ClientPersonalFirstName">
                                                        <label class="right-0" for="ClientPersonalFirstName">نام</label>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-6">
                                                    <div class="form-floating theme-form-floating">
                                                        <input class="form-control" type="text" placeholder="نام خانوادگی مشتری" name="ClientPersonalLastName" id="ClientPersonalLastName">
                                                        <label class="right-0" for="ClientPersonalLastName">نام خانوادگی</label>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-6">
                                                    <div class="form-floating theme-form-floating">
                                                        <input class="form-control" type="text" placeholder="کدملی" name="ClientPersonalNationalNumber" id="ClientPersonalNationalNumber">
                                                        <label class="right-0" for="ClientPersonalNationalNumber">کدملی</label>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-6">
                                                    <div class="form-floating theme-form-floating">
                                                        <input class="form-control" type="tel" placeholder="شماره همراه" name="ClientPersonalPhone" id="ClientPersonalPhone">
                                                        <label class="right-0" for="ClientPersonalPhone">شماره همراه</label>
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
                                                        <input class="form-control" type="text" placeholder="نام شرکت" name="ClientJuridicalName" id="ClientJuridicalName">
                                                        <label class="right-0" for="ClientJuridicalName">نام شرکت</label>
                                                    </div>
                                                </div>


                                                <div class="col-xxl-6">
                                                    <div class="form-floating theme-form-floating">
                                                        <input class="form-control" type="text" placeholder="شناسه ملی شرکت" name="ClientJuridicalNationalNumber" id="ClientJuridicalNationalNumber">
                                                        <label class="right-0" for="ClientJuridicalNationalNumber">شناسه ملی شرکت</label>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-6">
                                                    <div class="form-floating theme-form-floating">
                                                        <input class="form-control" type="text" placeholder="شناسه ثبت شرکت" name="ClientJuridicalSavedNumber" id="ClientJuridicalSavedNumber">
                                                        <label class="right-0" for="ClientJuridicalSavedNumber">شناسه ثبت شرکت</label>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-6">
                                                    <div class="form-floating theme-form-floating">
                                                        <input class="form-control" type="text" placeholder="شناسه اقتصادی شرکت" name="ClientJuridicalEconomicNumber" id="ClientJuridicalEconomicNumber">
                                                        <label class="right-0" for="ClientJuridicalEconomicNumber">شناسه اقتصادی شرکت</label>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-6">
                                                    <div class="form-floating theme-form-floating">
                                                        <input class="form-control" type="text" placeholder="شناسه ثبت شرکت" name="ClientJuridicalSavedNumber" id="ClientJuridicalSavedNumber">
                                                        <label class="right-0" for="ClientJuridicalSavedNumber">شناسه ثبت شرکت</label>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-6">
                                                    <div class="form-floating theme-form-floating">
                                                        <input class="form-control" type="tel" placeholder="شماره همراه" name="ClientPersonalPhone" id="ClientPersonalPhone">
                                                        <label class="right-0" for="ClientPersonalPhone">شماره همراه</label>
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
                                        <h5>آدرس مشتری</h5>
                                    </div>
                                    <div class="row g-4">
                                        <div class="col-xxl-6 form-floating theme-form-floating dropdownAddress">
                                            <span onclick="showProvince()" class="form-control" id="dropbtnProvince">انتخاب استان</span>
                                            <label for="dropbtnProvince"> استان </label>
                                            <div id="myDropdownProvince" class="dropdown-content-address  fom-control ">
                                                <input type="text" placeholder="Search.." id="myInputProvince"  value="" name="" class="w-100" onkeyup="filterFunctionProvince()">
                                                <input type="text" hidden="hidden" id="myInputProvinceRequest"  value="" name="province_id">
                                                @foreach($provinces as $province)
                                                    <span onclick="selectProvince('{{$province->id}}','{{$province->title}}')" id="{{$province->id}}">{{$province->title}}</span>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="col-xxl-6 form-floating theme-form-floating dropdownAddress" id="dropdownCountyAddress">
                                            <span onclick="showCounty()" class="form-control" id="dropbtnCounty">انتخاب شهر</span>
                                            <label for="dropbtnCounty"> شهر </label>
                                            <div id="myDropdownCounty" class="dropdown-content-address fom-control">
                                                <input type="text" placeholder="Search.." id="myInputCounty"  value="" class="w-100" name="" onkeyup="filterFunctionCounty()">
                                                <input type="text" hidden="hidden" id="myInputCountyRequest"  value="" name="county_id">
                                                <div id="countiesList">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-6">
                                            <div class="form-floating theme-form-floating">
                                                <input class="form-control" type="tel" placeholder="کد پستی را وارد کنید" name="postalCode" id="postalCode"
                                                       maxlength="10">
                                                <label class="right-0" for="postalCode">کد پستی</label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6">

                                            <div class="form-floating theme-form-floating">
                                                <input class="form-control" type="tel" placeholder="تلفن ثابت را وارد کنید" name="tel" id="tel"
                                                       maxlength="10">
                                                <label class="right-0" for="tel">تلفن</label>
                                            </div>

                                        </div>

                                        <div class="col-12">
                                            <div class="form-floating theme-form-floating">
                                                <input type="text" class="form-control" id="detail" name="detail"
                                                       placeholder="آدرس را وارد کنید ">
                                                <label for="detail" class="right-0">آدرس کامل</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <button type="submit" data-bs-dismiss="modal" id="submitAddress"
                                        class="btn theme-bg-color btn-md fw-bold text-light">افزودن مشتری جدید</button>
                            </div>
                        </div>
                                </div>

                            </div>

                        </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New Product Add End -->

        <!-- footer Start -->
        <div class="container-fluid">
            <footer class="footer">
                <div class="row">
                    <div class="col-12 footer-copyright text-center">
                        <p class="mb-0">Copyright 2022 © Fastkart theme by pixelstrap</p>
                    </div>
                </div>
            </footer>
        </div>
        <!-- footer En -->
    </div>

@endsection

@section('js')
    <!-- latest jquery-->
    <script src="Agent/assets/js/jquery-3.6.0.min.js"></script>

    <!-- jquery ui-->
    <script src="Agent/assets/js/jquery-ui.min.js"></script>

    <!-- Bootstrap js-->
    <script src="Agent/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="Agent/assets/js/bootstrap/bootstrap-notify.min.js"></script>
    <script src="Agent/assets/js/bootstrap/popper.min.js"></script>

    <!-- feather icon js-->
    <script src="Agent/assets/js/feather/feather.min.js"></script>
    <script src="Agent/assets/js/feather/feather-icon.js"></script>

    <!-- Lazyload Js -->
    <script src="Agent/assets/js/lazysizes.min.js"></script>

    <!-- Slick js-->
    <script src="Agent/assets/js/slick/slick.js"></script>
    <script src="Agent/assets/js/slick/slick-animation.min.js"></script>
    <script src="Agent/assets/js/slick/custom_slick.js"></script>

    <!-- Price Range Js -->
    <script src="Agent/assets/js/ion.rangeSlider.min.js"></script>

    <!-- Quantity js -->
    <script src="Agent/assets/js/quantity-2.js"></script>

    <!-- sidebar open js -->
    <script src="Agent/assets/js/filter-sidebar.js"></script>

    <!-- WOW js -->
    <script src="Agent/assets/js/wow.min.js"></script>
    <script src="Agent/assets/js/custom-wow.js"></script>

    <!-- script js -->
    <script src="Agent/assets/js/script.js"></script>

    <script src="/assets/js/Address.js"></script>
    <script src="/agent/assets/js/order.js"></script>

@endsection

@extends('Agent.Layout.layout')


