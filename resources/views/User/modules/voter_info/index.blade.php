@extends(auth()->user()->is_admin != 0 ? 'admin.master' : 'User.layout.master')

@section(auth()->user()->is_admin != 0 ? 'body' : 'user')
    @php
        $notice = \App\Models\Notice::first();
        $message = \App\Models\Message::first();
        $submitStatus = \App\Models\SubmitStatus::first();
        $priceAlert =
            auth()->user()->premium == 2 && now() < auth()->user()->premium_end
                ? $message->voter_info_premium_price
                : $message->voter_info_price;
    @endphp
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

        h1 {
            letter-spacing: -1px;
        }

        a {
            color: #54d490;
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
            background-color: #54d490;
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
            background-color: #2cac66;
            box-shadow: rgba(7, 101, 57, 0) 0px 0px 0px 0px,
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
                <div class="card p-1" style="border: 2px solid #54d490; border-radius: 5px;">
                    <marquee behavior="" direction="">
                        <h4 class="mt-2"><b>নোটিশঃ-</b> {{ $notice->voter_info ?? null }}</h4>
                    </marquee>
                </div>
            </div>
            <div class="login-root">
                <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
                    <div class="loginbackground box-background--white padding-top--64">
                        <div class="">
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
                            {{-- <h1 style="font-weight: 900;"><a href="#" rel="dofollow">Voter Info</a></h1> --}}
                            <h1 style="font-weight: 900;"><a href="#" rel="dofollow">SERVER COPY</a></h1>
                        </div>
                        <div class="formbg-outer">
                            <div class="formbg">
                                <div class="formbg-inner padding-horizontal--48">
                                    <span class="padding-bottom--15 title">Find NID Voter Info</span>
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
                                    <form id="submit_form" action="{{ route('user.voter-info.store') }}" method="post">
                                        @csrf
                                        <div class="field padding-bottom--15">
                                            <label for="nid">NID Number</label>
                                            <input type="text" name="nid" id="nid" placeholder="Input Your NID"
                                                required>
                                        </div>

                                        <div class="field padding-bottom--10">
                                            <label for="dob">Date of Birth</label>
                                            <input type="text" name="dob" id="dob"
                                                placeholder="DOB [YYYY-MM-DD]" required>
                                        </div>

                                        <div class="field padding-bottom--10 text-center">
                                            <label for="radioOptions">Select server copy type:</label>
                                            <div class="btn-group" role="group"
                                                aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check" name="qr_code" id="option1"
                                                    value="1" checked>
                                                <label class="btn btn-sm btn-outline-success" for="option1">With QR
                                                    Code</label>

                                                <input type="radio" class="btn-check" name="qr_code" id="option2"
                                                    value="0">
                                                <label class="btn btn-sm btn-outline-success" for="option2">Without QR
                                                    Code</label>
                                            </div>
                                        </div>

                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <input type="hidden" name="price" value="{{ $priceAlert }}">

                                        <div class="text-center pb-1">
                                            @if ($submitStatus->voter_info == 0)
                                                <h6 class="text-danger">ফর্ম সাবমিট বন্ধ আছে। পরবর্তীতে চেষ্টা করুন।</h6>
                                            @else
                                                <h6 class="text-primary">
                                                    {{ auth()->user()->premium == 2 && now() < auth()->user()->premium_end ? $message->voter_info_premium : $message->voter_info }}
                                                </h6>
                                            @endif
                                        </div>

                                        <div class="field padding-bottom--24">
                                            <input id="searchButton" type="submit" value="Search"
                                                {{ $submitStatus->voter_info == 1 ? '' : 'disabled' }}>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div> <!-- container -->


    </div> <!-- content -->
    @if (Session::has('error_message'))
    <script>
        Swal.fire({
            icon: "error",
            title: "দুঃখিত...",
            text: "{{ Session::get('error_message') }}",
            background: "#000",
            color: "#fff",
            iconColor: "#fff"
        });
    </script>
    
    @endif
    <script>
        $(document).ready(function() {
            $('#searchButton').on('click', function(event) {
                event.preventDefault(); // Prevent default form submission

                Swal.fire({
                    title: 'সার্ভার কপি',
                    text: "এই ফাইলটি ডাউনলোড করার জন্য আপনার অ্যাকাউন্ট থেকে {{ $priceAlert }} টাকা কর্তন করা হবে।",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'হ্যাঁ, প্রিন্ট করুন!',
                    cancelButtonText: 'না, বাতিল করুন!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#searchButton').val('Searching...').prop('disabled', true);
                        $('#submit_form').off('submit')
                            .submit(); // Submit the form after confirmation
                    }
                });
            });
        });
    </script>

@endsection
