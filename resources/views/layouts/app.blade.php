<!DOCTYPE html>

<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>Metronic | Dashboard</title>
    <meta name="description" content="Latest updates and statistic charts">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"> -->

    <base href="{{ asset('/') }}" />

    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    
    @yield('style')

    <!--end::Page Vendors -->
    <link href="bower_components/moneylover-bower/admin_layout/css/vendors.bundle.css" rel="stylesheet" type="text/css" />

    <!--RTL version:<link href="assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
    <link href="bower_components/moneylover-bower/admin_layout/css/style.bundle.css" rel="stylesheet" type="text/css" />

    <!--RTL version:<link href="assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

    <!--end::Base Styles -->
</head>
<!-- end::Head -->

<!-- begin::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">

        <!-- BEGIN: Header -->
        @include('layouts.header')

        <!-- END: Header -->

        <!-- begin::Body -->
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

            <!-- BEGIN: Left Aside -->
            <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
                <i class="la la-close"></i>
            </button>
            <div id="m_aside_left" class="m-grid__item  m-aside-left  m-aside-left--skin-dark ">
                <!-- BEGIN: Aside Menu -->
                @include('layouts.sidebar')
                <!-- END: Aside Menu -->
            </div>

            <!-- END: Left Aside -->
            <div class="m-grid__item m-grid__item--fluid m-wrapper">

                <div class="m-content">
                    @yield('content')

                    <!--End::Section-->
                </div>
            </div>
        </div>

        <!-- end:: Body -->

        <!-- begin::Footer -->
        @include('layouts.footer')
        <!-- end::Footer -->
    </div>
    <!-- end:: Page -->



    <!-- begin::Scroll Top -->
    <div id="m_scroll_top" class="m-scroll-top">
        <i class="la la-arrow-up"></i>
    </div>
    <!-- end::Scroll Top -->

    <!-- begin::Quick Nav -->
    <ul class="m-nav-sticky" style="margin-top: 30px;">
        <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Purchase" data-placement="left">
            <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" target="_blank">
                <i class="la la-cart-arrow-down"></i>
            </a>
        </li>
        <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Documentation" data-placement="left">
            <a href="https://keenthemes.com/metronic/documentation.html" target="_blank">
                <i class="la la-code-fork"></i>
            </a>
        </li>
        <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Support" data-placement="left">
            <a href="https://keenthemes.com/forums/forum/support/metronic5/" target="_blank">
                <i class="la la-life-ring"></i>
            </a>
        </li>
    </ul>
    <!-- end::Quick Nav -->

    <!--begin::Base Scripts -->
    <script src="bower_components/moneylover-bower/admin_layout/js/vendors.bundle.js" type="text/javascript"></script>
    <script src="bower_components/moneylover-bower/admin_layout/js/scripts.bundle.js" type="text/javascript"></script>
    <!--end::Base Scripts -->
    @yield('script')

</body>
<!-- end::Body -->
</html>