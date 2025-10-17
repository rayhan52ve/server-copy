@extends('admin.master')
@section('body')
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3>Payment History</h3>
                    <button type="button" class="btn btn-danger" id="clearAllBtn">Clear All</button>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="config-table" class="table display table-striped border no-wrap">
                        <thead>
                            <tr>
                                <th>সিরিয়াল</th>
                                <th>ইউজার</th>
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
                                    <td>{{ @$item->user->email }}</td>
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
                                            <form action="{{ route('admin.rechargeStatus', $item->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('PUT')

                                                <!-- Accept Button -->
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#orderModal{{ $item->id }}">
                                                    Accept
                                                </button>

                                                <!-- Decline Button -->

                                                <button type="submit" name="status" value="2" class="btn btn-danger"
                                                    title="Decline">Decline</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="orderModal{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="orderModalLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title">Recharge</h5>
                                                </div>
                                                <div class="card-body">
                                                    <form class="form" method="post"
                                                        action="{{ route('admin.rechargeStatus', $item->id) }}">
                                                        @csrf
                                                        @method('PUT')

                                                        <!-- Employee Selection -->
                                                        <div class="form-group">
                                                            <label for="">Recharge Amount</label>
                                                            <input type="number" name="amount"
                                                                value="{{ $item->amount }}" class="form-control">
                                                        </div>

                                                        <input type="hidden" name="status" value="1">
                                                        <input type="hidden" name="user_id" value="{{ $item->user_id }}">

                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('clearAllBtn').addEventListener('click', function(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "All the recharge data will be deleted permanently!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, clear it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('admin.clearAllRecharge') }}";
                    }
                });
            });
        });
    </script>
@endsection
