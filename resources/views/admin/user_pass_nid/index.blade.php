@extends('admin.master')
@section('body')
    <style>
        .whatsapp-link {
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
        }

        .whatsapp-link:hover {
            text-decoration: underline;
            /* Add underline on hover */
        }
    </style>
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3>ইউজার পাসওয়ার্ড সেট <small><b>NID Card</b></small> </h3>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table" class="table display table-striped border no-wrap" style="font-size:12px">
                        <thead>
                            <tr>
                                <th>নং</th>
                                <th>ইমেইল</th>
                                <th>ছবি</th>
                                <th>এনআইডি</th>
                                <th>জন্ম তারিখ</th>
                                <th>বর্তমান ঠিকানা</th>
                                <th>স্থায়ী ঠিকানা</th>
                                <th>ফোন নং</th>
                                <th>হোয়াটস অ্যাপ</th>
                                <th>স্ট্যাটাস</th>
                                <th>ডাউনলোড</th>
                                <th>অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userPassNids as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->user->email ?? null }}</td>
                                    <td><a href="{{ route('user-pass-nid-image.download', $item->id) }}"> <img
                                                class="image img-thumbnail"
                                                src="{{ asset('/uploads/id_card/' . $item->image) }}" width="70px"
                                                style="min-width:70px" alt=""></a></td>
                                    <td>{{ $item->nid }}</td>
                                    <td>{{ $item->dob }}</td>
                                    <td>
                                        বিভাগ: {{ $item->present_division ?? null }}<br>
                                        জেলা: {{ $item->present_district ?? null }}<br>
                                        উপজেলা: {{ $item->present_upozila ?? null }}
                                    </td>
                                    <td>
                                        বিভাগ: {{ $item->permanent_division ?? null }}<br>
                                        জেলা: {{ $item->permanent_district ?? null }}<br>
                                        উপজেলা: {{ $item->permanent_upozila ?? null }}
                                    </td>
                                    <td>
                                        {{ $item->otp_phone }}
                                    </td>
                                    <td>
                                        <a href="https://wa.me/{{ $item->whatsapp }}" class="link text-info whatsapp-link"
                                            target="_blank">
                                            {{ $item->whatsapp }}
                                        </a>
                                    </td>
                                    <td>
                                        <form id="statusForm{{ $item->id }}"
                                            action="{{ route('admin.updateNameAddressId', $item->id) }}" method="post">
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
                                    <td>
                                        @if ($item->userId)
                                            <a href="#" class="btn btn-purple btn-sm"
                                                onclick="printUserCredentials(event, 'printDiv{{ $key }}')">Print</a>
                                            <div id="printDiv{{ $key }}" class="d-none">
                                                <b style="font-size: 50px">User Id: {{ $item->userId }}</b><br>
                                                <b style="font-size: 50px">Password: {{ $item->password }}</b>
                                            </div>
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
                                                    var nid = row.cells[3].innerText;
                                                    var dob = row.cells[4].innerText;
                                                    var phone = row.cells[7].innerText;
                                                    var present_Address = row.cells[5].innerText;
                                                    var permanent_Address = row.cells[6].innerText;
                                                    var textToCopy = "NId\n";

                                                    textToCopy += nid + "\n\n";
                                                    textToCopy += "DOB:-" + "\n" + dob + "\n\n";
                                                    textToCopy += "Phone:-" + "\n" + phone + "\n\n";
                                                    textToCopy += "Present Address:-" + "\n" + present_Address + "\n\n";
                                                    textToCopy += "Permanent Address:-" + "\n" + permanent_Address + "\n\n";

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
                                                            <!-- Form for refund -->
                                                            <form
                                                                action="{{ route('admin.refund.user-pass-nid', $item->id) }}"
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
                                                                            value="{{ \App\Models\Message::first()->premium_user_pass_nid_price ?? null }}">
                                                                    @else
                                                                        <input type="hidden" name="price"
                                                                            value="{{ \App\Models\Message::first()->user_pass_nid_price ?? null }}">
                                                                    @endif
                                                                    <button type="submit"
                                                                        class="btn btn-success">Refund</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-primary " data-toggle="modal"
                                                data-target="#uploadModal{{ $item->id }}">Update</button>

                                            <!--File Upload Modal -->
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
                                                            <form action="{{ route('admin.user-pass-nid-file.upload') }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="col-md-12">
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $item->id }}">
                                                                    <div class="form-group col-md-10">
                                                                        <label for="userId"
                                                                            class="form-label col-2">User Id:</label>
                                                                        <input type="text" class="form-control col-10"
                                                                            id="userId" name="userId" required>
                                                                    </div>
                                                                    <div class="form-group col-md-10">
                                                                        <label for="userId"
                                                                            class="form-label col-2">Password:</label>
                                                                        <input type="text" class="form-control col-10"
                                                                            id="password" name="password" required>
                                                                    </div>

                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-success btn-sm">Submit</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex gap-4 mt-1">
                                                <form action="{{ route('admin.user-pass-nid.destroy', $item->id) }}"
                                                    class="mt-1" method="POST" style="display: inline;">
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

    <style>
        .image {
            transition: transform 0.3s ease;
            /* Smooth zoom transition */
        }

        .image:hover {
            transform: scale(1.9);
            /* Enlarge image */
            z-index: 10;
            /* Ensure it stays on top */
        }
    </style>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function submitForm(itemId) {
            document.getElementById("statusForm" + itemId).submit();
        }
    </script>
    <script>
        function printUserCredentials(event, divId) {
            event.preventDefault();

            // Get the content to print
            const printContents = document.getElementById(divId).innerHTML;

            // Create a new window or iframe for printing
            let printWindow = window.open('', '_blank');
            if (!printWindow || printWindow.closed) {
                // Fallback for mobile browsers that block popups
                alert('Please allow popups to print. Then try again.');
                return;
            }

            // Write the content to the new window
            printWindow.document.write(`
    <html>
        <head>
            <title>Print Credentials</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <style>
                body { font-family: Arial, sans-serif; }
                b { font-size: 40px !important; line-height: 1.5; }
                @media print {
                    body { margin: 0; padding: 20px; }
                }
            </style>
        </head>
        <body>
            ${printContents}
            <script>
                // Automatically trigger print when content loads
                window.onload = function() {
                    setTimeout(function() {
                        window.print();
                        // Close after printing (with delay to allow print dialog to show)
                        setTimeout(function() {
                            window.close();
                        }, 1000);
                    }, 200);
                };
            <\/script>
        </body>
    </html>
`);

            printWindow.document.close();
        }
    </script>
@endsection
