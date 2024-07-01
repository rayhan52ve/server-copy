@extends('User.layout.master')
@section('user')
    @php
        $notice = \App\Models\Notice::first();
        $message = \App\Models\Message::first();
        $submitStatus = \App\Models\SubmitStatus::first();
    @endphp
    <div class="col-lg-12 mt-5">
        <div class="card p-1" style="border: 2px solid rgb(7, 95, 136); border-radius: 5px;">
            <marquee behavior="" direction="">
                <h4 class="mt-2"><b>নোটিশঃ-</b> {{ $notice->sign_to_server ?? null }}</h4>
            </marquee>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="row justify-content-center">
                        <div class="col-md-3 my-5">
                            <style>
                                /* Style for the big button */
                                .big-button {
                                    display: inline-block;
                                    padding: 20px;
                                    border: 2px solid #007bff;
                                    /* Button border color */
                                    border-radius: 10px;
                                    /* Button border radius */
                                    background-color: #5295e1;
                                    /* Button background color */
                                    color: #fff;
                                    /* Button text color */
                                    cursor: pointer;
                                    transition: all 0.3s ease;
                                }

                                /* Hover effect for the big button */
                                .big-button:hover {
                                    background-color: #0f5ca9;
                                    /* Darker background color on hover */
                                    border-color: #0056b3;
                                    /* Darker border color on hover */
                                }

                                /* Hide the file input */
                                #pdf_file {
                                    display: none;
                                }
                            </style>

                            <!-- Form with big button -->
                            <form id="myForm" class="text-center" action="{{ route('serverCopy.signCopyUpload') }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <!-- Label styled as a big button -->
                                <label class="big-button" for="pdf_file">
                                    <h3>সাইন কপি ফাইল আপলোড করুন</h3>
                                </label>
                                <!-- File input -->
                                <input class="form-control" type="file" name="pdf_file" id="pdf_file">
                                <!-- Hidden button for form submission -->
                                <button id="hiddenSubmit" type="submit" style="display:none;"></button>
                            </form>

                            <script>
                                // Trigger form submission on file input change
                                document.getElementById('pdf_file').addEventListener('change', function() {
                                    document.getElementById('hiddenSubmit').click();
                                });
                            </script>
                        </div>
                    </div>

                    <h3>সাইন টু সার্ভার কপি</h3>
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form id="submit_form" class="form-horizontal mt-5" action="{{ route('user.sign-to-server.store') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    @if (@$nidImage)
                                        <img id="nidImage"
                                            src="data:image/jpeg;base64,{{ base64_encode($nidImage['data']) }}"
                                            width="100px" alt="NID Image">
                                        <input type="hidden" id="nidImageData" name="nid_image"
                                            value="{{ base64_encode($nidImage['data']) }}">
                                    @else
                                    @endif
                                </div>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Get the base64 encoded image data from hidden input fields
                                    var nidImageData = document.getElementById('nidImageData').value;

                                    // Display NID image
                                    var nidImageElement = document.getElementById('nidImage');
                                    if (nidImageData && nidImageElement) {
                                        nidImageElement.src = 'data:image/jpeg;base64,' + nidImageData;
                                    }
                                });
                            </script>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>নাম(বাংলা)</label>
                                    <input type="text" class="form-control" name="name" value="{{ $name_bn ?? null }}"
                                        placeholder="সম্পূর্ণ নাম বাংলায়" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>নাম(ইংরেজি)</label>
                                    <input type="text" class="form-control" name="nameEn" value="{{ $name_en ?? null }}"
                                        placeholder="সম্পূর্ণ নাম ইংরেজিতে" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>এনআইডি নাম্বার</label>
                                    <input type="text" class="form-control" name="nationalId"
                                        value="{{ $nid_number ?? null }}" placeholder="এনআইডি নাম্বার" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>পিন নাম্বার</label>
                                    <input type="text" class="form-control" value="{{ $pin ?? null }}" name="pin"
                                        id="service_title" placeholder="পিন নাম্বার" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ফর্ম নাম্বার</label>
                                    <input type="text" class="form-control" value="{{ $form ?? null }}" name="form"
                                        id="service_title" placeholder="ফর্ম নাম্বার" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ভোটার নাম্বার</label>
                                    <input type="number" class="form-control" value="{{ $voter ?? null }}" name="voter"
                                        id="service_title" placeholder="ভোটার নাম্বার" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>পিতার নাম</label>
                                    <input type="text" class="form-control" name="father"
                                        value="{{ $fathers_name ?? null }}" placeholder="পিতার নাম বাংলায়" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>মাতার নাম</label>
                                    <input type="text" class="form-control" name="mother"
                                        value="{{ $mothers_name ?? null }}" placeholder="মাতার নাম বাংলায়" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>স্বামী/স্ত্রীর নাম</label>
                                    <input type="text" class="form-control" name="spouse"
                                        value="{{ $spouse ?? null }}" placeholder="স্বামী/স্ত্রীর নাম বাংলায়">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>শিক্ষাগত যোগ্যতা</label>
                                    <input type="text" class="form-control" name="education"
                                        value="{{ $education ?? null }}" placeholder="শিক্ষাগত যোগ্যতা">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> জন্মস্থান</label>
                                    <input type="text" class="form-control" name="birthPlace"
                                        value="{{ $birth_place ?? null }}" placeholder="জন্মস্থান" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> জন্ম তারিখ</label>
                                    <input type="date" class="form-control datepicker" name="dateOfBirth"
                                        value="{{ $birthday ?? \Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>রক্তের গ্রুপ</label>
                                    <select class="form-control" name="bloodGroup">
                                        <option selected disabled>রক্তের গ্রুপ সিলেক্ট করুন</option>
                                        <option value="A+" {{ @$blood_group == 'A+' ? 'selected' : '' }}>A+ (এ
                                            পজেটিভ)</option>
                                        <option value="A-" {{ @$blood_group == 'A-' ? 'selected' : '' }}>A- (এ
                                            নেগেটিভ)</option>
                                        <option value="B+" {{ @$blood_group == 'B+' ? 'selected' : '' }}>B+
                                            (বি
                                            পজেটিভ)</option>
                                        <option value="B-" {{ @$blood_group == 'B-' ? 'selected' : '' }}>B-
                                            (বি
                                            নেগেটিভ)</option>
                                        <option value="AB+" {{ @$blood_group == 'AB+' ? 'selected' : '' }}>AB+
                                            (এবি পজেটিভ)</option>
                                        <option value="AB-" {{ @$blood_group == 'AB-' ? 'selected' : '' }}>AB-
                                            (এবি নেগেটিভ)</option>
                                        <option value="O+" {{ @$blood_group == 'O+' ? 'selected' : '' }}>O+ (ও
                                            পজেটিভ)</option>
                                        <option value="O-" {{ @$blood_group == 'O-' ? 'selected' : '' }}>O- (ও
                                            নেগেটিভ)</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>লিঙ্গ</label>
                                    <input type="text" class="form-control" name="gender"
                                        value="{{ $gender ?? null }}">
                                </div>
                            </div>

                            <?php
                            $postal_code = isset($postal_code) ? $postal_code : '';

                            // Function to convert numbers to Bangla
                            function convertToBangla($number)
                            {
                                $bangla_numbers = [
                                    '0' => '০',
                                    '1' => '১',
                                    '2' => '২',
                                    '3' => '৩',
                                    '4' => '৪',
                                    '5' => '৫',
                                    '6' => '৬',
                                    '7' => '৭',
                                    '8' => '৮',
                                    '9' => '৯',
                                ];

                                return strtr($number, $bangla_numbers);
                            }

                            $postal_code_bangla = convertToBangla($postal_code);
                            ?>

                            <div class="form-group">
                                <label>বর্তমান ঠিকানা</label>
                                <textarea class="form-control editor" cols="10" rows="3" name="address" required>বাসা/হোল্ডিং: {{ $house_holding ?? null }}, গ্রাম/রাস্তা:{{ $village_road ?? null }}, ডাকঘর: {{ $post_office ?? '' }} - {{ $postal_code_bangla ?? '' }},{{ $upazila ?? null }}, {{ $district ?? '' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>স্থায়ী ঠিকানা</label>
                                <textarea class="form-control editor" cols="10" rows="3" name="address" required>বাসা/হোল্ডিং: {{ $house_holding ?? null }}, গ্রাম/রাস্তা:{{ $village_road ?? null }}, ডাকঘর: {{ $post_office ?? '' }} - {{ $postal_code_bangla ?? '' }},{{ $upazila ?? null }}, {{ $district ?? '' }}</textarea>
                            </div>


                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            @if (auth()->user()->premium == 2)
                                <input type="hidden" name="price"
                                    value="{{ $message->premium_sign_to_server_price }}">
                            @else
                                <input type="hidden" name="price" value="{{ $message->sign_to_server_price }}">
                            @endif

                        </div>
                        <div class="text-center pb-3">
                            @if ($submitStatus->sign_to_server == 1)
                                @if (auth()->user()->premium == 2)
                                    <h6 class="text-danger">{{ $message->premium_sign_to_server }}</h6>
                                @else
                                    <h6 class="text-danger">{{ $message->sign_to_server }}</h6>
                                @endif
                            @else
                                <h4 class="text-danger">ফর্ম সাবমিট বন্ধ আছে। পরবর্তীতে চেষ্টা করুন।</h4>
                            @endif
                        </div>

                        <div class="table-responsive">
                            <button type="button" class="submit btn btn-info form-control btn-lg"
                                {{ $submitStatus->sign_to_server == 1 ? '' : 'disabled' }}>Save &
                                Download</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @php
        $priceAlert = auth()->user()->premium == 2 ? $message->premium_sign_to_server_price : $message->sign_to_server_price;
    @endphp
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.submit').on('click', function(event) {
                event.preventDefault(); // Prevent the default form submission triggered by the button click

                Swal.fire({
                    title: 'এনআইডি',
                    text: "এই কার্ডটি ডাউনলোড করার জন্য আপনার অ্যাকাউন্ট থেকে {{ $priceAlert }} টাকা কর্তন করা হবে।",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'হ্যাঁ, জমা দিন!',
                    cancelButtonText: 'না, বাতিল করুন!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#submit_form').submit(); // Only submit the form if the user confirms
                    }
                });
            });
        });
    </script>
@endsection
