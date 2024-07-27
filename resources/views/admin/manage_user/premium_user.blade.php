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
                <div class="table-responsive">
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
                                        @if ($item->premium == 1)
                                            <a href="{{ route('admin.userPremiumRequestAccept', $item->id) }}" type="button"
                                                class="btn btn-sm btn-outline-info m-2">Accept</a>
                                        @elseif ($item->premium == 2 && $now > $item->premium_end)
                                            <a href="{{ route('admin.userPremiumRequestAccept', $item->id) }}" onclick="return confirm('Are you sure?')"
                                                type="button" class="btn btn-sm btn-success m-2">Renew</a>
                                        @elseif ($item->premium == 2 && $now < $item->premium_end)
                                            <p class="text-success">Valid Till ({{ $item->premium_end->format('d-m-Y') }})</p>
                                        @endif

                                        {{-- <a href="{{ route('admin.userPremiumRequestAccept', $item->id) }}" type="button"
                                                class="btn btn-sm btn-outline-{{$item->premium == 2 ? 'success':'info'}} m-2">{{ $item->premium == 2 ? 'Renew':'Accept'}}</a> --}}


                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
