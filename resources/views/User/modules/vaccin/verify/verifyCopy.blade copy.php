<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1024">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{ asset('vaccine/verify/verify_logo.png') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- SolaimanLipi Font -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/mirazmac/bengali-webfont-cdn@master/solaimanlipi/style.css">

    <!-- Custom CSS -->
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            position: relative;
            padding-bottom: 320px;
            /* Space for footer */
        }

        .custom-alert {
            position: absolute;
            /* Allows free positioning */
            width: 44%;
            /* Default width, adjust as needed */
            max-width: 600px;
            /* Maximum width */
            left: 50%;
            /* Center horizontally */
            top: -175%;
            /* Adjust vertical position */
            transform: translateX(-90%);
            /* Center horizontally */
            padding: 15px;
            border-radius: 5px;
            text-align: left;
            background-color: #f8d7da;
            /* Red background for danger */
            color: #721c24;
            /* Dark red text */
            border: 1px solid #f5c6cb;
            /* Light red border */
        }




        .top-header {
            background-color: transparent;
            padding: 1em;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            margin-bottom: 20px;
        }

        .top-header .logo {
            position: absolute;
            top: 11px;
            left: 120px;
            width: 223px;
            /* adjust the width of the logo */
            height: 82px;
        }

        .top-header .menu-toggle {
            background-color: transparent;
            border: 2px solid #EEEEEE;
            padding: 10px;
            cursor: pointer;
            border-radius: 3px;
            position: absolute;
            top: 20px;
            left: 792px;


        }

        .top-header .menu-toggle span {
            display: block;
            width: 20px;
            height: 2px;
            background-color: #7C7C7D;
            margin-bottom: 5px;
            border-radius: 3px;
        }

        .top-header .menu {
            display: none;
            background-color: transparent;
            padding: 0;
            border: 2px;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .top-header .menu.show {
            display: block;
        }

        .top-header .menu ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .top-header .menu li {
            margin-bottom: 10px;
            padding: 10px;
        }

        .top-header .menu a {
            text-decoration: none;
            color: #333;
            display: block;
        }

        .top-header .menu a:hover {
            color: #666;
            border: 2px solid #333;
        }

        .top-header.expanded {
            flex-direction: column;
            align-items: flex-start;
        }

        .top-header.expanded .menu {
            margin-top: 0;
        }


        .header {
            position: absolute;
            top: 75px;
            left: 0;
            width: 100%;
            padding: 10px;
            border-bottom: 180px solid #DAFFF2;
        }

        .header .logo {
            position: absolute;
            top: 11px;
            left: 600px;
            width: 150px;
            /* adjust the width of the logo */
            height: 150px;
        }


        .header .header-text {
            position: absolute;
            top: 70px;
            left: 250px;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .header.hide {
            display: none;
        }

        /* .footer {
            position: absolute;
            bottom: 0px;
            left: 0px;
            width: 100%;
            padding: 5px;
            background-color: #F26D3E;
            border-bottom: 320px solid #F26D3E;
        } */


        .footer {
            position: absolute;
            top: 1200px;
            left: 0;
            width: 100%;
            padding: 5px;
            background-color: #F26D3E;
            border-bottom: 320px solid #F26D3E;
        }

        #logo1 {
            position: absolute;
            top: 80px;
            left: 145px;
        }

        #logo2 {
            position: absolute;
            top: 115px;
            left: 640px;
        }

        #logo3 {
            position: absolute;
            top: 140px;
            left: 400px;
        }

        #footer-text1 {
            position: absolute;
            top: 80px;
            left: 400px;
            font-size: 16px;
            font-weight: bold;
            color: #FFFFFF;
        }

        #footer-text2 {
            position: absolute;
            top: 80px;
            left: 640px;
            font-size: 14px;
            color: #FFFFFF;
            font-weight: bold;
        }

        #other-affiliates {
            position: absolute;
            top: 225px;
            left: 265px;
            text-decoration: none;
            color: #FFFFFF;
            font-weight: bold;
        }

        #terms-of-service {
            position: absolute;
            top: 170px;
            left: 265px;
            text-decoration: none;
            color: #FFFFFF;
            font-weight: bold;
        }

        #privacy-policy {
            position: absolute;
            top: 140px;
            left: 265px;
            text-decoration: none;
            color: #FFFFFF;
            font-weight: bold;
        }

        #manual {
            position: absolute;
            top: 110px;
            left: 265px;
            text-decoration: none;
            color: #FFFFFF;
            font-weight: bold;
        }

        #faq {
            position: absolute;
            top: 80px;
            left: 265px;
            text-decoration: none;
            color: #FFFFFF;
            font-weight: bold;
        }

        .footer a:hover {
            color: #666;
        }




        .covid19-wrap {
            position: absolute;
            top: 68%;
            left: 21%;
            transform: translate(-15%, -20%);
        }


        th,
        td {
            border-style: dashed;
            border-width: 2px;
            border-color: #EEEEEE;
        }

        .table-data,
        .table-other-dose {
            border-collapse: collapse;
            width: 100%;
        }

        * {
            font-family: 'SolaimanLipi', serif;
        }

        .verification-text {
            color: green;
            font-weight: bold;
        }

        .verification-text2 {
            color: green;
            font-weight: regular;
        }

        .print-button {
            position: absolute;
            /* Position it absolutely within the container */
            top: 8px;
            left: 673px;
            padding: 6px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            font-size: 16px;
            text-decoration: none;
        }

        .print-button:hover {
            background-color: #45a049;
        }

        /* Print-specific Styles */
        @media print {

            .covid19-wrap {
                position: absolute;
                top: 25%;
                left: 21%;
            }

            .top-header {
                display: none;
            }

            .header {
                display: none;
            }

            .print-button {
                display: none;
                /* Hide print button when printing */
            }

            .footer {
                display: none;
            }

            .print-button {
                display: none;
                /* Hide print button when printing */
            }
        }
    </style>

    <title>Verify Certificate | {{ $data['certification_no'] }}</title>
