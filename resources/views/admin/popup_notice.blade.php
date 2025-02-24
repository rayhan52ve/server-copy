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
                                <h1 class="h3">Popup Notice History</h1>
                            </div>
                            <div>
                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#popupNoticeModal"><i
                                                        class="fa-regular fa-plus"></i> New Notice</button>
                                <button type="button" class="btn btn-danger" id="clearAllBtn" title="Clear All Notice">Clear
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
                                        <th>Notice</th>
                                        <th>Time</th>
                                        <th>Ending Time</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($popupNotices as $key=>$item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->message }}</td>
                                            <td>{{ $item->hour }} H {{ $item->minute }} Min</td>
                                            <td>{{ \Carbon\Carbon::parse($item->end_time)->toDayDateTimeString() }}</td>
                                            <td>{{ $item->created_at->toDayDateTimeString() }}</td>
                                            <td>
                                                <form action="{{ route('popup-notice.destroy', $item->id) }}"
                                                    class="mt-1" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                        <i class="icon-trash"></i>
                                                    </button>
                                                </form>

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
     <!--Make popupMessageModal Modal -->
     <div class="modal fade" id="popupNoticeModal" tabindex="-1"
        role="dialog" aria-labelledby="popupNoticeLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="popupNoticeLabel">Popup Notice Box
                    </h4><br>

                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <small class="text-success">To:
                        {{ $item->user?->name ?? null }}</small> --}}
                    <form action="{{ route('popup-notice.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <b class="mb-1 d-block">Select Time <span class="text-success">(HH:mm)</span></b>
                            <div class="d-flex">
                                <select name="hour" class="form-control me-2" required>
                                    <option value="">Hour</option>
                                    @for ($i = 0; $i < 72; $i++)
                                        <option value="{{ $i }}">{{ sprintf('%02d', $i) }}</option>
                                    @endfor
                                </select>
                                <select name="minute" class="form-control" required>
                                    <option value="">Minute</option>
                                    @for ($i = 0; $i < 60; $i++)
                                        <option value="{{ $i }}">{{ sprintf('%02d', $i) }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="form-group ">
                            <textarea name="message" class="form-control" placeholder="Write a notice" id="" cols="30" rows="4"
                                required autocomplete="on"></textarea>
                        </div>
                        <input type="hidden" name="status"
                            value="10">
                        <div class="text-center">
                            <button type="submit"
                                class="btn btn-outline-success w-100">Send</button>
                        </div>
                    </form>
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
                        window.location.href = "{{ route('clearAllPopupNotice') }}";
                    }
                });
            });
        });
    </script>
@endsection
