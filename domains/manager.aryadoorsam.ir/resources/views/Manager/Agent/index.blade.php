@section('content')
    <div class="page-body">
        <!-- All User Table Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>مشتری ها</h5>
                                <form class="d-inline-flex">
                                    <a href="{{route('manager.agents.create')}}" class="align-items-center btn btn-theme d-flex">
                                        <i data-feather="plus"></i>افزودن نماینده
                                    </a>
                                </form>
                            </div>


                            <div class="table-responsive table-product">
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                    <tr>
                                        <th>کد نماینده</th>
                                        <th>مشخصات نماینده</th>
                                        <th>ایمیل</th>
                                        <th>تاریخ عضویت</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($agents as $agent)
                                        <tr>
                                            <td>
                                                <div style="text-align: center !important;">
                                                    {{$agent->code}}
                                                </div>
                                            </td>

                                            <td>
                                                <div class="user-name">
                                                    <span>{{$agent->user->username}}</span>
                                                </div>
                                            </td>

                                            <td>{{$agent->user->email}}</td>

                                            <td>
                                                <div style="text-align: center !important;">
                                                    {{\Morilog\Jalali\Jalalian::fromCarbon($agent->created_at)->format('Y-m-d H:i:s')}}
                                                </div>
                                            </td>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <a href="order-detail.html">
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
        <!-- All User Table Ends-->

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

@extends('Manager.Layout.layout')