</head>

<body>



    <header class="top-header">
        <img src="{{ asset('vaccine/verify/top.png') }}" alt="Logo" class="logo">
        <button class="menu-toggle" id="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <nav class="menu" id="menu">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>

    <script>
        // JavaScript code
        const menuToggle = document.getElementById('menu-toggle');
        const menu = document.getElementById('menu');
        const header = document.querySelector('.header');

        menuToggle.addEventListener('click', () => {
            menu.classList.toggle('show');
            header.classList.toggle('expanded');
        });
    </script>




    <header class="header">
        <div class="logo">
            <img src="{{ asset('vaccine/verify/badge.png') }}" alt="Logo" width="150" height="150">
        </div>
        <div class="header-text">Verify Certificate</div>
    </header>

    <footer class="footer">
        <div>
            <img id="logo1" src="{{ asset('vaccine/verify/footer_surokkha.png') }}" alt="white" width="130"
                height="99">
            <a id="other-affiliates" href="#">Other <br> Affiliates</a>
            <a id="terms-of-service" href="#">Terms of <br> Service</a>
            <a id="privacy-policy" href="#">Privacy Policy</a>
            <a id="manual" href="#">Manual</a>
            <a id="faq" href="#">FAQ</a>
        </div>

        <div>
            <img id="logo3" src="{{ asset('vaccine/verify/developed.png') }}" alt="developed by pie IT"
                width="190" height="41">
            <p id="footer-text1">Developed by - Department of <br> ICT </p>
        </div>

        <div>
            <img id="logo2" src="{{ asset('vaccine/verify/affiliate.png') }}" alt="affiliated " width="210"
                height="41">
            <p id="footer-text2">Affiliates - </p>
        </div>

    </footer>



    <!-- Start Main -->
    <main>
        <section>
            <div class="container-fluid">
                <div class="covid19-wrap mx-auto" style="width: 778px; padding: 50px;">
                    <!-- 1st Page -->
                    <div class="border">
                        <div class="covid19-head text-center">
                            <div class="d-flex justify-content-center align-items-center" style="margin-top: 10px;">
                                <div><img src="{{ asset('vaccine/verify/bd-logo-covid.png') }}" alt="Bangladesh Logo">
                                </div>
                                <div class="px-4 fw-semibold text-center" style="font-size: 14px;">
                                    <p class="mb-0">Government of the People's Republic of Bangladesh</p>
                                    <p class="mb-0">Ministry of Health and Family Welfare</p>
                                </div>
                                <div><img src="{{ asset('vaccine/verify/mujib-logo.png') }}" alt="Mujib Logo"></div>
                            </div>
                            <div style="margin-top: 20px;">
                                <h1 class="verification-text">
                                    <bold>Verification Successful !<br></bold>
                                </h1>
                                <h4 class="verification-text2">This Vaccination Certificate is Valid.</h4>
                            </div>
                        </div>
                        <hr class="mb-0">
                        <img src="{{ asset('vaccine/verify/Surokkha-logo.png') }}" alt="Surokkha Logo">
                        <div class="covid19-body" style="height: 590px; margin-top: -380px;">
                            <h6></h6>









                            <table class="table-data">

                                <tr
                                    style="font-size: 13.2px; background-color: #EEEEEE; border: 2px solid #e0e0e0; height: 40px; font-weight: 800;">
                                    <td class="text-center px-2 py-0" style="border-right: 2px solid #e0e0e0;"
                                        colspan="2">
                                        <span style="flex: 1; text-align: center;">
                                            <p class="d-inline">Beneficiary Details (টিকা গ্রহণকারীর বিবরণ)</p>
                                        </span>
                                    </td>
                                    <td class="text-center px-2 py-0" colspan="2">
                                        <span style="flex: 1; text-align: center;">
                                            <p class="d-inline">Vaccination Details (টিকা প্রদানের বিবরণ)</p>
                                        </span>
                                    </td>
                                </tr>




                                <tr>
                                    <td class="text-end px-2 py-0 fw-medium">
                                        <span style="font-size: 13px;">Certificate No:</span>
                                        <small class="d-block fw-medium" style="font-size: 10.6px;">সার্টিফিকেট
                                            নং:</small>
                                    </td>
                                    <td class="px-2 py-0 fw-medium" style="font-size: 13px;">BD82280899671</td>
                                    <td class="text-end px-2 py-0 fw-medium" style="max-width: 160px;">
                                        <span style="font-size: 13px;">Date of Vaccination (Dose 1):</span>
                                        <small class="d-block" style="font-size: 10.6px;">টিকা প্রদানের তারিখ (ডোজ
                                            ১):</small>
                                    </td>
                                    <td class="px-2 py-0 fw-medium" style="font-size: 13px; max-width: 135px;">
                                        20-01-2023</td>
                                </tr>
                                <tr>
                                    <td class="text-end px-2 py-0 fw-medium">
                                        <span style="font-size: 13px;">NID Number:</span>
                                        <small class="d-block" style="font-size: 10.6px;">জাতীয় পরিচয় পত্র নং:</small>
                                    </td>
                                    <td class="px-2 py-0 fw-medium" style="font-size: 13px;">1046519870</td>
                                    <td class="text-end px-2 py-0 fw-medium" style="max-width: 160px;">
                                        <span style="font-size: 13px;">Name of Vaccination (Dose 1):</span>
                                        <small class="d-block" style="font-size: 10.6px;">টিকার নাম (ডোজ ১):</small>
                                    </td>
                                    <td class="px-2 py-0 fw-medium" style="font-size: 13px; max-width: 135px;">Pfizer
                                        (Pfizer-BioNTech)</td>
                                </tr>
                                <tr>
                                    <td class="text-end px-2 py-0 fw-medium">
                                        <span style="font-size: 13px;">Passport No:</span>
                                        <small class="d-block" style="font-size: 10.6px;">পাসপোর্ট নং:</small>
                                    </td>
                                    <td class="px-2 py-0 fw-medium" style="font-size: 13px;">A16213704</td>
                                    <td class="text-end px-2 py-0 fw-medium" style="max-width: 160px;">
                                        <span style="font-size: 13px;">Date of Vaccination (Dose 2):</span>
                                        <small class="d-block" style="font-size: 10.6px;">টিকা প্রদানের তারিখ (ডোজ
                                            ২):</small>
                                    </td>
                                    <td class="px-2 py-0 fw-medium" style="font-size: 13px; max-width: 135px;">
                                        25-02-2023</td>
                                </tr>
                                <tr>
                                    <td class="text-end px-2 py-0 fw-medium">
                                        <span style="font-size: 13px;">Nationality:</span>
                                        <small class="d-block" style="font-size: 10.6px;">জাতীয়তা:</small>
                                    </td>
                                    <td class="px-2 py-0 fw-medium" style="font-size: 13px;">Bangladeshi</td>
                                    <td class="text-end px-2 py-0 fw-medium" style="max-width: 160px;">
                                        <span style="font-size: 13px;">Name of Vaccination (Dose 2):</span>
                                        <small class="d-block" style="font-size: 10.6px;">টিকার নাম (ডোজ ২):</small>
                                    </td>
                                    <td class="px-2 py-0 fw-medium" style="font-size: 13px; max-width: 135px;">Pfizer
                                        (Pfizer-BioNTech)</td>
                                </tr>
                                <tr>
                                    <td class="text-end px-2 py-0 fw-medium">
                                        <span style="font-size: 13px;">Name:</span>
                                        <small class="d-block" style="font-size: 10.6px;">নাম:</small>
                                    </td>
                                    <td class="px-2 py-0 fw-medium" style="font-size: 13px;">Md Kawsar Ahamed</td>
                                    <td class="text-end px-2 py-0 fw-medium" style="max-width: 160px;">
                                        <span style="font-size: 13px;">Vaccination Center:</span>
                                        <small class="d-block" style="font-size: 10.6px;">টিকা প্রদানের
                                            কেন্দ্র:</small>
                                    </td>
                                    <td class="px-2 py-0 fw-medium" style="font-size: 13px; max-width: 135px;">Upazila
                                        Health Complex,�Madhupur</td>
                                </tr>
                                <tr>
                                    <td class="text-end px-2 py-0 fw-medium">
                                        <span style="font-size: 13px;">Date of Birth:</span>
                                        <small class="d-block" style="font-size: 10.6px;">জন্ম তারিখ:</small>
                                    </td>
                                    <td class="px-2 py-0 fw-medium" style="font-size: 13px;">01-01-2005</td>

                                    <td class="text-end px-2 py-0 fw-medium" style="max-width: 160px;">
                                        <span style="font-size: 13px;">Vaccinated By:</span>
                                        <small class="d-block" style="font-size: 10.6px;">টিকা প্রদানকারী:</small>
                                    </td>
                                    <td class="px-2 py-0 fw-medium" style="font-size: 13px; max-width: 135px;">
                                        Directorate General of Health Services (DGHS)</td>

                                </tr>
                                <tr>
                                    <td class="text-end px-2 py-0 fw-medium">
                                        <span style="font-size: 13px;">Gender:</span>
                                        <small class="d-block" style="font-size: 10.6px;">লিঙ্গ:</small>
                                    </td>
                                    <td class="px-2 py-0 fw-medium" style="font-size: 13px;">Male</td>
                                    <td class="text-end px-2 py-0 fw-medium" style="max-width: 160px;">
                                        <span style="font-size: 13px;">Total Doses Given:</span>
                                        <small class="d-block" style="font-size: 10.6px;">মোট ডোজ সংখ্যা:</small>
                                    </td>
                                    <td class="px-2 py-0 fw-medium" style="font-size: 13px; max-width: 135px;">3</td>
                                </tr>



                            </table>

                            <!-- Other Doses -->
                            <table class="table-data"
                                style="width: 100%; border-collapse: collapse; margin-top: 0px;">
                                <tr>
                                    <td colspan="4"
                                        style="text-align: center; background-color: #EEEEEE; font-size: 13px; font-weight: 800; padding: 8px;">
                                        Other Doses (অন্যান্য ডোজসমূহ):
                                    </td>
                                </tr>
                                <tr class="table-data"
                                    style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                                    <td style="text-align: right; font-size: 13px; font-weight: 700; padding: 8px;">
                                        Dose (ডোজ):
                                    </td>
                                    <td style="text-align: center; font-size: 13px; font-weight: 700; padding: 8px;">
                                        Vaccine Name (টিকার নাম):
                                    </td>
                                    <td style="text-align: left; font-size: 13px; font-weight: 700; padding: 8px;">
                                        Date (তারিখ):
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: right; font-size: 13px; padding: 8px; width: 33%;">
                                        Dose 3:
                                    </td>
                                    <td style="text-align: center; font-size: 13px; padding: 8px; width: 33%;">
                                        Pfizer (Pfizer-BioNTech) </td>
                                    <td style="text-align: left; font-size: 13px; padding: 8px; width: 33%;">
                                        10-07-2023 </td>
                                </tr>
                            </table>
                            <div>
                                <p class="text-center mb-0 fw-semibold" style="font-size: 13px;">For any further
                                    assistance, please visit www.dghs.gov.bd or e-mail: info@dghs.gov.bd</p>
                                <p class="text-center mb-1 fw-semibold" style="font-size: 13px;">(প্রয়োজনে
                                    www.dghs.gov.bd ওয়েব সাইটে ভিজিট করুন অথবা ইমেইল করুন: info@dghs.gov.bd)</p>
                                <img src="{{ asset('vaccine/verify/in-corporation-with.png') }}"
                                    alt="In Corporation With">
                            </div>
                        </div>
                    </div>

                    <!-- Print Button -->
                    <a href="javascript:window.print()" class="print-button">Print</a>




                </div>
            </div>
        </section>
    </main>



</body>

</html>
