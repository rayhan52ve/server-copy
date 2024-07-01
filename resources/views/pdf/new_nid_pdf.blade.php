    <html lang="en">

    <head>
        <title>nid-{{ $data['nid_number'] }}</title>
        <link href="https://sonnetdp.github.io/nikosh/css/nikosh.css" rel="stylesheet" type="text/css">
        <!--<link rel="stylesheet" href="css/nstyle.css">-->
        <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
            integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
            integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="{{ asset('voter_id/assets/card-css/e521caf613e4ad87.css') }}" data-n-g="" />
        <style>
            @media print {
                .back-btn {
                    display: none;
                }

                @page {
                    margin: 0;
                }
            }

            a.back-btn {
                /* width: 150px; */
                background: skyblue;
                text-align: center;
                font-weight: bold;
                padding: 10px 34px;
                position: fixed;
                bottom: 20px;
                left: 50%;
                scale: 7;
            }

            @media screen and (max-width: 480px) {
                .back-btn {
                    transform: scale(2);
                    /* স্কেল পরিবর্তন */
                    /* অন্যান্য স্টাইল পরিবর্তন যদি দরকার হয় */
                }
            }
        </style>
        @php
            $dateString = $data['birthday'];
            $birthday = new DateTime($dateString);
            $birthday->format('d M Y');
        @endphp
        <script>
            window.onload = function() {

                var hub3_code =
                    '<pin>{{ $data['pin'] }}</pin><name>{{ strtoupper($data['name_en']) }}</name><DOB>{{ $birthday->format('d M Y') }}</DOB><FP></FP><F>Right Index</F><TYPE>{{ $data['blood_group'] ?? null }}</TYPE><V>2.0</V> <ds>302c0214103fc01240542ed736c0b48858c1c03d80006215021416e73728de9618fedcd368c88d8f3a2e72096d</ds>';

                console.log(hub3_code);

                PDF417.init(hub3_code);

                var barcode = PDF417.getBarcodeArray();

                // block sizes (width and height) in pixels
                var bw = 2;
                var bh = 2;

                // create canvas element based on number of columns and rows in barcode
                var canvas = document.createElement('canvas');
                canvas.width = bw * barcode['num_cols'];
                canvas.height = bh * barcode['num_rows'];
                document.getElementById('barcode').appendChild(canvas);

                var ctx = canvas.getContext('2d');

                // graph barcode elements
                var y = 0;
                // for each row
                for (var r = 0; r < barcode['num_rows']; ++r) {
                    var x = 0;
                    // for each column
                    for (var c = 0; c < barcode['num_cols']; ++c) {
                        if (barcode['bcode'][r][c] == 1) {
                            ctx.fillRect(x, y, bw, bh);
                        }
                        x += bw;
                    }
                    y += bh;
                }
            }
        </script>
        <script src="{{ asset('voter_id/assets/barcode-js/bcmath-min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('voter_id/assets/barcode-js/pdf417-min.js') }}" type="text/javascript"></script>
    </head>

    <body>
        <div id="__next" data-reactroot="">
            <main>
                <div>
                    <main class="w-full overflow-hidden">
                        <div class="container w-full py-12 lg:flex lg:items-start" style="padding-top: 0;">
                            <div class="w-full lg:pl-6">
                                <div class="flex items-center justify-center">
                                    <div class="w-full">

                                        <div class="flex items-start gap-x-2 bg-transparent mx-auto w-fit"
                                            id="nid_wrapper">
                                            <div id="nid_front" class="w-full border-[1.999px] border-black">
                                                <header
                                                    class="px-1.5 flex items-start gap-x-2 justify-between relative">
                                                    <img class="w-[38px] absolute top-1.5 left-[4.5px]"
                                                        src="https://seeklogo.com/images/B/bangladesh-govt-logo-A2C7688845-seeklogo.com.png"
                                                        alt="https://i.ibb.co/qJHPs8Z/gov-logo-0b7f8514.png" />
                                                    <div class="w-full h-[60px] flex flex-col justify-center">
                                                        <h3 style="font-size:20px"
                                                            class="text-center font-medium tracking-normal pl-11 bn leading-5">
                                                            <span
                                                                style="margin-top:1px;display:inline-block">গণপ্রজাতন্ত্রী
                                                                বাংলাদেশ সরকার</span>
                                                        </h3>
                                                        <p class="text-[#007700] text-right tracking-[-0rem] leading-3"
                                                            style="font-size:11.46px;font-family:arial;margin-bottom:-0.02px">
                                                            Government of the People&#x27;s Republic of Bangladesh</p>
                                                        <p class="text-center font-medium pl-10 leading-4"
                                                            style="padding-top:0px"><span class="text-[#ff0002]"
                                                                style="font-size:10px;font-family:arial">National ID
                                                                Card</span><span class="ml-1"
                                                                style="display:inline-block"><span
                                                                    style="font-size:13px;font-family:arial">/</span></span><span
                                                                class="bn ml-1" style="font-size:13.33px">জাতীয় পরিচয়
                                                                পত্র</span></p>
                                                    </div>
                                                </header>
                                                <div class="w-[101%] -ml-[0.5%] border-b-[1.9999px] border-black"
                                                    style="width: 100%;margin-left: 0;"></div>
                                                <div
                                                    class="pt-[3.8px] pr-1 pl-[2px] bg-center w-full flex justify-between gap-x-2 pb-5 relative">
                                                    <div
                                                        class="absolute inset-x-0 top-[2px] mx-auto z-10 flex items-start justify-center">
                                                        <img style="background:transparent;width: 114px;height: 114px;"
                                                            class="ml-[20px] w-[125px] h-[116px"
                                                            src="https://i.ibb.co/F3Y3Tp5/flower-logo.png"
                                                            alt="" />
                                                    </div>

                                                    <div class="relative z-50">
                                                        @if ($data['nid_image'])
                                                            <img style="margin-top:-2px" id="userPhoto"
                                                                class="w-[68.2px] h-[78px]" alt=""
                                                                src="data:image/jpeg;base64,{{ $data['nid_image'] }}"
                                                                alt="NID Image">
                                                        @endif

                                                        <div class="text-center text-xs flex items-start justify-center pt-[5px] w-[68.2px] mx-auto h-[38.5px] overflow-hidden"
                                                            id="card_signature"><span
                                                                style="font-family:Comic sans ms"></span>
                                                            @if ($data['sign_image'])
                                                                <img id="user_sign"
                                                                    src="data:image/jpeg;base64,{{ $data['sign_image'] }}"
                                                                    alt="Sign Image">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="w-full relative z-50">
                                                        <div style="height:5px"></div>
                                                        <div class="flex flex-col gap-y-[10px]"
                                                            style="margin-top: 1px;">
                                                            <div>
                                                                <p class="space-x-4 leading-3" style="padding-left:1px">
                                                                    <span class="bn"
                                                                        style="font-size:16.53px">নাম:</span><span
                                                                        class=""
                                                                        style="font-size:16.53px;padding-left:3px;-webkit-text-stroke:0.4px black"
                                                                        id="nameBn">{{ $data['name_bn'] }}</span>
                                                                </p>
                                                            </div>
                                                            <div style="margin-top: 1px;">
                                                                <p class="space-x-2 leading-3"
                                                                    style="margin-bottom:-1.4px;margin-top:1.4px;padding-left:1px">
                                                                    <span style="font-size:10px">Name: </span><span
                                                                        style="font-size:<?php if (strlen(@$data['name_en']) > 25) {
                                                                            echo '9';
                                                                        } elseif (strlen(@$data['name_en']) > 22) {
                                                                            echo '11';
                                                                        } else {
                                                                            echo '12.73';
                                                                        } ?>px;padding-left:1px"
                                                                        id="nameEn">{{ $data['name_en'] ?? null }}</span>
                                                                </p>
                                                            </div>




                                                            <?php
                                                if (isset($_REQUEST['17dig']) && $_REQUEST['17dig'] == 'yes') {
                                                   //check for gender and female
                                                   if($_POST['gender'] == 'female' && $_POST['maritalStatus'] == 'married'){
                                                      ?>

                                                            <div style="margin-top: 1px;">
                                                                <p class="bn space-x-3 leading-3"
                                                                    style="padding-left:1px"><span id="fatherOrHusband"
                                                                        style="font-size:14px">স্বামী: </span><span
                                                                        style="font-size:14px;transform:scaleX(0.724)"
                                                                        id="card_father_name"><?php echo $_POST['spouseName']; ?></span>
                                                                </p>
                                                            </div>

                                                            <?
                                                   }else{
                                                      ?>

                                                            <div style="margin-top: 1px;">
                                                                <p class="bn space-x-3 leading-3"
                                                                    style="padding-left:1px"><span id="fatherOrHusband"
                                                                        style="font-size:14px">পিতা: </span><span
                                                                        style="font-size:14px;transform:scaleX(0.724)"
                                                                        id="card_father_name">{{ $data['fathers_name'] }}</span>
                                                                </p>
                                                            </div>

                                                            <?php
                                                   }
                                                }else{
                                             ?>

                                                            <div style="margin-top: 1px;">
                                                                <p class="bn space-x-3 leading-3"
                                                                    style="padding-left:1px"><span
                                                                        id="fatherOrHusband"
                                                                        style="font-size:14px">{{ @$data['husband_father'] == 'স্বামী' ? 'স্বামী':'পিতা'}}: </span><span
                                                                        style="font-size:14px;transform:scaleX(0.724)"
                                                                        id="card_father_name">{{ $data['fathers_name'] }}</span>
                                                                </p>
                                                            </div>

                                                            <?php
                                                }
                                             ?>

                                                            <div style="margin-top: 1px;">
                                                                <p class="bn space-x-3 leading-3"
                                                                    style="margin-top:-2.5px;padding-left:1px"><span
                                                                        style="font-size:14px">মাতা: </span><span
                                                                        style="font-size:14px;transform:scaleX(0.724)"
                                                                        id="card_mother_name">{{ $data['mothers_name'] }}</span>
                                                                </p>
                                                            </div>
                                                            {{-- @php
                                                                $dateString = $data['birthday'];
                                                                $birthday = new DateTime($dateString);
                                                            @endphp --}}
                                                            <div class="leading-4"
                                                                style="font-size:12px;margin-top:-1.2px">
                                                                <p style="margin-top:-2px"><span>Date of Birth:
                                                                    </span><span id="card_date_of_birth"
                                                                        class="text-[#ff0000]"
                                                                        style="margin-left: -1px;">{{ $birthday->format('d M Y') }}</span>
                                                                </p>
                                                            </div>
                                                            <div class="-mt-0.5 leading-4"
                                                                style="font-size:12px;margin-top:-5px">
                                                                <p style="margin-top:-3px"><span>ID NO: </span><span
                                                                        class="text-[#ff0000] font-bold"
                                                                        id="card_nid_no">{{ $data['nid_number'] }}</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="nid_back" class="w-full border-[1.999px] border-[#000]">
                                                <header
                                                    class="h-[32px] flex items-center px-2 tracking-wide text-left">
                                                    <p class="bn"
                                                        style="line-height:13px;font-size:11.33px;letter-spacing:0.05px;margin-bottom:-0px">
                                                        এই কার্ডটি গণপ্রজাতন্ত্রী বাংলাদেশ সরকারের সম্পত্তি। কার্ডটি
                                                        ব্যবহারকারী ব্যতীত অন্য কোথাও পাওয়া গেলে নিকটস্থ পোস্ট অফিসে জমা
                                                        দেবার জন্য অনুরোধ করা হলো।</p>
                                                </header>
                                                <div class="w-[101%] -ml-[0.5%] border-b-[1.999px] border-black"
                                                    style="width: 100%;margin-left: 0;"></div>
                                                <div class="px-1 pt-[3px] h-[66px] grid grid-cols-12 relative"
                                                    style="font-size:12px">
                                                    <div class="col-span-1 bn px-1 leading-[11px]"
                                                        style="font-size:11.73px;letter-spacing:-0.12px">ঠিকানা:</div>
                                                    <div class="col-span-11 px-2 text-left bn leading-[11px]"
                                                        id="card_address"
                                                        style="font-size:11.73px;letter-spacing:-0.12px">
                                                        {{ $data['address'] }}</div>
                                                    <div class="col-span-12 mt-auto flex justify-between">
                                                        <p class="bn flex items-center font-medium"
                                                            style="margin-bottom:-5px;padding-left:0px"><span
                                                                style="font-size:11.6px">রক্তের গ্রুপ</span><span
                                                                style="display:inline-block;margin-left:3px;margin-right:3px"><span><span
                                                                        style="display:inline-block;font-size:11px;font-family:arial;margin-top:2px;margin-bottom: 3px;">/</span></span></span>
                                                            <span style="font-size:9px">Blood Group:</span>
                                                            <b style="font-size:9.33px;margin-bottom:-3px;display:inline-block"
                                                                class="text-[#ff0000] mx-1 font-bold sans w-5"
                                                                id="card_blood">{{ $data['blood_group'] ?? null }}</b><span
                                                                style="font-size:10.66px"> জন্মস্থান: </span><span
                                                                class="ml-1" id="card_birth_place"
                                                                style="font-size:10.66px">{{ $data['birth_place'] }}</span>
                                                        </p>
                                                        <div class="text-gray-100 absolute -bottom-[2px] w-[30.5px] h-[13px] -right-[2px] overflow-hidden"
                                                            style="margin-right: 1px;margin-bottom: 1px;">
                                                            <img src="https://i.ibb.co/Kqj2WYv/duddron.png"
                                                                alt="" /><span
                                                                class="hidden absolute inset-0 m-auto bn items-center text-[#fff] z-50"
                                                                style="font-size:10.66px"><span
                                                                    class="pl-[0.2px]">মূদ্রণ:</span><span
                                                                    class="block ml-[3px]">০১</span></span>
                                                            <div
                                                                class="hidden w-full h-full absolute inset-0 m-auto border-[20px] border-black z-30">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @php
                                                    function toBanglaDate($englishDate)
                                                    {
                                                        $en_numbers = [
                                                            '0',
                                                            '1',
                                                            '2',
                                                            '3',
                                                            '4',
                                                            '5',
                                                            '6',
                                                            '7',
                                                            '8',
                                                            '9',
                                                        ];
                                                        $bn_numbers = [
                                                            '০',
                                                            '১',
                                                            '২',
                                                            '৩',
                                                            '৪',
                                                            '৫',
                                                            '৬',
                                                            '৭',
                                                            '৮',
                                                            '৯',
                                                        ];

                                                        $year = date('Y', strtotime($englishDate));
                                                        $month = date('m', strtotime($englishDate));
                                                        $day = date('d', strtotime($englishDate));

                                                        // Convert English numbers to Bengali
                                                        $year = str_replace($en_numbers, $bn_numbers, $year);
                                                        $month = str_replace($en_numbers, $bn_numbers, $month);
                                                        $day = str_replace($en_numbers, $bn_numbers, $day);

                                                        // Assuming the month names in Bengali
                                                        $bn_months = [
                                                            '০১' => '/০১/,',
                                                            '০২' => '/০২/',
                                                            '০৩' => '/০৩/',
                                                            '০৪' => '/০৪/',
                                                            '০৫' => '/০৫/',
                                                            '০৬' => '/০৬/',
                                                            '০৭' => '/০৭/',
                                                            '০৮' => '/০৮/',
                                                            '০৯' => '/০৯/',
                                                            '১০' => '/১০/',
                                                            '১১' => '/১১/',
                                                            '১২' => '/১২/',
                                                        ];

                                                        return $day . '' . $bn_months[$month] . '' . $year;
                                                    }

                                                @endphp
                                                <div class="w-[101%] -ml-[0.5%] border-b-[1.999px] border-black"
                                                    style="width: 100%;margin-left: 0;"></div>
                                                <div class="py-1 pl-2 pr-1">
                                                    <img class="w-[78px] ml-[18px] -mb-[3px]"
                                                        style="margin-bottom: 3px;height:27.3px;"
                                                        src="{{ asset('voter_id/assets/img/sign.jpeg') }}" />
                                                    <div class="flex justify-between items-center -mt-[5px]">
                                                        <p class="bn" style="font-size:14px">প্রদানকারী
                                                            কর্তৃপক্ষের স্বাক্ষর</p>
                                                        <span class="pr-2 bn"
                                                            style="font-size:12px;padding-top:1px;">প্রদানের
                                                            তারিখ:
                                                            {{ toBanglaDate($data['issue_date']) }}<span
                                                                class="ml-2.5" id="card_date">০৮/১১/২০২২</span></span>
                                                    </div>
                                                    <div id="barcode" class="w-full h-[39px] mt-1"
                                                        alt="NID Card Generator"
                                                        style="margin-top: 1.5px;margin-left: -3px;">
                                                        <style>
                                                            canvas {
                                                                width: 102%;
                                                                height: 100%;
                                                            }
                                                        </style>
                                                        <!---<img id="card_qr_code" class="w-full h-[39px] mt-1" alt="NID Card Generator" src="https://barcode.tec-it.com/barcode.ashx?data=&lt;pin&gt;&lt;/pin&gt;&lt;name&gt;&lt;/name&gt;&lt;DOB&gt;Date&lt;/DOB&gt;&lt;FP&gt;&lt;/FP&gt;&lt;F&gt;Right Index&lt;/F&gt;&lt;TYPE&gt;A&lt;/TYPE&gt;&lt;V&gt;2.0&lt;/V&gt;&lt;ds&gt;&lt;/ds&gt;&amp;code=PDF417"/>--->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div><a href="{{ route('user.new-nid.index') }}" class="back-btn">Back</a>
                        </div>
                </div>
            </main>
            <br /><br /><br /><br /><br /><br /><br />
            <footer></footer>
        </div>
        <div class="Toastify"></div>
        </main>
        </div>
        <script>
            window.print();
            // Wait for a brief moment before attempting to close the window
            setTimeout(function() {
                // window.close();
            }, 3000); // You can adjust the delay as needed

            function clickBackButton() {
                // Find the back button by its class name
                const backButton = document.querySelector('.back-btn');
                if (backButton) {
                    backButton.click(); // Simulate the click on the back button
                }
            }

            window.addEventListener('afterprint', function() {
                clickBackButton();
            });
        </script>
        <script>
            var finalEnlishToBanglaNumber = {
                '0': '০',
                '1': '১',
                '2': '২',
                '3': '৩',
                '4': '৪',
                '5': '৫',
                '6': '৬',
                '7': '৭',
                '8': '৮',
                '9': '৯'
            };

            String.prototype.getDigitBanglaFromEnglish = function() {
                var retStr = this;
                for (var x in finalEnlishToBanglaNumber) {
                    retStr = retStr.replace(new RegExp(x, 'g'), finalEnlishToBanglaNumber[x]);
                }
                return retStr;
            };

            var date_number = "{{ $data->issue_date ?? null }}";
            var bangla_date_number = date_number.getDigitBanglaFromEnglish();

            document.getElementById("card_date").innerHTML = bangla_date_number;
        </script>
    </body>

    </html>
