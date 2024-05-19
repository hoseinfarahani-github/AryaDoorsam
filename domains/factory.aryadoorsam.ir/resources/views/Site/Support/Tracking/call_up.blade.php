
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    {!! SEO::generate() !!}

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="Fastkart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Fastkart admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="/storage/assets/icon/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="/storage/assets/icon/favicon.svg" type="image/x-icon">
    <title></title>

    <!-- Google font-->
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Linear Icon css -->
    <link rel="stylesheet" href="/Agent/assets/css/linearicon.css">

    <!-- fontawesome css -->
    <link rel="stylesheet" type="text/css" href="/Agent/assets/css/vendors/font-awesome.css">

    <!-- Themify icon css-->
    <link rel="stylesheet" type="text/css" href="/Agent/assets/css/vendors/themify.css">

    <!-- ratio css -->
    <link rel="stylesheet" type="text/css" href="/Agent/assets/css/ratio.css">

    <!-- remixicon css -->
    <link rel="stylesheet" type="text/css" href="/Agent/assets/css/remixicon.css">

    <!-- Feather icon css-->
    <link rel="stylesheet" type="text/css" href="/Agent/assets/css/vendors/feather-icon.css">

    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="/Agent/assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="/Agent/assets/css/vendors/animate.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="/Agent/assets/css/vendors/bootstrap.css">

    <!-- vector map css -->
    <link rel="stylesheet" type="text/css" href="/Agent/assets/css/vector-map.css">

    <!-- Slick Slider Css -->
    <link rel="stylesheet" href="/Agent/assets/css/vendors/slick.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="/Agent/assets/css/style.css">

    @yield('css')
</head>

<body class="rtl @if(\session()->get('mode') == 'dark') dark-only @endif">
<!-- tap on top start -->
<div class="tap-top">
    <span class="lnr lnr-chevron-up"></span>
</div>
<!-- tap on tap end -->

<!-- page-wrapper Start-->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    <div class="page-header">
        <div class="header-wrapper m-0">
            <div class="header-logo-wrapper p-0">
                <div class="logo-wrapper">
                    <a href="index.html">
                        <img class="img-fluid main-logo" src="/assets/image/Logo_TextOnly.png" alt="logo">
                        <img class="img-fluid white-logo" src="/assets/image/Logo_TextOnly.png" alt="logo">
                    </a>
                </div>
                <div class="toggle-sidebar">
                    <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
                    <a href="index.html">
                        <img src="/assets/image/Logo_TextOnly.png" class="img-fluid" alt="">
                    </a>
                </div>
            </div>

           <div class="nav-right col-6 pull-right right-header p-0">
                <ul class="nav-menus">
                    <li>
                            <span class="header-search">
                                <i class="ri-search-line"></i>
                            </span>
                    </li>

                    <li>
                        <div class="mode">
                            <i class="ri-moon-line"></i>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Header Ends-->

    <!-- Page Body Start-->
    <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper">
            <div id="sidebarEffect"></div>
            <div>
                <div class="logo-wrapper logo-wrapper-center">
                    <a href="{{route('agent.dashboard.index')}}" data-bs-original-title="" title="">
                        <img class="img-fluid for-white" src="/assets/image/Logo_TextOnly.png" alt="logo">
                    </a>
                    <div class="back-btn">
                        <i class="fa fa-angle-left"></i>
                    </div>

                </div>
                <div class="logo-icon-wrapper">
                    <a href="index.html">
                        <img class="img-fluid main-logo main-white" src="/Agent/assets/images/logo/logo.png" alt="logo">
                        <img class="img-fluid main-logo main-dark" src="/Agent/assets/images/logo/logo-white.png"
                             alt="logo">
                    </a>
                </div>
                <nav class="sidebar-main">
                    <div class="left-arrow" id="left-arrow">
                        <i data-feather="arrow-left"></i>
                    </div>

                    <div id="sidebar-menu">
                        <ul class="sidebar-links" id="simple-bar">
                            <li class="back-btn"></li>


                        </ul>
                    </div>

                    <div class="right-arrow" id="right-arrow">
                        <i data-feather="arrow-right"></i>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Page Sidebar Ends-->

        <!-- index body start -->
        <div class="page-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="title-header option-title">
                                            <h5> پیگیری سفارش </h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 overflow-hidden">
                                                <div class="order-left-image" >
                                                    <div class="tracking-product-image" style="margin-left: 0px !important;">
                                                        <img src="/assets/image/qrcode.png"
                                                             class="img-fluid w-75 blur-up lazyload m-r-15 " alt="">
                                                    </div>

                                                    <div class="order-image-contain">
                                                        <h4> کد پیگری سفارش <span> {{$order->tracking_serial}}</span></h4>
                                                        <div class="tracker-number">
                                                            <p>وضعیت فعلی سفارش : <span>{{__('status.'.$order->status)}}</span></p>
                                                            <p>آخرین ویرایش سفارش <span>{{\Morilog\Jalali\Jalalian::fromDateTime($order->updated_at)->format('Y/m/d')}}</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <ol class="progtrckr">
                                                <li class="progtrckr-done">
                                                    <h5>نماینده</h5>
                                                    <h6>05:43 AM</h6>
                                                </li>
                                                <li class="progtrckr-done">
                                                    <h5>مدیریت</h5>
                                                    <h6>01:21 PM</h6>
                                                </li>
                                                <li class="progtrckr-done">
                                                    <h5>خم کاری</h5>
                                                    <h6>Processing</h6>
                                                </li>
                                                <li class="progtrckr-todo">
                                                    <h5>جوش کاری</h5>
                                                    <h6>Pending</h6>
                                                </li>
                                                <li class="progtrckr-todo">
                                                    <h5>رنگ آمیزی</h5>
                                                    <h6>Pending</h6>
                                                </li>
                                                <li class="progtrckr-todo">
                                                    <h5>بسته بندی</h5>
                                                    <h6>Pending</h6>
                                                </li>
                                                <li class="progtrckr-todo">
                                                    <h5>ارسال</h5>
                                                    <h6>Pending</h6>
                                                </li>
                                            </ol>

                                            <div class="col-12 overflow-visible">
                                                <div class="tracker-table">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                            <tr class="table-head">
                                                                <th scope="col">تاریخ</th>
                                                                <th scope="col">زمان</th>
                                                                <th scope="col">توضیخات</th>
                                                            </tr>
                                                            </thead>

                                                            <tbody>
                                                            @foreach($order->orederStatus as $oos)
                                                                <tr>
                                                                    <td>
                                                                        <h6>{{\Morilog\Jalali\Jalalian::fromDateTime($oos->created_at)->format('Y/m/d')}}</h6>
                                                                    </td>
                                                                    <td>
                                                                        <h6>{{\Morilog\Jalali\Jalalian::fromDateTime($oos->created_at)->format('H:i:s')}}</h6>
                                                                    </td>
                                                                    <td>
                                                                        <p class="fw-bold">سفارش به حالت <span>{{__('status.'.$oos->status)}}</span> تغییر کرده است</p>
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
                                    <div class="card-footer text-end border-0 pb-0 d-flex justify-content-end">
                                        <button class="btn btn-primary me-3">Submit</button>
                                        <button class="btn btn-outline">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
        </div>
        <!-- index body end -->
        <!-- footer start-->
        <div class="container-fluid">
            <footer class="footer">
                <div class="row">
                    <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0">تمام حقوق این سایت
                            <a href="https://aryadoorsam.com/"> آریادرسام </a>
                            محفوظ است
                            &nbsp; Copyright 2023 ©
                        </p>
                    </div>
                </div>
            </footer>
        </div>
        <!-- footer End-->
    </div>
