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
                        <div class="card border border-2 card-table">
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
                                                <tr >
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

                                                            @if($order->status == 'create-order-step-1' ||  $order->status == 'create-order-step-2' || $order->status == 'create-order-step-3')
                                                                <li>
                                                                    <a href="{{route('agent.order.create2',$order)}}">
                                                                        <i class="ri-pencil-line"></i>
                                                                    </a>
                                                                </li>
                                                            @endif
                                                                <li>
                                                                    <a href="{{route('agent.order.detail',$order)}}">
                                                                        <i class="ri-eye-line"></i>
                                                                    </a>
                                                                </li>
                                                                @if($order->status == 'create-order-step-1' ||  $order->status == 'create-order-step-2' || $order->status == 'create-order-step-3')
                                                                <li>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                   data-bs-target="#deleteOrder{{$order->id}}">
                                                                    <i class="ri-delete-bin-line"></i>
                                                                </a>
                                                            </li>
                                                            @endif
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <div class="modal fade" id="deleteOrder{{$order->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                     aria-labelledby="deleteOrder{{$order->id}}Label" aria-hidden="true">
                                                    <div class="modal-dialog  modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <h5 class="modal-title" id="deleteOrder{{$order->id}}Label">حذف سفارش</h5>
                                                                <p>آیا از حذف کردن سفارش مطمئن هستید؟</p>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                <div class="button-box">
                                                                    <button type="button" class="btn btn--no" data-bs-dismiss="modal">خیر</button>
                                                                    <form method="post" action="{{ route('agent.order.destroy',$order) }}">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn  btn--yes btn-primary">بله</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



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
                <script src="/agent/assets/js/order.js"></script>
    @endsection

@component('Agent.Layout.layout')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" >صفحه اصلی</a>
        </div>
    @endslot
@endcomponent
