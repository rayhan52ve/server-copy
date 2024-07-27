@extends('frontend.master')

@section('content')
    @php
        $submitStatus = \App\Models\SubmitStatus::first();
    @endphp



    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- style css for this template -->
    <link href="https://rapi.foxithub.com/assets/templates/custom//css/style.css" rel="stylesheet" id="style">
    <style>
        body {
            background-color: #e2e8f3;
        }

        .text-bg-warning {
            color: #000 !important;
            background-color: RGBA(255, 193, 7, var(--bs-bg-opacity, 1)) !important;
        }

        .text-bg-success {
            color: #fff !important;
            background-color: RGBA(25, 135, 84, var(--bs-bg-opacity, 1)) !important;
        }

        .text-bg-dark {
            color: #fff !important;
            background-color: RGBA(33, 37, 41, var(--bs-bg-opacity, 1)) !important;
        }

        .text-bg-danger {
            color: #fff !important;
            background-color: RGBA(220, 53, 69, var(--bs-bg-opacity, 1)) !important;
        }

        .text-bg-info {
            color: #000 !important;
            background-color: RGBA(13, 202, 240, var(--bs-bg-opacity, 1)) !important;
        }

        .text-bg-secondary {
            color: #fff !important;
            background-color: RGBA(108, 117, 125, var(--bs-bg-opacity, 1)) !important;
        }

        .list-group-item {
            position: relative;
            display: block;
            padding: 0.5rem 1rem;
            color: #212529;
            text-decoration: none;
            background-color: #fff0 !important;
            border: 1px solid rgba(0, 0, 0, 0.125);
        }

        .dropdown-menu {
            color: var(--fimobile-card-text) !important;
            background-color: var(--fimobile-theme-bordercolor) !important;
        }

        .sidebar-wrap .sidebar .nav .nav-item.dropdown .dropdown-menu {
            background-color: rgba(255, 255, 255, 0.15) !important;
            border: 0;
            padding: 5px;
            border-radius: 0 0 10px 10px;
        }
    </style>

    <!-- Custom Css -->
    <style>
        .footer .nav .nav-item.centerbutton .nav-link .nav-menu-popover {
            height: auto;
            padding: var(--fimobile-padding);
            border-radius: var(--fimobile-rounded);
            background-color: var(--fimobile-theme-color-2);
            color: var(--fimobile-theme-text);
            position: absolute;
            bottom: 100%;
            width: 170px;
            left: -85px;
            margin-left: 38px;
            display: none;
        }
    </style>

    <style type="text/css">
        @keyframes tawkMaxOpen {
            0% {
                opacity: 0;
                transform: translate(0, 30px);
                ;
            }

            to {
                opacity: 1;
                transform: translate(0, 0px);
            }
        }

        @-moz-keyframes tawkMaxOpen {
            0% {
                opacity: 0;
                transform: translate(0, 30px);
                ;
            }

            to {
                opacity: 1;
                transform: translate(0, 0px);
            }
        }

        @-webkit-keyframes tawkMaxOpen {
            0% {
                opacity: 0;
                transform: translate(0, 30px);
                ;
            }

            to {
                opacity: 1;
                transform: translate(0, 0px);
            }
        }

        #s8550of3jfb1720453163716.open {
            animation: tawkMaxOpen .25s ease !important;
        }

        @keyframes tawkMaxClose {
            from {
                opacity: 1;
                transform: translate(0, 0px);
                ;
            }

            to {
                opacity: 0;
                transform: translate(0, 30px);
                ;
            }
        }

        @-moz-keyframes tawkMaxClose {
            from {
                opacity: 1;
                transform: translate(0, 0px);
                ;
            }

            to {
                opacity: 0;
                transform: translate(0, 30px);
                ;
            }
        }

        @-webkit-keyframes tawkMaxClose {
            from {
                opacity: 1;
                transform: translate(0, 0px);
                ;
            }

            to {
                opacity: 0;
                transform: translate(0, 30px);
                ;
            }
        }

        #s8550of3jfb1720453163716.closed {
            animation: tawkMaxClose .25s ease !important
        }
    </style>

    <!-- Content Wrapper Start -->
    <div class="">

        <section class="Login-wrap pt-100 pb-75">
            <div class="container">
                <div class="row h-100 overflow-auto">
                    <div class="col-12 text-center mb-auto px-0">
                        <header class="header">
                            <div class="row">
                                <div class="col-auto"></div>
                                <div class="col">
                                    <div class="logo-small">


                                    </div>
                                </div>
                                <div class="col-auto"></div>
                            </div>
                        </header>
                    </div>
                    <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center text-center py-4">
                        <h1 class="mb-4 text-color-theme">Member Login</h1>
                        <form method="POST" action="{{ route('login') }}" novalidate="">
                            <div class="text-center">
                                @if (session('error'))
                                    <p class="text-danger">{{ session('error') }}</p>
                                @endif
                            </div>

                            @csrf
                            <div class="form-group form-floating mb-3 is-valid">
                                <input class="form-control" autocomplete="on" name="email" type="email"
                                    placeholder="Email Address" required="">
                                <label class="form-control-label" for="email">Email</label>
                            </div>

                            <div class="form-group form-floating is-invalid mb-3">
                                <input class="form-control" id="password" name="password" placeholder="Password"
                                    type="password" required="">
                                <label class="form-control-label" for="password">Password</label>

                            </div>

                            <div class="row justify-content-center">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-end mb-20">
                                    <a href="" class="link style1">Forgot Password?</a>
                                </div>
                            </div>
                            <button class="btn btn-lg style1 w-100 d-block">
                                Sign In {{ $submitStatus->login == 0 ? 'Blocked' : 'Now' }}
                            </button>

                            <div class="col-md-12 mt-3">
                                <p class="mb-0">Don't have an Account? <br>
                                    <a class="link style1" href="{{ route('register') }}">Register Now</a>
                                </p>
                            </div>

                            {{-- <button type="submit" class="btn btn-lg btn-default w-100 mb-4 shadow">
                                Login {{ $submitStatus->login == 0 ? 'Blocked':'Now'}}
                            </button> --}}
                        </form>


                    </div>



                </div>
            </div>
        </section>
        <!-- Account Section start -->
        {{-- <section class="Login-wrap pt-100 pb-75">
            <div class="container">
                <div class="row gx-5">
                    <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                        <div class="login-form-wrap">
                            <div class="login-header">
                                <h3>Login</h3>
                                @if (session('error'))
                                    <p class="text-danger">{{ session('error') }}</p>
                                @endif
                            </div>
                            <form class="login-form" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input id="email" name="email" type="email" placeholder="Email Address"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input id="password" name="password" placeholder="Password" type="password">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="checkbox style3">
                                            <input type="checkbox" id="test_1">
                                            <label for="test_1">
                                                Remember Me</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-end mb-20">
                                        <a href="" class="link style1">Forgot Password?</a>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <button class="btn style1 w-100 d-block">
                                                Login {{ $submitStatus->login == 0 ? 'Blocked' : 'Now' }}
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="mb-0">Don't have an Account? <a class="link style1"
                                                href="{{ route('register') }}">Register Now</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section> --}}
        <!-- Account Section end -->


    </div>
    <!-- Content wrapper end -->
@endsection
