@extends('User.layout.master')
@section('user')
    @php
        $notice = \App\Models\Notice::first();
        $message = \App\Models\Message::first();
        $submitStatus = \App\Models\SubmitStatus::first();
    @endphp
    <div class="col-lg-12 mt-5">
        <div class="card p-1" style="border: 2px solid rgb(7, 95, 136); border-radius: 5px;">
            <marquee behavior="" direction="">
                <h4 class="mt-2"><b>নোটিশঃ-</b> {{ $notice->sign_to_server ?? null }}</h4>
            </marquee>
        </div>
    </div>

    <div class="row justify-content-center my-5">
        <div class="col-md-5">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h3 class="text-center mb-0">E-Tin Certificate</h3>
                </div>
                <div class="card-body p-4">

                    @if (session('message'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form id="submit_form" class="form-horizontal mt-4" action="{{ route('user.sign-to-server.store') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row justify-content-center text-center">

                            <div class="col-md-10">
                                <div class="form-group mb-4">
                                    <label class="font-weight-bold my-2"><b>TYPE</b></label><br>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" id="tin"
                                            value="tin" checked>
                                        <label class="form-check-label" for="tin">TIN</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" id="old_tin"
                                            value="old_tin">
                                        <label class="form-check-label" for="old_tin">Old TIN</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" id="nid"
                                            value="nid">
                                        <label class="form-check-label" for="nid">NID</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" id="passport"
                                            value="passport">
                                        <label class="form-check-label" for="passport">Passport</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" id="mobile"
                                            value="mobile">
                                        <label class="form-check-label" for="mobile">Mobile</label>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="font-weight-bold my-2"><b>TIN</b></label>
                                    <input type="number" class="form-control text-center @error('tin') is-invalid @enderror" name="tin" id=""
                                        placeholder="Enter TIN Number" required>
                                    @error('tin')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            @if (auth()->user()->premium == 2 && $now < auth()->user()->premium_end)
                                <input type="hidden" name="price" value="{{ $message->premium_sign_to_server_price }}">
                            @else
                                <input type="hidden" name="price" value="{{ $message->sign_to_server_price }}">
                            @endif
                        </div>

                        <div class="text-center pb-3">
                            @if ($submitStatus->sign_to_server == 1)
                                @if (auth()->user()->premium == 2 && $now < auth()->user()->premium_end)
                                    <h6 class="text-danger">{{ $message->premium_sign_to_server }}</h6>
                                @else
                                    <h6 class="text-danger">{{ $message->sign_to_server }}</h6>
                                @endif
                            @else
                                <h4 class="text-danger">ফর্ম সাবমিট বন্ধ আছে। পরবর্তীতে চেষ্টা করুন।</h4>
                            @endif
                        </div>

                        <div class="d-flex justify-content-center mx-5 my-2">
                            <button type="button" class="submit form-control btn btn-info btn-lg"
                                {{ $submitStatus->sign_to_server == 1 ? '' : 'disabled' }}>
                                Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @php
        $priceAlert =
            auth()->user()->premium == 2 && $now < auth()->user()->premium_end
                ? $message->premium_sign_to_server_price
                : $message->sign_to_server_price;
    @endphp
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.submit').on('click', function(event) {
                event.preventDefault(); // Prevent the default form submission triggered by the button click

                Swal.fire({
                    title: 'এনআইডি',
                    text: "এই কার্ডটি ডাউনলোড করার জন্য আপনার অ্যাকাউন্ট থেকে {{ $priceAlert }} টাকা কর্তন করা হবে।",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'হ্যাঁ, জমা দিন!',
                    cancelButtonText: 'না, বাতিল করুন!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#submit_form').submit(); // Only submit the form if the user confirms
                    }
                });
            });
        });
    </script>
@endsection
