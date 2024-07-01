@extends('admin.master')
@section('body')
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3>{{ $pagetitle }}</h3>
                    {{-- <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#createModal">Create
                        Biometric Type</button> --}}

                </div>
            </div>
            <div class="card-body">
                <table id="config-table" class="table display table-striped border no-wrap">
                    <thead>
                        <tr>
                            <th>সিরিয়াল</th>
                            <th>নাম</th>
                            <th>ইমেইল</th>
                            <th>ব্যালেন্স(টাকা)</th>
                            <th>অ্যাকশান</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->name ?? null }}</td>
                                <td>{{ $item->email ?? null }}</td>
                                <td>{{ $item->balance ?? 0 }}</td>
                                <td>
                                    <a href="{{ route('admin.userPremiumRequestAccept',$item->id) }}" type="button" class="btn btn-sm btn-info m-2">Accept</a>


                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
