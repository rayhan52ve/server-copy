<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Server Copy</title>
         <meta name="description" content="সেবার আলো health Ltd">
    <!-- responsive tag -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="description" content="We.provide. Physiotherapy home service, doctor at home, nursing home service, elder care & Care Givers, exercise & Body Steertching, massage therapy, yoga, hijama therapy, acupressure and acupuncture, alternative therapies provide convenient and personalized healthcare services. offering treatments, support, and assistance to improve physical well-being and overall quality of" />
    <meta name="keywords" content="Physiotherapy,Doctor,Nursing,Elder Care & Care Givers,Exercise & body stretching,Massage therapy,Yoga,hijama/Cupping therapy,Acupuncture & Acupressure">
    <meta name="csrf-token" content="https://shebaralohealth.com/">
    {{-- <meta name="app-url" content="https://shebaralohealth.com/">
    <meta name="file-base-url" content="https://shebaralohealth.com/"> --}}
        <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="icon" type="image/png" href="https://shebaralohealth.com/logo/favicon-1854141356.png"> --}}
    <!-- Link of CSS files -->
    @include('frontend.includes.style')
    <title>Medical @yield('title')</title>
    @php $logo = \App\Models\Logo::latest()->first() @endphp
    <link rel="icon" type="image/png" href="{{asset($logo->favicon)}}">
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
