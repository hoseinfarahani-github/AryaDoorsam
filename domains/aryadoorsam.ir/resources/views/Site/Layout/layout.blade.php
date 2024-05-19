<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="شرکت آریا درسام با تکیه بر سالها تجربه ی موسسین و سابقه ی درخشان با بیش از یک دهه فعالیت در زمینه ی تولید و عرضه ی دربهای ساختمانی، در سال 1397 با نام تجاری">
    <meta name="keywords" content="Fastkart">
    <meta name="author" content="Fastkart">
    <link rel="icon" href="/assets/images/favicon/Favicon316x316.svg" type="image/x-icon">
    <title>درب – انواع درب ساختمان | آریادرسام</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Qwitcher+Grypen:wght@400;700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/v4-shims.min.css">
    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="/assets/css/vendors/bootstrap.css">

    <!-- wow css -->
    <link rel="stylesheet" href="/assets/css/animate.min.css"/>

    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="/assets/css/vendors/font-awesome.css">

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="/assets/css/vendors/feather-icon.css">

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="/assets/css/vendors/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/vendors/slick/slick-theme.css">

    <!-- Iconly css -->
    <link rel="stylesheet" type="text/css" href="/assets/css/bulk-style.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/vendors/animate.css">

    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="/assets/css/style.css">
    @yield('css')
</head>

<body class="theme-color-4">

<!-- Loader Start -->
<div class="fullpage-loader">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
</div>
<!-- Loader End -->

<!-- Header Start -->
<header class="">
    <div class="header-top">
        <div class="container-fluid-lg">
            <div class="row">

                @include('Site.Layout.sidebar')

                <div class="col-xxl-6 col-lg-9 d-lg-block d-none">
                    <div class="header-offer">
                        <div class="notification-slider">
                            <div>
                                <div class="timer-notification">
                                    <h6><strong class="me-1">اریا درسام ایمن گستر</strong>

                                    </h6>
                                </div>
                            </div>

                            <div>
                                <div class="timer-notification">
                                    <h6>تولید کننده و وارد کننده محصولات ضد حریق و ضد سرقت
                                        <a href="shop-left-sidebar.html" class="text-white">
                                            !</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="top-nav top-header sticky-header">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="navbar-top">
                        <button class="navbar-toggler d-xl-none d-inline navbar-menu-button" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                                <span class="navbar-toggler-icon">
                                    <i class="fa-solid fa-bars"></i>
                                </span>
                        </button>

                        <div class="rightside-box">
                            <div class="search-full">
                                <div class="input-group">
                                        <span class="input-group-text">
                                            <i data-feather="search" class="font-light"></i>
                                        </span>
                                    <input type="text" class="form-control search-type" placeholder="Search here">
                                    <span class="input-group-text close-search">
                                            <i data-feather="x" class="font-light"></i>
                                        </span>
                                </div>
                            </div>
                            <ul class="right-side-menu">
                                <li class="right-side">
                                    <div class="delivery-login-box">
                                        <div class="delivery-icon">
                                            <div class="search-box">
                                                <i data-feather="search"></i>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="right-side">
                                    <a href="
{{--                                    {{route('wishlist.add_to_wishlist',['product'=>$product->id])}}--}}
                                    " class="btn p-0 position-relative header-wishlist">
                                        <i data-feather="bookmark"></i>
                                    </a>
                                </li>
                                <li class="right-side">
                                    <div class="onhover-dropdown header-badge">
                                        <button type="button" class="btn p-0 position-relative header-wishlist">
                                            <i data-feather="shopping-cart"></i>
                                            <span class="position-absolute top-0 start-100 translate-middle badge">0
                                                    <span class="visually-hidden">unread messages</span>
                                                </span>
                                        </button>

                                        <div class="onhover-div">
                                            <ul class="cart-list">
                                                {{--
                                                                                                <li class="product-box-contain">
                                                                                                    <div class="drop-cart">
                                                                                                        <a href="product-left-thumbnail.html" class="drop-image">
                                                                                                            <img src="/assets/images/vegetable/product/1.png"
                                                                                                                 class="blur-up lazyload" alt="">
                                                                                                        </a>

                                                                                                        <div class="drop-contain">
                                                                                                            <a href="product-left-thumbnail.html">
                                                                                                                <h5>Fantasy Crunchy Choco Chip Cookies</h5>
                                                                                                            </a>
                                                                                                            <h6><span>1 x</span> $80.58</h6>
                                                                                                            <button class="close-button close_button">
                                                                                                                <i class="fa-solid fa-xmark"></i>
                                                                                                            </button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </li>
                                                --}}


                                            </ul>

                                            <div class="price-box">
                                                <h5>Total :</h5>
                                                <h4 class="theme-color fw-bold">$106.58</h4>
                                            </div>

                                            <div class="button-group">
                                                <a href="cart.html" class="btn btn-sm cart-button">View Cart</a>
                                                <a href="checkout.html" class="btn btn-sm cart-button theme-bg-color
                                                    text-white">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="right-side onhover-dropdown">
                                    <div class="delivery-login-box">
                                        <div class="delivery-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                        @if(auth()->check())
                                            <div class="delivery-detail">
                                                <h6>سلام,</h6>
                                                <h5>{{auth()->user()->name}}</h5>
                                            </div>

                                    </div>
                                    @else
                                        <span>
                                              <h6>ثبت نام / ورود</h6>
                                                </span>
                                    @endif
                                    <div class="onhover-div onhover-div-login">
                                        <ul class="user-box-name">
                                            <li class="product-box-contain">
                                                <i></i>
                                                <a href="login.html">ورود</a>
                                            </li>

                                            <li class="product-box-contain">
                                                <a href="sign-up.html">عضویت</a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="header-nav-middle">
                            <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                                <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                                    <div class="offcanvas-header navbar-shadow">
                                        <h5>Menu</h5>
                                        <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <ul class="navbar-nav">

                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                   data-bs-toggle="dropdown">رهگیری</a>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item"
                                                           href="shop-category-slider.html">پیگیری سفارش</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="shop-category.html">کد اصالت محصول</a>
                                                    </li>

                                                </ul>
                                            </li>

                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                   data-bs-toggle="dropdown">استاندارد ها</a>
                                            </li>

                                            <li class="nav-item dropdown dropdown-mega">
                                                <a class="nav-link dropdown-toggle ps-xl-2 ps-0"
                                                   href="javascript:void(0)" data-bs-toggle="dropdown">تماس با ما</a>

                                            </li>

                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="javascript:void(0)">مقالات</a>

                                            </li>

                                            <li class="nav-item dropdown new-nav-item" dir="rtl">

                                                <a class="nav-link dropdown-toggle" href="{{route('categories.index')}}">محصولات</a>
                                                <ul class="dropdown-menu" dir="rtl">
                                                    @php
                                                        $categories = \App\Models\Product\Category::all();
                                                    @endphp
                                                    @foreach($categories as $category)

                                                        <li class="sub-dropdown-hover text-end" dir="rtl">
                                                            <a class="dropdown-item" href="{{route('categories.show_by_category',$category->id)}}">
                                                                {{$category->title}}
                                                            </a>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle"
                                                   href="{{route('site.staff.index')}}">کارکنان</a>
                                            </li>


                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <a href="index.html" class="web-logo nav-logo">
                            <img src="/assets/images/logo/Logo_with_text.jpeg" class="img-fluid blur-up lazyload"
                                 alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header><!-- Header End -->

