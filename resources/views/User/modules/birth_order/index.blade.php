@extends('User.layout.master')
@section('user')
    <div class="col-lg-12 mt-5">
        <div class="card p-1" style="border: 2px solid rgb(7, 95, 136); border-radius: 5px;">
            <marquee behavior="" direction="">
                <h4 class="mt-2"><b>নোটিশঃ- {{ @$notice->birth_order }}</b></h4>
            </marquee>
        </div>
    </div>

    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3>জন্ম নিবন্ধন অর্ডার</h3>
                    <!-- Button trigger modal -->
                    <button class="btn btn-primary" onclick="reloadPage()">পেজ রিলোড করুন</button>
                    <script>
                        function reloadPage() {
                            location.reload();
                        }
                    </script>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createModal">
                        <i class="fa-solid fa-plus"></i> জন্ম নিবন্ধন অর্ডার
                    </button>
                    {{-- <a class="btn btn-success" href="{{ route('user.sign-copy.create') }}"><i class="fa-solid fa-plus"></i>
                        </a> --}}

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="config-table" class="table display table-striped border no-wrap" style="font-size: 13px">
                        <thead>
                            <tr>
                                <th>সিরিয়াল</th>
                                <th>নাম</th>
                                <th>ঠিকানা</th>
                                <th>স্ট্যাটাস</th>
                                <th>ডাউনলোড</th>
                                <th class="text-center">অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brthOrder as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    {{-- <td><img class="img-thumbnail" src="{{ asset('/uploads/id_card/' . $item->image) }}"
                                            width="70px" style="height:70px" alt=""></td> --}}
                                    <td>{{ $item->name_en }}</td>
                                    <td>
                                        হোল্ডিং নং: {{ $item->house_holding ?? null }},
                                        পোস্ট-অফিস: {{ $item->post_office ?? null }},
                                        ওয়ার্ড নং: {{ $item->word_no ?? null }},
                                        গ্রাম: {{ $item->village ?? null }},
                                        ইউনিয়ন: {{ $item->union ?? null }},<br>
                                        উপজেলা: {{ $item->upozila ?? null }},
                                        জেলা: {{ $item->district ?? null }},<br>
                                        বিভাগ: {{ $item->division ?? null }}
                                    </td>
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
                                            <a href="{{ route('birth-order-file.download', $item->id) }}"
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
                        <h5 class="modal-title" id="createModallLabel">জন্ম নিবন্ধন অর্ডার</h5>
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

                        <form class="form-horizontal m-5" action="{{ route('user.birth-order.store') }}"
                            enctype="multipart/form-data" method="POST">
                            @csrf

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <label class="col-form-label col-sm-2 text-right">নাম:<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name_bn"
                                                value="{{ old('name_bn') }}" placeholder="নাম বাংলায়" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <label class="col-form-label col-sm-2 text-right">Name:<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name_en"
                                                value="{{ old('name_en') }}" placeholder="নাম ইংরেজিতে" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <label class="col-form-label col-md-12 text-right">পিতার নাম:<span
                                                class="text-danger">*</span></label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="fathers_name_bn"
                                                value="{{ old('fathers_name_bn') }}" placeholder="পিতার নাম বাংলায়"
                                                required>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <label class="col-form-label col-md-12 text-right">Father's Name:<span
                                                class="text-danger">*</span></label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="fathers_name_en"
                                                value="{{ old('fathers_name_en') }}" placeholder="পিতার নাম ইংরেজিতে"
                                                required>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <label class="col-form-label col-md-12 text-right">মাতার নাম:<span
                                                class="text-danger">*</span></label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="mothers_name_bn"
                                                value="{{ old('mothers_name_bn') }}" placeholder="মাতার নাম বাংলায়"
                                                required>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <label class="col-form-label col-md-12 text-right">Mother's Name:<span
                                                class="text-danger">*</span></label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="mothers_name_en"
                                                value="{{ old('mothers_name_en') }}" placeholder="মাতার নাম ইংরেজিতে"
                                                required>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row align-items-center">
                                        <label class="col-form-label col-md-12 text-right">
                                            নিবন্ধনাধীন ব্যাক্তির জন্ম তারিখ: <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-md-12">
                                            <div class="input-group date" id="dobPicker">
                                                <input type="date" class="form-control" name="dob" id="dob"
                                                    value="{{ old('dob') }}" placeholder="yyyy-mm-dd" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <label class="col-form-label col-md-12 text-right">পিতার জন্ম নিবন্ধন নাম্বার:<span
                                                class="text-danger father-req">*</span></label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="fathers_birth_no"
                                                value="{{ old('fathers_birth_no') }}"
                                                placeholder="নিবন্ধনাধীন ব্যাক্তির বয়স যদি ২০০০ সালের পরে হয় তবে অবশ্যই পিতার জন্ম নিবন্ধন নাম্বার দিতে হবে">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <label class="col-form-label col-md-12 text-right">মাতার জন্ম নিবন্ধন নাম্বার:<span
                                                class="text-danger mother-req">*</span></label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="mothers_birth_no"
                                                value="{{ old('mothers_birth_no') }}"
                                                placeholder="নিবন্ধনাধীন ব্যাক্তির বয়স যদি ২০০০ সালের পরে হয় তবে অবশ্যই মাতার জন্ম নিবন্ধন নাম্বার দিতে হবে">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <label class="col-form-label col-sm-3 text-right">পিতার এনআইডি নাম্বার:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="fathers_nid"
                                                value="{{ old('fathers_nid') }}"
                                                placeholder="পিতার এনআইডি নাম্বার (যদি থাকে)">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <label class="col-form-label col-sm-3 text-right">মাতার এনআইডি নাম্বার:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="mothers_nid"
                                                value="{{ old('mothers_nid') }}"
                                                placeholder="মাতার এনআইডি নাম্বার (যদি থাকে)">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <p class="col-form-label text-right">ঠিকানাঃ- (নোটঃ - যে ঠিকানায় জন্ম নিবন্ধন করতে
                                            ইচ্ছুক- )</p>

                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row align-items-center">
                                        <label class="col-form-label col-sm-2 text-right">বাসা/হোল্ডিং নং:<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="house_holding"
                                                value="{{ old('house_holding') }}" placeholder="বাসা/হোল্ডিং নং"
                                                required>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row align-items-center">
                                        <label class="col-form-label col-sm-2 text-right">ডাকঘর:<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="post_office"
                                                value="{{ old('post_office') }}" placeholder="ডাকঘর" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row align-items-center">
                                        <label class="col-form-label col-sm-2 text-right">ওয়ার্ড নং:<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="word_no"
                                                value="{{ old('word_no') }}" placeholder="ওয়ার্ড নং" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row align-items-center">
                                        <label class="col-form-label col-sm-2 text-right">গ্রাম:<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="village"
                                                value="{{ old('village') }}" placeholder="গ্রামের নাম" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row align-items-center">
                                        <label class="col-form-label col-sm-2 text-right">ইউনিয়ন:<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="union"
                                                value="{{ old('union') }}" placeholder="ইউনিয়ন" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row align-items-center">
                                        <label class="col-form-label col-sm-2 text-right">উপজেলা:<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="upozila"
                                                value="{{ old('upozila') }}" placeholder="উপজেলা" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row align-items-center">
                                        <label class="col-form-label col-sm-2 text-right">জেলা:<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="district"
                                                value="{{ old('district') }}" placeholder="জেলা" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row align-items-center">
                                        <label class="col-form-label col-sm-2 text-right">বিভাগ:<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="division"
                                                value="{{ old('division') }}" placeholder="বিভাগ" required>
                                        </div>
                                    </div>

                                </div>


                                <div class="col-md-12">
                                    <div class="form-group align-items-center row justify-content-center">
                                        <label class="col-form-label font-weight-bold text-center">
                                            <b>সংযুক্তি: <span class="text-danger">*</span></b>
                                        </label>
                                        <p class="text-center text-dark font-weight-bold">নোটঃ- কমপক্ষে যেকোনো দুইটি ফাইল
                                            আপলোড করতে হবে</p>

                                        <p class="text-center text-dark font-weight-bold">১।পিতার এন.আইডি</p>
                                        <div class="col-sm-6">
                                            <input type="file" class="form-control" name="fathers_nid_file">
                                        </div>

                                        <p class="text-center text-dark font-weight-bold mt-2">২। মাতার এন.আইডি</p>
                                        <div class="col-sm-6">
                                            <input type="file" class="form-control" name="mothers_nid_file">
                                        </div>

                                        <p class="text-center text-dark font-weight-bold mt-2">৩। স্কুল সার্টিফিকেট</p>
                                        <div class="col-sm-6">
                                            <input type="file" class="form-control" name="school_cirtificate">
                                        </div>

                                        <p class="text-center text-dark font-weight-bold mt-2">৪। টিকা কার্ড</p>
                                        <div class="col-sm-6">
                                            <input type="file" class="form-control" name="tika_card">
                                        </div>

                                        <p class="text-center text-dark font-weight-bold mt-2">৫। নিবন্ধনাধীন ব্যক্তির
                                            এনআইডি কার্ড</p>
                                        <div class="col-sm-6">
                                            <input type="file" class="form-control" name="nid_file">
                                        </div>

                                        <!-- Error Message (Visible only if less than 2 files are selected) -->
                                        <p id="fileError" class="text-danger font-weight-bold text-center"
                                            style="display: none;">
                                            কমপক্ষে যেকোনো দুইটি ফাইল আপলোড করতে হবে।
                                        </p>


                                    </div>
                                </div>

                                <div class="form-group text-center mt-2">
                                    @if ($submitStatus->birth_order == 1)
                                        @if (auth()->user()->premium == 2 && $now < auth()->user()->premium_end)
                                            <h6 class="text-danger">{{ $message->birth_order_premium }}</h6>
                                        @else
                                            <h6 class="text-danger">{{ $message->birth_order }}</h6>
                                        @endif
                                    @else
                                        <h6 class="text-danger">ফর্ম সাবমিট বন্ধ আছে। পরবর্তীতে চেষ্টা করুন।</h6>
                                    @endif
                                </div>

                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                @if (auth()->user()->premium == 2 && $now < auth()->user()->premium_end)
                                    <input type="hidden" name="price"
                                        value="{{ $message->birth_order_premium_price ?? null }}">
                                @else
                                    <input type="hidden" name="price"
                                        value="{{ $message->birth_order_price ?? null }}">
                                @endif

                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info" id="submitBtn"
                                    {{ $submitStatus->birth_order == 1 ? '' : 'disabled' }}>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dob').on('change', function() {
                var dob = new Date($(this).val());
                var year2000 = new Date('2000-01-01');

                if (dob >= year2000) {
                    // Make fields required
                    $('input[name="fathers_birth_no"], input[name="mothers_birth_no"]').attr('required',
                        'required');
                    // Show the red asterisks
                    $('.father-req, .mother-req').show();
                } else {
                    // Remove required attribute
                    $('input[name="fathers_birth_no"], input[name="mothers_birth_no"]').removeAttr(
                        'required');
                    // Hide the red asterisks
                    $('.father-req, .mother-req').hide();
                }
            }).trigger('change'); // Trigger on page load to check existing values

            function checkFileUploads() {
                let count = 0;
                let fileInputs = $('input[type="file"]');

                // Count the number of selected files
                fileInputs.each(function() {
                    if ($(this).val() !== '') {
                        count++;
                    }
                });

                // Show or hide error message based on count
                if (count < 2) {
                    $('#fileError').show();
                } else {
                    $('#fileError').hide();
                }

                // Add "required" to empty fields only if less than 2 files are selected
                fileInputs.each(function() {
                    if (count < 2) {
                        $(this).attr('required', true);
                    } else {
                        $(this).removeAttr('required');
                    }
                });
            }

            // Run validation when any file input changes
            $('input[type="file"]').on('change', checkFileUploads);

            // Run on page load in case files are pre-filled
            checkFileUploads();

        });
    </script>

@endsection
