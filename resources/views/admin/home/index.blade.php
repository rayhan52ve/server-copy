@extends('admin.master')
@section('title')
    Admin Dashboard
@endsection
@php
    $moderatorAccess = \App\Models\ModeratorAccess::where('user_id', auth()->user()->id)->first();
@endphp
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
                @if (auth()->user()->is_admin == 1 || @$moderatorAccess->sign_copy == 1)
                    <div class="col-xl-2 col-md-3 col-6 mb-3">
                        <div class="card bg-primary text-white mb-4 h-100">
                            <div class="card-header">
                                <h5>Sign Copy</h5>
                            </div>
                            <div class="card-body text-center">
                                <h1>{{ $signCopyCount }}</h1>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ route('admin.sign-copy.index') }}">View
                                    Details</a>

                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                @endif
                @if (auth()->user()->is_admin == 1 || @$moderatorAccess->server_copy == 1)
                    <div class="col-xl-2 col-md-3 col-6 mb-3">
                        <div class="card bg-warning text-white mb-4 h-100">
                            <div class="card-header">
                                <h5>Server Copy</h5>
                            </div>
                            <div class="card-body text-center">
                                <h1>{{ $serverCopyCount }}</h1>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link"
                                    href="{{ route('admin.server-copy.index') }}">View
                                    Details</a>

                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                @endif
                @if (auth()->user()->is_admin == 1 || @$moderatorAccess->id_card == 1)
                    <div class="col-xl-2 col-md-3 col-6 mb-3">
                        <div class="card bg-success text-white mb-4 h-100">
                            <div class="card-header">
                                <h5>Id Card</h5>
                            </div>
                            <div class="card-body text-center">
                                <h1>{{ $idCardCount }}</h1>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ route('admin.id-card.index') }}">View
                                    Details</a>

                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                @endif
                @if (auth()->user()->is_admin == 1 || @$moderatorAccess->name_address_id == 1)
                    <div class="col-xl-2 col-md-3 col-6 mb-3">
                        <div class="card bg-purple text-white mb-4 h-100">
                            <div class="card-header">
                                <h5>ID Card <small style="font-size: 10px"><b>Name-Address</b></small></h5>
                            </div>
                            <div class="card-body text-center">
                                <h1>{{ $nameAddressCount }}</h1>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link"
                                    href="{{ route('admin.name-address-id.index') }}">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                @endif
                @if (auth()->user()->is_admin == 1 || @$moderatorAccess->biometric == 1)
                    <div class="col-xl-2 col-md-3 col-6 mb-3">
                        <div class="card bg-danger text-white mb-4 h-100">
                            <div class="card-header">
                                <h5>Biometric Info</h5>
                            </div>
                            <div class="card-body text-center">
                                <h1>{{ $biometricCount }}</h1>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link"
                                    href="{{ route('admin.biometric-info.index') }}">View Details</a>

                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                @endif
                @if (auth()->user()->is_admin == 1 || @$moderatorAccess->birth_order == 1)
                    <div class="col-xl-2 col-md-3 col-6 mb-3">
                        <div class="card bg-info text-white mb-4 h-100">
                            <div class="card-header">
                                <h5>Birth Registration</h5>
                            </div>
                            <div class="card-body text-center">
                                <h1>{{ $birthRegCount }}</h1>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link"
                                    href="{{ route('admin.birth-order.index') }}">View Details</a>

                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                @endif
                @if (auth()->user()->is_admin == 1)
                    <div class="col-xl-2 col-md-3 col-6 mb-3">
                        <div class="card text-white mb-4 h-100" style="background-color:rgb(70, 131, 85)">
                            <div class="card-header">
                                <h5>User Password Set <small><b>NID Card</b></small></h5>
                            </div>
                            <div class="card-body text-center">
                                <h1>{{ $userPassCount }}</h1>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link"
                                    href="{{ route('admin.user-pass-nid.index') }}">View Details</a>

                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                @endif
                @if (auth()->user()->is_admin == 1)
                    <div class="col-xl-2 col-md-3 col-6 mb-3">
                        <div class="card text-white mb-4 h-100" style="background-color:rgb(153, 39, 159)">
                            <div class="card-header">
                                <h5>Nid Correction <small><b>Form Download</b></small></h5>
                            </div>
                            <div class="card-body text-center">
                                <h1>{{ $nidLostFormCount }}</h1>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link"
                                    href="{{ route('admin.lost-nid-form.index') }}">View Details</a>

                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Info box -->
@endsection
