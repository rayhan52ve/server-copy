@extends('admin.master')
@section('body')
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3>আইডি কার্ড (নাম-ঠিকানা) অর্ডার</h3>

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
                                <th>নাম</th>
                                <th>ঠিকানা</th>
                                <th>স্ট্যাটাস</th>
                                <th>ডাউনলোড</th>
                                <th>অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nameAddressIds as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->user->email ?? null }}</td>
                                    <td><a href="{{ route('name-address-id-image.download', $item->id) }}"> <img
                                                class="image img-thumbnail"
                                                src="{{ asset('/uploads/id_card/' . $item->image) }}" width="70px" style="min-width:70px" 
                                                alt=""></a></td>
                                    <td>
                                        নাম: {{ $item->name ?? null }} <br>
                                        পিতার নাম: {{ $item->fathers_name ?? null }}<br>
                                        মাতার নাম: {{ $item->mothers_name ?? null }}
                                    <td>
                                        গ্রাম: {{ $item->village ?? null }},
                                        ইউনিয়ন: {{ $item->union ?? null }},<br>
                                        উপজেলা: {{ $item->upozila ?? null }},
                                        জেলা: {{ $item->district ?? null }},<br>
                                        বিভাগ: {{ $item->division ?? null }}
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
                                        @if ($item->file)
                                            <a href="{{ route('name-address-id-file.download', $item->id) }}"
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
                                                    var info = row.cells[3].innerText;
                                                    var address = row.cells[4].innerText;
                                                    var textToCopy = "আইডি কার্ড (নাম-ঠিকানা)\n";

                                                    textToCopy +=  info + "\n";
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
                                                                action="{{ route('admin.refund.name-address-id', $item->id) }}"
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
                                                                            value="{{ \App\Models\Message::first()->premium_name_address_id_price ?? null }}">
                                                                    @else
                                                                        <input type="hidden" name="price"
                                                                            value="{{ \App\Models\Message::first()->name_address_id_price ?? null }}">
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
                                                            <form
                                                                action="{{ route('admin.name-address-id-file.upload') }}"
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


                                            <form action="{{ route('admin.name-address-id.destroy', $item->id) }}"
                                                class="mt-1" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-outline-danger btn-sm"
                                                    title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this?')">
                                                    <i class="icon-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
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
