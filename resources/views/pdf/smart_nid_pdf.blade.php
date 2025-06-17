 @php
     @$nid = $data['nid_number'];
     $formatted_nid = substr(@$nid, 0, 3) . ' ' . substr(@$nid, 3, 3) . ' ' . substr(@$nid, 6);
     $nameBn = $data['name_bn'];
     $nameEnglish = strtoupper($data['name_en']);
     $nameEn = strtoupper($data['name_en']);
     $nameEn = preg_replace('/[^a-zA-Z\s]/', '', $nameEn);
     $nameEn = str_replace('.', '', $nameEn);
     $pin = $data['pin'];
     $dob = $data['birthday'];
     $birthPlace = $data['birth_place_en'];
     $father = $data['fathers_name'];
     $mother = $data['mothers_name'];
     $gender = strtolower($data['gender'] ?? 'male');
     $shortGender = ($gender ?? '') === 'male' ? 'M' : 'F';
     @$bloodGroup = $data['blood_group'];
     $user_photo = $data['nid_image'];
     $user_sign = $data['sign_image'];
     $address = 'ঠিকানা: ' . $data['address'];
     $issueDate = $data['issue_date'];

     function processNameWithIcons($nameEn)
     {
         // Split the name into words
         $words = explode(' ', $nameEn);
         $totalSlots = 30; // Total number of slots (letters or images)
         $output = '';

         // Templates for HTML
         $letterDivTemplate = '<div class="f_line_icon for_last%s">%s</div>';
         $imageDivTemplate = '<div class="f_line_icon for_last"><img src="' . asset('smart/img/smart_card_back_icon.png') . '"/></div>';
        //  $imageDivTemplate = '<div class="f_line_icon for_last"><img src="{{asset(\'smart/img/smart_card_back_icon.png\')}}"/></div>';

         // Rearrange the words: Always move the last word to the front
         if (count($words) > 1) {
             $lastWord = array_pop($words); // Remove the last word
             array_unshift($words, $lastWord); // Add it to the beginning
         }

         // Join the rearranged words and calculate total characters
         $allChars = implode('', $words);
         $charCount = strlen($allChars);

         // Prepare the character array
         $characters = [];
         if ($charCount >= $totalSlots) {
             // Truncate to fit exactly 30 slots
             $characters = array_slice(str_split($allChars), 0, $totalSlots);
         } else {
             // Distribute letters and images evenly
             $remainingSlots = $totalSlots - $charCount;
             $imagesBetween = count($words) - 1; // Images between words
             $imagesToAdd = max(0, $remainingSlots - $imagesBetween);

             foreach ($words as $index => $word) {
                 $characters = array_merge($characters, str_split($word));
                 if ($index < count($words) - 1) {
                     // Add a single image between words
                     $characters[] = 'image';
                 }
             }

             // Add remaining images at the end
             $characters = array_merge($characters, array_fill(0, $imagesToAdd, 'image'));
         }

         // Generate the HTML output
         foreach ($characters as $char) {
             if ($char === 'image') {
                 $output .= $imageDivTemplate;
             } else {
                 $class = $char === 'I' ? ' i_letters' : ''; // Add specific class for 'I'
                 $output .= sprintf($letterDivTemplate, $class, $char);
             }
         }

         return $output;
     }
 @endphp

 <html lang="en">

 <head>
     <title><?php echo 'smart_nid_' . @$nid; ?></title>
     <meta charSet="utf-8" />
     <style>
         @page {
             size: letter;
             margin: 0;
         }

         .f_line_icon.for_last,
         .f_line_icon {
             font-family: "Roboto Mono", serif;
         }
     </style>
     <meta name="viewport" content="initial-scale=1.0, width=device-width" />
     <meta name="next-head-count" content="3" />
     </style>
     <link rel="stylesheet" href="{{asset('smart/css/nid_css.css')}}" />
     <link rel="stylesheet" href="{{asset('smart/css/e521caf613e4ad87.css')}}" data-n-g="" />
     <link rel="stylesheet" href="{{asset('smart/css/card_testss.php')}}" data-n-g="" />
     <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link
         href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto+Slab:wght@100..900&display=swap"
         rel="stylesheet">
     <style>
         @media print,
         screen and (max-width: 990px) {
             #nid_wrapper {
                 transform: scale(1);
             }
         }


         img#overflow_img {
             left: 1.7px;
         }
     </style>
    <style>
        @import url('https://fonts.maateen.me/adorsho-lipi/font.css');

        li {
            font-family: 'AdorshoLipi', sans-serif !important;
        }

        .adorsho {
            font-family: 'AdorshoLipi', sans-serif !important;
            font-weight: normal !important;
            text-shadow: 0 0 1px black;        }
    </style>
 </head>
 <style>
    /* Corrected @font-face declarations */
    @font-face {
        font-family: 'Cambria Math';
        src: url('{{ asset("smart/font/cambria-math.woff") }}') format('woff');
        font-weight: normal;
        font-style: normal;
    }

    @font-face {
        font-family: 'TonnyBanglaMJ';
        src: url('{{ asset("smart/font/TonnyBanglaMJ-Bold.woff") }}') format('woff');
        font-weight: bold;
        font-style: normal;
    }

    @font-face {
        font-family: 'TonnyBanglaMJ';
        src: url('{{ asset("smart/font/TonnyBanglaMJ-Regular.woff") }}') format('woff');
        font-weight: normal;
        font-style: normal;
    }