</div>
<!-- Page Body End -->

</div>
<!-- page-wrapper End-->

<!-- Modal Start -->

<!-- Modal End -->

<!-- latest js -->
<script src="/Agent/assets/js/jquery-3.6.0.min.js"></script>

<!-- Bootstrap js -->
<script src="/Agent/assets/js/bootstrap/bootstrap.bundle.min.js"></script>

<!-- feather icon js -->
<script src="/Agent/assets/js/icons/feather-icon/feather.min.js"></script>
<script src="/Agent/assets/js/icons/feather-icon/feather-icon.js"></script>

<!-- scrollbar simplebar js -->
<script src="/Agent/assets/js/scrollbar/simplebar.js"></script>
<script src="/Agent/assets/js/scrollbar/custom.js"></script>

<!-- Sidebar jquery -->
<script src="/Agent/assets/js/config.js"></script>

<!-- tooltip init js -->
<script src="/Agent/assets/js/tooltip-init.js"></script>

<!-- Plugins JS -->
<script src="/Agent/assets/js/sidebar-menu.js"></script>
<script src="/Agent/assets/js/notify/bootstrap-notify.min.js"></script>
<script src="/Agent/assets/js/notify/index.js"></script>

<!-- Apexchar js -->
<script src="/Agent/assets/js/chart/apex-chart/apex-chart1.js"></script>
<script src="/Agent/assets/js/chart/apex-chart/moment.min.js"></script>
<script src="/Agent/assets/js/chart/apex-chart/apex-chart.js"></script>
<script src="/Agent/assets/js/chart/apex-chart/stock-prices.js"></script>
<script src="/Agent/assets/js/chart/apex-chart/chart-custom.js"></script>
<script src="/Agent/assets/js/chart/apex-chart/chart-custom1.js"></script>


<!-- slick slider js -->
<script src="/Agent/assets/js/slick.min.js"></script>
<script src="/Agent/assets/js/custom-slick.js"></script>

{{--<!-- customizer js -->
<script src="/Agent/assets/js/customizer.js"></script>--}}

<!-- ratio js -->
<script src="/Agent/assets/js/ratio.js"></script>

<!-- sidebar effect -->
<script src="/Agent/assets/js/sidebareffect.js"></script>

<!-- Theme js -->
<script src="/Agent/assets/js/script.js"></script>

@yield('js')
</body>

</html>




