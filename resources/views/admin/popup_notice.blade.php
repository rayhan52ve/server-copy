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
                    <div
                        class="card-header bg-{{ url()->current() == route('popup-notice.draft') ? 'success' : 'primary' }} text-white">
                        <div class="d-flex justify-content-between">
                            <div>
                                @if (url()->current() == route('popup-notice.draft'))
                                    <h1 class="h3">Draft Notices</h1>
                                @else
                                    <h1 class="h3">Popup Notice History</h1>
                                @endif
                            </div>
                            <div>
                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#popupNoticeModal"><i class="fa-regular fa-plus"></i>
                                    {{ url()->current() == route('popup-notice.draft') ? 'Create' : 'New' }}
                                    Notice</button>
                                @if (url()->current() != route('popup-notice.draft'))
                                    <button type="button" class="btn btn-danger" id="clearAllBtn"
                                        title="Clear All Notice">Clear
                                        All</button>
                                @endif
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
                                        <th>Countdown</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($popupNotices as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td style="width: 45%">{!! $item->message !!}</td>
                                            <td>{{ $item->hour }} H {{ $item->minute }} Min</td>
                                            {{-- <td>{{ \Carbon\Carbon::parse($item->end_time)->toDayDateTimeString() }}</td> --}}
                                            <td data-end-time="{{ \Carbon\Carbon::parse($item->end_time)->timestamp }}"
                                                class="countdown-timer">
                                                <span id="countdown-{{ $item->id }}">Loading...</span>
                                            </td>

                                            <td>{{ $item->created_at->toDayDateTimeString() }}</td>
                                            <td style="width: 20%" class="">
                                                <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#editPopupNoticeModal-{{ $item->id }}">Edit</button>
                                                <form id="delete-form-{{ $item->id }}"
                                                    action="{{ route('popup-notice.destroy', $item->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="button" class="btn btn-danger btn-sm" title="Delete"
                                                        onclick="confirmDelete({{ $item->id }})">
                                                        <i class="icon-trash"></i>
                                                    </button>
                                                </form>
                                                @if (url()->current() == route('popup-notice.draft'))
                                                    <button type="button" class="btn btn-sm btn-success"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#publishPopupNoticeModal-{{ $item->id }}">Publish
                                                        <i class="fa-solid fa-paper-plane"></i></button>
                                                @else
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('notice.publish', $item->id) }}">Publish <i
                                                            class="fa-solid fa-paper-plane"></i></a>
                                                @endif

                                            </td>
                                        </tr>
                                        <!--Edit popupMessageModal Modal -->
                                        <div class="modal fade" id="editPopupNoticeModal-{{ $item->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="popupNoticeLabel"
                                            aria-hidden="true">
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
                                                        <form
                                                            action="{{ route('popup-notice.updatePublished', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <b class="mb-1 d-block">Select Time <span
                                                                        class="text-success">(HH:mm)</span></b>
                                                                <div class="d-flex">
                                                                    <select name="hour" class="form-control me-2"
                                                                        required>
                                                                        <option value="">Hour</option>
                                                                        @for ($i = 0; $i < 72; $i++)
                                                                            <option value="{{ $i }}"
                                                                                {{ $i == $item->hour ? 'selected' : '' }}>
                                                                                {{ sprintf('%02d', $i) }}</option>
                                                                        @endfor
                                                                    </select>
                                                                    <select name="minute" class="form-control" required>
                                                                        <option value="">Minute</option>
                                                                        @for ($i = 0; $i < 60; $i++)
                                                                            <option value="{{ $i }}"
                                                                                {{ $i == $item->minute ? 'selected' : '' }}>
                                                                                {{ sprintf('%02d', $i) }}</option>
                                                                        @endfor
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <textarea name="message" class="form-control" placeholder="Write a notice" id="message-{{ $item->id }}" cols="30" rows="4"
                                                                    autocomplete="on">{{ $item->message }}</textarea>
                                                            </div>
                                                            <input type="hidden" name="status" value="10">
                                                            @if (url()->current() == route('popup-notice.draft'))
                                                                <input type="hidden" name="notice_type" value="1">
                                                            @else
                                                                <input type="hidden" name="notice_type" value="0">
                                                            @endif
                                                            <div class="text-center">
                                                                @if (url()->current() == route('popup-notice.draft'))
                                                                    <button type="submit"
                                                                        class="btn btn-outline-success w-100">Save</button>
                                                                @else
                                                                    <button type="submit"
                                                                        class="btn btn-outline-success w-100">Save &
                                                                        Publish</button>
                                                                @endif
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if (url()->current() == route('popup-notice.draft'))
                                            <!--Publish popupMessageModal Modal -->
                                            <div class="modal fade" id="publishPopupNoticeModal-{{ $item->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="publishPopupNoticeLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="publishPopupNoticeLabel">Popup
                                                                Notice Box
                                                            </h4><br>

                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('popup-notice.updatePublished', $item->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">
                                                                    <b class="mb-1 d-block">Select Time <span
                                                                            class="text-success">(HH:mm)</span></b>
                                                                    <div class="d-flex">
                                                                        <select name="hour" class="form-control me-2"
                                                                            required>
                                                                            <option value="">Hour</option>
                                                                            @for ($i = 0; $i < 72; $i++)
                                                                                <option value="{{ $i }}"
                                                                                    {{ $i == $item->hour ? 'selected' : '' }}>
                                                                                    {{ sprintf('%02d', $i) }}</option>
                                                                            @endfor
                                                                        </select>
                                                                        <select name="minute" class="form-control"
                                                                            required>
                                                                            <option value="">Minute</option>
                                                                            @for ($i = 0; $i < 60; $i++)
                                                                                <option value="{{ $i }}"
                                                                                    {{ $i == $item->minute ? 'selected' : '' }}>
                                                                                    {{ sprintf('%02d', $i) }}</option>
                                                                            @endfor
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <textarea name="message" class="form-control message" placeholder="Write a notice" id="msg-{{ $item->id }}" cols="30"
                                                                        rows="4" autocomplete="on">{{ $item->message }}</textarea>
                                                                </div>
                                                                <input type="hidden" name="status" value="10">
                                                                <div class="text-center">
                                                                    <button type="submit"
                                                                        class="btn btn-outline-success w-100">Save &
                                                                        Publish</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Create popupMessageModal Modal -->
    <div class="modal fade" id="popupNoticeModal" tabindex="-1" role="dialog" aria-labelledby="popupNoticeLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="popupNoticeLabel">Popup Notice Box
                    </h4><br>

                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                            <textarea name="message" class="form-control" placeholder="Write a notice" id="message" cols="30"
                                rows="4" autocomplete="on"></textarea>
                        </div>
                        <input type="hidden" name="status" value="10">
                        @if (url()->current() == route('popup-notice.draft'))
                            <input type="hidden" name="notice_type" value="1">
                        @else
                            <input type="hidden" name="notice_type" value="0">
                        @endif
                        <div class="text-center">
                            @if (url()->current() == route('popup-notice.draft'))
                                <button type="submit" class="btn btn-outline-success w-100">Save</button>
                            @else
                                <button type="submit" class="btn btn-outline-success w-100">Save &
                                    Publish</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        .ck.ck-editor__main>.ck-editor__editable {
            min-height: 250px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
    <script>
        // Function to initialize CKEditor for a given textarea ID
        function initializeCKEditor(textareaId) {
            ClassicEditor
                .create(document.querySelector(`#${textareaId}`))
                .catch(error => {
                    console.error(error);
                });
        }

        // Initialize CKEditor for the create form textarea
        document.addEventListener('DOMContentLoaded', function() {
            initializeCKEditor('message'); // For the create form

            // Initialize CKEditor for each edit form textarea
            @foreach ($popupNotices as $item)
                initializeCKEditor('message-{{ $item->id }}'); // For each edit form
            @endforeach
            // Initialize CKEditor for each publish form textarea
            @foreach ($popupNotices as $item)
                initializeCKEditor('msg-{{ $item->id }}'); // For each edit form
            @endforeach
        });
    </script>
{{-- 
    <script>
        ClassicEditor
            .create(document.querySelector('#msg'))
            .catch(error => {
                console.error(error);
            });
    </script> --}}
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

        function confirmDelete(itemId) {
            Swal.fire({
                title: "Are you sure?",
                text: "This action cannot be undone!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("delete-form-" + itemId).submit();
                }
            });
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function updateCountdown() {
                document.querySelectorAll(".countdown-timer").forEach(function(cell) {
                    let endTime = parseInt(cell.getAttribute("data-end-time")) *
                        1000; // Convert to milliseconds
                    let now = new Date().getTime();
                    let timeDiff = endTime - now;

                    if (timeDiff > 0) {
                        let days = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
                        let hours = Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        let minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
                        let seconds = Math.floor((timeDiff % (1000 * 60)) / 1000);

                        // Display Countdown
                        cell.querySelector("span").innerText =
                            (days > 0 ? days + "d " : "") +
                            hours + "h " + minutes + "m " + seconds + "s";
                    } else {
                        // If expired, show "Expired"
                        cell.querySelector("span").innerText = "Expired";
                    }
                });
            }

            // Update countdown every second
            setInterval(updateCountdown, 1000);
            updateCountdown(); // Initial call
        });
    </script>
@endsection
