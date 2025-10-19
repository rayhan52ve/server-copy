@extends('admin.master')
@section('body')
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3>Saved Trx List</h3>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="config-table" class="table display table-striped border no-wrap">
                        <thead>
                            <tr>
                                <th>সিরিয়াল</th>
                                <th>ট্রানজেকশন আইডি</th>
                                <th>পরিমাণ</th>
                                <th>তারিখ</th>
                                <th>স্ট্যাটাস</th>
                                <th>অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preTransactions as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->trx_id }}</td>
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
                                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                            data-bs-target="#editTrxModal-{{ $item->id }}">Edit</button>
                                        <form id="delete-form-{{ $item->id }}"
                                            action="{{ route('admin.pre-transaction.delete', $item->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')

                                            <button type="button" class="btn btn-danger btn-sm" title="Delete"
                                                onclick="confirmDelete({{ $item->id }})">
                                                <i class="icon-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <!--Edit popupMessageModal Modal -->
                                <div class="modal fade" id="editTrxModal-{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="editTrxModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header py-2">
                                                <h5 class="modal-title" id="editTrxModalLabel">Edit Transaction</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="editTrxForm"
                                                    action="{{ route('admin.pre-transaction.update', $item->id) }}"
                                                    method="post">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="mb-2">
                                                        <label class="form-label">Amount</label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="amount" value="{{ $item->amount }}"
                                                            placeholder="Enter amount">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label">Transaction ID</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="trx_id" value="{{ $item->trx_id }}"
                                                            placeholder="Enter TRX ID">
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-primary btn-sm w-100">Save</button>
                                                </form>
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
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This transaction will be permanently deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }

        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
                timer: 2000,
                showConfirmButton: false
            });
        @endif
    </script>
@endsection
