    @section('css')
    <link rel="stylesheet" href="/assets/css/Address.css" />
    @endsection
@section('content')

    <!-- Page Body Start-->
    <div class="page-body-wrapper">
        <!-- Order section Start -->
        <div class="page-body">
            <!-- Table Start -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body">
                                <div class="title-header option-title">
                                    <h5>لیست سفارشات</h5>

                                </div>
                                <div class="flex-justify-end m-b-5">

                                    <a href="#" class="btn btn-solid m-r-5"><i class="ri-file-chart-line">
                                        </i>Export PDF</a>
                                    <a href="#" class="btn btn-solid"><i class="ri-file-chart-line">
                                        </i>Export EXCEL</a>
                                </div>
                                <div>
                                    <div class="table-responsive">
                                        <table class="table all-package order-table theme-table" id="table_id">
                                            <thead>
                                            <tr>
                                                <th style="color: #4a5568 !important;">شماره سفارش</th>
                                                <th style="color: #4a5568 !important;">نام مشتری</th>
                                                <th style="color: #4a5568 !important;">وضعیت</th>
                                                <th style="color: #4a5568 !important;">تاریخ سفارش</th>
                                                <th style="color: #4a5568 !important;"> </th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($orders as $order)
                                                <tr data-bs-toggle="offcanvas" href="#order-details">
                                                    <td>
                                                        <a class="d-block">
                                                                <span> #
                                                                   {{$order->id}}
                                                                </span>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <div class="user-name">
                                                        <span>
                                                            {{$order->client->name()}}
                                                        </span>
                                                        </div>
                                                    </td>

                                                    <td class="@if($order->status == 'create-order-step-1' || $order->status == 'create-order-step-2' ||$order->status == 'create-order-step-3')order-pending
                                                        @elseif($order->status == 'reject-order-CEO')order-cancle
                                                        @else order-success @endif">
                                                        <span>
                                                            {{__('status.'.$order->status)}}
                                                        </span>
                                                    </td>

                                                    <td>{{$order->created_at->format('Y/m/d')}}</td>

                                                    <td>
                                                        <ul>
                                                            <li>
                                                                <a href="{{route('factory.order.detail',$order)}}">
                                                                    <i class="ri-eye-line"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->

            <!-- footer start-->

        </div>
        <!-- Order section End -->
    </div>
    <!-- Page Body End-->
@endsection
    @section('js')
        <script src="/assets/js/Address.js"></script>
                <script src="/Factory/assets/js/order.js"></script>
    @endsection

@component('Factory.Layout.layout')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" >صفحه اصلی</a>
        </div>
    @endslot
@endcomponent
