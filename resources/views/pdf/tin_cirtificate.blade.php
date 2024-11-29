<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tin Cirtificate - {{ $data['TIN'] }}</title>
    <style>
        button.PrintBtn {
            width: 150px;
            background: #8a00ff;
            padding: 10px;
            font-weight: bold;
            cursor: pointer;
            display: block;
            margin: auto;
            margin-bottom: 100px;
            border-radius: 6px;
            color: #fff;
            font-size: 16px;
        }
    
        @media print {
            .PrintBtn {
                display: none; /* Hide button during print */
            }
        }
    </style>
    
</head>

<body>
    <script type="text/javascript">
        function PrintCertificate() {
            const printButton = document.getElementById('btnPrint');
            const content = document.getElementById('div_final_result');
    
            if (content) {
                // Hide the button before printing
                printButton.style.display = 'none';
                Popup(content.innerHTML);
    
                // Show the button again after printing
                setTimeout(() => {
                    printButton.style.display = 'block';
                }, 1000); // Small delay to ensure button remains hidden during the print operation
            } else {
                console.error('div_final_result not found.');
            }
        }
    
        function Popup(data) {
            const certCssUrl = 'http://secure.incometax.gov.bd:80/Content/TINCert.css';
            const myWindow = window.open('', '_blank', 'height=600,width=800');
    
            if (myWindow) {
                myWindow.document.open();
                myWindow.document.write(`
                    <html>
                        <head>
                            <title>Certificate</title>
                            <link rel="stylesheet" type="text/css" href="${certCssUrl}">
                        </head>
                        <body onload="window.print(); window.close();">
                            ${data}
                        </body>
                    </html>
                `);
                myWindow.document.close();
            } else {
                console.error('Unable to open popup window.');
            }
        }
    </script>
    
    <div class="container">




        <div id="div_success"></div>

        <div id="div_final_result">

            <div class="cert_div">

                <div>
                    <img src="http://secure.incometax.gov.bd:80/Images/tin_cert_back.png"
                        style="position:absolute; z-index: -1; top: 225px; left:200px; height:300px; width:300px;" />



                    <table class="cert_table"
                        style="background-position: center center; border-style: solid; border-color: Black; border-width: 1px; font-size:medium;">
                        <tr>
                            <td>
                                <table class="cert_table"
                                    style="background-position: center center; border-style: solid; border-color: Black; border-width: 2px; font-size:medium;">
                                    <tr>
                                        <td>
                                            <table class="cert_table"
                                                style="background-position: center center; border-style: solid; border-color: Black; border-width: 1px; font-size:medium;">
                                                <tr>
                                                    <td>

                                                        <table class="inner_cert_table"
                                                            style="padding-left:5px; padding-right:5px">


                                                            <tr>
                                                                <td colspan="2" style="text-align: right;">
                                                                    &nbsp;
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" style="text-align: center">
                                                                    <img style="text-align:center"
                                                                        src="http://secure.incometax.gov.bd:80/Images/tin_cert_logo.png"
                                                                        alt="NBR" width="60px; height:60px;" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" style="text-align: center">
                                                                    <span
                                                                        style="font-size: large; font-weight: bold;">Government
                                                                        of the People's Republic
                                                                        of Bangladesh</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" style="text-align: center">
                                                                    <span
                                                                        style="font-size: large; font-weight: bold;">National
                                                                        Board of Revenue</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" style="text-align: center">
                                                                    <span style="font-size: large">Taxpayer's
                                                                        Identification Number (TIN)
                                                                        Certificate</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                </td>
                                                                <td>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                </td>
                                                                <td>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" style="text-align: center;">
                                                                    <span
                                                                        style="font-weight: bold; font-size: large; text-align: center; text-decoration: underline; color: black">
                                                                        TIN : {{ $data['TIN'] }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    &nbsp;<br />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    This is to Certify that <span
                                                                        style="font-weight: bold;">
                                                                        {{ $data['nameEnglish'] }}
                                                                    </span>is a Registered Taxpayer of National
                                                                    Board of Revenue under the jurisdiction
                                                                    of <span
                                                                        style="font-weight: bold;">{{ $data['taxCircle'] }}</span>
                                                                    , Taxes Zone <span
                                                                        style="font-weight: bold;">{{ $data['taxZone'] }}</span>.
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td colspan="2">
                                                                    <span style="font-weight: bold;">Taxpayer's
                                                                        Particulars : </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    1) Name : <span
                                                                        style="font-weight: bold;">{{ $data['nameEnglish'] }}</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    2) Father's Name : <span
                                                                        style="font-weight: bold;">{{ $data['fatherNameEn'] }}</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    3) Mother's Name : <span
                                                                        style="font-weight: bold;">{{ $data['motherNameEn'] }}</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    4.a) Current Address : <span
                                                                        style="font-weight: bold;">{{ $data['presentAddress'] }}</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    4.b) Permanent Address : <span
                                                                        style="font-weight: bold;">{{ $data['permanentAddress'] }}</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    5) Previous TIN : <span
                                                                        style="font-weight: bold;">{{ $data['previousTIN'] }}</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    6) Status : <span
                                                                        style="font-weight: bold;">{{ $data['status'] }}</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <br /><br />
                                                                </td>
                                                            </tr>



                                                            <tr>
                                                                <td colspan="2">
                                                                    {{ $data['date'] }}
                                                                </td>
                                                            </tr>


                                                            <tr>
                                                                <td colspan="2">
                                                                    <table width="100%">
                                                                        <tr>
                                                                            <td
                                                                                style="width: 30%; vertical-align: top;">
                                                                                <table
                                                                                    style="width: 200px; vertical-align: top; text-align: left;">
                                                                                    <tr>
                                                                                        <td colspan="2">
                                                                                            <span
                                                                                                style="font-weight: bold; text-align: left; text-decoration: underline;">Please
                                                                                                Note:</span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="width: 10px;">
                                                                                        </td>
                                                                                        <td>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr
                                                                                        style="text-align: left; font-size: x-small;">
                                                                                        <td
                                                                                            style="width: 10px; vertical-align: top;">
                                                                                            1.
                                                                                        </td>
                                                                                        <td>
                                                                                            A Taxpayer is liable to
                                                                                            file the Return of
                                                                                            Income under section 166
                                                                                            of the Income Tax Act,
                                                                                            2023.
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr
                                                                                        style="text-align: left; font-size: x-small;">
                                                                                        <td
                                                                                            style="width: 10px; vertical-align: top;">
                                                                                            2.
                                                                                        </td>
                                                                                        <td>
                                                                                            Failure to file Return
                                                                                            of Income under Section
                                                                                            166 is liable to-
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr
                                                                                        style="text-align: left; font-size: x-small;">
                                                                                        <td
                                                                                            style="width: 10px; vertical-align: top;">
                                                                                        </td>
                                                                                        <td>
                                                                                            (a) Penalty under
                                                                                            section 266; and
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr
                                                                                        style="text-align: left; font-size: x-small;">
                                                                                        <td
                                                                                            style="width: 10px; vertical-align: top;">
                                                                                        </td>
                                                                                        <td>
                                                                                            (b) Prosecution under
                                                                                            section 311 of the
                                                                                            Income Tax Act, 2023.
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>

                                                                            </td>
                                                                            <td style="text-align: center; width: 40%;">
                                                                                <img src="{{ $data['QR'] }}"
                                                                                    height="150px;" width="150px;"
                                                                                    alt="QR Code"
                                                                                    style="text-align:center;" />
                                                                            </td>
                                                                            <td
                                                                                style="text-align: left; width: 30%; vertical-align: top;">
                                                                                <span
                                                                                    style="text-align: left; font-size: x-small;">
                                                                                    <span
                                                                                        style="font-weight: bold">Deputy
                                                                                        Commissioner
                                                                                        of Taxes </span>
                                                                                    <br />
                                                                                    {{ $data['taxCircle'] }}
                                                                                    <br />
                                                                                    Taxes Zone
                                                                                    {{ $data['taxZone'] }}
                                                                                    <br />
                                                                                    Address :
                                                                                    {{ $data['zoneAddress'] }}
                                                                                    Phone :
                                                                                    {{ $data['zonePhone'] }}
                                                                                </span>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                </td>
                                                                <td>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    &nbsp;<br />
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td colspan="2" style="text-align: center">
                                                                    <span
                                                                        style="text-align: center; text-decoration: underline; font-size: x-small;">N.
                                                                        B: This is a system generated certificate
                                                                        and requires no manual signature.
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" style="text-align: center">
                                                                    &nbsp;
                                                                </td>
                                                            </tr>

                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
            <br />

            <div class="before_footer" id="div_print_command">
                <button class="PrintBtn" type="button" id="btnPrint" name="btnPrint"
                    onclick="PrintCertificate()" >Print Certificate</button> 
            </div>
            </form>



        </div>
        <br />





        <title>{{ $data['TIN'] }}<title>

    </div>
    
</body>



</html>
