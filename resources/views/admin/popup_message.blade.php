@extends('admin.master')
@section('body')
    <style>
        .card-header {
            background-color: #007bff;
            color: #fff;
        }
    </style>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h1 class="h3">Popup Message History</h1>
                            </div>
                            <div>
                                <button type="button" class="btn btn-danger" id="clearAllBtn" title="Clear All Message">Clear
                                    All</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="config-table" class="table display table-striped border">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Message</th>
                                        <th>Reply</th>
                                        <th>Message At</th>
                                        <th>Replied At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($popupMessages as $key=>$item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->user?->name }}</td>
                                            <td>{{ $item->message }}</td>
                                            <td>{{ $item->reply }}</td>
                                            <td>{{ $item->created_at->toDayDateTimeString() }}</td>
                                            <td>{{ $item->updated_at->toDayDateTimeString() }}</td>
                                            <td>{{ $item->created_at != $item->updated_at ? $item->updated_at->format('d-m-y h:i A') : 'Not Replied Yet' }}

                                            <td>
                                                <form action="{{ route('popup-message.destroy', $item->id) }}"
                                                    class="mt-1" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                        <i class="icon-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <p class="text-center">No Message Found</p>
                                    @endforelse

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
                    text: "All the messages will be cleared!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, clear it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('clearAllPopup') }}";
                    }
                });
            });
        });
    </script>
@endsection
