@extends('User.layout.master')
@section('user')
    @php
        $notice = \App\Models\Notice::first();
        $message = \App\Models\Message::first();
        $submitStatus = \App\Models\SubmitStatus::first();
        $weblinks = \App\Models\WebsiteLinks::first();
    @endphp
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            /* Center align content */
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container {
            text-align: left;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group select,
        /* Apply styles to select element */
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="number"],
        .form-group input[type="date"] {
            width: calc(100% - 20px);
            /* Adjust width for padding */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            /* Include padding in input width */
        }

        /* Existing CSS code */

        .form-group input[type="text"]#permanentAddr,
        .form-group input[type="text"]#permanentAddrEn {
            width: calc(100% - 20px);
            /* Adjust width for padding */
            padding: 30px;
            /* Increase padding to make it three times bigger */
            border: 1px solid #ccc;
            border-radius: 0px;
            box-sizing: border-box;
            /* Include padding in input width */
        }

        .form-group input[type="submit"] {
            width: 100%;
            padding: 10px 20px;
            background-color: #008CBA;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #005f6b;
        }
    </style>
    <div class="col-lg-12 mt-5">
        <div class="card p-1" style="border: 2px solid rgb(7, 95, 136); border-radius: 5px;">
            <marquee behavior="" direction="">
                <h4 class="mt-2"><b>নোটিশঃ-</b> {{ $notice->recharge ?? null }}</h4>
            </marquee>
        </div>
    </div>

    <div class="container mt-5 pt-5">

        <h1>Recharge Form</h1>
        <h5>বিকাশ {{ @$weblinks->bkash_type }}: {{ @$weblinks->bkash }}</h5>
        <h5>নগদ {{ @$weblinks->nagad_type }}: {{ @$weblinks->nagad }}</h5>

        <!-- Form -->
        <form id="submit_form" action="{{ route('user.recharge.store') }}" method="post" class="form-container">
            @csrf
            <div class="form-group">
                <div class="form-group">
                    <label for="sex">Paymet Method:</label>
                    <select id="method" name="method" required>
                        <option value="Bkash">Bkash</option>
                        <option value="Nagad">Nagad</option>
                    </select>
                </div>
                <label for="">Payment Number</label>
                <input type="text" name="payment_number" placeholder="Enter your Payment Number" required>
                <label for="">Transaction Id</label>
                <input type="text" name="transaction_id" placeholder="Enter your Payment Transaction Id" required>
                <label for="">Recharge Amount</label>
                <input type="number" name="amount" placeholder="Enter Recharge Amount" required>

                <!-- Add the rest of your fields here -->


                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <div class="text-center py-3">
                    @if ($submitStatus->recharge == 0)
                        <h6 class="text-danger">ফর্ম সাবমিট বন্ধ আছে। পরবর্তীতে চেষ্টা করুন।</h6>
                    @endif
                </div>
                <!-- Submit Button -->
                <div class="form-group mt-2">
                    <button class="submit btn btn-success form-control" type="button"
                        {{ $submitStatus->recharge == 1 ? '' : 'disabled' }}>Submit</button>
                </div>
        </form>
    </div>


    </div>

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
                                <th>ট্রানজেকশন আইডি</th>
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
                                    <td>{{ $item->transaction_id }}</td>
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
    {{-- <div style="margin:200px"></div> --}}

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
