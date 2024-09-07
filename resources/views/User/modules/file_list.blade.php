@extends('User.layout.master')
@section('user')
    <style>
        .card-header {
            background-color: #007bff;
            color: #fff;
        }
    </style>
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h1 class="h3">File List</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-servercopy-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-servercopy" type="button" role="tab"
                                    aria-controls="pills-servercopy" aria-selected="true">সার্ভার কপি (Unofficial)</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-nid-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-nid" type="button" role="tab" aria-controls="pills-nid"
                                    aria-selected="false">এনআইডি</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-servercopy" role="tabpanel"
                                aria-labelledby="pills-servercopy-tab">
                                <div class="table-responsive">
                                    <table id="" class="table display table-striped border no-wrap">
                                        <h3 class="text-center">সার্ভার কপি লিস্ট (Unofficial)</h3>
                                        <thead>
                                            <tr>
                                                <th>সিরিয়াল</th>
                                                <th>ফাইল টাইপ</th>
                                                <th>নাম</th>
                                                <th>ভোটার নাম্বার</th>
                                                <th>জন্ম তারিখ</th>
                                                <th>ক্রিয়েটেড</th>
                                                <th>ডাউনলোড</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($serverCopyUnoficial as $key => $item)
                                                <tr>
                                                    <td>{{ ($serverCopyUnoficial->currentPage() - 1) * $serverCopyUnoficial->perPage() + $key + 1 }}
                                                    </td>
                                                    <td>{{ $item->qr_code == 1 ? 'Server Copy(Unofficial) With QR Code' : 'Server Copy(Unofficial) Without QR Code' }}
                                                    </td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->nationalId }}</td>
                                                    <td>{{ $item->dateOfBirth ?? null }}</td>
                                                    <td>{{ @$item->created_at->toDayDateTimeString() }}</td>
                                                    <td>
                                                        <a href="{{ route('print.saved_server_copy', $item->id) }}"
                                                            class="btn btn-success btn-sm printServercopy">
                                                            <i class="fa-solid fa-download"></i>
                                                            Print
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- Pagination for Server Copy -->
                                    <div class="d-flex justify-content-center">
                                        {{ $serverCopyUnoficial->appends(['nidPage' => $nids->currentPage()])->links() }}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-nid" role="tabpanel" aria-labelledby="pills-nid-tab">
                                <div class="table-responsive">
                                    <table id="" class="table display table-striped border no-wrap">
                                        <h3 class="text-center">এনআইডি লিস্ট</h3>
                                        <thead>
                                            <tr>
                                                <th>সিরিয়াল</th>
                                                <th>নাম</th>
                                                <th>ভোটার নাম্বার</th>
                                                <th>জন্ম তারিখ</th>
                                                <th>ক্রিয়েটেড</th>
                                                <th>ডাউনলোড</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($nids as $key => $item)
                                                <tr>
                                                    <td>{{ ($nids->currentPage() - 1) * $nids->perPage() + $key + 1 }}</td>
                                                    <td>{{ $item->name_bn }}</td>
                                                    <td>{{ $item->nid_number }}</td>
                                                    <td>{{ $item->birthday ?? null }}</td>
                                                    <td>{{ @$item->created_at->toDayDateTimeString() }}</td>
                                                    <td>
                                                        <a href="{{ route('print.savedNid', $item->id) }}"
                                                            class="btn btn-success btn-sm printNid">
                                                            <i class="fa-solid fa-download"></i>
                                                            Print
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- Pagination for NIDs -->
                                    <div class="d-flex justify-content-center">
                                        {{ $nids->appends(['serverPage' => $serverCopyUnoficial->currentPage()])->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
        $servercopyPriceAlert = $message->servercopy_remake;
        $nidPriceAlert = $message->nid_remake;
    @endphp
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // $('#nid-table').DataTable({
            //     responsive: false,
            // });

            $('.printServercopy').on('click', function(event) {
                event.preventDefault(); // Prevent the default form submission triggered by the button click
                let url = $(this).attr('href');

                Swal.fire({
                    title: 'সার্ভার কপি (Unofficial)',
                    text: "এই ফাইলটি প্রিন্ট করার জন্য আপনার অ্যাকাউন্ট থেকে {{ $servercopyPriceAlert }} টাকা কর্তন করা হবে।",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'হ্যাঁ, প্রিন্ট করুন!',
                    cancelButtonText: 'না, বাতিল করুন!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url; // Redirect to the link's URL
                    }
                });
            });

            $('.printNid').on('click', function(event) {
                event.preventDefault(); // Prevent the default form submission triggered by the button click
                let url = $(this).attr('href');

                Swal.fire({
                    title: 'এনআইডি',
                    text: "এই কার্ডটি প্রিন্ট করার জন্য আপনার অ্যাকাউন্ট থেকে {{ $nidPriceAlert }} টাকা কর্তন করা হবে।",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'হ্যাঁ, জমা দিন!',
                    cancelButtonText: 'না, বাতিল করুন!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url; // Redirect to the link's URL
                    }
                });
            });
        });
    </script>
@endsection
