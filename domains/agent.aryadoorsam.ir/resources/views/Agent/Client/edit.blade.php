@section('css')
    <link rel="stylesheet" href="/assets/css/Address.css" />

@endsection
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Details Start -->
                            <div class="card border border-2">
                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>ویرایش مشتری</h5>
                                    </div>
                                    <form method="post" action="{{route('agent.client.update',$client)}}" class="theme-form-2 mega-form">
                                        @CSRF
                                        @method('PATCH')
                                        <div class="row">
                                            <div class="col-xxl-4 m-b-20">
                                                <div class="form-floating theme-form-floating">
                                                    <a  class="form-control disabled" id="typeClient"><i class="fa fa-user-check m-r-5"></i>{{$client->type()}}</a>
                                                    <label class="right-0" for="typeClient">نوع مشتری</label>
                                                </div>
                                            </div>

                                            <div class="col-xxl-4 m-b-20">
                                                <div class="form-floating theme-form-floating">
                                                    <a class="form-control disabled" id="nameClient"><i class="fa fa-user-tag m-r-5"></i>{{$client->name()}}</a>
                                                    <label class="right-0" for="nameClient">نام مشتری</label>
                                                </div>
                                            </div>

                                            <div class="col-xxl-4 m-b-20">
                                                <div class="form-floating theme-form-floating">
                                                    <a href="tel:+{{$client->phone}}" class="form-control" id="phoneClient"><i class="fa fa-phone m-r-5"></i>{{$client->phone}}</a>
                                                    <label class="right-0" for="phoneClient">شماره مشتری</label>
                                                </div>
                                            </div>



                                            <div class="col-xxl-4 m-b-20">
                                                <div class="form-floating theme-form-floating">
                                                    <input id="nationalClient" class="form-control" type="text" name="nationalNumber"
                                                           value="{{$client->nationalNumber()}}" placeholder="@if($client->type() == 'حقیقی') کدملی @else شناسه شرکت @endif">
                                                    <label for="nationalClient" class="right-0">@if($client->type() == 'حقیقی') کدملی @else شناسه شرکت @endif</label>
                                                </div>
                                            </div>


                                            @if($client->type() == 'حقوقی')

                                                <div class="col-xxl-4 m-b-20">
                                                    <div class="form-floating theme-form-floating">
                                                        <input id="economicNumberClient" class="form-control" type="text" name="economicNumber"
                                                               value="{{$client->clientable->economicNumber}}" placeholder="کد اقتصادی">
                                                        <label for="economicNumberClient" class="right-0">کد اقتصادی</label>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-4 m-b-20">
                                                    <div class="form-floating theme-form-floating">
                                                        <input id="savedNumberClient" class="form-control" type="text" name="savedNumber"
                                                               value="{{$client->clientable->savedNumber}}" placeholder="شماره ثبت شرکت">
                                                        <label for="savedNumberClient" class="right-0">شماره ثبت شرکت</label>
                                                    </div>
                                                </div>

                                                <div class="title-header option-title">
                                                    <h5>مشخصات نماینده شرکت</h5>
                                                </div>

                                                <div class="col-xxl-6 m-b-20">
                                                    <div class="form-floating theme-form-floating">
                                                        <input class="form-control" type="tel" placeholder="شماره نماینده شرکت" name="contactPerson" id="tel"
                                                               value="{{$client->clientable->contactPerson}}">
                                                        <label class="right-0" for="tel">نماینده شرکت</label>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-6 m-b-20">
                                                    <div class="form-floating theme-form-floating">
                                                        <input class="form-control" type="tel" placeholder="شماره نماینده شرکت" name="contactPhone" id="tel"
                                                               value="{{$client->clientable->contactPhone}}">
                                                        <label class="right-0" for="tel">شماره نماینده شرکت</label>
                                                    </div>
                                                </div>



                                            @endif
                                            </div>
                                        <button type="submit" class="btn theme-bg-color btn-md fw-bold text-light m-t-10">ویرایش مشتری</button>
                                    </form>

                            </div>
                            <!-- Details End -->

                        </div>
                            <div class="card border border-2">
                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>ویرایش آدرس</h5>
                                    </div>
                                    <form method="post" action="{{route('agent.address.update',$address)}}" class="theme-form-2 mega-form">
                                        @CSRF
                                        @method('PATCH')
                                        <div class="row g-4 m-t-5">
                                            <div class="card-header-1">
                                                <h5 style="font-size: large !important;">آدرس</h5>
                                            </div>

                                            <div class="col-xxl-6 form-floating theme-form-floating dropdownAddress">
                                                <span onclick="showProvince()" class="form-control" id="dropbtnProvince">{{$address->province->title}}</span>
                                                <label for="dropbtnProvince"> استان </label>
                                                <div id="myDropdownProvince" class="dropdown-content-address  fom-control ">
                                                    <input type="text" placeholder="Search.." id="myInputProvince"  value="" name="" class="w-100" onkeyup="filterFunctionProvince()">
                                                    <input type="text" hidden="hidden" id="myInputProvinceRequest"  value="{{$address->province_id}}" name="province_id">
                                                    @foreach($provinces as $province)
                                                        <span onclick="selectProvince('{{$province->id}}','{{$province->title}}')" id="{{$province->id}}">{{$province->title}}</span>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="col-xxl-6 form-floating theme-form-floating dropdownAddress" id="dropdownCountyAddress">
                                                <span onclick="showCounty()" class="form-control" id="dropbtnCounty">{{$address->county->title}}</span>
                                                <label for="dropbtnCounty"> شهر </label>
                                                <div id="myDropdownCounty" class="dropdown-content-address fom-control">
                                                    <input type="text" placeholder="Search.." id="myInputCounty"  value="" class="w-100" name="" onkeyup="filterFunctionCounty()">
                                                    <input type="text" hidden="hidden" id="myInputCountyRequest"  value="{{$address->county_id}}" name="county_id">
                                                    <div id="countiesList">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-6">
                                                <div class="form-floating theme-form-floating">
                                                    <input class="form-control" type="tel" placeholder="کد پستی را وارد کنید" value="{{$address->postal_code}}" name="postalCode" id="postalCode"
                                                           maxlength="10">
                                                    <label class="right-0" for="postalCode">کد پستی</label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6">

                                                <div class="form-floating theme-form-floating">
                                                    <input class="form-control" type="tel" placeholder="تلفن ثابت را وارد کنید" name="tel" id="tel" value="{{$address->phone}}">
                                                    <label class="right-0" for="tel">تلفن</label>
                                                </div>

                                            </div>

                                            <div class="col-12">
                                                <div class="form-floating theme-form-floating">
                                                    <input type="text" class="form-control" id="detail" name="address_detail"
                                                           placeholder="آدرس را وارد کنید " value="{{$address->detail}}">
                                                    <label for="detail" class="right-0">آدرس کامل</label>
                                                </div>
                                            </div>
                                        </div>
                                        <button id="submitAddress"  type="submit" class="btn theme-bg-color btn-md fw-bold text-light m-t-10">ویرایش آدرس مشتری</button>
                                    </form>

                                </div>
                                <!-- Details End -->

                            </div>

                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
            <script src="/assets/js/Address.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script src="/agent/assets/js/order.js"></script>
            <script>$(document).ready(function() {
                    $('.js-example-basic-single').select2();
                });</script>
@endsection

@extends('Agent.Layout.layout')


