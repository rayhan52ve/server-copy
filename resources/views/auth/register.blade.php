@extends('frontend.master')

@section('content')
    @php
        $notice = \App\Models\Notice::first();
        $message = \App\Models\Message::first();
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
    <section class="Login-wrap pb-75">
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
                    <h1 class="mb-4 text-color-theme">Register</h1>
                    <form method="POST" action="{{ route('register') }}" >
                        <div class="text-center">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        @csrf
                        <div class="form-group form-floating mb-3 is-valid">
                            <input class="form-control" autocomplete="on" name="name" type="text"
                                placeholder="Username" required="">
                            <label class="form-control-label" for="name">User Name</label>
                        </div>
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

                        <div class="form-group form-floating is-invalid mb-3">
                            <input class="form-control" id="pwd_2" name="password_confirmation"
                                placeholder="Confirm Password" type="password" required="">
                            <label class="form-control-label" for="password">Confirm Password</label>

                        </div>

                        <div class="col-sm-12 col-12 mb-20">
                            <div class="checkbox style3">
                                <input type="checkbox" id="test_1">
                                <label for="test_1">
                                    I Agree with the <a class="link style1" href="">Terms &amp;
                                        conditions</a>
                                </label>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                @if ($submitStatus->registration == 0)
                                    <p class="text-danger text-center">নতুন রেজিস্ট্রেশন বন্ধ আছে। পরবর্তীতে
                                        চেষ্টা
                                        করুন।</p>
                                @endif
                                <button class="btn btn-lg style1 w-100 d-block"
                                    {{ $submitStatus->registration == 1 ? '' : 'disabled' }}>
                                    Register
                                </button>
                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <p class="mb-0">Have an Account? <br>
                                <a class="link style1" href="{{ route('login') }}">Sign In</a>
                            </p>
                        </div>

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
                            <h3>Register</h3>
                        </div>
                        <form class="login-form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input id="name" type="text" name="name" type="text"
                                            placeholder="Username" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input id="email" type="email" name="email" type="text"
                                            placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input id="pwd" name="password" placeholder="Password" type="password">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input id="pwd_2" name="password_confirmation" placeholder="Confirm Password"
                                            type="password">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-12 mb-20">
                                    <div class="checkbox style3">
                                        <input type="checkbox" id="test_1">
                                        <label for="test_1">
                                            I Agree with the <a class="link style1" href="">Terms &amp;
                                                conditions</a>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        @if ($submitStatus->registration == 0)
                                            <p class="text-danger text-center">নতুন রেজিস্ট্রেশন বন্ধ আছে। পরবর্তীতে
                                                চেষ্টা
                                                করুন।</p>
                                        @endif
                                        <button class="btn style1 w-100 d-block"
                                            {{ $submitStatus->registration == 1 ? '' : 'disabled' }}>
                                            Register
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p class="mb-0">Have an Account? <a class="link style1"
                                            href="{{ route('login') }}">Sign In</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Account Section end -->

    <!-- Content wrapper end -->
@endsection