<!-- mobile fix menu start -->
<div class="mobile-menu d-md-none d-block mobile-cart">
    <ul>
        <li class="active">
            <a href="index.html">
                <i class="iconly-Home icli"></i>
                <span>Home</span>
            </a>
        </li>

        <li class="mobile-category">
            <a href="javascript:void(0)">
                <i class="iconly-Category icli js-link"></i>
                <span>Category</span>
            </a>
        </li>

        <li>
            <a href="search.html" class="search-box">
                <i class="iconly-Search icli"></i>
                <span>Search</span>
            </a>
        </li>

        <li>
            <a href="wishlist.html" class="notifi-wishlist">
                <i class="iconly-Heart icli"></i>
                <span>My Wish</span>
            </a>
        </li>

        <li>
            <a href="cart.html">
                <i class="iconly-Bag-2 icli fly-cate"></i>
                <span>Cart</span>
            </a>
        </li>
    </ul>
</div>

@yield('content')

<script src="/assets/js/jquery-3.6.0.min.js"></script>

<!-- jquery ui-->
<script src="/assets/js/jquery-ui.min.js"></script>

<!-- Bootstrap js-->
<script src="/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="/assets/js/bootstrap/bootstrap-notify.min.js"></script>
<script src="/assets/js/bootstrap/popper.min.js"></script>

<!-- feather icon js-->
<script src="/assets/js/feather/feather.min.js"></script>
<script src="/assets/js/feather/feather-icon.js"></script>

<!-- Lazyload Js -->
<script src="/assets/js/lazysizes.min.js"></script>

<!-- Slick js-->
<script src="/assets/js/slick/slick.js"></script>
<script src="/assets/js/slick/slick-animation.min.js"></script>
<script src="/assets/js/slick/custom_slick.js"></script>

<!-- Auto Height Js -->
<script src="/assets/js/auto-height.js"></script>

<!-- WOW js -->
<script src="/assets/js/wow.min.js"></script>
<script src="/assets/js/custom-wow.js"></script>

<!-- script js -->
<script src="/assets/js/script.js"></script>
@yield('js')
</body>
</html>