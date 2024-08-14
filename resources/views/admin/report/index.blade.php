@extends('admin.master')
@section('body')
    @php
        $pageTitle = 'আয়-ব্যয় হিসাব';
    @endphp
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-header">
                <div class="">
                    <!-- Header -->
                    <h2 class="text-center">{{ $pageTitle }}</h2>


                    <!-- Date Range Search Inputs -->
                    <div class="row justify-content-between">
                        <div class="col-md-6 col-lg-6">
                            <h3 class="mt-4">সর্বমোট মুনাফা: <span class="text-info"> {{ $reports->sum('profit') }} ৳</span>
                            </h3>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="d-flex justify-content-end align-items-end">
                                <div class="form-group mb-0">
                                    <label for="start_date">Start Date:</label>
                                    <input type="date" value="{{ $startDate ?? null }}" id="start_date"
                                        class="form-control">
                                </div>
                                <div class="form-group mb-0 mx-1">
                                    <label for="end_date">End Date:</label>
                                    <input type="date" value="{{ $endDate ?? null }}" id="end_date"
                                        class="form-control">
                                </div>
                                <div class="form-group mb-0">
                                    <button id="search-btn" class="btn btn-outline-primary btn-block"><i
                                            class="fa-solid fa-filter"></i>Filter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="card-body">
                <div class="table-responsive">
                    <table id="printer-table" class="table display table-striped border no-wrap">
                        <thead>
                            <tr>
                                <th>ক্রম নং</th>
                                <th>তারিখ</th>
                                <th>অটো-রিচার্জ</th>
                                <th>ম্যানুয়াল-রিচার্জ</th>
                                <th>আজকের আয়</th>
                                <th>আজকের ব্যয়</th>
                                <th>আজকের মোট মুনাফা</th>
                                <th>ইনপুট</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->created_at->format('d-m-Y') ?? null }}</td>
                                    <td>{{ $item->auto_recharge ?? null }}</td>
                                    <td>{{ $item->manual_recharge ?? null }}</td>
                                    <td class="text-success">{{ $item->income ?? null }}</td>
                                    <td class="text-danger">{{ $item->expense ?? null }}</td>
                                    <td class="text-info">{{ $item->profit ?? null }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-warning" data-toggle="modal"
                                            data-target="#editModal{{ $item->id }}"><i
                                                class="fa-solid fa-file-import"></i></button>

                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="uploadModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="uploadModalLabel">আয়-ব্যয়</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.report.update', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group col-md-10">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="" class="form-label">আয়</label>
                                                                <input type="number" class="form-control text-success"
                                                                    value="{{ $item->income }}" name="income"
                                                                    min="0">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="" class="form-label">ব্যয়</label>
                                                                <input type="number" class="form-control text-danger"
                                                                    value="{{ $item->expense }}" name="expense"
                                                                    placeholder="0" min="0" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-success btn-sm">Save</button>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(function() {
            $('#printer-table').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'copy',
                        text: 'Copy',
                        exportOptions: {
                            columns: ':visible:not(:last-child)'
                        }
                    },
                    {
                        extend: 'csv',
                        text: 'CSV',
                        exportOptions: {
                            columns: ':visible:not(:last-child)' // Exclude the last column (Input)
                        }
                    },
                    {
                        extend: 'excel',
                        text: 'Excel',
                        exportOptions: {
                            columns: ':visible:not(:last-child)' // Exclude the last column (Input)
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        exportOptions: {
                            columns: ':visible:not(:last-child)' // Exclude the last column (Input)
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Print',
                        // title: '',
                        messageTop: '<h1 class="text-center">{{ $pageTitle }}</h1>',
                        exportOptions: {
                            columns: ':visible:not(:last-child)' // Exclude the last column (Input)
                        }
                    }
                ]
            });
            // Other DataTables configurations remain unchanged
        });
    </script>

    <script>
        $(document).ready(function() {

            $('#search-btn').on('click', function() {
                var startDate = $('#start_date').val();
                var endDate = $('#end_date').val();

                window.location.href = "{{ route('admin.report.index') }}" + "?start_date=" + startDate +
                    "&end_date=" + endDate;

            });

        });
    </script>
@endsection
