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
                            <div class="card border border-2">
                                <div class="card-body">
                                    <ol class="progtrckr">
                                        <li class="progtrckr-todo">
                                            <h5 style="font-size: 100% !important;"> اطلاعات خریدار</h5>
                                            <h6 style="font-size: 75% !important;">در حال انجام</h6>
                                        </li>
                                        <li class="progtrckr-todo">
                                            <h5 style="font-size: 100% !important;"> اطلاعات محصول</h5>
                                            <h6 style="font-size: 75% !important;">در انتظار</h6>
                                        </li>
                                        <li class="progtrckr-todo">
                                            <h5 style="font-size: 100% !important;">توضیحات تکمیلی</h5>
                                            <h6 style="font-size: 75% !important;"> درانتظار</h6>
                                        </li>

                                    </ol>
                                    @if($errors->any())
                                        <div class="alert alert-danger" role="alert">

                                            @foreach($errors->all() as $error)
                                                <li> {{$error}} </li>
                                            @endforeach

                                        </div>
                                    @endif
                                    <div class="col-2">
                                        <button class="btn theme-bg-color text-white btn-sm fw-bold mt-lg-0 mt-3"
                                                data-bs-toggle="modal" data-bs-target="#newClientModal"><i data-feather="plus"
                                                                                                            class="me-2"></i> افزودن مشتری جدید</button>
                                    </div>
                                    <div class="card-header-2 mt-2">
                                        <h5>مشخصات خریدار</h5>
                                    </div>

                                    <form method="POST" class="theme-form theme-form-2 mega-form" action="{{ route('agent.order.step1') }}">
                                        @csrf
                                        <div class="mb-4 row align-items-center">
                                            <div class="col-sm-6">
                                                <label class="form-label-title mb-2">نام مشتری</label>
                                                <select  onchange="selectClient(event)" class=" w-100 js-example-basic-single" name="state">
                                                    <option selected disabled >انتخاب مشتری</option>



                                                @foreach($clients as $client)
                                                        <option value="{{$client->id}}">{{$client->name()}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label-title mb-2">نام نماینده فروش</label>
                                                <select   class=" w-100 js-example-basic-single" name="salesRepresentative">
                                                    <option selected disabled >انتخاب نماینده فروش</option>



                                                    @foreach($salesRepresentatives as $salesRepresentative)
                                                        <option value="{{$salesRepresentative->id}}">{{$salesRepresentative->firstname .' '.$salesRepresentative->lastname}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>




                                        <div class="row g-4 mb-4 row align-items-center ">
                                            <label class="form-label-title mb-0">مشخصات مشتری</label>
                                            <input hidden="hidden" class="form-control" type="text" name="client_id" id="client_id">

                                            <div class="col-xxl-6">
                                                <div class="form-floating theme-form-floating">
                                                    <input readonly class="form-control" type="text" name="clientName" id="clientName">
                                                    <label class="right-0" for="clientName">نام مشتری</label>
                                                </div>
                                            </div>

                                            <div class="col-xxl-6">
                                                <div class="form-floating theme-form-floating">
                                                    <input readonly class="form-control text-xl" type="text" name="clientType" id="clientType">
                                                    <label class="right-0" for="clientType">شخصیت مشتری</label>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="row g-4 mb-4 row align-items-center ">
                                            <label class="form-label-title mb-0">آدرس</label>

                                            <div class="col-xxl-6">
                                                <div class="form-floating theme-form-floating">
                                                    <input readonly class="form-control" type="text" name="province" id="province">
                                                    <label class="right-0" for="province">استان</label>
                                                </div>
                                            </div>

                                            <div class="col-xxl-6">
                                                <div class="form-floating theme-form-floating">
                                                    <input readonly class="form-control text-xl" type="text" name="county" id="county">
                                                    <label class="right-0" for="county">شهر</label>
                                                </div>
                                            </div>

                                            <div class="col-xxl-6">
                                                <div class="form-floating theme-form-floating">
                                                    <input readonly class="form-control text-xl" type="text" name="postalCode" id="postalCode">
                                                    <label class="right-0" for="postalCode">کدپستی</label>
                                                </div>
                                            </div>

                                            <div class="col-xxl-6">
                                                <div class="form-floating theme-form-floating">
                                                    <input readonly class="form-control text-xl" type="text" name="phone" id="phone">
                                                    <label class="right-0" for="phone">تلفن</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="mb-4 row">
                                            <div class="col-sm-12">
                                                <textarea class="form-control" id="address_detail" name="address_detail" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" data-bs-dismiss="modal" id="submitAddress"
                                                class="btn theme-bg-color btn-md fw-bold text-light">مرحله بعد</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New Product Add End -->

        <!-- آدرس جدید Start -->
        <div class="modal fade theme-modal" id="newClientModal" tabindex="-1" aria-labelledby="exampleModalLabel2"
             aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-sm-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">مشتری جدید</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form method="post" id="newAddressForm" action="{{route('agent.client.store')}}" >
                        @csrf
                        <div class="modal-body">
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
                                            <h5 style="font-size: large !important;">شخصیت حقیقی</h5>
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
                                            <h5 style="font-size: large !important;">شخصیت حقوقی</h5>
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
                                                <input class="form-control" type="tel" placeholder="شماره همراه" name="ClientJuridicalPhone" id="ClientJuridicalPhone">
                                                <label class="right-0" for="ClientJuridicalPhone">شماره همراه</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="row g-4 m-t-5">
                                <div class="card-header-1">
                                    <h5 style="font-size: large !important;">آدرس</h5>
                                </div>
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
                                        <input type="text" class="form-control" id="detail" name="address_detail"
                                               placeholder="آدرس را وارد کنید ">
                                        <label for="detail" class="right-0">آدرس کامل</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" data-bs-dismiss="modal" id="submitAddress"
                                    class="btn theme-bg-color btn-md fw-bold text-light">افزودن مشتری جدید</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- آدرس جدید End -->
    </div>
@endsection
    @section('js')
        <script src="/assets/js/Address.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="/assets/js/order.js"></script>
        <script>$(document).ready(function() {
                $('.js-example-basic-single').select2();
            });</script>
    @endsection

@component('Agent.Layout.layout')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" >صفحه اصلی</a>
        </div>
    @endslot
@endcomponent
