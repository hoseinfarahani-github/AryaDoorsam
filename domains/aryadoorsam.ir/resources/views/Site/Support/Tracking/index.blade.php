<!DOCTYPE html>
<html lang="en">

<head>
    {!! SEO::generate() !!}
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fastkart">
    <meta name="keywords" content="Fastkart">
    <meta name="author" content="Fastkart">
    <link rel="icon" href="/assets/images/favicon/1.png" type="image/x-icon">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="/assets/css/vendors/bootstrap/bootstrap.css">

    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="/assets/css/vendors/font-awesome.css">

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="/assets/css/vendors/feather-icon.css">

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="/assets/css/vendors/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/vendors/slick/slick-theme.css">

    <!-- Iconly css -->
    <link rel="stylesheet" type="text/css" href="/assets/css/bulk-style.css">

    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>

<body>

<!-- log in section start -->
<section class="log-in-section otp-section section-b-space">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                <div class="image-contain">
                    <img src="/assets/image/Logo_Black_TextOnly.png" class="img-fluid" alt="">

                </div>
            </div>

            <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                <div class="d-flex align-items-center justify-content-center h-100">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3 class="text-title" style="text-align: end !important;">کد پیگیری خود را وارد کنید</h3>
                            <h5 class="text-content" style="text-align: end !important;">برای پیگیری سفارش خود در این بخش کد پیگیری را وارد کنید</h5>
                        </div>
                        <form name=trackingform action="{{route('support.tracking.call_up')}}" method="post">
                            @csrf
                            <div id="" class="inputs d-flex flex-row justify-content-center">
                                <input name="tracking_serial" class="text-center form-control rounded border border-1" type="text" id="first" maxlength="10"
                                       placeholder="کد پیگیری خود را وارد کنید">


                            </div>

                            <div class="send-box pt-4">
                                <h5 style="text-align: end !important;">کد پیگیری ندارید؟ <a href="javascript:void(0)" class="theme-color fw-bold">
                                        پیام به پشتیبانی</a></h5>
                            </div>
								
                            <a class="btn btn-animation w-100 mt-3" href="javascript:submitform()">پیگیری</a>
                            <button id="button_form" hidden="hidden" class="btn btn-animation w-100 mt-3"
                                    type="submit"></button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- log in section end -->

<!-- Bg overlay Start -->
<div class="bg-overlay"></div>
<!-- Bg overlay End -->

<!-- latest jquery-->
</body>

<script>
    function submitform() {   document.trackingform.submit(); }

</script>

</html>
