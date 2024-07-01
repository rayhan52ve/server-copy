@extends('User.layout.master')
@section('user')
    @php
        $notice = \App\Models\Notice::first();
        $message = \App\Models\Message::first();
        $submitStatus = \App\Models\SubmitStatus::first();
    @endphp
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            /* Center align content */
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container {
            text-align: left;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group select,
        /* Apply styles to select element */
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="number"],
        .form-group input[type="date"] {
            width: calc(100% - 20px);
            /* Adjust width for padding */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            /* Include padding in input width */
        }

        /* Existing CSS code */

        .form-group input[type="text"]#permanentAddr,
        .form-group input[type="text"]#permanentAddrEn {
            width: calc(100% - 20px);
            /* Adjust width for padding */
            padding: 30px;
            /* Increase padding to make it three times bigger */
            border: 1px solid #ccc;
            border-radius: 0px;
            box-sizing: border-box;
            /* Include padding in input width */
        }

        .form-group input[type="submit"] {
            width: 100%;
            padding: 10px 20px;
            background-color: #008CBA;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #005f6b;
        }
    </style>
    <div class="col-lg-12 mt-5">
        <div class="card p-1" style="border: 2px solid rgb(7, 95, 136); border-radius: 5px;">
            <marquee behavior="" direction="">
                <h4 class="mt-2"><b>নোটিশঃ-</b> {{ $notice->birth }}</h4>
            </marquee>
        </div>
    </div>

    <div class="container">
        <!-- Logo -->
        <img src="https://raw.githubusercontent.com/RayhanOfficial/RayhanOfficial/main/a.png" alt="Logo"
            style="width: 200px; height: auto; margin-bottom: 20px;">

        <h1>Birth Certificate</h1>

        <!-- Form -->
        <form id="submit_form" action="{{ route('user.new-registration.store') }}" method="post" class="form-container">


            @csrf

            <div class="form-group">
                <label for="upazila">Upazila/Pourashava/City Corporation, Zila:</label>
                <input type="text" id="upazila" name="upazila" placeholder="উপজেলা/পৌরসভা/সিটি কর্পোরেশন/জেলা"
                    required>

                <div class="form-group">
                    <label for="regOff">Register Office Address :</label>
                    <input type="text" id="regOff" name="regOff" placeholder="রেজিষ্টার অফিসের ঠিকানা লিখুন"
                        required>
                </div>
                <div class="form-group">
                    <label for="birthNo">Birth Certificate No.:</label>
                    <input type="number" id="birthNo" name="birthNo" placeholder="জন্মনিবন্ধন নম্বর প্রদান করুন"
                        required>
                </div>
                <div class="form-group">
                    <label for="verify">Left QR Code:</label>
                    <input type="text" id="verify" name="verify" value="QIDA" required>
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" placeholder="জন্ম তারিখ প্রদান করুন" required>
                </div>
            </div>
            <div class="form-group">
                <label for="wdob">Date of Birth In Word:</label>
                <input type="text" id="wdob" name="wdob" placeholder="জন্ম তারিখ কথায় লিখুন (ইংরেজি)">
            </div>
            <div class="form-group">
                <label for="issuteDate">Issue Date:</label>
                <input type="date" id="issuteDate" name="issuteDate" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="form-group">
                <label for="regDate">Registration Date:</label>
                <input type="date" id="regDate" name="regDate" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="নাম লিখুন (বাংলায়)" required>
            </div>
            <div class="form-group">
                <label for="nameEn">Name (English):</label>
                <input type="text" id="nameEn" name="nameEn" placeholder="নাম লিখুন (ইংরেজি)" required>
            </div>
            <!-- Add the rest of your fields here -->
            <div class="form-group">
                <label for="fatherName">Father's Name:</label>
                <input type="text" id="fatherName" name="fatherName" placeholder="বাবার নাম লিখুন (বাংলায়)" required>
            </div>
            <div class="form-group">
                <label for="fatherNameEn">Father's Name (English):</label>
                <input type="text" id="fatherNameEn" name="fatherNameEn" placeholder="বাবার নাম লিখুন (ইংরেজি)" required>
            </div>
            <div class="form-group">
                <label for="fatherNational">Father's Nationality:</label>
                <input type="text" id="fatherNational" name="fatherNational" value="বাংলাদেশী" required>
            </div>
            <div class="form-group">
                <label for="fatherNationalEn">Father's Nationality (English):</label>
                <input type="text" id="fatherNationalEn" name="fatherNationalEn" value="Bangladeshi" required>
            </div>
            <div class="form-group">
                <label for="motherName">Mother's Name:</label>
                <input type="text" id="motherName" name="motherName" placeholder="মাতার নাম লিখুন (বাংলায়)" required>
            </div>
            <div class="form-group">
                <label for="motherNameEn">Mother's Name (English):</label>
                <input type="text" id="motherNameEn" name="motherNameEn" placeholder="মাতার নাম লিখুন (ইংরেজি)"
                    required>
            </div>
            <div class="form-group">
                <label for="motherNational">Mother's Nationality:</label>
                <input type="text" id="motherNational" name="motherNational" value="বাংলাদেশী" required>
            </div>
            <div class="form-group">
                <label for="motherNationalEn">Mother's Nationality:</label>
                <input type="text" id="motherNationalEn" name="motherNationalEn" value="Bangladeshi" required>
            </div>
            <div class="form-group">
                <label for="birthPlace">Birth Place:</label>
                <input type="text" id="birthPlace" name="birthPlace" value=", বাংলাদেশ" required>
            </div>
            <div class="form-group">
                <label for="birthPlaceEn">Birth Place (English):</label>
                <input type="text" id="birthPlaceEn" name="birthPlaceEn" value=", Bangladesh" required>
            </div>

            <div class="form-group">
                <label for="sex">Sex:</label>
                <select id="sex" name="sex" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <!-- Add the rest of your fields here -->

            <div class="form-group">
                <label for="permanentAddr">Permanent Address:</label>
                <input type="text" id="permanentAddr" name="permanentAddr" required>
            </div>
            <div class="form-group">
                <label for="permanentAddrEn">Permanent Address (English):</label>
                <input type="text" id="permanentAddrEn" name="permanentAddrEn" required>
            </div>
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            @if (auth()->user()->premium == 2)
                <input type="hidden" name="price" value="{{ $message->premium_birth_price }}">
            @else
                <input type="hidden" name="price" value="{{ $message->birth_price }}">
            @endif
            <!-- Submit Button -->
            @if ($submitStatus->birth == 0)
                <h6 class="text-danger text-center">ফর্ম সাবমিট বন্ধ আছে। পরবর্তীতে চেষ্টা করুন।</h6>
            @else
                @if (auth()->user()->premium == 2)
                    <h6 class="text-primary">{{ $message->premium_birth }}</h6>
                @else
                    <h6 class="text-primary">{{ $message->birth }}</h6>
                @endif
            @endif
            <div class="form-group">
                <button class="submit btn btn-success form-control" type="button"
                    {{ $submitStatus->birth == 1 ? '' : 'disabled' }}>Submit</button>
            </div>
        </form>
    </div>
    @php
      $priceAlert =   auth()->user()->premium == 2 ? $message->premium_birth_price:$message->birth_price;
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
