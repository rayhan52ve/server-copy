@extends('frontend.master')

@section('content')
    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                    <h3><i class="fas fa-exclamation-circle me-2"></i> Message</h3>
                    @auth
                        @if (auth()->user()->is_admin == 1 || auth()->user()->is_admin == 2)
                            <a href="{{ route('admin.home') }}" class="btn btn-success rounded-5">
                                <i class="fas fa-home me-1"></i> Go To Home
                            </a>
                        @elseif(auth()->user()->is_admin == 0)
                            <a href="{{ route('user.home') }}" class="btn btn-success rounded-5">
                                <i class="fas fa-home me-1"></i> Home
                            </a>
                        @endif
                    @endauth
                    @guest
                        <a href="{{ url('/login') }}" class="btn btn-success rounded-5">
                            <i class="fas fa-sign-in-alt me-1"></i> Login
                        </a>
                    @endguest
                </div>
                <div class="card-body text-center">
                    <p class="text-danger">
                        <i class="fas fa-ban"></i> Dear {{ auth()->user()->name ?? 'user' }}, Please return to home.
                        @if (auth()->user()->is_admin == 1 || auth()->user()->is_admin == 2)
                            <a href="{{ route('admin.home') }}" class="link">
                                Click Here
                            </a>
                        @else
                            <a href="{{ route('user.home') }}" class="link link-primary">
                                Click Here
                            </a>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
