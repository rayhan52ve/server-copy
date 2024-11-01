

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ServerCopy - {{ $nid_info['nationalId'] }}</title>
    <style>
            * {
            margin: 0;
            padding: 0;

        }

        .container {
            position: relative;
        }

        .bgImg {
            width: 210mm;
            height: 297mm;
        }

        .avatar {
            width: 130px;
            height: 151px;
            position: absolute;
            top: 187px;
            left: 333px;
            background: red;
            border-radius: 16px;
        }

        p {
            font-size: 15px;
        }

        p.inLeft {
            position: absolute;
            left: 110px;
            opacity: 0.9;
        }

        p.relagionKey.inLeft {
            top: 790px;
        }

        p.mobileKey.inLeft {
            top: 817px;
        }
        
        p.vote.inLeft {
            top: 456px;
        }
        
        p.none.inLeft {
            top: 484px;
        }



        p.inRight {
            max-height: 0.393in;
            max-width: 6.33in;
        }

        .inRight {
            position: absolute;
            left: 264px;
        }

        p.nid.inRight {
            top: 400px;
        }

        p.pin.inRight {
            top: 428px;
        }
        
        p.vno.inRight {
            top: 456px;
        }
        
        p.mobile.inRight {
            top: 484px;
        }

        p.vArea.inRight {
            top: 510px;
        }

        p.nameBn.inRight {
            top: 567px;
            font-weight: bold;
        }

        p.nameEn.inRight {
            top: 595px;
        }

        p.dob.inRight {
            top: 623px;
        }

        p.fName.inRight {
            top: 649px;
        }

        p.mName.inRight {
            top: 677px;
        }

        p.husWif.inRight {
            top: 703px;
        }

        p.gender.inRight {
            top: 762px;
        }

        p.phone.inRight {
            top: 819px;
        }

        p.relagion.inRight {
            top: 791px;
        }

        p.birthPlace.inRight {
            top: 845px;
        }

        p.address {
            max-width: 575px;
            position: absolute;

            left: 110px;
            font-size: 12px;
            line-height: 18px;
        }

        .presentAddr {
            top: 902px;
        }

        .permanentAddr {
            top: 975px;
        }

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
            @page {
                size: A4;
                /* Set the page size to 'auto' to match the content size */
                margin: 0;
                /* Set margin to 0 to remove header and footer */
            }

            button.PrintBtn {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <img class="bgImg" src="https://raw.githubusercontent.com/RayhanOfficial/RayhanOfficial/master/bgn2.jpg" alt="">

        <img src="{{ @$nid_info['photo'] }}" alt="" class="avatar">
        {{-- <img src="data:image/jpeg;base64,{{ @$nid_info['photoBase64'] }}" alt="" class="avatar"> --}}
        <!-- Rest of your HTML structure -->
        <!-- Replace the placeholders with PHP variables -->
        <p class="relagionKey inLeft">ধর্ম</p>
        <p class="mobileKey inLeft">রক্তের গ্রুপ</p>
        <p class="vote inLeft">ভোটার নম্বর</p>
        <p class="none inLeft">পেশা</p>
        <p class="nid inRight">{{ $nid_info['nationalId'] }}</p>
        <p class="pin inRight">{{ $nid_info['pin'] ?? null }}</p>
        <p class="vno inRight">{{ $nid_info['voter_no'] ?? null}}</p>
        <p class="mobile inRight"></p>
        <p class="vArea inRight">{{ $nid_info['voterArea'] ?? null }}</p>
        <p class="nameBn inRight">{{ $nid_info['name'] }}</p>
        <p class="nameEn inRight">{{ $nid_info['nameEn'] }}</p>
        <p class="dob inRight">{{ $nid_info['dateOfBirth'] }}</p>
        <p class="fName inRight">{{ $nid_info['father'] }}</p>
        <p class="mName inRight">{{ $nid_info['mother'] }}</p>
        <p class="husWif inRight">{{ $nid_info['spouse'] ?? null }}</p>
        <p class="gender inRight">{{ $nid_info['gender'] ?? null }}</p>
        <p class="relagion inRight">{{ $nid_info['religion'] ?? null }}</p>
        <p class="phone inRight">{{ $nid_info['bloodGroup'] ?? null }}</p>
        <p class="birthPlace inRight">{{ $nid_info['birthPlace'] ?? null}}</p>
        <p class="address presentAddr">{{ $presentAddress ?? $nid_info['presentAddress'] }}</p>
        <p class="address permanentAddr">{{ $permanentAddress ?? $nid_info['permanentAddress'] }}</p>
    </div>
    <button class="PrintBtn" onclick="window.print()">Print</button>
</body>

</html> 