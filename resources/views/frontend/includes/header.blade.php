<header class="header-wrap style2">
    {{-- <div class="header-top d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="header-top-left">
                        <ul class="contact-info list-style">

                            <li>
                                <span><i class="ri-phone-fill"></i></span>
                                <a href="tel:{{$links->number??null}}">{{$links->number??null}}</a>
                            </li>
                            <li>
                                <span><i class="ri-map-pin-fill"></i></span>
                                <p>{{$links->address??null}}</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="header-top-right">

                        <ul class="social-profile list-style style1">
                            <li>
                                <a href="{{$links->facebook??null}}">
                                    <i class="ri-facebook-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{$links->youtube??null}}">
                                    <i class="ri-youtube-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{$links->linkedIn??null}}">
                                    <i class="ri-linkedin-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{$links->instagram??null}}">
                                    <i class="ri-instagram-line"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="header-bottom">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                {{-- <a class="navbar-brand" href="{{route('front.page')}}">
                    @php $logo = \App\Models\Logo::latest()->first() @endphp
                    <img class="logo-light" src="{{asset($logo->logo_image??null)}}" height="80px" width="80px" alt="logo">
                    <img class="logo-dark" src="{{asset($logo->logo_image??null)}}" height="80px" width="80px" alt="logo">
                </a> --}}
                <div class="collapse navbar-collapse main-menu-wrap" id="navbarSupportedContent">
                    <div class="menu-close d-lg-none">
                        <a href="javascript:void(0)"> <i class="ri-close-line"></i></a>
                    </div>
                    {{-- <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="{{route('front.page')}}" class="nav-link {{Request::routeIs('front.page') ? 'active' : ''}}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link {{Request::routeIs('about.page') ? 'active' : ''}} {{Request::routeIs('mission_vission.page') ? 'active' : ''}}">
                                About
                                <i class="ri-arrow-down-s-line"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="{{ route('about.page') }}" class="nav-link">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('mission_vission.page') }}" class="nav-link">Mission & Vision</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('recruiter.details') }}" class="nav-link {{Request::routeIs('recruiter.details') ? 'active' : ''}}">
                                Restricted content
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link {{Request::routeIs('blogs.page') ? 'active' : ''}}">
                                Knowledge
                                <i class="ri-arrow-down-s-line"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="{{route('blogs.page')}}" class="nav-link">Read Blogs</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">Event</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">Single Event</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link">
                                Sourcing
                                <i class="ri-arrow-down-s-line"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="" class="nav-link">Company Profile Link</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">Import Products</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">Others</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link {{Request::routeIs('memberprocedure.details') ? 'active' : ''}}">
                                Members
                                <i class="ri-arrow-down-s-line"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="{{ route('memberprocedure.details') }}" class="nav-link">Membership Procedure</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">Members Area</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">Orientation Members</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link">
                                Career
                                <i class="ri-arrow-down-s-line"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="" class="nav-link">CV Bank</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">donate now</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contacts') }}" class="nav-link  {{Request::routeIs('contacts') ? 'active' : ''}}">Contact</a>
                        </li>

                        @auth()
                        <li class="nav-item align-self-center">
                            <a href="javascript:void(0)" class="nav-link btn style1 px-3"  style="padding: 15px 0; color: #fff">
                                My Account
                                <i class="ri-arrow-down-s-line"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="" class="nav-link">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">Setting</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logoutForm').submit()"> Logout</a>
                                    <form action="{{route('logout')}}" id="logoutForm" method="POST">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endauth

                    </ul> --}}
                    @guest()
                    <div class="other-options md-none">
                        <div class="option-item">
                            <a href="{{route('login')}}" class="btn style1">Sign In</a>
                            <a href="{{route('register')}}" class="btn style1">Register</a>
                        </div>
                    </div>
                    @endguest

                </div>
            </nav>
            <div class="mobile-bar-wrap">
{{--                <button class="searchbtn d-lg-none"><i class="ri-search-line"></i></button>--}}
                <div class="mobile-menu d-lg-none">
                    <a href="javascript:void(0)"><i class="ri-menu-line"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>
