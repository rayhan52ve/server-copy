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
                    <h3>জন্ম নিবন্ধন অর্ডার</h3>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table" class="table display table-striped border no-wrap" style="font-size:12px">
                        <thead>
                            <tr>
                                <th>নং</th>
                                <th>ইমেইল</th>
                                <th>নাম</th>
                                <th>অন্যান্য তথ্য</th>
                                <th>ঠিকানা</th>
                                <th>সংযুক্তি</th>
                                <th>হোয়াটস অ্যাপ</th>
                                <th style="min-width: 50px">স্ট্যাটাস</th>
                                <th>ডাউনলোড</th>
                                <th>অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nameAddressIds as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->user->email ?? null }}</td>
                                    <td>
                                        নাম (BN): {{ $item->name_bn ?? null }} <br>
                                        নাম (EN): {{ $item->name_en ?? null }} <br>
                                        পিতার নাম (BN): {{ $item->fathers_name_bn ?? null }}<br>
                                        পিতার নাম (EN): {{ $item->fathers_name_en ?? null }}<br>
                                        মাতার নাম (BN): {{ $item->mothers_name_bn ?? null }}<br>
                                        মাতার নাম (EN): {{ $item->mothers_name_en ?? null }}
                                    </td>
                                    <td>
                                        জন্ম তারিখ: {{ $item->dob ?? null }} <br>
                                        @if ($item->which_number_child)
                                            কত তম সন্তান: {{ $item->which_number_child ?? null }} <br>
                                        @endif
                                        @if ($item->fathers_birth_no)
                                            পিতার জন্ম নিবন্ধন নাম্বার: {{ $item->fathers_birth_no ?? null }}<br>
                                        @endif
                                        @if ($item->fathers_dob)
                                            পিতার জন্ম তারিখ: {{ $item->fathers_dob ?? null }}<br>
                                        @endif
                                        @if ($item->mothers_birth_no)
                                            মাতার জন্ম নিবন্ধন নাম্বার: {{ $item->mothers_birth_no ?? null }}<br>
                                        @endif
                                        @if ($item->mothers_dob)
                                            মাতার জন্ম তারিখ: {{ $item->mothers_dob ?? null }}<br>
                                        @endif
                                        @if ($item->fathers_nid)
                                            পিতার এনআইডি নাম্বার: {{ $item->fathers_nid ?? null }}<br>
                                        @endif
                                        @if ($item->mothers_nid)
                                            মাতার এনআইডি নাম্বার: {{ $item->mothers_nid ?? null }}<br>
                                        @endif
                                    </td>
                                    <td>
                                        বাসা/হোল্ডিং নং: {{ $item->house_holding ?? null }},
                                        ডাকঘর: {{ $item->post_office ?? null }},<br>
                                        ওয়ার্ড নং: {{ $item->word_no ?? null }},
                                        গ্রাম: {{ $item->village ?? null }},<br>
                                        ইউনিয়ন: {{ $item->union ?? null }},
                                        উপজেলা: {{ $item->upozila ?? null }},<br>
                                        জেলা: {{ $item->district ?? null }},
                                        বিভাগ: {{ $item->division ?? null }}
                                    </td>
                                    <td>
                                        @if ($item->nid_file)
                                            <a href="{{ route('nidDownload.download', $item->id) }}"
                                                class="btn btn-success btn-sm mt-1"><i class="fa-solid fa-download"></i>
                                                NID</a><br>
                                        @endif
                                        @if ($item->school_cirtificate)
                                            <a href="{{ route('schoolCirtificateDownload.download', $item->id) }}"
                                                class="btn btn-success btn-sm mt-1"><i class="fa-solid fa-download"></i>
                                                School Cirtificate</a><br>
                                        @endif
                                        @if ($item->tika_card)
                                            <a href="{{ route('ticaCardDownload.download', $item->id) }}"
                                                class="btn btn-success btn-sm mt-1"><i class="fa-solid fa-download"></i>
                                                Tika Card</a><br>
                                        @endif
                                        @if ($item->mothers_nid_file)
                                            <a href="{{ route('mothersNidDownload.download', $item->id) }}"
                                                class="btn btn-success btn-sm mt-1"><i class="fa-solid fa-download"></i>
                                                Mothers NID</a><br>
                                        @endif
                                        @if ($item->fathers_nid_file)
                                            <a href="{{ route('fathersNidDownload.download', $item->id) }}"
                                                class="btn btn-success btn-sm mt-1"><i class="fa-solid fa-download"></i>
                                                Fathers NID</a><br>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="https://wa.me/{{ $item->whatsapp }}" class="link text-info whatsapp-link"
                                            target="_blank">
                                            {{ $item->whatsapp }}
                                        </a>
                                    </td>
                                    <td style="width: 150px !important;">
                                        <form id="statusForm{{ $item->id }}"
                                            action="{{ route('admin.updateBirthOrder', $item->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-control"
                                                onchange="submitForm('{{ $item->id }}')">
                                                <option value="0" {{ $item->status == 0 ? 'selected' : '' }}>পেন্ডিং
                                                </option>
                                                <option value="1" {{ $item->status == 1 ? 'selected' : '' }}>রিসিভড
                                                </option>
                                                <option value="2" {{ $item->status == 2 ? 'selected' : '' }}>সম্পন্ন
                                                    হয়েছে </option>
                                                <option value="3" {{ $item->status == 3 ? 'selected' : '' }}>পসিবল
                                                    ডুপ্লিকেট
                                                </option>
                                                <option value="5" {{ $item->status == 4 ? 'selected' : '' }}>ডুপ্লিকেট
                                                </option>
                                                <option value="7" {{ $item->status == 5 ? 'selected' : '' }}>সম্পন্ন
                                                    হয়নি
                                                </option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        @if ($item->file)
                                            <a href="{{ route('birth-order-file.download', $item->id) }}"
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
                                                    var info = row.cells[2].innerText;
                                                    var otherInfo = row.cells[3].innerText;
                                                    var address = row.cells[4].innerText;
                                                    var textToCopy = "জন্ম নিবন্ধন\n";

                                                    textToCopy += info + "\n";
                                                    textToCopy += otherInfo + "\n";
                                                    textToCopy += "ঠিকানা:-" + "\n" + address + "\n\n";

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
                                                                action="{{ route('admin.refund.birth-order', $item->id) }}"
                                                                method="post" class="mb-1">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="col-md-10">
                                                                    <select name="status" class="form-control">
                                                                        <option value="3"
                                                                            {{ $item->status == 3 ? 'selected' : '' }}>
                                                                            পসিবল ডুপ্লিকেট
                                                                        </option>
                                                                        <option value="4"
                                                                            {{ $item->status == 4 ? 'selected' : '' }}>
                                                                            ডুপ্লিকেট
                                                                        </option>
                                                                        <option value="5"
                                                                            {{ $item->status == 5 ? 'selected' : '' }}>
                                                                            সম্পন্ন হয়নি
                                                                        </option>
                                                                    </select>
                                                                    <input type="hidden" name="user_id"
                                                                        value="{{ $item->user->id ?? null }}">
                                                                    @if ($item->user->premium == 2 && $now < $item->user->premium_end)
                                                                        <input type="hidden" name="price"
                                                                            value="{{ \App\Models\Message::first()->birth_order_premium_price ?? null }}">
                                                                    @else
                                                                        <input type="hidden" name="price"
                                                                            value="{{ \App\Models\Message::first()->birth_order_price ?? null }}">
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
                                                data-target="#uploadModal{{ $item->id }}">Upload File</button>

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
                                                            <form action="{{ route('admin.birth-order-file.upload') }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="col-md-12">
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $item->id }}">
                                                                    <div class="form-group col-md-10">
                                                                        <label for="file" class="form-label">Choose
                                                                            File</label>
                                                                        <input type="file" class="form-control"
                                                                            id="file" name="file">
                                                                    </div>

                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-success btn-sm">Upload</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex gap-4 mt-1">
                                                <form action="{{ route('admin.birth-order.destroy', $item->id) }}"
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
@endsection
