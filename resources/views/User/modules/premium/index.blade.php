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
                                    <h4 class="text-success">স্বাগতম!আপনার অ্যাকাউন্ট টি প্রিমিয়াম।</h4>
                                @endif
                            </div>
                            <div>
                                @if (auth()->user()->premium == 2)
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
                                    <button class="btn btn-success" disabled>You are A Premium Menmer</button>
                                @else
                                    <div class="form-group mt-2">
                                        <button class="submit btn btn-success" type="button" {{ $premium->submit == 0 ? 'disabled':'' }}>Upgrade to Premium</button>
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
