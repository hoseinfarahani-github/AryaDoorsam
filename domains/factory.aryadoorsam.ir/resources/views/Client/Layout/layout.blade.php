<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    {!! SEO::generate() !!}

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="Fastkart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Fastkart admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="/storage/assets/icon/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="/storage/assets/icon/favicon.svg" type="image/x-icon">

    <!-- Google font-->
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Linear Icon css -->
    <link rel="stylesheet" href="Client/assets/css/linearicon.css">

    <!-- fontawesome css -->
    <link rel="stylesheet" type="text/css" href="Client/assets/css/vendors/font-awesome.css">

    <!-- Themify icon css-->
    <link rel="stylesheet" type="text/css" href="Client/assets/css/vendors/themify.css">

    <!-- ratio css -->
    <link rel="stylesheet" type="text/css" href="Client/assets/css/ratio.css">

    <!-- remixicon css -->
    <link rel="stylesheet" type="text/css" href="Client/assets/css/remixicon.css">

    <!-- Feather icon css-->
    <link rel="stylesheet" type="text/css" href="Client/assets/css/vendors/feather-icon.css">

    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="Client/assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="Client/assets/css/vendors/animate.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="Client/assets/css/vendors/bootstrap.css">

    <!-- vector map css -->
    <link rel="stylesheet" type="text/css" href="Client/assets/css/vector-map.css">

    <!-- Slick Slider Css -->
    <link rel="stylesheet" href="Client/assets/css/vendors/slick.css">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="Client/assets/css/style.css">


    <!-- Extra css -->
    <link rel="stylesheet" type="text/css" href="Client/assets/css/ExtraStyle.css">

    @yield('css')
</head>

<body>
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
                        <img class="img-fluid main-logo" src="Client/assets/images/logo/1.png" alt="logo">
                        <img class="img-fluid white-logo" src="Client/assets/images/logo/1-white.png" alt="logo">
                    </a>
                </div>
                <div class="toggle-sidebar">
                    <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
                    <a href="index.html">
                        <img src="Client/assets/images/logo/1.png" class="img-fluid" alt="">
                    </a>
                </div>
            </div>

            <form class="form-inline search-full" action="javascript:void(0)" method="get">
                <div class="form-group w-100">
                    <div class="Typeahead Typeahead--twitterUsers">
                        <div class="u-posRelative">
                            <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                                   placeholder="Search Fastkart .." name="q" title="" autofocus>
                            <i class="close-search" data-feather="x"></i>
                            <div class="spinner-border Typeahead-spinner" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <div class="Typeahead-menu"></div>
                    </div>
                </div>
            </form>
            <div class="nav-right col-6 pull-right right-header p-0">
                <ul class="nav-menus">
                    <li>
                            <span class="header-search">
                                <i class="ri-search-line"></i>
                            </span>
                    </li>
                    <li class="onhover-dropdown">
                        <div class="notification-box">
                            <i class="ri-notification-line"></i>
                            <span class="badge rounded-pill badge-theme">4</span>
                        </div>
                        <ul class="notification-dropdown onhover-show-div">
                            <li>
                                <i class="ri-notification-line"></i>
                                <h6 class="f-18 mb-0">Notitications</h6>
                            </li>
                            <li>
                                <p>
                                    <i class="fa fa-circle me-2 font-primary"></i>Delivery processing <span
                                        class="pull-right">10 min.</span>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <i class="fa fa-circle me-2 font-success"></i>Order Complete<span
                                        class="pull-right">1 hr</span>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <i class="fa fa-circle me-2 font-info"></i>Tickets Generated<span
                                        class="pull-right">3 hr</span>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <i class="fa fa-circle me-2 font-danger"></i>Delivery Complete<span
                                        class="pull-right">6 hr</span>
                                </p>
                            </li>
                            <li>
                                <a class="btn btn-primary" href="javascript:void(0)">Check all notification</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <div class="mode">
                            <i class="ri-moon-line"></i>
                        </div>
                    </li>
                    <li class="profile-nav onhover-dropdown pe-0 me-0">
                        <div class="media profile-media">
                            <img class="user-profile rounded-circle" src="Client/assets/images/users/4.jpg" alt="">
                            <div class="user-name-hide media-body">
                                <span>{{\Illuminate\Support\Facades\Auth::user()->username}}</span>
                                <p class="mb-0 font-roboto">Admin<i class="middle ri-arrow-down-s-line"></i></p>
                            </div>
                        </div>
                        <ul class="profile-dropdown onhover-show-div">
                            <li>
                                <a href="all-users.html">
                                    <i data-feather="users"></i>
                                    <span>Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="order-list.html">
                                    <i data-feather="archive"></i>
                                    <span>Orders</span>
                                </a>
                            </li>
                            <li>
                                <a href="support-ticket.html">
                                    <i data-feather="phone"></i>
                                    <span>Spports Tickets</span>
                                </a>
                            </li>
                            <li>
                                <a href="profile-setting.html">
                                    <i data-feather="settings"></i>
                                    <span>Settings</span>
                                </a>
                            </li>
                            <li>
                                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                   href="javascript:void(0)">
                                    <i data-feather="log-out"></i>
                                    <span>Log out</span>
                                </a>
                            </li>
                        </ul>
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
                    <a href="index.html" data-bs-original-title="" title="">
                        <img class="img-fluid for-white" src="/assets/image/Logo_TextOnly.png" alt="logo">
                    </a>
                    <div class="back-btn">
                        <i class="fa fa-angle-left"></i>
                    </div>
                    <div class="toggle-sidebar">
                        <i class="ri-apps-line status_toggle middle sidebar-toggle"></i>
                    </div>
                </div>
                <div class="logo-icon-wrapper">
                    <a href="index.html">
                        <img class="img-fluid main-logo main-white" src="Client/assets/images/logo/logo.png" alt="logo">
                        <img class="img-fluid main-logo main-dark" src="Client/assets/images/logo/logo-white.png"
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

                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title link-nav" href="{{route('client.dashboard.index')}}">
                                    <i class="ri-home-line"></i>
                                    <span>ناحیه کاربری</span>
                                </a>
                            </li>


                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title link-nav" href="product-review.html">
                                    <i class="ri-star-line"></i>
                                    <span>Product Review</span>
                                </a>
                            </li>

                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title link-nav" href="support-ticket.html">
                                    <i class="ri-phone-line"></i>
                                    <span>Support Ticket</span>
                                </a>
                            </li>

                            <li class="sidebar-list">
                                <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                    <i class="ri-settings-line"></i>
                                    <span>تنظیمات</span>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li>
                                        <a href="profile-setting.html">تنظیمات پروفایل</a>
                                    </li>
                                    <li>
                                        <a href="profile-setting.html">تنظیمات امنیتی</a>
                                    </li>
                                </ul>
                            </li>


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
        @yield('content')
        <!-- index body end -->

    </div>
    <!-- Page Body End -->
