<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Server Copy - {{ $nid_info['nationalId'] }}</title>
    <link href="https://fonts.maateen.me/adorsho-lipi/font.css" rel="stylesheet">
    <style>
        table {
            font-family: 'AdorshoLipi', Arial, sans-serif !important;
        }
    </style>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            margin: 10px 50px;
            l
        }

        .main {
            border: 1px solid green;
        }

        .row {
            /* width: 100%; */
            margin: 100px 80px 0;
            display: flex;
        }

        .col-4 {
            /* width: 30%; */
            margin-right: 50px;
        }

        .col-8 {
            /* width: 60%; */
            margin-bottom: 20px
        }

        .img-container {
            width: 200px;
            /* Set the desired width of the container */
            height: 250px;
            /* Set the desired height of the container */
            overflow: hidden;
            /* Clip any content that overflows */

            /* Center the image both vertically and horizontally within the container */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .nid-img {
            object-fit: cover;
            max-width: 100%;
            max-height: 100%;
            border-radius: 20px;
        }

        .nid-name {
            width: 200px;
            font-size: 18px;
            font-weight: 800;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dee2e6;
            padding: 5px;
        }

        th {
            background-color: #ccf3f6;
            text-align: left;
            font-size: 18px;
            font-weight: 700;
        }

        table tr td:first-child {
            width: 200px;
        }

        table tr td:last-child {
            width: 300px;
        }

        .warning {
            color: rgb(229, 8, 8);
        }

        .text-center {
            text-align: center;
        }

        .qr-code {
            width: 200px;
            height: 200px;
            margin: 40px 0;
        }

        .search-title {
            text-align: center;
            color: rgb(160, 71, 160);
        }

        .input-group {
            width: 30%;
            margin: 0 auto;
            padding-left: 150px;
            font-weight: 600;
        }

        .form-group {
            text-align: center;
            margin: 5px;
        }

        .form-group label {
            font-weight: 600;
            color: rgb(229, 8, 8);
        }

        .form-group input {
            padding: 5px;
        }

        .search-btn {
            background-color: green;
            border-style: none;
            border-radius: 5px;
            color: #dee2e6;
        }



        @media print {
            body {
                font-size: 8px;
                -webkit-print-color-adjust: exact !important;
            }

            @page {
                size: A4;

            }

            .banner-img img {
                height: 100px;
            }

            .row {
                margin: 30px 50px 0;
            }

            .img-container {
                width: 100px;
                height: 150px;
                overflow: hidden;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .nid-name {
                width: 100px;
                text-align: center;
                font-size: 12px;
            }

            .qr-code {
                width: 100px;
                height: 100px;
                margin: 40px 0;
            }

            .qr-img {
                width: 100%;
                height: 100%;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th,
            td {
                border: .005rem solid #dee2e6;
                padding: 5px;
            }

            th {
                -webkit-print-color-adjust: exact !important;
                background-color: #ccf3f6 !important;
                text-align: left;
                font-size: 12px;
                font-weight: 700;
            }

            table tr td:first-child {
                width: 150px;
                font-size: 11px;
                font-weight: 500;
            }

            table tr td:last-child {
                width: 200px;
                font-size: 11px;
                font-weight: 500;
            }

            .footer {
                font-size: 12px;
            }

            .col-4 {
                margin-right: 50px;
            }

            .col-8 {
                margin-top: 30px;
            }

            .warning {
                font-size: 11px;
            }

            .footer-text {
                font-size: 12px;
            }

            .search-title {
                margin-top: 10px;
                text-align: center;
                color: rgb(160, 71, 160);
            }

            .input-group {
                font-size: 10px'
 width: 30%;
                margin: 0 auto;
                padding-left: 50px;
                font-weight: 600;
            }

            .form-group {
                text-align: center;
                margin: 5px;
            }

            .form-group label {
                font-size: 10px;
                font-weight: 600;
                color: rgb(229, 8, 8);
            }

            .form-group input[type="text"] {
                padding: 2px;
                width: 120px;
            }

            .search-btn {
                margin-left: 15px;
                font-size: 10px;
                background-color: green;
                border-style: none;
                border-radius: 2px;
                color: #dee2e6;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="main">
            <div class="banner-img">
                <img src="{{ asset('backend/banner_image/nid_banner.png') }}" alt="" width="100%">
            </div>
            <div class="search">
                <h2 class="search-title">Select Your Search Category</h2>
                <div class="input-group">
                    <div class="">
                        <input type="radio" name="search" checked>
                        <label for="">Search by NID/Voter No.</label>
                    </div>
                    <div class="">
                        <input type="radio" name="search">
                        <label for="">Search by Form No.</label>
                    </div>

                </div>
                <div class="form-group">
                    <label for="">NID/Voter No*</label>
                    <input type="text" value="NID">
                    <input type="button" value="Submit" class="search-btn">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="img-container">
                        @if ($nid_info['nid_image'])
                            <img style="margin-top:-2px" id="userPhoto" width="100" height="120" alt=""
                                src="data:image/jpeg;base64,{{ $nid_info['nid_image'] }}" alt="NID Image">
                        @endif
                    </div>
                    <p class="nid-name">{{ $nid_info['nameEn'] }}</p>

                    <div class="qr-code">
                        <img src="data:image/png;base64,{{ $base64Image }}" width="200" height="200"
                            class="qr-img" alt="QR Code">
                    </div>

                </div>
                <div class="col-8">
                    <table>
                        <thead>
                            <tr>
                                <th colspan="2">জাতীয় পরিচয় তথ্য</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>জাতীয় পরিচয়পত্র নম্বর</td>
                                <td>{{ $nid_info['nationalId'] }}</td>
                            </tr>
                            <tr>
                                <td>পিন নম্বর</td>
                                <td>{{ $nid_info['pin'] }}</td>
                            </tr>
                            <tr>
                                <td>স্বামী/স্ত্রীর নাম</td>
                                <td>{{ $nid_info['spouse'] }}</td>
                            </tr>
                            <tr>
                                <td>ভোটার নম্বর</td>
                                <td>{{ $nid_info['voter'] }}</td>
                            </tr>
                            <tr>
                                <td>ভোটার এলাকা</td>
                                <td>
                                    {{-- {{ $nid_info['presentAddress'] }} --}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table>
                        <thead>
                            <tr>
                                <th colspan="2">ব্যক্তিগত তথ্য</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>নাম (বাংলা)</td>
                                <td>{{ $nid_info['name'] }}</td>
                            </tr>
                            <tr>
                                <td>নাম (ইংরেজি)</td>
                                <td>{{ $nid_info['nameEn'] }}</td>
                            </tr>
                            <tr>
                                <td>জন্ম তারিখ</td>
                                <td>{{ $nid_info['dateOfBirth'] }}</td>
                            </tr>
                            <tr>
                                <td>পিতার নাম</td>
                                <td>{{ $nid_info['father'] }}</td>
                            </tr>
                            <tr>
                                <td>মাতার নাম</td>
                                <td>{{ $nid_info['mother'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table>
                        <thead>
                            <tr>
                                <th colspan="2">অন্যান্য তথ্য</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>লিঙ্গ</td>
                                <td>{{ $nid_info['gender'] }}</td>
                            </tr>
                            <tr>
                                <td>জাতীয়তা</td>
                                <td>বাংলাদেশী</td>
                            </tr>
                            <tr>
                                <td>মোবাইল নাম্বার</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>ধর্ম</td>
                                <td>{{ @$nid_info['religion'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table>
                        <thead>
                            <tr>
                                <th colspan="2">বর্তমান ঠিকানা</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <span>{{ @$nid_info['presentAddress'] }}
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table>
                        <thead>
                            <tr>
                                <th colspan="2">স্থায়ী ঠিকানা</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <span>{{ @$nid_info['permanentAddress'] }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="footer" style="margin: 10px 0 30px 0;">
                <div class="warning text-center" style="">উপরে প্রদর্শিত তথ্য সমূহ জাতীয় পরিচয়পত্র সংশ্লিষ্ট ,
                    ভোটার তালিকার সাথে সরাসরি সম্পর্কযুক্ত।
                </div>
                <div class="text-center footer-text" style="">
                    This is Software Generated Report From Bangladesh Election Commission, Signature & Seal Aren't
                    Required.
                </div>
            </div>
        </div>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>
