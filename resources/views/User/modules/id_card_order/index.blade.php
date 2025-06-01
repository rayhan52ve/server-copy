@extends('User.layout.master')
@section('user')
    <div class="col-lg-12 mt-5">
        <div class="card p-1" style="border: 2px solid rgb(7, 95, 136); border-radius: 5px;">
            <marquee behavior="" direction="">
                <h4 class="mt-2"><b>নোটিশঃ-</b>{{ @$notice->id_card }}</h4>
            </marquee>
        </div>
    </div>

    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3>আইডি কার্ড অর্ডার</h3>
                    <button class="btn btn-primary" onclick="reloadPage()">পেজ রিলোড করুন</button>
                    <script>
                        function reloadPage() {
                            location.reload();
                        }
                    </script>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createModal">
                        <i class="fa-solid fa-plus"></i> অর্ডার আইডি কার্ড
                    </button>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="config-table" class="table display table-striped border no-wrap">
                        <thead>
                            <tr>
                                <th>সিরিয়াল</th>
                                <th>টাইপ</th>
                                <th>নাম</th>
                                <th>ফর্ম/আইডি/ভোটার নাম্বার</th>
                                <th>স্ট্যাটাস</th>
                                <th>অ্যাডমিনের মন্তব্য</th>
                                <th>ডাউনলোড</th>
                                <th>অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($idCardOrders as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->nid_voter_birth_form_no ?? null }}</td>
                                    <td>
                                        @if ($item->status == 0)
                                            <button class="btn btn-sm btn-warning">পেন্ডিং</button>
                                        @elseif($item->status == 1)
                                            <button class="btn btn-sm btn-primary">রিসিভড</button>
                                        @elseif($item->status == 2)
                                            <button class="btn btn-sm btn-success">পাওয়া গেছে</button>
                                        @elseif($item->status == 3)
                                            <button class="btn btn-sm btn-success">ম্যাচ ফাউন্ড</button>
                                        @elseif($item->status == 4)
                                            <button class="btn btn-sm btn-danger">ফাইল ডিলিট</button>
                                        @elseif($item->status == 5)
                                            <button class="btn btn-sm btn-danger">ব্যক্তি মৃত</button>
                                        @elseif($item->status == 6)
                                            <button class="btn btn-sm btn-danger">ফাইল লক</button>
                                        @elseif($item->status == 7)
                                            <button class="btn btn-sm btn-danger">পাওয়া যায়নি</button>
                                        @endif
                                    </td>
                                    <td>{{ @$item->admin_comment }}</td>
                                    <td>

                                        @if ($item->file)
                                            <a href="{{ route('idCard-file.download', $item->id) }}"
                                                class="btn btn-success btn-sm"><i class="fa-solid fa-download"></i></a>
                                        @elseif ($hideUnhide->show_id_card_file == 1 && $item->user_file == null)
                                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                                                data-target="#fileUpModal{{ $item->id }}">Upload File</button>
                                        @else
                                            <span class="text-danger">File Not Found</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($hideUnhide->show_id_card_file == 1 && $item->user_file == null)
                                            ফাইল আপলোড করুন.....
                                        @elseif ($item->status == 1 || $item->status == 2)
                                            <i class="fa-solid fa-check fa-xl" style="color: #7fdb4d;"></i>
                                        @elseif ($item->status == 0)
                                            অপেক্ষা করুন.....
                                        @elseif ($item->status != 0 || $item->status != 1 || $item->status != 2)
                                            <i class="fa-solid fa-xmark fa-xl" style="color: #6e0d0d;"></i>
                                        @endif
                                    </td>
                                </tr>
                                <!-- UserFile UploadModal -->
                                <div class="modal fade" id="fileUpModal{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="fileUpModallLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="createModallLabel">ইউজার ফাইল</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @if (session('message'))
                                                    <div class="alert alert-success" role="alert">
                                                        {{ session('message') }}
                                                    </div>
                                                @endif

                                                <form class="form-horizontal "
                                                    action="{{ route('user.id-card.update', $item->id) }}"
                                                    enctype="multipart/form-data" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="col-md-12">
                                                        <div
                                                            class="form-group align-items-center row justify-content-center mx-1">
                                                            <label class="col-form-label font-weight-bold text-center"><b>ফাইল
                                                                    আপলোড করুন:
                                                                    <span class="text-danger">*</span>
                                                                </b></label>
                                                            <p class="text-center text-dark font-weight-bold">
                                                                {{ $message->id_card_file_note ?? '' }}</p>
                                                            <input type="file" class="form-control" name="user_file"
                                                                value="{{ old('user_file') }}" required>
                                                        </div>

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-info">Submit</button>
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

        <!-- Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModallLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModallLabel">অর্ডার আইডি কার্ড</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <form class="form-horizontal mt-5" action="{{ route('user.id-card.store') }}"
                            enctype="multipart/form-data" method="POST">
                            @csrf

                            <div class="row">

                                <div class="form-group text-center">
                                    <label class="form-label">টাইপ<span class="text-danger">*</span></label>
                                    <select class="form-control" name="type" required>
                                        <option value="" selected disabled>Select</option>
                                        <option value="FORM_NO">FORM_NO</option>
                                        <option value="NID_NO">NID_NO</option>
                                        <option value="VOTER_NO">VOTER_NO</option>
                                        <option value="BIRTH_NO">BIRTH_NO</option>
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group text-center">
                                        <label>নাম<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}" placeholder="নাম লিখুন" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group text-center">
                                        <label>এনআইডি/ভোটার/ফর্ম নাম্বারঃ <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="nid_voter_birth_form_no"
                                            value="{{ old('nid_voter_birth_form_no') }}"
                                            placeholder="এনআইডি/ভোটার/ফর্ম নাম্বার" required>
                                    </div>
                                </div>

                                @if ($hideUnhide->show_id_card_file == 1)
                                    <div class="col-md-12">
                                        <div class="form-group align-items-center row justify-content-center mx-1">
                                            <label class="col-form-label font-weight-bold text-center"><b>ফাইল :
                                                    @if ($submitStatus->id_card_file == 1)
                                                        <span class="text-danger">*</span>
                                                    @endif
                                                </b></label>
                                            <p class="text-center text-dark font-weight-bold">
                                                {{ $message->id_card_file_note ?? '' }}</p>
                                            <input type="file" class="form-control" name="user_file"
                                                value="{{ old('user_file') }}"
                                                {{ $submitStatus->id_card_file == 1 ? 'required' : '' }}>
                                        </div>

                                    </div>
                                @endif


                                <div class="form-group text-center">
                                    <label>সাইন কপি সম্পর্কে কিছু বলার থাকলে বলুন</label>
                                    <textarea class="editor form-control" col="10" row="3" name="comment"
                                        placeholder="সাইন কপি সম্পর্কে কিছু বলার থাকলে বলুন"></textarea>
                                    @if ($submitStatus->id_card == 1)
                                        @if (auth()->user()->premium == 2 && $now < auth()->user()->premium_end)
                                            <h6 class="text-danger">{{ $message->premium_id_card }}</h6>
                                        @else
                                            <h6 class="text-danger">{{ $message->id_card }}</h6>
                                        @endif
                                    @else
                                        <h6 class="text-danger">ফর্ম সাবমিট বন্ধ আছে। পরবর্তীতে চেষ্টা করুন।</h6>
                                    @endif
                                </div>

                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                @if (auth()->user()->premium == 2 && $now < auth()->user()->premium_end)
                                    <input type="hidden" name="price"
                                        value="{{ $message->premium_id_card_price ?? null }}">
                                @else
                                    <input type="hidden" name="price" value="{{ $message->id_card_price ?? null }}">
                                @endif

                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info"
                                    {{ @$submitStatus->id_card == 1 ? '' : 'disabled' }}>Submit</button>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="">
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