</div>
<!-- page-wrapper End-->

<!-- Modal Start -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                <h5 class="modal-title rtl" id="staticBackdropLabel">خروج از حساب کاربری</h5>
                <p class="rtl">آیا مطمئن اید که میخواهید از حساب کاربری خود خارج شوید؟</p>
                <button type="button" style="left: 15px !important;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="button-box">
                    <button type="button" class="btn btn--no" data-bs-dismiss="modal">خیر</button>
                    <a href="{{route('logout')}}"
                       onclick="event.preventDefault();
                                        this.closest('form').submit();" class="btn  btn--yes btn-primary">بله</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal End -->

<!-- latest js -->
<script src="Client/assets/js/jquery-3.6.0.min.js"></script>

<!-- Bootstrap js -->
<script src="Client/assets/js/bootstrap/bootstrap.bundle.min.js"></script>

<!-- feather icon js -->
<script src="Client/assets/js/icons/feather-icon/feather.min.js"></script>
<script src="Client/assets/js/icons/feather-icon/feather-icon.js"></script>

<!-- scrollbar simplebar js -->
<script src="Client/assets/js/scrollbar/simplebar.js"></script>
<script src="Client/assets/js/scrollbar/custom.js"></script>

<!-- Sidebar jquery -->
<script src="Client/assets/js/config.js"></script>

<!-- tooltip init js -->
<script src="Client/assets/js/tooltip-init.js"></script>

<!-- Plugins JS -->
<script src="Client/assets/js/sidebar-menu.js"></script>
<script src="Client/assets/js/notify/bootstrap-notify.min.js"></script>
<script src="Client/assets/js/notify/index.js"></script>

<!-- Apexchar js -->
<script src="Client/assets/js/chart/apex-chart/apex-chart1.js"></script>
<script src="Client/assets/js/chart/apex-chart/moment.min.js"></script>
<script src="Client/assets/js/chart/apex-chart/apex-chart.js"></script>
<script src="Client/assets/js/chart/apex-chart/stock-prices.js"></script>
<script src="Client/assets/js/chart/apex-chart/chart-custom1.js"></script>


<!-- slick slider js -->
<script src="Client/assets/js/slick.min.js"></script>
<script src="Client/assets/js/custom-slick.js"></script>

<!-- customizer js -->
<script src="Client/assets/js/customizer.js"></script>

<!-- ratio js -->
<script src="Client/assets/js/ratio.js"></script>

<!-- sidebar effect -->
<script src="Client/assets/js/sidebareffect.js"></script>

<!-- Theme js -->
<script src="Client/assets/js/script.js"></script>
@yield('js')
</body>

</html>




