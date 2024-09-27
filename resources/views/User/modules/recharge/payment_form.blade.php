@extends('User.layout.master')
@section('user')
    @php
        $notice = \App\Models\Notice::first();
        $message = \App\Models\Message::first();
        $submitStatus = \App\Models\SubmitStatus::first();
        $weblinks = \App\Models\WebsiteLinks::first();
    @endphp

    <div class="col-lg-12 mt-5">
        <div class="card p-1" style="border: 2px solid rgb(7, 95, 136); border-radius: 5px;">
            <marquee behavior="" direction="">
                @if (auth()->user()->status == 1 || $submitStatus->active_status == 0)
                    <h4 class="mt-2"><b>নোটিশঃ-</b> {{ $notice->recharge_bkash ?? null }}</h4>
                @else
                    <h4 class="mt-2"><b>নোটিশঃ-</b> {{ $notice->active_status ?? null }}</h4>
                @endif
            </marquee>
        </div>
    </div>

    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <di class="card-header">
                        <img src="{{ asset('backend/assets/bkash_payment_logo.png') }}" width="300px" alt="">
                        {{-- <h1>bKash Payment</h1> --}}
                    </di>
                    <div class="card-body">
                        <!-- Form -->
                        <form action="{{ route('bkash.create-payment') }}" method="post" class="form-container">
                            @csrf
                            <div class="form-group">
                                @if (auth()->user()->status == 1 || $submitStatus->active_status == 0)
                                    <label for="amount">Recharge Amount</label>
                                    <input type="number" min="{{ $message->recharge_bkash_price ?? 0 }}" name="amount"
                                        class="form-control" placeholder="Enter Recharge Amount" required>
                                @else
                                    <h4 class="text-center m-md-5">{{ $message->active_status ?? null }}</h4>
                                    <input type="hidden" value="{{ $message->active_status_price ?? 0 }}" min="{{ $message->active_status_price ?? 0 }}" name="amount"
                                        class="form-control" required>
                                @endif
                            </div>
                            <div class="text-center">
                                @if (auth()->user()->status == 1 || $submitStatus->active_status == 0)
                                    <h6 class="text-danger">{{ $message->recharge_bkash ?? null }}</h6>
                                @endif
                            </div>
                            <!-- Submit Button -->
                            <div class="form-group mt-2">
                                @if (auth()->user()->status == 1 || $submitStatus->active_status == 0)
                                    <button class="btn btn-lg btn-outline-danger form-control" type="submit">Auto Recharge
                                        With
                                        Bkash</button>
                                @else
                                    <button class="btn btn-lg btn-outline-danger form-control" type="submit">Activate Account</button>
                                @endif

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @if (auth()->user()->status == 1  || $submitStatus->active_status == 0)
        <div class="container-fluid">
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3>Payment History</h3>
                            <button class="btn btn-primary" onclick="reloadPage()">পেজ রিলোড করুন</button>
                            <script>
                                function reloadPage() {
                                    location.reload();
                                }
                            </script>


                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="config-table" class="table display table-striped border no-wrap">
                                <thead>
                                    <tr>
                                        <th>সিরিয়াল</th>
                                        <th>পেমেন্ট মেথড</th>
                                        <th>পেমেন্ট নাম্বার</th>
                                        <th>পরিমাণ</th>
                                        <th>তারিখ</th>
                                        <th>স্ট্যাটাস</th>
                                        <th>অ্যাকশান</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recharges as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->method }}</td>
                                            <td>{{ $item->payment_number }}</td>
                                            <td>{{ $item->amount }} ৳</td>
                                            <td>{{ @$item->created_at->format('d-m-Y, h:i A') }}</td>
                                            <td>
                                                @if ($item->status == 0)
                                                    <button class="btn btn-sm btn-warning">পেন্ডিং</button>
                                                @elseif($item->status == 1)
                                                    <button class="btn btn-sm btn-primary">একসেপ্টেড</button>
                                                @else
                                                    <button class="btn btn-sm btn-danger">ক্যানসেলড</button>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <i class="fa-solid fa-check fa-xl" style="color: #7fdb4d;"></i>
                                                @elseif ($item->status == 0)
                                                    Please wait....
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.submit').on('click', function(event) {
                event.preventDefault(); // Prevent the default form submission triggered by the button click

                Swal.fire({
                    title: 'Recharge Request',
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
