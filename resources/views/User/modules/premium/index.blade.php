@extends('User.layout.master')
@section('user')
    @php
        $notice = \App\Models\Notice::first();
        $message = \App\Models\Message::first();
        $submitStatus = \App\Models\SubmitStatus::first();
        $weblinks = \App\Models\WebsiteLinks::first();
    @endphp

    @if (auth()->user()->premium == 0)
        <div class="col-lg-12 mt-5">
            <div class="card p-1" style="border: 2px solid rgb(7, 95, 136); border-radius: 5px;">
                <marquee behavior="" direction="">
                    <h4 class="mt-2"><b>নোটিশঃ-</b> {{ $premium->notice ?? null }}</h4>
                </marquee>
            </div>
        </div>
    @endif

    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h1>Premium Membership</h1>
                                @if (auth()->user()->premium == 0)
                                    <h4>Price: {{ $premium->price ?? null }} ৳</h4>
                                @elseif (auth()->user()->premium == 2)
                                    @if ($now < auth()->user()->premium_end)
                                        <h4 class="text-success">স্বাগতম!আপনার অ্যাকাউন্ট টি প্রিমিয়াম।</h4>
                                    @elseif ($now > auth()->user()->premium_end)
                                        <h4>Renew Price: {{ $premium->renew_price ?? null }} ৳</h4>
                                    @endif
                                @endif
                            </div>
                            <div>
                                @if (auth()->user()->premium == 2 && $now < auth()->user()->premium_end)
                                    <h3 class="mt-2"><i class="fa-solid fa-crown fa-2xl" style="color: #FFD43B;"></i></h3>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! $premium->details ?? null !!}
                        <!-- Form -->
                        <form id="submit_form" action="{{ route('user.userPremiumRequest') }}" method="post"
                            class="form-container">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="status" value="1">
                                <input type="hidden" name="price" value="{{ @$premium->price }}">
                                <div class="text-center pb-3">
                                    {{-- @if ($submitStatus->premium == 1) --}}
                                    @if (auth()->user()->premium != 2)
                                        <h6 class="text-primary">{{ @$premium->message }}</h6>
                                    @endif

                                    {{-- @else
                                        <h6 class="text-danger"> পরবর্তীতে চেষ্টা করুন।</h6>
                                    @endif --}}
                                </div>
                                @if (auth()->user()->premium == 1)
                                    <p class="text-success">Dear User you have requested for premium.Please wait for our
                                        admin to respond.</p>
                                @elseif (auth()->user()->premium == 2)
                                    @if ($now < auth()->user()->premium_end)
                                        <p class="text-success">Your premium plan is active from
                                            {{ auth()->user()->premium_start->format('d-m-Y') }}
                                            to {{ auth()->user()->premium_end->format('d-m-Y') }}.</p>
                                        <button class="btn btn-success" disabled>You are A Premium Member</button>
                                    @else
                                        <p class="text-danger">Your premium plan is expired on
                                            {{ auth()->user()->premium_end ? auth()->user()->premium_end->format('d-m-Y'):''}}. Please renew premium plans.
                                        </p>
                                        <button class="submit btn btn-success" type="button">Renew Premium</button>
                                    @endif
                                @elseif (auth()->user()->premium == 0)
                                    <div class="form-group mt-2">
                                        <p class="text-success">Buy Premium for ({{ $now->format('d.m.Y') }} -
                                            {{ $now->addDays($premium->subscription_days)->format('d.m.Y') }}).</p>
                                        <button class="submit btn btn-success" type="button"
                                            {{ $premium->submit == 0 ? 'disabled' : '' }}>{{ $premium->submit == 0 ? 'Premium Request Off' : 'Upgrade to Premium' }}</button>
                                    </div>
                                @endif
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.submit').on('click', function(event) {
                event.preventDefault(); // Prevent the default form submission triggered by the button click

                Swal.fire({
                    title: 'Premium Membership',
                    text: "Are you sure",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#submit_form').submit(); // Only submit the form if the user confirms
                    }
                });
            });
        });
    </script>
@endsection
