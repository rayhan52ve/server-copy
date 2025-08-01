@extends(auth()->user()->is_admin != 0 ? 'admin.master' : 'User.layout.master')

@section(auth()->user()->is_admin != 0 ? 'body' : 'user')


    @php
        $notice = \App\Models\Notice::first();
        $message = \App\Models\Message::first();
        $submitStatus = \App\Models\SubmitStatus::first();
        $now = \Carbon\Carbon::now();

        $normalPrice =
            auth()->user()->premium == 2 && $now < auth()->user()->premium_end
                ? $message->premium_old_nid_price
                : $message->old_nid_price;
        $smartCardPrice = $message->smart_nid_make_price;
    @endphp
    <div class="col-lg-12 mt-5">
        <div class="card p-1" style="border: 2px solid rgb(7, 95, 136); border-radius: 5px;">
            <marquee behavior="" direction="">
                <h4 class="mt-2"><b>নোটিশঃ-</b> {{ $notice->old_nid ?? null }}</h4>
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
                            <form id="myForm" class="text-center" action="{{ route('user.signCopyNidApi') }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <!-- Label styled as a big button -->
                                <label class="big-button" for="pdf_file">
                                    <h3 id="button-text">সাইন কপি ফাইল আপলোড করুন</h3>
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
                                    document.getElementById('button-text').innerHTML =
                                        'লোডিং.... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';
                                });
                            </script>
                        </div>
                    </div>

                    <h3>এনআইডি মেক</h3>
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="text-center">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <form id="submit_form" class="form-horizontal mt-5" action="{{ route('user.nid-make.store') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>এনআইডি ছবি</label>
                                    <input type="file" id="nid_image_input" class="form-control" accept="image/*"
                                        onchange="handleImageUpload(event, 'nid_image')">
                                    <img id="nidImagePreview" src="" alt=""
                                        style="margin-top: 10px; width: 200px;">
                                    <!-- This is where the base64-encoded data will go -->
                                    <input type="hidden" id="nid_image" name="nid_image">


                                    <script>
                                        // Function to load and preview image, and store Base64 data in form inputs
                                        function handleImageUpload(event, imageType) {
                                            const imageFile = event.target.files[0];
                                            if (imageFile) {
                                                const reader = new FileReader();

                                                reader.onload = function() {
                                                    const img = new Image();
                                                    img.src = reader.result;

                                                    img.onload = function() {
                                                        // Preview the image in the appropriate img element
                                                        if (imageType === 'nid_image') {
                                                            document.getElementById('nidImagePreview').src = img.src;
                                                        } else if (imageType === 'sign_image') {
                                                            document.getElementById('signImagePreview').src = img.src;
                                                        }

                                                        // Convert the image to base64 using Canvas
                                                        const canvas = document.createElement('canvas');
                                                        const ctx = canvas.getContext('2d');
                                                        canvas.width = img.width;
                                                        canvas.height = img.height;
                                                        ctx.drawImage(img, 0, 0);

                                                        // Get the Base64 encoded image data
                                                        const base64Image = canvas.toDataURL('image/png');

                                                        // Store the base64 data in the corresponding input field
                                                        if (imageType === 'nid_image') {
                                                            document.getElementById('nid_image').value = base64Image;
                                                        } else if (imageType === 'sign_image') {
                                                            document.getElementById('sign_image').value = base64Image;
                                                        }
                                                    };
                                                };

                                                reader.readAsDataURL(imageFile); // Read the file as a data URL
                                            }
                                        }
                                    </script>

                                    @if (@$nidImage)
                                        <img id="nidImage" src="{{ $nidImage }}" width="100px" alt="NID Image">
                                        <input type="hidden" id="nidImageData" name="nid_image"
                                            value="{{ $nidImage }}">
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>স্বাক্ষর (ছবি)</label>
                                    <input type="file" id="sign_image_input" class="form-control" accept="image/*"
                                        onchange="handleImageUpload(event, 'sign_image')">
                                    <img id="signImagePreview" src="" alt=""
                                        style="margin-top: 10px; width: 200px;">
                                    <!-- This is where the base64-encoded data will go -->
                                    <input type="hidden" id="sign_image" name="sign_image">

                                    @if (@$signatureImage)
                                        <img id="signatureImage" src="{{ $signatureImage }}" width="100px"
                                            alt="Signature Image">
                                        <input type="hidden" id="signatureImageData" name="sign_image"
                                            value="{{ $signatureImage }}">
                                    @endif
                                </div>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Get the base64 encoded image data from hidden input fields
                                    var nidImageData = document.getElementById('nidImageData') ? document.getElementById('nidImageData')
                                        .value : '';
                                    var signatureImageData = document.getElementById('signatureImageData') ? document.getElementById(
                                        'signatureImageData').value : '';

                                    // Display NID image
                                    var nidImageElement = document.getElementById('nidImage');
                                    if (nidImageData && nidImageElement) {
                                        nidImageElement.src = nidImageData;
                                    }

                                    // Display signature image
                                    var signatureImageElement = document.getElementById('signatureImage');
                                    if (signatureImageData && signatureImageElement) {
                                        signatureImageElement.src = signatureImageData;
                                    }
                                });
                            </script>




                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>নাম(বাংলা)</label>
                                    <input type="text" class="form-control" name="name_bn" value="{{ $name_bn ?? null }}"
                                        placeholder="সম্পূর্ণ নাম বাংলায়" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>নাম(ইংরেজি)</label>
                                    <input type="text" class="form-control" name="name_en"
                                        value="{{ $name_en ?? null }}" placeholder="সম্পূর্ণ নাম ইংরেজিতে" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>এনআইডি নাম্বার</label>
                                    <input type="text" class="form-control" name="nid_number"
                                        value="{{ $nid_number ?? null }}" placeholder="এনআইডি নাম্বার" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>পিন নাম্বার</label>
                                    <input type="text" class="form-control" value="{{ $pin ?? null }}"
                                        name="pin" id="service_title" placeholder="পিন নাম্বার" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="d-flex">
                                        <input type="radio" id="স্বামী" name="husband_father" value="স্বামী">
                                        <label for="স্বামী">স্বামী</label><br>
                                        <input class="mx-1" type="radio" id="পিতা" name="husband_father"
                                            value="পিতা" checked>
                                        <label for="css">পিতা</label><br>
                                    </div>
                                    <input type="text" class="form-control" name="fathers_name"
                                        value="{{ $fathers_name ?? null }}" placeholder="স্বামী/পিতার নাম বাংলায়"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>মাতার নাম</label>
                                    <input type="text" class="form-control" name="mothers_name"
                                        value="{{ $mothers_name ?? null }}" placeholder="মাতার নাম বাংলায়" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> জন্মস্থান</label>
                                    <input type="text" class="form-control" name="birth_place"
                                        value="{{ $birth_place ?? null }}" placeholder="জন্মস্থান" required>
                                </div>
                            </div>
                            <div class="col-md-6 birthPlaceEn">
                                <div class="form-group">
                                    <label> জন্মস্থান (ইংরেজি) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="birth_place_en"
                                        value="{{ $birth_place_en ?? null }}" placeholder="জন্মস্থান ইংরেজিতে লিখুন"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> জন্ম তারিখ</label>
                                    <input type="date" class="form-control datepicker" name="birthday"
                                        value="{{ isset($birthday) ? \Carbon\Carbon::parse($birthday)->format('Y-m-d') : \Carbon\Carbon::now()->format('Y-m-d') }}"
                                        required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>রক্তের গ্রুপ</label>
                                    <select class="form-control" name="blood_group">
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
                                    <label>প্রদানের তারিখ</label>
                                    <input type="date" class="form-control datepicker" name="issue_date"
                                        value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>ঠিকানা</label>
                                <textarea class="form-control editor" cols="10" rows="3" name="address" required>{{ $address ?? null }}</textarea>
                            </div>

                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                            <input type="hidden" name="price" value="">


                        </div>
                        <div class="row justify-content-center mb-3">
                            <div class="col-md-6">
                                <div class="field padding-bottom--10 text-center">
                                    <label for="radioOptions"><strong>Select Nid type:</strong></label> <br>
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group"
                                        id="nidTypeGroup" data-normal-price="{{ $normalPrice }}"
                                        data-smart-price="{{ $smartCardPrice }}">

                                        <input type="radio" class="btn-check" name="nid_type" id="option1"
                                            value="1" checked>
                                        <label class="btn btn-sm btn-outline-success" for="option1">Normal Card</label>

                                        <input type="radio" class="btn-check" name="nid_type" id="option2"
                                            value="2">
                                        <label class="btn btn-sm btn-outline-success" for="option2">Smart Card</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center pb-3">
                            @if ($submitStatus->old_nid == 1)
                                @if (auth()->user()->premium == 2 && $now < auth()->user()->premium_end)
                                    <h6 class="text-primary">{{ $message->premium_old_nid }}</h6>
                                @else
                                    <h6 class="text-primary">{{ $message->old_nid }}</h6>
                                @endif
                            @else
                                <h6 class="text-danger">ফর্ম সাবমিট বন্ধ আছে। পরবর্তীতে চেষ্টা করুন।</h6>
                            @endif
                        </div>


                        <div class="table-responsive">
                            <button type="button" class="submit btn btn-info form-control btn-lg"
                                {{ $submitStatus->old_nid == 1 ? '' : 'disabled' }}>Save &
                                Download</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @php
        $priceAlert =
            auth()->user()->premium == 2 && $now < auth()->user()->premium_end
                ? $message->premium_old_nid_price
                : $message->old_nid_price;
    @endphp
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.submit').on('click', function(event) {
                event.preventDefault(); // Prevent default form submission

                // Validate the form first
                // Only check if input exists
                const birthPlaceEn = document.querySelector('input[name="birth_place_en"]');
                if (birthPlaceEn) {
                    if (!birthPlaceEn.checkValidity()) {
                        birthPlaceEn.reportValidity();
                        return;
                    }
                }

                // Get selected NID type
                let selectedValue = $('input[name="nid_type"]:checked').val();

                // Get prices from data attributes
                let normalPrice = $('#nidTypeGroup').data('normal-price');
                let smartPrice = $('#nidTypeGroup').data('smart-price');

                // Determine the correct price
                let selectedPrice = selectedValue === '1' ? normalPrice : smartPrice;

                // Set hidden input value
                $('input[name="price"]').val(selectedPrice);

                Swal.fire({
                    title: 'এনআইডি',
                    text: `এই কার্ডটি ডাউনলোড করার জন্য আপনার অ্যাকাউন্ট থেকে ${selectedPrice} টাকা কর্তন করা হবে।`,
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'হ্যাঁ, জমা দিন!',
                    cancelButtonText: 'না, বাতিল করুন!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#submit_form').submit();
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Initially hide birthPlaceEn div & remove required
            $('.birthPlaceEn').hide();
            $('input[name="birth_place_en"]').prop('required', false);

            // Toggle visibility & required based on radio button
            $('input[name="nid_type"]').change(function() {
                if ($(this).val() === '2') {
                    $('.birthPlaceEn').show();
                    $('input[name="birth_place_en"]').prop('required', true);
                } else {
                    $('.birthPlaceEn').hide();
                    $('input[name="birth_place_en"]').prop('required', false);
                }
            });
        });
    </script>
@endsection
