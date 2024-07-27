@extends('User.layout.master')
@section('user')
    @php
        $notice = \App\Models\Notice::first();
        $message = \App\Models\Message::first();
        $submitStatus = \App\Models\SubmitStatus::first();
    @endphp
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .login-root {
            padding: 0;
            margin: 0;
            color: #1a1f36;
            box-sizing: border-box;
            word-wrap: break-word;
            font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Ubuntu, sans-serif;
        }

        /* body {
                                                            min-height: 100%;
                                                            background-color: #ffffff;
                                                        } */

        h1 {
            letter-spacing: -1px;
        }

        a {
            color: #5469d4;
            text-decoration: unset;
        }

        .login-root {
            background: #fff;
            display: flex;
            width: 100%;
            min-height: 100%;
            overflow: hidden;
            position: relative;
        }

        .loginbackground {
            min-height: 692px;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            top: 0;
            z-index: 0;
            overflow: hidden;
        }

        .flex-flex {
            display: flex;
        }

        .align-center {
            align-items: center;
        }

        .center-center {
            align-items: center;
            justify-content: center;
        }

        .box-root {
            box-sizing: border-box;
        }

        .flex-direction--column {
            -ms-flex-direction: column;
            flex-direction: column;
        }

        .loginbackground-gridContainer {
            display: -ms-grid;
            display: grid;
            -ms-grid-columns: [start] 1fr [left-gutter] (86.6px)[16] [left-gutter] 1fr [end];
            grid-template-columns: [start] 1fr [left-gutter] repeat(16, 86.6px) [left-gutter] 1fr [end];
            -ms-grid-rows: [top] 1fr [top-gutter] (64px)[8] [bottom-gutter] 1fr [bottom];
            grid-template-rows: [top] 1fr [top-gutter] repeat(8, 64px) [bottom-gutter] 1fr [bottom];
            justify-content: center;
            margin: 0 -2%;
            transform: rotate(-12deg) skew(-12deg);
        }

        .box-divider--light-all-2 {
            box-shadow: inset 0 0 0 2px #e3e8ee;
        }

        .box-background--blue {
            background-color: #5469d4;
        }

        .box-background--white {
            background-color: #ffffff;
        }

        .box-background--blue800 {
            background-color: #212d63;
        }

        .box-background--gray100 {
            background-color: #e3e8ee;
        }

        .box-background--cyan200 {
            background-color: #7fd3ed;
        }

        .padding-top--64 {
            padding-top: 64px;
        }

        .padding-top--24 {
            padding-top: 24px;
        }

        .padding-top--48 {
            padding-top: 48px;
        }

        .padding-bottom--24 {
            padding-bottom: 24px;
        }

        .padding-horizontal--48 {
            padding: 48px;
        }

        .padding-bottom--15 {
            padding-bottom: 15px;
        }

        .padding-bottom--10 {
            padding-bottom: 10px;
        }


        .flex-justifyContent--center {
            -ms-flex-pack: center;
            justify-content: center;
        }

        .formbg {
            margin: 0px auto;
            width: 100%;
            max-width: 448px;
            background: white;
            border-radius: 4px;
            box-shadow: rgba(60, 66, 87, 0.12) 0px 7px 14px 0px, rgba(0, 0, 0, 0.12) 0px 3px 6px 0px;
        }

        .title {
            display: block;
            font-size: 20px;
            line-height: 28px;
            color: #1a1f36;
        }

        label {
            margin-bottom: 10px;
        }

        .reset-pass a,
        label {
            font-size: 14px;
            font-weight: 600;
            display: block;
        }

        .reset-pass>a {
            text-align: right;
            margin-bottom: 10px;
        }

        .grid--50-50 {
            display: grid;
            grid-template-columns: 50% 50%;
            align-items: center;
        }

        .field input {
            font-size: 16px;
            line-height: 28px;
            padding: 8px 16px;
            width: 100%;
            min-height: 44px;
            border: unset;
            border-radius: 4px;
            outline-color: rgb(84 105 212 / 0.5);
            background-color: rgb(255, 255, 255);
            box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px,
                rgba(0, 0, 0, 0) 0px 0px 0px 0px,
                rgba(0, 0, 0, 0) 0px 0px 0px 0px,
                rgba(60, 66, 87, 0.16) 0px 0px 0px 1px,
                rgba(0, 0, 0, 0) 0px 0px 0px 0px,
                rgba(0, 0, 0, 0) 0px 0px 0px 0px,
                rgba(0, 0, 0, 0) 0px 0px 0px 0px;
        }

        input[type="submit"] {
            background-color: rgb(84, 105, 212);
            box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px,
                rgba(0, 0, 0, 0) 0px 0px 0px 0px,
                rgba(0, 0, 0, 0.12) 0px 1px 1px 0px,
                rgb(84, 105, 212) 0px 0px 0px 1px,
                rgba(0, 0, 0, 0) 0px 0px 0px 0px,
                rgba(0, 0, 0, 0) 0px 0px 0px 0px,
                rgba(60, 66, 87, 0.08) 0px 2px 5px 0px;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
        }

        .field-checkbox input {
            width: 20px;
            height: 15px;
            margin-right: 5px;
            box-shadow: unset;
            min-height: unset;
        }

        .field-checkbox label {
            display: flex;
            align-items: center;
            margin: 0;
        }

        a.ssolink {
            display: block;
            text-align: center;
            font-weight: 600;
        }

        .footer-link span {
            font-size: 14px;
            text-align: center;
        }

        .listing a {
            color: #697386;
            font-weight: 600;
            margin: 0 10px;
        }

        .animationRightLeft {
            animation: animationRightLeft 2s ease-in-out infinite;
        }

        .animationLeftRight {
            animation: animationLeftRight 2s ease-in-out infinite;
        }

        .tans3s {
            animation: animationLeftRight 3s ease-in-out infinite;
        }

        .tans4s {
            animation: animationLeftRight 4s ease-in-out infinite;
        }

        @keyframes animationLeftRight {
            0% {
                transform: translateX(0px);
            }

            50% {
                transform: translateX(1000px);
            }

            100% {
                transform: translateX(0px);
            }
        }

        @keyframes animationRightLeft {
            0% {
                transform: translateX(0px);
            }

            50% {
                transform: translateX(-1000px);
            }

            100% {
                transform: translateX(0px);
            }
        }
    </style>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="col-lg-12 mt-5">
                <div class="card p-1" style="border: 2px solid rgb(7, 95, 136); border-radius: 5px;">
                    <marquee behavior="" direction="">
                        <h4 class="mt-2"><b>নোটিশঃ-</b> {{ $notice->server_unofficial ?? null }}</h4>
                    </marquee>
                </div>
            </div>
            <div class="login-root">
                <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
                    <div class="loginbackground box-background--white padding-top--64">
                        <div class="loginbackground-gridContainer">
                            <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
                                <div class="box-root"
                                    style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
                                </div>
                            </div>
                            <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
                                <div class="box-root box-divider--light-all-2 animationLeftRight tans3s"
                                    style="flex-grow: 1;"></div>
                            </div>
                            <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
                                <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
                            </div>
                            <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
                                <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
                            </div>
                            <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
                                <div class="box-root box-background--gray100 animationLeftRight tans3s"
                                    style="flex-grow: 1;"></div>
                            </div>
                            <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
                                <div class="box-root box-background--cyan200 animationRightLeft tans4s"
                                    style="flex-grow: 1;"></div>
                            </div>
                            <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
                                <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
                            </div>
                            <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
                                <div class="box-root box-background--gray100 animationRightLeft tans4s"
                                    style="flex-grow: 1;"></div>
                            </div>
                            <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
                                <div class="box-root box-divider--light-all-2 animationRightLeft tans3s"
                                    style="flex-grow: 1;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="box-root padding-top--24 flex-flex flex-direction--column"
                        style="flex-grow: 1; z-index: 9;">
                        <div class="box-root padding-top--48 padding-bottom--15 flex-flex flex-justifyContent--center">
                            <h1 style="font-weight: 900;"><a href="#" rel="dofollow">SERVER COPY</a></h1>
                        </div>
                        <div class="formbg-outer">
                            <div class="formbg">
                                <div class="formbg-inner padding-horizontal--48">
                                    <span class="padding-bottom--15 title">Find NID Server Copy</span>
                                    <div class="">
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
                                    <form id="stripe-login" action="" onsubmit="return false;">
                                        <div class="field padding-bottom--15">
                                            <label for="nid">NID Number</label>
                                            <input type="text" name="" id="nid" placeholder="Input Your NID" required>
                                        </div>
                                        <div class="field padding-bottom--10">
                                            <div class="grid--50-50">
                                                <label for="password">Date of Birth</label>
                                            </div>
                                            <input type="text" name="" id="dob" placeholder="DOB [YYYY-MM-DD]" required>
                                        </div>

                                        <div class="field padding-bottom--10 text-center">
                                            <label for="radioOptions">Select server copy type:</label>
                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check" name="qr_code" id="option1" autocomplete="off" value="1" checked>
                                                <label class="btn btn-sm btn-outline-success" for="option1">With QR Code</label>
                                    
                                                <input type="radio" class="btn-check" name="qr_code" id="option2" value="0" autocomplete="off">
                                                <label class="btn btn-sm btn-outline-success" for="option2">Without QR Code</label>
                                            </div>
                                        </div>

                                        <div class="text-center pb-1">
                                            @if ($submitStatus->server_unofficial == 0)
                                                <h6 class="text-danger">ফর্ম সাবমিট বন্ধ আছে। পরবর্তীতে চেষ্টা করুন।</h6>
                                            @else
                                                @if (auth()->user()->premium == 2 && $now < auth()->user()->premium_end)
                                                    <h6 class="text-primary">{{ $message->premium_server_unofficial }}</h6>
                                                @else
                                                    <h6 class="text-primary">{{ $message->server_unofficial }}</h6>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="field padding-bottom--24">
                                            <input id="searchButton" type="submit" name="submit" value="Search"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                {{ $submitStatus->server_unofficial == 1 ? '' : 'disabled' }}>
                                        </div>
                                    </form>
                                    <script>
                                        document.getElementById('searchButton').addEventListener('click', function() {
                                            this.value = 'Searching....';
                                            this.disabled = true;
                                        });

                                        // Listen for modal close event and reset the button value
                                        document.getElementById('exampleModal').addEventListener('hidden.bs.modal', function() {
                                            document.getElementById('searchButton').value = 'Search';
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div> <!-- container -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Click Ok to proceed...</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if (auth()->user()->premium == 2 && $now < auth()->user()->premium_end)
                            <h4>{{ App\Models\Message::first()->premium_server_unofficial_price ?? '0' }} Tk will be
                                deducted from
                                your
                                account.</h4>
                        @else
                            <h4>{{ App\Models\Message::first()->server_unofficial_price ?? '0' }} Tk will be deducted from
                                your
                                account.</h4>
                        @endif
                        <form id="modal_form" action="{{ route('print.nid.server.copy') }}" method="post">
                            @csrf
                            <input type="hidden" name="nid" id="modal_nid">
                            <input type="hidden" name="dob" id="modal_dob">
                            <input type="hidden" name="qr_code" id="modal_qr_code">
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            @if (auth()->user()->premium == 2 && $now < auth()->user()->premium_end)
                                <input type="hidden" name="price"
                                    value="{{ App\Models\Message::first()->premium_server_unofficial_price ?? '0' }}">
                            @else
                                <input type="hidden" name="price"
                                    value="{{ App\Models\Message::first()->server_unofficial_price ?? '0' }}">
                            @endif

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="submit_modal_form">Ok</button>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- content -->
    @if (Session::has('error_message'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "{{ Session::get('error_message') }}",
                background: "#000",
                color: "#fff"
            });
        </script>
    @endif

    {{-- open modal --}}
    <script>
        $(document).ready(function() {
            $('input[type=submit]').click(function(e) {
                e.preventDefault();

                var nid = $('#nid').val();
                var dob = $('#dob').val();
                var qr_code = $('input[name=qr_code]:checked').val();

                $('#modal_nid').val(nid);
                $('#modal_dob').val(dob);
                $('#modal_qr_code').val(qr_code);

                var myForm = $('#modal_form');

                $('#submit_modal_form').click(function(e) {

                    myForm.submit();
                    $('#exampleModal').modal('hide');
                });

            })
        })
    </script>
@endsection
