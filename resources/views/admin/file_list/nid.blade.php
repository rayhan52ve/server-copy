@extends('admin.master')
@section('body')
    <style>
        .card-header {
            background-color: #007bff;
            color: #fff;
        }

        .video-item {
            transition: transform 0.3s ease;
        }

        /* .video-item:hover {
                                            transform: translateY(-10px);
                                        } */

        .video-item h2 {
            font-size: 1.25rem;
            margin-bottom: 10px;
        }

        .video-item iframe {
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .no-serverCopyUnoficial {
            text-align: center;
            color: #999;
            font-size: 1.25rem;
            margin-top: 20px;
        }
    </style>
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h1 class="h3">File List</h1>
                            </div>
                            <div>
                                <button type="button" class="btn btn-danger" id="clearAllBtn">Clear All</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="config-table" class="table display table-striped border no-wrap">
                                <h3 class="text-center">এনআইডি লিস্ট</h3>
                                <thead>
                                    <tr>
                                        <th>সিরিয়াল</th>
                                        <th>ইউজারনেম</th>
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
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->user?->name }}</td>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('clearAllBtn').addEventListener('click', function(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "All the files will be cleared!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, clear it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('admin.clearAllNid') }}";
                    }
                });
            });
        });
    </script>
@endsection
