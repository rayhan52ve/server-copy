@extends('User.layout.master')
@section('user')
    <div class="col-lg-12 mt-5">
        <div class="card p-1" style="border: 2px solid rgb(7, 95, 136); border-radius: 5px;">
            <marquee behavior="" direction="">
                <h4 class="mt-2"><b>নোটিশঃ- {{ @$notice->number_to_location }}</b></h4>
            </marquee>
        </div>
    </div>

    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3>নাম্বার টু লোকেশন</h3>
                    <!-- Button trigger modal -->
                    <button class="btn btn-primary" onclick="reloadPage()">পেজ রিলোড করুন</button>
                    <script>
                        function reloadPage() {
                            location.reload();
                        }
                    </script>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createModal">
                        <i class="fa-solid fa-plus"></i> অর্ডার করুন
                    </button>
                    {{-- <a class="btn btn-success" href="{{ route('user.sign-copy.create') }}"><i class="fa-solid fa-plus"></i>
                        </a> --}}

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="config-table" class="table display table-striped border no-wrap" style="font-size: 13px">
                        <thead>
                            <tr>
                                <th>সিরিয়াল</th>
                                <th>নাম্বার </th>
                                <th>স্ট্যাটাস</th>
                                <th>ডাউনলোড</th>
                                <th class="text-center">অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($numberToLocation as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->number }}</td>
                                    <td>
                                        @if ($item->status == 0)
                                            <button class="btn btn-sm btn-warning">পেন্ডিং</button>
                                        @elseif($item->status == 1)
                                            <button class="btn btn-sm btn-primary">রিসিভড</button>
                                        @elseif($item->status == 2)
                                            <button class="btn btn-sm btn-success">পাওয়া গেছে</button>
                                        @elseif($item->status == 3)
                                            <button class="btn btn-sm btn-success">ম্যাচ ফাউন্ড</button>
                                        @elseif($item->status == 4)
                                            <button class="btn btn-sm btn-danger">ফাইল ডিলিট</button>
                                        @elseif($item->status == 5)
                                            <button class="btn btn-sm btn-danger">ব্যক্তি মৃত</button>
                                        @elseif($item->status == 6)
                                            <button class="btn btn-sm btn-danger">ফাইল লক</button>
                                        @elseif($item->status == 7)
                                            <button class="btn btn-sm btn-danger">পাওয়া যায়নি</button>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->admin_text)
                                            <a href="#" class="btn btn-purple btn-sm"
                                                onclick="printUserCredentials(event, 'printDiv{{ $key }}')">Print</a>
                                            <div id="printDiv{{ $key }}" class="d-none">
                                                <b style="font-size: 50px">{{ $item->admin_text }}</b><br>
                                            </div>
                                        @else
                                            <span class="text-danger">File Not Ready</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($item->status == 1 || $item->status == 2)
                                            <i class="fa-solid fa-check fa-xl" style="color: #7fdb4d;"></i>
                                        @elseif ($item->status == 0)
                                            অপেক্ষা করুন.....
                                        @elseif ($item->status != 0 || $item->status != 1 || $item->status != 2)
                                            <i class="fa-solid fa-xmark fa-xl" style="color: #6e0d0d;"></i>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModallLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModallLabel">নাম্বার টু লোকেশন
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <form class="form-horizontal m-5" action="{{ route('user.number-to-location.store') }}"
                            enctype="multipart/form-data" method="POST">
                            @csrf

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group text-center">
                                        <label class="col-form-label text-right">নাম্বারঃ
                                            <span class="text-danger">*</span>
                                        </label>
                                            <input type="number" class="form-control" name="number"
                                                value="{{ old('number') }}" placeholder="নম্বর" required>
                                    </div>

                                </div>
                                

                                <div class="form-group text-center mt-2">
                                    @if ($submitStatus->number_to_location == 1)
                                        @if (auth()->user()->premium == 2 && $now < auth()->user()->premium_end)
                                            <h6 class="text-danger">{{ $message->premium_number_to_location }}</h6>
                                        @else
                                            <h6 class="text-danger">{{ $message->number_to_location }}</h6>
                                        @endif
                                    @else
                                        <h6 class="text-danger">ফর্ম সাবমিট বন্ধ আছে। পরবর্তীতে চেষ্টা করুন।</h6>
                                    @endif
                                </div>

                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                @if (auth()->user()->premium == 2 && $now < auth()->user()->premium_end)
                                    <input type="hidden" name="price"
                                        value="{{ $message->premium_number_to_location_price ?? null }}">
                                @else
                                    <input type="hidden" name="price"
                                        value="{{ $message->number_to_location_price ?? null }}">
                                @endif

                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info"
                                    {{ $submitStatus->number_to_location == 1 ? '' : 'disabled' }}>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function printUserCredentials(event, divId) {
            event.preventDefault();

            // Get the content to print
            const printContents = document.getElementById(divId).innerHTML;

            // Create a new window or iframe for printing
            let printWindow = window.open('', '_blank');
            if (!printWindow || printWindow.closed) {
                // Fallback for mobile browsers that block popups
                alert('Please allow popups to print. Then try again.');
                return;
            }

            // Write the content to the new window
            printWindow.document.write(`
        <html>
            <head>
                <title>Print Text</title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <style>
                    body { font-family: Arial, sans-serif; }
                    b { font-size: 40px !important; line-height: 1.5; }
                    @media print {
                        body { margin: 0; padding: 20px; }
                    }
                </style>
            </head>
            <body>
                ${printContents}
                <script>
                    // Automatically trigger print when content loads
                    window.onload = function() {
                        setTimeout(function() {
                            window.print();
                            // Close after printing (with delay to allow print dialog to show)
                            setTimeout(function() {
                                window.close();
                            }, 1000);
                        }, 200);
                    };
                <\/script>
            </body>
        </html>
    `);

            printWindow.document.close();
        }
    </script>
@endsection
