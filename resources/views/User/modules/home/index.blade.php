@extends('User.layout.master')
@section('title')
    User Dashboard
@endsection

@section('user')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <div class="row page-titles mt-4 mt-md-0">
        <div class="col-5 align-self-center">
            <h4 class="text-themecolor">User Dashboard</h4>
        </div>
        <div class="col-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">User Dashboard</li>
                </ol>

            </div>
        </div>
    </div>
    @php
        $notice = \App\Models\Notice::first();
        $message = \App\Models\Message::first();
        $submitStatus = \App\Models\SubmitStatus::first();
    @endphp
    <div class="col-lg-12 mt-5">
        <div class="card p-1" style="border: 2px solid rgb(7, 95, 136); border-radius: 5px;">
            <marquee behavior="" direction="">
                <h4 class="mt-2"><b>নোটিশঃ-</b> {{ $notice->dashboard }}</h4>
            </marquee>
        </div>
    </div>

    <div class="row justify-content-center">
        <!-- Column -->
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <strong><b>মূল্য তালিকা</b></strong><br>
                    <strong class="mt-1"><b>তারিখ:</b> {{ \Carbon\Carbon::now()->format('d-m-Y') }} </strong>

                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ডকুমেন্ট টাইপ</th>
                                <th>মূল্য</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-primary">
                                <td>সাইন কপি</td>
                                @if ($submitStatus->sign_copy == 1)
                                    @if (auth()->user()->premium == 0)
                                        <td>{{ $message->sign_copy_price ?? null }} ৳</td>
                                    @elseif (auth()->user()->premium == 2)
                                        <td>{{ $message->premium_sign_copy_price ?? null }} ৳</td>
                                    @endif
                                @else
                                    <td>OFF</td>
                                @endif
                            </tr>
                            <tr class="table-success">
                                <td>সার্ভার কপি</td>
                                @if ($submitStatus->server_copy == 1)
                                    @if (auth()->user()->premium == 0)
                                        <td>{{ $message->server_copy_price ?? null }} ৳</td>
                                    @elseif (auth()->user()->premium == 2)
                                        <td>{{ $message->premium_server_copy_price ?? null }} ৳</td>
                                    @endif
                                @else
                                    <td>OFF</td>
                                @endif
                            </tr>
                            <tr class="table-danger">
                                <td>আইডি কার্ড</td>
                                @if ($submitStatus->id_card == 1)
                                    @if (auth()->user()->premium == 0)
                                        <td>{{ $message->id_card_price ?? null }} ৳</td>
                                    @elseif (auth()->user()->premium == 2)
                                        <td>{{ $message->premium_id_card_price ?? null }} ৳</td>
                                    @endif
                                @else
                                    <td>OFF</td>
                                @endif
                            </tr>
                            {{-- <tr class="table-info">
                                <td>নতুন এনআইডি</td>
                                @if ($submitStatus->new_nid == 1)
                                    @if (auth()->user()->premium == 0)
                                        <td>{{ $message->new_nid_price ?? null }} ৳</td>
                                    @elseif (auth()->user()->premium == 2)
                                        <td>{{ $message->premium_new_nid_price ?? null }} ৳</td>
                                    @endif
                                @else
                                    <td>OFF</td>
                                @endif
                            </tr> --}}
                            <tr class="table-warning">
                                <td>এনআইডি মেক</td>
                                @if ($submitStatus->old_nid == 1)
                                    @if (auth()->user()->premium == 0)
                                        <td>{{ $message->old_nid_price ?? null }} ৳</td>
                                    @elseif (auth()->user()->premium == 2)
                                        <td>{{ $message->premium_old_nid_price ?? null }} ৳</td>
                                    @endif
                                @else
                                    <td>OFF</td>
                                @endif
                            </tr>
                            <tr class="table-active">
                                <td>নতুন নিবন্ধন</td>
                                @if ($submitStatus->birth == 1)
                                    @if (auth()->user()->premium == 0)
                                        <td>{{ $message->birth_price ?? null }} ৳</td>
                                    @elseif (auth()->user()->premium == 2)
                                        <td>{{ $message->premium_birth_price ?? null }} ৳</td>
                                    @endif
                                @else
                                    <td>OFF</td>
                                @endif
                            </tr>
                            <tr class="table-primary">
                                <td>সার্ভার কপি(Unofficial)</td>
                                @if ($submitStatus->server_unofficial == 1)
                                    @if (auth()->user()->premium == 0)
                                        <td>{{ $message->server_unofficial_price ?? null }} ৳</td>
                                    @elseif (auth()->user()->premium == 2)
                                        <td>{{ $message->premium_server_unofficial_price ?? null }} ৳</td>
                                    @endif
                                @else
                                    <td>OFF</td>
                                @endif
                            </tr>
                            <tr class="table-success">
                                <td>সাইন টু সার্ভার</td>
                                @if ($submitStatus->sign_to_server == 1)
                                    @if (auth()->user()->premium == 0)
                                        <td>{{ $message->sign_to_server_price ?? null }} ৳</td>
                                    @elseif (auth()->user()->premium == 2)
                                        <td>{{ $message->premium_sign_to_server_price ?? null }} ৳</td>
                                    @endif
                                @else
                                    <td>OFF</td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
