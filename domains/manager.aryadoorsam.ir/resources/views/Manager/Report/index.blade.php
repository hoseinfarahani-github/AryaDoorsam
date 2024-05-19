    @section('css')
    <link rel="stylesheet" href="/assets/css/Address.css" />
    @endsection
@section('content')
    <div class="page-body">
        <div class="container-fluid">
    <div class="col-12">
        <div class="card o-hidden card-hover">
            <div class="card-header border-0 pb-1">
                <div class="card-header-title p-0">
                    <h4>گزارش ها</h4>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="mb-4 row">
                    <form id="myForm" method="POST" action="{{route('manager.report.set')}}">
                        @CSRF
                        <input type="hidden" id="selectedValue" name="selectedValue">
                    <div class="col-sm-3">
                        <label for="production_period">تاریخ شروع گزارش</label>
                        <input class="form-control datepicker"  id="start_at" name="start_at" value="{{jdate()->format('d/m/Y')}}" autocomplete="off">
                    </div>
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-3">
                        <label for="production_period">تاریخ پایان گزارش</label>
                        <input class="form-control datepicker"  id="end_at" name="end_at" value="{{jdate()->format('d/m/Y')}}" autocomplete="off">
                    </div>
                    </form>
                </div>

                <div class="category-slider no-arrow">

                    <div>
                        <div class="dashboard-category">
                            <a href="javascript:void(0)" class="category-image" onclick="submitValue('product')">
                                <img src="assets/image/avatar/product_icon.png" class="img-fluid" alt="">
                            </a>
                            <a href="javascript:void(0)" class="category-name">
                                <h6>محصولات</h6>
                            </a>
                        </div>
                    </div>

                    <div>
                        <div class="dashboard-category">
                            <a href="javascript:void(0)" class="category-image" onclick="submitValue('order')">
                                <img src="assets/image/avatar/order_icon.png" class="img-fluid" alt="">
                            </a>
                            <a href="javascript:void(0)" class="category-name">
                                <h6>سفارش ها</h6>
                            </a>
                        </div>
                    </div>

                    <div>
                        <div class="dashboard-category">
                            <a href="javascript:void(0)" class="category-image" onclick="submitValue('client')">
                                <img src="assets/image/avatar/client_icon.png" class="img-fluid" alt="">
                            </a>
                            <a href="javascript:void(0)" class="category-name">
                                <h6>مشتری ها</h6>
                            </a>
                        </div>
                    </div>

                    <div>
                        <div class="dashboard-category">
                            <a href="javascript:void(0)" class="category-image" onclick="submitValue('agent')">
                                <img src="assets/image/avatar/agent_icon.png" class="img-fluid" alt="">
                            </a>
                            <a href="javascript:void(0)" class="category-name">
                                <h6>نمایندگان</h6>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
        </div>
    </div>


@endsection
    @section('js')
        <script src="/assets/js/Address.js"></script>
                <script src="/Manager/assets/js/order.js"></script>
        <script>
            $(document).ready(function() {
                $(".datepicker").datepicker();
            });
        </script>

        <script>
            function submitValue(value) {
                document.getElementById('selectedValue').value = value;
                document.getElementById('myForm').submit();
            }
        </script>
    @endsection

@component('Manager.Layout.layout')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" >صفحه اصلی</a>
        </div>
    @endslot
@endcomponent