</style>
 {{-- <style>
     /* Font install */
     @font-face {
         font-family: 'Cambria Math';
         src: url('/public/smart/font/cambria-math.woff') format('woff');
         font-weight: normal;
         font-style: normal;
     }

     @font-face {
         font-family: 'TonnyBanglaMJ';
         src: url('/public/smart/font/TonnyBanglaMJ-Bold.woff') format('woff');
         font-weight: bold;
         font-style: normal;
     }

     @font-face {
         font-family: 'TonnyBanglaMJ';
         src: url('/public/smart/font/TonnyBanglaMJ-Regular.woff') format('woff');
         font-weight: normal;
         font-style: normal;
     }

     span.result_one.bloodGroup {
         position: fixed;
         width: 100%;
         top: -1.5px;
         left: 37px;

     }

     .f_line_icon {
         transform: scaleY(1.1);
     }
 </style> --}}

 <body id="design" style="background: white; color: black!important">




     <div id="__next" data-reactroot="" style="width: 800px">
         <div class="flex" style="  padding-left:70px;padding-right:70px;">
             <div id="front_side" class="id_side" style="display: inline-block;">
                 <div id="font_text" class="absolute">
                     <div class="nameBan title  font_family adorsho"><?php echo ('নাম'); ?></div>
                     <div class="nameBan main_text font_family"><?php echo $nameBn; ?></div>
                     <div class="nameEn title  ">Name</div>
                     <div class="nameEn main_text "><?php echo $nameEnglish; ?></div>
                     <div class="fatherName title  font_family adorsho"><?php echo ('পিতা'); ?></div>
                     <div class="fatherName main_text font_family"><?php echo $father; ?></div>
                     <div class="motherName title  font_family adorsho"><?php echo ('মাতা'); ?></div>
                     <div class="motherName main_text font_family"><?php echo $mother; ?></div>
                     <div class="dateOfBirth">
                         <div class="date_title en_title">Date Of Birth</div>
                         <div class="date_number en_title">{{ \Carbon\Carbon::parse($dob)->format('d M Y') }}</div>
                     </div>
                     <div class="nid">
                         <div class="nid_title en_title">NID No.</div>
                         <div class="nid_number en_title"><?php echo $formatted_nid; ?></div>
                     </div>
                 </div>
                 <img class="test_img" src="{{asset('smart/test.svg')}}" alt="">
                 <div id="user_img">
                     <img class="user_img" src="<?php echo $user_photo; ?>" alt="">
                     <img id="user_img" class="user_img" src="<?php echo $user_photo; ?>" alt="">
                     <div class="overflow_dob"><?php echo $dob; ?></div>


                 </div>
                 <div id="sing_img_div">
                     <img id="sign_img" class="sign_img" src="<?php echo $user_sign; ?>" alt="">
                 </div>
                 <div id="front_img">
                     <img id="overflow_img" src="{{asset('smart/overflow.svg')}}" alt="">
                     <img class="side_img" src="{{asset('smart/fronts.svg')}}" alt="">

                 </div>

             </div>
             <div id="back_side" class="id_side" style="display: inline-block;">
                 <img id="user_img_two" class="user_img" src="<?php echo $user_photo; ?>" alt="">
                 <div id="back_img">
                     <img class="side_img" src="{{asset('smart/back.svg')}}" alt="">
                     <img class="overflow_back" src="{{asset('smart/overflow_back.svg')}}" alt="">
                     <div class="address" style="font-size: 
     <?php
     if (mb_strlen($address, 'UTF-8') > 235) {
         echo '8px; line-height: 8.5px';
     } elseif (mb_strlen($address, 'UTF-8') > 170) {
         echo '9px; line-height: 9px';
     } else {
         echo '10px!important; line-height: 10px';
     }
     ?>;">
                         <?php echo $address; ?>
                     </div>

                     <div class="back_text_one">
                         <span class="fist_line_one back_line_one" style="top: 2.5px!important"> Blood Group: <span
                                 class="result_one bloodGroup"><?php echo $bloodGroup; ?></span></span>
                         <span class="second_line_one back_line_one">Place of Birth: <span
                                 class="result_one place_of_birth"><?php echo $birthPlace; ?></span></span>
                         <span class="third_line_one back_line_one">Issue Date: <span
                                 class="result_one date_of_issue">{{ \Carbon\Carbon::parse($issueDate)->format('d M Y') }}</span></span>
                     </div>
                     <div class="back_text">
                         <div class="first_line back_line">
                             <div class="f_line_icon">I</div>
                             <div class="f_line_icon"><img src="{{asset('smart/img/smart_card_back_icon.png')}}" /></div>
                             <div class="f_line_icon">B</div>
                             <div class="f_line_icon">G</div>
                             <div class="f_line_icon">D</div>
                             <div class="f_line_icon"><?php echo @$nid[0]; ?></div>
                             <div class="f_line_icon"><?php echo @$nid[1]; ?></div>
                             <div class="f_line_icon"><?php echo @$nid[2]; ?></div>
                             <div class="f_line_icon"><?php echo @$nid[3]; ?></div>
                             <div class="f_line_icon"><?php echo @$nid[4]; ?></div>
                             <div class="f_line_icon"><?php echo @$nid[5]; ?></div>
                             <div class="f_line_icon"><?php echo @$nid[6]; ?></div>
                             <div class="f_line_icon"><?php echo @$nid[7]; ?></div>
                             <div class="f_line_icon"><?php echo @$nid[8]; ?></div>
                             <div class="f_line_icon"><img src="{{asset('smart/img/smart_card_back_icon.png')}}" /></div>
                             <div class="f_line_icon"><?php echo @$nid[9]; ?></div>
                             <div class="f_line_icon"><?php echo rand(0, 9); ?></div>
                             <?php for ($i = 1; $i <= 13; $i++) { ?>
                             <div class="f_line_icon"><img src="{{asset('smart/img/smart_card_back_icon.png')}}" /></div>
                             <?php } ?>
                         </div>
                         <div class="second_line back_line">
                             <div class="f_line_icon"><?php echo rand(0, 9); ?></div>
                             <div class="f_line_icon"><?php echo rand(0, 9); ?></div>
                             <div class="f_line_icon"><?php echo rand(0, 9); ?></div>
                             <div class="f_line_icon"><?php echo rand(0, 9); ?></div>
                             <div class="f_line_icon"><?php echo rand(0, 9); ?></div>
                             <div class="f_line_icon"><?php echo rand(0, 9); ?></div>
                             <div class="f_line_icon"><?php echo rand(0, 9); ?></div>
                             <div class="f_line_icon"><?php echo $shortGender; ?></div>
                             <div class="f_line_icon"><?php echo rand(0, 9); ?></div>
                             <div class="f_line_icon"><?php echo rand(0, 9); ?></div>
                             <div class="f_line_icon"><?php echo rand(0, 9); ?></div>
                             <div class="f_line_icon"><?php echo rand(0, 9); ?></div>
                             <div class="f_line_icon"><?php echo rand(0, 9); ?></div>
                             <div class="f_line_icon"><?php echo rand(0, 9); ?></div>
                             <div class="f_line_icon"><?php echo rand(0, 9); ?></div>
                             <div class="f_line_icon">B</div>
                             <div class="f_line_icon">G</div>
                             <div class="f_line_icon">D</div>
                             <?php for ($i = 1; $i <= 11; $i++) { ?>
                             <div class="f_line_icon"><img src="{{asset('smart/img/smart_card_back_icon.png')}}" /></div>
                             <?php } ?>
                             <div class="f_line_icon"><?php echo rand(0, 9); ?></div>

                         </div>
                         <div class="third_line back_line">
                             <?php echo processNameWithIcons($nameEn); ?>
                         </div>
                     </div>
                     <div
                         style="position: absolute;top: 13px;left: 20px; transform: rotate(180deg); width: 290px; height: 38px">
                         <canvas id="barcode"></canvas>
                         <style>
                             canvas {
                                 width: 100%;
                                 height: 100%;
                             }
                         </style>
                     </div>
                 </div>
             </div>
         </div>

     </div>

     <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bwip-js/4.5.2/bwip-js-min.js"></script>  -->

     <script src="{{asset('smart/js/bwip-js-min.js')}}"></script>
     <script>
         var hub3_code =
             `<pin><?php echo $pin; ?></pin><name><?php echo urlencode($nameEn); ?></name><DOB><?php echo $dob; ?></DOB><FP></FP><F>Right Index</F><TYPE><?php echo $bloodGroup; ?></TYPE><V>2.0</V><ds>302d02150094b24c767848fa<?php echo bin2hex(random_bytes(35)); ?></ds>`;

         const canvas = document.getElementById("barcode");
         const ctx = canvas.getContext("2d");

         // Recommended dimensions
         canvas.width = 300;
         canvas.height = 60;

         try {
             bwipjs.toCanvas(canvas, {
                 bcid: "pdf417",
                 text: hub3_code,
                 scale: 2,
                 columns: 13,
                 eclevel: 5,
                 rowheight: 4, // Control row spacing (1-10)
                 paddingwidth: 0, // Minimum required horizontal quiet zone
                 paddingheight: 0, // No vertical quiet zone
                 includetext: false
             });

             // Optional: Post-processing to enhance edges
             ctx.imageSmoothingEnabled = false;
             ctx.drawImage(canvas, 0, 0);
         } catch (e) {
             console.error("Error:", e);
         }
     </script>
     <div class="hidden_when_print">
         <label for="topRange"> সিগনেচার উপর নিচঃ </label>
         <input type="range" id="topRange" min="100" max="190" value="175"
             oninput="applyStyles()" />
         <span id="topValueLabel">172</span>

         <br />

         <label for="paddingRange">Padding (px):</label>
         <input type="range" id="paddingRange" min="0" max="25" value="0"
             oninput="applyStyles()" />
         <span id="paddingValueLabel">5</span>

         <br />

         <label for="scaleRange">Zoom (Scale):</label>
         <input type="range" id="scaleRange" min="0.5" max="2" step="0.1" value="1"
             oninput="applyStyles()" />
         <span id="scaleValueLabel">1</span>

         <br />

         <button style="color: white; background: orange" onclick="rotateImage()">সিগনেচার ঘুরান</button>
         <button onclick="window.print()">প্রিন্ট করুন</button>
     </div>



     </main>
     </div>
 </body>

 <script>
     let rotationAngle = 0; // Initial rotation angle

     function rotateImage() {
         rotationAngle += 90; // Rotate by 90 degrees
         document.getElementById("sign_img").style.transform =
             `rotate(${rotationAngle}deg) scale(${document.getElementById('scaleRange').value})`;
     }

     function applyStyles() {
         // Get the slider values
         const topValue = document.getElementById('topRange').value;
         const paddingValue = document.getElementById('paddingRange').value;
         const scaleValue = document.getElementById('scaleRange').value;

         // Update the displayed labels
         document.getElementById('topValueLabel').textContent = topValue;
         document.getElementById('paddingValueLabel').textContent = paddingValue;
         document.getElementById('scaleValueLabel').textContent = scaleValue;

         // Get the div element you want to style
         const div = document.getElementById('sing_img_div');
         const img = document.getElementById("sign_img");

         // Apply the styles dynamically to the div
         div.style.top = `${topValue}px`;
         div.style.padding = `${paddingValue}px`;

         // Apply scale transformation
         img.style.transform = `rotate(${rotationAngle}deg) scale(${scaleValue})`;
     }

     // Initial application of styles when the page loads
     applyStyles();
 </script>
