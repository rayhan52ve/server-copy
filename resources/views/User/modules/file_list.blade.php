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
                        <div class="table-responsive">
                            <table id="config-table" class="table display table-striped border no-wrap">
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
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{$item->qr_code == 1 ? 'Server Copy(Unofficial) With QR Code':'Server Copy(Unofficial) Without QR Code'}}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->nationalId }}</td>
                                            <td>{{ $item->dateOfBirth ?? null }}</td>
                                            <td>{{ @$item->created_at->toDayDateTimeString() }}</td>
                                            <td>
                                                <a href="{{ route('print.saved_server_copy', $item->id) }}" id="printButton{{$item->id}}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="fa-solid fa-download"></i>
                                                    Print
                                                </a>

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
    </div>
@endsection
