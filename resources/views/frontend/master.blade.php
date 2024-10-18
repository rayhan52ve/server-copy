<!DOCTYPE html>
<html lang="zxx">
@php $logo = \App\Models\Logo::latest()->first() @endphp

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Server Copy</title>
    <meta name="description" content="">
    <!-- responsive tag -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Link of CSS files -->
    @include('frontend.includes.style')
    <title>{{ $logo->site_name }}</title>
    <link rel="icon" type="image/png" href="{{ asset($logo->logo_image) }}">
</head>

<body>

    <!--Preloader starts-->
    <!--<div class="loader js-preloader">-->
    <!--    <div class="absCenter">-->
    <!--        <div class="loaderPill">-->
    <!--            <div class="loaderPill-anim">-->
    <!--                <div class="loaderPill-anim-bounce">-->
    <!--                    <div class="loaderPill-anim-flop">-->
    <!--                        <div class="loaderPill-pill"></div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="loaderPill-floor">-->
    <!--                <div class="loaderPill-floor-shadow"></div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--Preloader ends-->

    <!-- Theme Switcher Start -->
    <div class="switch-theme-mode">
        <label id="switch" class="switch">
            <input type="checkbox" onchange="toggleTheme()" id="slider">
            <span class="slider round"></span>
        </label>
    </div>
    <!-- Theme Switcher End -->

    <!-- Page Wrapper End -->
    <div class="page-wrapper">

        <!-- Header Section Start -->
        {{-- @include('frontend.includes.header') --}}
        <!-- Header Section End -->

        @yield('content')

        <!-- Footer Section Start -->
        {{-- @include('frontend.includes.footer') --}}
        <!-- Footer Section End -->

    </div>
    <!-- Page Wrapper End -->

    <!-- Back-to-top button Start -->
    <a href="javascript:void(0)" class="back-to-top bounce"><i class="ri-arrow-up-s-line"></i></a>
    <!-- Back-to-top button End -->
    <!-- phone button Start -->
    {{-- <a href="tel:{{$links->number??null}}" class="phone-button bounce"><i class="ri-phone-fill"></i></a> --}}
    <!-- phone button End -->

    <!-- Link of JS files -->
    @include('frontend.includes.script')
    @include('sweetalert::alert')
</body>

</html>
