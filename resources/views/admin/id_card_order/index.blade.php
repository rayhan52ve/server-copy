@extends('admin.master')
@section('body')
    <style>
        .image-container {
            position: relative;
            display: inline-block;
        }

        .overlay {
            position: absolute;
            top: -10px;
            /* Adjust this to position above the image */
            right: -10px;
            /* Adjust this to position to the right of the image */
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            gap: 5px;
            /* Space between buttons */
        }

        .image-container:hover .overlay {
            opacity: 1;
        }

        .overlay a {
            background-color: white;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .overlay a:hover {
            background-color: #f8f9fa;
        }
    </style>
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3>আইডি কার্ড অর্ডার</h3>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="" class="table display table-striped border no-wrap" style="font-size:12px">
                        <thead>
                            <tr>
                                <th>সিরিয়াল</th>
                                <th>ইমেইল</th>
                                <th>টাইপ</th>
                                <th>নাম</th>
                                <th>ফর্ম/আইডি/ভোটার নাম্বার</th>
                                <th>স্ট্যাটাস</th>
                                <th>মন্তব্য</th>
                                <th>ইউজার ফাইল</th>
                                <th>ডাউনলোড</th>
                                <th>অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($idCardOrders as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->user->email ?? null }}</td>
                                    <td>{{ $item->type ?? null }}</td>
                                    <td>{{ $item->name ?? null }}</td>
                                    <td>{{ $item->nid_voter_birth_form_no ?? null }}</td>
                                    <td>
                                        <form id="statusForm{{ $item->id }}"
                                            action="{{ route('admin.updateidCardStatus', $item->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-control"
                                                onchange="submitForm('{{ $item->id }}')">
                                                <option value="0" {{ $item->status == 0 ? 'selected' : '' }}>পেন্ডিং
                                                </option>
                                                <option value="1" {{ $item->status == 1 ? 'selected' : '' }}>রিসিভড
                                                </option>
                                                <option value="2" {{ $item->status == 2 ? 'selected' : '' }}>পাওয়া
                                                    গেছে
                                                </option>
                                                <option value="3" {{ $item->status == 3 ? 'selected' : '' }}>ম্যাচ
                                                    ফাউন্ড
                                                </option>
                                                <option value="4" {{ $item->status == 4 ? 'selected' : '' }}>ফাইল
                                                    ডিলিট
                                                </option>
                                                <option value="5" {{ $item->status == 5 ? 'selected' : '' }}>ব্যক্তি
                                                    মৃত
                                                </option>
                                                <option value="6" {{ $item->status == 6 ? 'selected' : '' }}>ফাইল লক
                                                </option>
                                                <option value="7" {{ $item->status == 7 ? 'selected' : '' }}>পাওয়া
                                                    যায়নি
                                                </option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>{{ $item->comment ?? null }}</td>
                                    <td>
                                        @if ($item->user_file)
                                            <div class="image-container">
                                                <img class="image img-thumbnail"
                                                    src="{{ asset('/uploads/id_card/' . $item->user_file) }}"
                                                    style="min-width:110px" alt="">
                                                <div class="overlay">
                                                    <a class="btn btn-sm btn-outline-success"
                                                        href="{{ route('idCard-user-file.download', $item->id) }}">
                                                        <i class="fa fa-download download-icon text-success"
                                                            title="Download" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-outline-danger"
                                                        href="{{ route('idCard-user-file.delete', $item->id) }}"
                                                        class="delete-confirm">
                                                        <i class="fa fa-trash delete-icon text-danger" title="Delete"
                                                            aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->file)
                                            <a href="{{ route('idCard-file.download', $item->id) }}"
                                                class="btn btn-success btn-sm"><i class="fa-solid fa-download"></i></a>
                                        @else
                                            <span class="text-danger">File Not Uploaded</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group-sm btn-group-vertical ">

                                            <button class="btn btn-info" onclick="copyTableFields(this)">Copy</button>

                                            <script>
                                                function copyTableFields(button) {
                                                    var row = button.closest('tr');
                                                    var type = row.cells[2].innerText.replace(/_/g, ' ');
                                                    var name = row.cells[3].innerText;
                                                    var formIdVoterNumber = row.cells[4].innerText;
                                                    // var textToCopy = "Id Card\n";

                                                    var textToCopy = "";

                                                    textToCopy += type + " - " + formIdVoterNumber + "\n";
                                                    textToCopy += "নাম" + " - " + name + "\n\n";

                                                    navigator.clipboard.writeText(textToCopy).then(function() {
                                                        alert("Row copied to clipboard!");
                                                    }, function(err) {
                                                        console.error('Could not copy text: ', err);
                                                    });
                                                }
                                            </script>

                                            <button type="button" class="btn btn-success " data-toggle="modal"
                                                data-target="#refundModal{{ $item->id }}">Refund</button>

                                            <!-- Refund Modal -->
                                            <div class="modal fade" id="refundModal{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="refundModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="uploadModalLabel">Do you want to
                                                                refund
                                                                this?</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Form for file upload -->
                                                            <form action="{{ route('admin.refund.idCard', $item->id) }}"
                                                                method="post" class="mb-1">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="col-md-10">
                                                                    <select name="status" class="form-control">
                                                                        <option value="3"
                                                                            {{ $item->status == 3 ? 'selected' : '' }}>
                                                                            ম্যাচ
                                                                            ফাউন্ড
                                                                        </option>
                                                                        <option value="4"
                                                                            {{ $item->status == 4 ? 'selected' : '' }}>ফাইল
                                                                            ডিলিট
                                                                        </option>
                                                                        <option value="5"
                                                                            {{ $item->status == 5 ? 'selected' : '' }}>
                                                                            ব্যক্তি
                                                                            মৃত
                                                                        </option>
                                                                        <option value="6"
                                                                            {{ $item->status == 6 ? 'selected' : '' }}>ফাইল
                                                                            লক
                                                                        </option>
                                                                        <option value="7"
                                                                            {{ $item->status == 7 ? 'selected' : '' }}>
                                                                            পাওয়া
                                                                            যায়নি
                                                                        </option>
                                                                    </select>
                                                                    <input type="hidden" name="user_id"
                                                                        value="{{ $item->user->id ?? null }}">
                                                                    @if ($item->user->premium == 2 && $now < $item->user->premium_end)
                                                                        <input type="hidden" name="price"
                                                                            value="{{ \App\Models\Message::first()->premium_id_card_price ?? null }}">
                                                                    @else
                                                                        <input type="hidden" name="price"
                                                                            value="{{ \App\Models\Message::first()->id_card_price ?? null }}">
                                                                    @endif

                                                                    <button type="submit"
                                                                        class="btn btn-success">Refund</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#uploadModal{{ $item->id }}">Upload File</button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="uploadModal{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="uploadModalLabel">Upload File</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Form for file upload -->
                                                            <form action="{{ route('admin.idCard-file.upload') }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" name="id"
                                                                    value="{{ $item->id }}">
                                                                <div class="form-group col-md-8">
                                                                    <label for="file" class="form-label">Choose
                                                                        File</label>
                                                                    <input type="file" class="form-control"
                                                                        id="file" name="file">
                                                                </div>
                                                                <div class="form-group col-md-8">
                                                                    <label for="file" class="form-label">Admin
                                                                        Comment</label>
                                                                    <textarea class="form-control" name="admin_comment" id="" rows="5"></textarea>
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-success btn-sm">Upload</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex gap-4 mt-1">
                                                <form action="{{ route('admin.id-card.destroy', $item->id) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                                        title="Delete"
                                                        onclick="return confirm('Are you sure you want to delete this?')">
                                                        <i class="icon-trash"></i>
                                                    </button>
                                                </form>
                                                <button type="button" class="btn btn-sm btn-outline-warning"
                                                    data-toggle="modal" style="display: inline;"
                                                    data-target="#popupMessageModal{{ $item->id }}"><i
                                                        class="fa-regular fa-comment"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <!--Make popupMessageModal Modal -->
                                <div class="modal fade" id="popupMessageModal{{ $item->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="uploadModalLabel">Popup Message Box </h4><br>

                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <small class="text-success">To: {{ $item->user?->name ?? null }}</small>
                                                <form action="{{ route('admin.popupMessage') }}" method="POST">
                                                    @csrf
                                                    <div class="form-group ">
                                                        {{-- <label for="file" class="form-label">Write a message</label> --}}
                                                        <textarea name="message" class="form-control" placeholder="Write a message" id="" cols="30"
                                                            rows="4" required></textarea>
                                                    </div>
                                                    <input type="hidden" name="user_id" value="{{ $item->user?->id }}">
                                                    <div class="text-center">
                                                        <button type="submit"
                                                            class="btn btn-outline-success w-100">Send</button>
                                                    </div>
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
        function submitForm(itemId) {
            document.getElementById("statusForm" + itemId).submit();
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-confirm').forEach(function(element) {
                element.addEventListener('click', function(e) {
                    e.preventDefault(); // prevent default link behavior
                    const url = this.getAttribute('href');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "This file will be permanently deleted.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = url;
                        }
                    });
                });
            });
        });
    </script>
@endsection
