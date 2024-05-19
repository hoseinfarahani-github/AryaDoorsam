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
                                    <form class="theme-form theme-form-2 mega-form">
                                        <div class="row">
                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0">نوع مشتری</label>
                                                <div class="col-sm-10">
                                                    <input readonly class="form-control" type="text"
                                                           value="{{$client->type()}}">
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0">نام مشتری</label>
                                                <div class="col-sm-10">
                                                    <input readonly class="form-control" type="text"
                                                           value="{{$client->name()}}">
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0">@if($client->type() == 'حقیقی') کدملی @else شناسه شرکت @endif</label>
                                                <div class="col-sm-10">
                                                    <input readonly class="form-control" type="text"
                                                           value="{{$client->nationalNumber()}}">
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0">شماره تماس</label>
                                                <div class="col-sm-10">
                                                    <input readonly class="form-control" type="tel"
                                                           value="{{$client->phone()}}">
                                                </div>
                                            </div>
                                            @if($client->type() == 'حقوقی')
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-2 mb-0">
                                                        کد اقتصادی</label>
                                                    <div class="col-sm-10">
                                                        <input readonly class="form-control" type="text"
                                                               value="{{$client->clientable->economicNumber}}">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-2 mb-0">
                                                        شماره ثبت شرکت</label>
                                                    <div class="col-sm-10">
                                                        <input readonly class="form-control" type="text"
                                                               value="{{$client->clientable->savedNumber}}">
                                                    </div>
                                                </div>


                                            @endif
                                            </div>
                                    </form>
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

@endsection

@extends('Agent.Layout.layout')


