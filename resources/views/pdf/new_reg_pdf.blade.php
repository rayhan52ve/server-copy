<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
        });
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey) {
                e.preventDefault();
            }
        });
    </script>
    <title>Birth Registration - {{ $data['birthNo'] }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.min.css"
        integrity="sha512-NZ19NrT58XPK5sXqXnnvtf9T5kLXSzGQlVZL9taZWeTBtXoN3xIfTdxbkQh6QSoJfJgpojRqMfhyqBAAEeiXcA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('birth/birth1.css') }}">
    <link rel="stylesheet" href="{{ asset('birth/birth2.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=REM:wght@100;200;300;400;500;600;700;800;900&family=Roboto+Slab&display=swap"
        rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=REM:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500&display=swap"
        rel="stylesheet">
    <style>
        /* print.css */
        @page {
            margin: 0;
            /* Set the margin to none */
            size: A4;
            /* Set the page size to A4 */
        }

        .a4_page {
        width: 210mm;
        /* Set width to A4 width */
        height: 297mm;
        /* Set height to A4 height */
        overflow: hidden;
        /* Hide overflow content */
        page-break-inside: avoid;
        /* Avoid page breaks inside elements */
    }
    </style>
</head>

<body>
    <div class="a4_page" id="a4_page">
        <div class="main_wrapper">
            <img src="{{ asset('birth/ri_1.png') }}" class="main_logo" alt="">
            <span style="z-index: 10;">
                <div class="mr_header">
                    <div class="left_part_hidden"></div>
                    <div class="left_part">
                        <img style="height:110px; width:110px;"
                            src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://bdris.gov.bd/certificate/verify?key=9129hNa05dUx6cP5h5S4yZmhnXeei7Sz219AXSsFfCIvmM4uS64mfo6fIFiyyIo1"
                            alt="">
                        <h2><?php echo $data['verify']; ?></h2>
                    </div>
                    <div class="middle_part">
                        <img src="{{ asset('birth/bd_logo.png') }}" alt="" class="main_logo_r">
                        <img src="{{ asset('birth/bd_logo.png') }}" alt="" style="opacity: 0;">
                        <h2>Government of the People’s Republic of Bangladesh</h2>
                        <p class="office">Office of the Registrar, Birth and Death Registration</p>
                        <p class="address1"><?php echo $data['upazila']; ?></p>
                        <p class="address2"><?php echo $data['regOff']; ?></p>
                        <p class="rule_y">(Rule 9, 10)</p>
                        <h1><span class="bn">জন্ম নিবন্ধন সনদ /</span> <span class="en"
                                style="font-family: 'Roboto Slab', serif;">Birth Registration Certificate</span></h1>
                    </div>
                    <div class="right_part_hidden"></div>
                    <div class="right_part">
                        <canvas style="height: 26px; width:220px;" id="barcode"></canvas>
                    </div>
                </div>

                <div class="mr_body">
                    <div class="top_part1">
                        <div class="left">
                            <p>Date of Registration</p>
                            <p><?php echo $data['regDate']; ?></p>
                        </div>
                        <div class="middle">
                            <h2>Birth Registration Number</h2>
                            <h1 style="font-weight:500 !important;"><?php echo $data['birthNo']; ?></h1>
                        </div>
                        <div class="right">
                            <p>Date of Issuance</p>
                            <p><?php echo $data['issuteDate']; ?></p>
                        </div>
                    </div>


                    <div class="middle">


                        <div style="margin-top: 2px;margin-bottom: 5px;" class="new_td_2">
                            <div class="left">
                                <div class="part1">
                                    <p class="bn">Date of Birth<span style="margin-left: 39px;"
                                            class="clone">:</span></p>
                                </div>
                                <div class="part2">
                                    <p><span  class="bn"><?php echo $data['dob']; ?></span></p>
                                </div>
                            </div>
                            <div class="right">
                                <div class="part1">
                                    <p><span style="margin-left: 95px;" class="clone">Sex :</span></p>
                                </div>
                                <div class="part2">
                                    <p><span><?php echo $data['sex']; ?></span></p>
                                </div>
                            </div>
                        </div>


                        <div style="margin-top: 5px;margin-bottom: 24px !important;" class="td">
                            <div class="left">
                                <div style="width: 126px;" class="part1">
                                    <p>In Word <span>:</span></p>
                                </div>
                                <div class="part2" style="width: 400px;">

                                    <p><span style="margin-left:5px"> <?php echo $data['wdob']; ?>  </span></p>
                                </div>
                            </div>
                        </div>

                        <div style="margin-top: 7px;" class="new_td">
                            <div class="left">
                                <div class="part1">
                                    <p class="bn">নাম<span style="margin-left: 100px;" class="clone">:</span></p>
                                </div>
                                <div class="part2" id="name_data_bn">
                                    <p><span class="bn"><?php echo $data['name']; ?></span></p>
                                </div>
                            </div>
                            <div class="right">
                                <div class="part1">
                                    <p style="font-weight:500">Name<span style="margin-left: 95px;"
                                            class="clone">:</span></p>
                                </div>
                                <div class="part2">
                                    <p><span style="font-weight:500"><?php echo $data['nameEn']; ?></span></p>
                                </div>
                            </div>
                        </div>

                        <div id="mother_content" style="margin-top: 17px;" class="new_td">
                            <div class="left">
                                <div class="part1">
                                    <p class="bn">মাতা<span style="margin-left: 94px;" class="clone">:</span>
                                    </p>
                                </div>
                                <div class="part2" id="motherName_data_bn">
                                    <p><span class="bn"><?php echo $data['motherName']; ?></span></p>
                                </div>
                            </div>
                            <div class="right">
                                <div class="part1">
                                    <p style="font-weight:500;">Mother<span style="margin-left: 87px;"
                                            class="clone">:</span></p>
                                </div>
                                <div class="part2">
                                    <p><span
                                            style="font-weight:500;text-transform:capitalize;"><?php echo $data['motherNameEn']; ?></span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div id="motherNanality_content" style="margin-top: 17px;" class="new_td">
                            <div class="left">
                                <div class="part1">
                                    <p class="bn">মাতার জাতীয়তা<span style="margin-left: 33px;"
                                            class="clone">:</span></p>
                                </div>
                                <div class="part2">
                                    <p><span class="bn"><?php echo $data['motherNational']; ?></span></p>
                                </div>
                            </div>
                            <div class="right">
                                <div class="part1">
                                    <p style="font-weight:500">Nationality<span style="margin-left: 64px;"
                                            class="clone">:</span></p>
                                </div>
                                <div class="part2">
                                    <p><span style="font-weight:500"><?php echo $data['motherNationalEn']; ?></span></p>
                                </div>
                            </div>
                        </div>

                        <div style="margin-top: 16px;" class="new_td">
                            <div class="left">
                                <div class="part1">
                                    <p class="bn">পিতা<span style="margin-left: 94px;" class="clone">:</span>
                                    </p>
                                </div>
                                <div class="part2" id="fatherName_data_bn">
                                    <p><span class="bn"><?php echo $data['fatherName']; ?></span></p>
                                </div>
                            </div>
                            <div class="right">
                                <div class="part1">
                                    <p style="font-weight:500">Father<span style="margin-left: 95px;"
                                            class="clone">:</span></p>
                                </div>
                                <div class="part2">
                                    <p><span
                                            style="font-weight:500;text-transform:capitalize;"><?php echo $data['fatherNameEn']; ?></span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div id="fatherNanality_content" style="margin-top: 17px;" class="new_td">
                            <div class="left">
                                <div class="part1">
                                    <p class="bn">পিতার জাতীয়তা<span style="margin-left: 33px;"
                                            class="clone">:</span></p>
                                </div>
                                <div class="part2">
                                    <p><span class="bn"><?php echo $data['fatherNational']; ?></span></p>
                                </div>
                            </div>
                            <div class="right">
                                <div class="part1">
                                    <p style="font-weight:500">Nationality<span style="margin-left: 65px;"
                                            class="clone">:</span></p>
                                </div>
                                <div class="part2">
                                    <p><span style="font-weight:500"><?php echo $data['fatherNationalEn']; ?></span></p>
                                </div>
                            </div>
                        </div>

                        <div style="margin-top: 17px;" class="new_td">
                            <div class="left">
                                <div class="part1">
                                    <p class="bn">জন্মস্থান<span style="margin-left: 78px;"
                                            class="clone">:</span></p>
                                </div>
                                <div class="part2">
                                    <p><span class="bn"><?php echo $data['birthPlace']; ?></span></p>
                                </div>
                            </div>
                            <div class="right">
                                <div class="part1">
                                    <p style="width: 153px; font-weight:500">Place of Birth<span
                                            style="margin-left: 46px;margin-right: 0;" class="clone">:</span></p>
                                </div>
                                <div class="part2">
                                    <p><span
                                            style="font-weight:500;text-transform:capitalize;"><?php echo $data['birthPlaceEn']; ?></span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div style="margin-top: 30px;" class="new_td">
                            <div class="left">
                                <div class="part1">
                                    <p style="width: 146px;" class="bn">স্থায়ী ঠিকানা<span
                                            style="margin-left:53px;margin-right: 0;" class="clone">:</span></p>
                                </div>
                                <div class="part2">
                                    <p><span class="bn"><?php echo $data['permanentAddr']; ?></span></p>
                                </div>
                            </div>
                            <div class="right">
                                <div class="part1">
                                    <p style="display:flex; width:154px; font-weight:500">Permanent<br>Address<span
                                            style="margin-left: 64px;" class="clone">:</span></p>
                                </div>
                                <div class="part2">
                                    <p><span style="font-weight:500"><?php echo $data['permanentAddrEn']; ?></span></p>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </span>

            <div class="mr_footer">
                <div class="top">
                    <div class="left">
                        <h2 style="width:10rem; margin-top: 0px;">Seal & Signature</h2>
                        <p style="margin-top: 0px;">Assistant to Registrar</p>
                        <p style="margin-top: 0px;">(Preparation, Verification)</p>
                    </div>
                    <div class="right">
                        <h2 style="width:10rem">Seal & Signature<h2>
                                <p>Registrar</p>
                    </div>
                </div>
                <div style="margin-top:8rem"class="bottom">
                    <p>This certificate is generated from bdris.gov.bd, and to verify this certificate, please scan the
                        above QR Code & Bar Code.</p>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
    <script>
        let dob_n = "<?php echo $data['birthNo']; ?>";
        JsBarcode("#barcode", dob_n, {
            format: "CODE128",
            displayValue: false,
        });
    </script>
    <script>
        // Function to generate and download the PDF
        function generatePDF() {
            const pdf = new jsPDF();

            // Add content to the PDF (you can customize this part)
            pdf.text(20, 20, 'Hello, this is your PDF content.');

            // Save the PDF with a specific name, e.g., "certificate.pdf"
            pdf.save('certificate.pdf');
        }

        // Attach an event listener to the button
        document.getElementById('downloadPDF').addEventListener('click', generatePDF);
    </script>

    <script>
        window.print();
    </script>

    {{-- <script>
        window.addEventListener('click', function() {
            window.print()
        });

        $data['(document).ready(function() {
                var elementWidth = $data['('
                        #name_data_bn ').height();
                        if (Number(Math.floor(elementWidth)) > 23) {
                            $data['('
                                #mother_content ').css("margin-top", "0px");
                            }

                            var elementWidth = $data['('
                                    #motherName_data_bn ').height();
                                    if (Number(Math.floor(elementWidth)) > 23) {
                                        $data['('
                                            #motherNanality_content ').css("margin-top", "0px");
                                        }

                                        var elementWidth = $data['('
                                            #fatherName_data_bn ').height();
                                            if (Number(Math.floor(elementWidth)) > 23) {
                                                $data['('
                                                    #fatherNanality_content ').css("margin-top", "0px");
                                                }
                                            });
    </script> --}}


</body>

</html>
