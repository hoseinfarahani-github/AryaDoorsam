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
                                        <h5>مشخصات مشتری</h5>
                                    </div>
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
                                                    <a class="form-control disabled" type="text" id="nationalClient"
                                                    >{{$client->nationalNumber()}}</a>
                                                    <label for="nationalClient" class="right-0">@if($client->type() == 'حقیقی') کدملی @else شناسه شرکت @endif</label>
                                                </div>
                                            </div>


                                            @if($client->type() == 'حقوقی')
                                                <div class="col-xxl-4 m-b-20">
                                                    <div class="form-floating theme-form-floating">
                                                        <a class="form-control disabled" id="economicNumberClient">{{$client->clientable->economicNumber}}</a>
                                                        <label for="economicNumberClient" class="right-0">کد اقتصادی</label>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-4 m-b-20">
                                                    <div class="form-floating theme-form-floating">
                                                        <a id="savedNumberClient" class="form-control disabled"
                                                           >{{$client->clientable->savedNumber}}</a>
                                                        <label for="savedNumberClient" class="right-0">شماره ثبت شرکت</label>
                                                    </div>
                                                </div>

                                                <div class="title-header option-title">
                                                    <h5>مشخصات نماینده شرکت</h5>
                                                </div>

                                                <div class="col-xxl-6 m-b-20">
                                                    <div class="form-floating theme-form-floating">
                                                        <a class="form-control disabled" id="tel"
                                                           >{{$client->clientable->contactPerson}}</a>
                                                        <label class="right-0" for="tel">نماینده شرکت</label>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-6 m-b-20">
                                                    <div class="form-floating theme-form-floating">
                                                        <a class="form-control" href="tel:+{{$client->clientable->contactPhone}}" id="tel"><i class="fa fa-phone m-r-5"></i>{{$client->clientable->contactPhone}}</a>
                                                        <label class="right-0" for="tel">شماره نماینده شرکت</label>
                                                    </div>
                                                </div>



                                            @endif
                                            </div>
                            </div>
                            <!-- Details End -->

                        </div>
                            <div class="card border border-2">
                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>آدرس</h5>
                                    </div>

                                        @CSRF
                                        @method('PATCH')
                                        <div class="row g-4 m-t-5">

                                            <div class="col-xxl-6 form-floating theme-form-floating dropdownAddress">
                                                <a class="form-control disabled" id="dropbtnProvince">{{$address->province->title}}</a>
                                                <label for="dropbtnProvince"> استان </label>
                                            </div>

                                            <div class="col-xxl-6 form-floating theme-form-floating dropdownAddress">
                                                <a class="form-control disabled" id="dropbtnProvince">{{$address->county->title}}</a>
                                                <label for="dropbtnProvince"> شهر </label>
                                            </div>

                                            <div class="col-xxl-6">
                                                <div class="form-floating theme-form-floating">
                                                    <a class="form-control disabled" id="postalCode"
                                                      >{{$address->postal_code}}</a>
                                                    <label class="right-0" for="postalCode">کد پستی</label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6">
                                                <div class="form-floating theme-form-floating">
                                                    <a href="tel:+{{$address->phone}}" class="form-control" id="tel"><i class="fa fa-phone m-r-5"></i>{{$address->phone}}</a>
                                                    <label class="right-0" for="tel">تلفن</label>
                                                </div>

                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating theme-form-floating">
                                                    <a type="text" class="form-control disabled" id="detail"
                                                      >{{$address->detail}}</a>
                                                    <label for="detail" class="right-0">آدرس کامل</label>
                                                </div>
                                            </div>
                                        </div>
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
            <script src="/manager/assets/js/order.js"></script>
            <script>$(document).ready(function() {
                    $('.js-example-basic-single').select2();
                });</script>
@endsection

@extends('Manager.Layout.layout')


