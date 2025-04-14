@extends('User.layout.master')
@section('user')
    <div class="col-lg-12 mt-5">
        <div class="card p-1" style="border: 2px solid rgb(7, 95, 136); border-radius: 5px;">
            <marquee behavior="" direction="">
                <h4 class="mt-2"><b>নোটিশঃ- {{ @$notice->nid_lost_form }}</b></h4>
            </marquee>
        </div>
    </div>

    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3>এনআইডি সংশোধন <small>ফর্ম উত্তোলন</small></small></h3>
                    <!-- Button trigger modal -->
                    <button class="btn btn-primary" onclick="reloadPage()">পেজ রিলোড করুন</button>
                    <script>
                        function reloadPage() {
                            location.reload();
                        }
                    </script>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createModal">
                        <i class="fa-solid fa-plus"></i> অর্ডার করুন
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="config-table" class="table display table-striped border no-wrap" style="font-size: 13px">
                        <thead>
                            <tr>
                                <th>সিরিয়াল</th>
                                <th>এনআইডি</th>
                                <th>ইউজার আইডি</th>
                                <th>পাসওয়ার্ড</th>
                                <th>স্ট্যাটাস</th>
                                <th>ডাউনলোড</th>
                                <th class="text-center">অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nidLostForms as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->nid }}</td>
                                    <td>{{ $item->userId }}</td>
                                    <td>{{ $item->password }}</td>
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
                                    <td>
                                        @if ($item->file)
                                            <a href="{{ route('lost-nid-form-file.download', $item->id) }}"
                                                class="btn btn-success btn-sm">
                                                <i class="fa-solid fa-download"></i>
                                                Download
                                            </a>
                                        @else
                                            <span class="text-danger">File Not Ready</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($item->status == 1 || $item->status == 2)
                                            <i class="fa-solid fa-check fa-xl" style="color: #7fdb4d;"></i>
                                        @elseif ($item->status == 0)
                                            অপেক্ষা করুন.....
                                        @elseif ($item->status != 0 || $item->status != 1 || $item->status != 2)
                                            <i class="fa-solid fa-xmark fa-xl" style="color: #6e0d0d;"></i>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModallLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModallLabel">এনআইডি সংশোধন <small>ফর্ম উত্তোলন</small></small>
                        </h5>
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

                        <form class="form-horizontal m-5" action="{{ route('user.nid-lost-form.store') }}"
                             method="POST">
                            @csrf

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <label class="col-form-label col-sm-3 text-right">এনআইডি নং:<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" name="nid"
                                                value="{{ old('nid') }}" placeholder="এনআইডি নম্বর" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <label class="col-form-label col-sm-3 text-right">ইউজার আইডি:<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="userId"
                                                value="{{ old('userId') }}" placeholder="এনআইডি নম্বর" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <label class="col-form-label col-sm-3 text-right">পাসওয়ার্ড:<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="password"
                                                value="{{ old('password') }}" placeholder="এনআইডি নম্বর" required>
                                        </div>
                                    </div>

                                </div>
                                {{-- <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <label class="col-form-label col-sm-3 text-right">
                                            জন্ম তারিখ: <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-sm-9">
                                            <div class="input-group date" id="dobPicker">
                                                <input type="text" class="form-control" name="dob" id="dob"
                                                    value="{{ old('dob') }}" placeholder="[YYYY-MM-DD]" required>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <label class="col-form-label col-sm-3 text-right"> হোয়াটস অ্যাপ নাম্বার:<span
                                                class="text-danger">*</span></label>
                                        <small class="text-success">আপনার অ্যাক্টিভ Whatsapp নাম্বার দিন, যেখানে আপনার সাথে
                                            যোগাযোগ করা হবে।</small>
                                        <div class="col-sm-10">
                                            <input type="tel" pattern="[0-9]{10,15}" maxlength="15"
                                                class="form-control" name="whatsapp" value="{{ old('whatsapp') }}"
                                                placeholder="আপনার অ্যাক্টিভ Whatsapp নাম্বার লিখুন" required>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group text-center mt-2">
                                    @if ($submitStatus->nid_lost_form == 1)
                                        @if (auth()->user()->premium == 2 && $now < auth()->user()->premium_end)
                                            <h6 class="text-danger">{{ $message->premium_nid_lost_form }}</h6>
                                        @else
                                            <h6 class="text-danger">{{ $message->nid_lost_form }}</h6>
                                        @endif
                                    @else
                                        <h6 class="text-danger">ফর্ম সাবমিট বন্ধ আছে। পরবর্তীতে চেষ্টা করুন।</h6>
                                    @endif
                                </div>

                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                @if (auth()->user()->premium == 2 && $now < auth()->user()->premium_end)
                                    <input type="hidden" name="price"
                                        value="{{ $message->premium_nid_lost_form_price ?? null }}">
                                @else
                                    <input type="hidden" name="price"
                                        value="{{ $message->nid_lost_form_price ?? null }}">
                                @endif

                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info"
                                    {{ $submitStatus->nid_lost_form == 1 ? '' : 'disabled' }}>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
