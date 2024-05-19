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
                                    <ol class="progtrckr">
                                        <li class="progtrckr-done">
                                            <h5 style="font-size: 100% !important;"> اطلاعات خریدار</h5>
                                            <h6 style="font-size: 75% !important;">انجام شده</h6>
                                        </li>
                                        <li class="progtrckr-done">
                                            <h5 style="font-size: 100% !important;"> اطلاعات محصول</h5>
                                            <h6 style="font-size: 75% !important;">انجام شده</h6>
                                        </li>
                                        <li class="progtrckr-todo">
                                            <h5 style="font-size: 100% !important;">توضیحات تکمیلی</h5>
                                            <h6 style="font-size: 75% !important;">در حال انجام</h6>
                                        </li>

                                    </ol>




                                    <form method="POST" class="theme-form theme-form-2 mega-form" action="{{ route('agent.order.finalStore') }}">
                                        @csrf

                                        <input hidden="hidden" class="form-control" type="text" name="order_id" value="{{$order->id}}">




                                        <div class="row g-4 mb-4 row align-items-center ">
                                            <label class="form-label-title mb-0">یادداشت برای مدیرعامل</label>

                                        </div>

                                        <div class="mb-4 row">
                                            <div class="col-sm-12">
                                                <textarea class="form-control" id="noteToCEO" name="noteToCEO" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" data-bs-dismiss="modal" id="submitAddress"
                                                class="btn theme-bg-color btn-md fw-bold text-light">ثبت نهایی</button>
                                    </form>
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
                    <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0">Copyright 2022 © Fastkart theme by pixelstrap</p>
                    </div>
                </div>
            </footer>
        </div>
        <!-- footer En -->
    </div>
@endsection
@section('js')
    <script src="/assets/js/Address.js"></script>
    <script src="/agent/assets/js/order.js"></script>
@endsection

@component('Agent.Layout.layout')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" >صفحه اصلی</a>
        </div>
    @endslot
@endcomponent
