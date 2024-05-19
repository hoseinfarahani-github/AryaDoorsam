@section('content')
    <div class="page-body">
        <!-- All User Table Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table border border-2">
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>مشتری ها</h5>
                                <form class="d-inline-flex">
                                    <a href="{{route('agent.client.create')}}" class="align-items-center btn btn-theme d-flex">
                                        <i data-feather="plus"></i>افزودن مشتری
                                    </a>
                                </form>
                            </div>

                            <div class="table-responsive table-product">
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                    <tr>
                                        <th>شماره مشتری</th>
                                        <th>مشخصات مشتری</th>
                                        <th>شماره تماس</th>
                                        <th>شماره ثبت/شماره ملی</th>
                                        <th>تاریخ عضویت</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($clients as $client)
                                        <tr>
                                            <td>
                                                <div style="text-align: center !important;">
                                                    {{$client->id}}
                                                </div>
                                            </td>

                                            <td>
                                                <div class="user-name">
                                                    <span>{{$client->name()}}</span>
                                                    <span>({{$client->type()}})</span>
                                                </div>
                                            </td>

                                            <td>{{$client->phone()}}</td>

                                            <td>{{$client->nationalNumber()}}</td>
                                            <td>
                                                <div style="text-align: center !important;">
                                                    {{\Morilog\Jalali\Jalalian::fromCarbon($client->created_at)->format('Y-m-d H:i:s')}}
                                                </div>
                                            </td>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <a href="{{route('agent.client.show',$client)}}">
                                                            <i class="ri-list-ordered"></i>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="{{route('agent.client.edit',$client)}}">
                                                            <i class="ri-pencil-line"></i>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                           data-bs-target="#deleteClient{{$client->id}}">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="deleteClient{{$client->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                             aria-labelledby="deleteClient{{$client->id}}Label" aria-hidden="true">
                                            <div class="modal-dialog  modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <h5 class="modal-title" id="deleteClient{{$client->id}}Label">حذف سفارش</h5>
                                                        <p>آیا از حذف کردن مشتری مطمئن هستید؟</p>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        <div class="button-box">
                                                            <button type="button" class="btn btn--no" data-bs-dismiss="modal">خیر</button>
                                                            <form method="post" action="{{ route('agent.client.destroy',$client) }}">
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
        <!-- All User Table Ends-->

        <div class="container-fluid">
            <!-- footer start-->
            <footer class="footer">
                <div class="row">
                    <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0">Copyright 2022 © Fastkart theme by pixelstrap</p>
                    </div>
                </div>
            </footer>
            <!-- footer end-->
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


