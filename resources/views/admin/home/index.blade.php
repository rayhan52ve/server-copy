@extends('admin.master')
@section('title')
    Admin Dashboard
@endsection

@section('body')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <div class="row page-titles mt-4 mt-md-0">
        <div class="col-5 align-self-center">
            <h4 class="text-themecolor">{{ auth()->user()->is_admin == 1 ? 'Admin' : 'Moderator' }} Dashboard</h4>
        </div>
        <div class="col-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">{{ auth()->user()->is_admin == 1 ? 'Admin' : 'Moderator' }} Dashboard
                    </li>
                </ol>

            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Info box -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12 col-md-12">
            <div class="row">
                <div class="col-xl-2 col-md-3 col-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-header">
                            <h5>Sign Copy</h5>
                        </div>
                        <div class="card-body text-center">
                            <h1>{{ $signCopyCount }}</h1>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @if (auth()->user()->is_admin == 1)
                                <a class="small text-white stretched-link" href="{{ route('admin.sign-copy.index') }}">View
                                    Details</a>
                            @else
                                <a class="small text-white stretched-link" href="#">View
                                    Details</a>
                            @endif
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-3 col-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-header">
                            <h5>Server Copy</h5>
                        </div>
                        <div class="card-body text-center">
                            <h1>{{ $serverCopyCount }}</h1>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @if (auth()->user()->is_admin == 1)
                                <a class="small text-white stretched-link"
                                    href="{{ route('admin.server-copy.index') }}">View
                                    Details</a>
                            @else
                                <a class="small text-white stretched-link" href="#">View
                                    Details</a>
                            @endif
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-3 col-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-header">
                            <h5>Id Card</h5>
                        </div>
                        <div class="card-body text-center">
                            <h1>{{ $idCardCount }}</h1>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @if (auth()->user()->is_admin == 1)
                                <a class="small text-white stretched-link" href="{{ route('admin.id-card.index') }}">View
                                    Details</a>
                            @else
                                <a class="small text-white stretched-link" href="#">View
                                    Details</a>
                            @endif
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-3 col-6">
                    <div class="card bg-purple text-white mb-4">
                        <div class="card-header">
                            <h5>ID Card <small style="font-size: 10px"><b>Name-Address</b></small></h5>
                        </div>
                        <div class="card-body text-center">
                            <h1>{{ $nameAddressCount }}</h1>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @if (auth()->user()->is_admin == 1)
                                <a class="small text-white stretched-link"
                                    href="{{ route('admin.name-address-id.index') }}">View Details</a>
                            @else
                                <a class="small text-white stretched-link" href="#">View
                                    Details</a>
                            @endif
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-3 col-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-header">
                            <h5>Biometric Info</h5>
                        </div>
                        <div class="card-body text-center">
                            <h1>{{ $biometricCount }}</h1>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @if (auth()->user()->is_admin == 1)
                                <a class="small text-white stretched-link"
                                    href="{{ route('admin.biometric-info.index') }}">View Details</a>
                            @else
                                <a class="small text-white stretched-link" href="#">View
                                    Details</a>
                            @endif
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Info box -->
@endsection
