 
  img#user_img {
    left: 269px;
    top: 37px;
    width: 20px;
    opacity: 0.5;
    filter: blur(0.2px) grayscale(1);
}
  
.id_side{
  display: inline-block;
    width: 100%;
    height: 210px;
    position: relative;
  }
  .side_img{
  position: absolute;
  }
  
  
img.user_img {
    position: absolute;
    z-index: 1;
    width: 75px;
    top: 60px;
    left: 19px;
    filter: grayscale(1);
    border-radius: 1px;
}
  img#overflow_img {
    position: absolute;
    z-index: 100;
}
  
.overflow_dob {
    font-family: arial;
    font-weight: 500;
    font-size: 6.5px;
    position: absolute;
    z-index: 10000;
    top: 51px;
    left: 260px;
    filter: blur(0.2px);
    color: #5b5b5b;
}  
img.overflow_back {
    position: absolute;
    z-index: 10;
}

img#user_img_two {
    width: 20px;
    opacity: 0.5;
    left: 282px;
    top: 78px;
    z-index: 1;
}
.back_text {
    z-index: 50;
    position: absolute;
    left: 22px;
    top: 142px;
}
.back_line {
    font-family: 'Cambria Math';
    font-size: 10px;
    letter-spacing: 2px;
}
  
.back_text_one {
    position: relative;
    color: black;
    font-size: 6.2px;
    top: 107px;
    left: 18px;
    font-family: arial;
    letter-spacing: -0.1;
}
span.result_one {
    font-weight: bold;
    font-size: 8px;
}  
  
span.second_line_one.back_line_one {
    left: 66px;
    position: absolute;
}

span.third_line_one.back_line_one {
    margin-left: 221px;
    position: absolute;
}
span.fist_line_one.back_line_one {
    position: absolute;
    left: 0;
    top: -1.5px;
}  
.back_line_one {
    transform: scale(1, 1.1);
}
.address {
    position: absolute;
    width: 189px;
    font-size: 10px;
    line-height: 9.5px;
    top: 64px;
    left: 18px;
    background: content-box;
    font-weight: normal;
    font-family: 'SolaimanLipi', sans-serif;
}
  span.result_one.date_of_issue {
    letter-spacing: -0.5;
}
  .font_family{
    font-family: TonnyBanglaMJ;
  }  
#font_text {
    z-index: 1000;
    top: 58px;
    left: 104px;
}

.title.font_family {
    font-size: 8.5px;
    font-weight: bold;
    transform: scale(1, 1.05);
}
  
.main_text.font_family {
    font-size: 10.5px;
    line-height: 10px;
    transform: scale(1, 1.05);
    font-family: 'SolaimanLipi', sans-serif;
}
.nameEn.title {
    font-size: 6.5px;
    font-family: arial;
    font-weight: 600;
    line-height: 12px;
    transform: scale(1, 1.1);
}
.nameBan.main_text.font_family {
    margin-bottom: 3px;
    text-shadow: 0 0 black;
    font-weight: bold;
} 
.nameEn.main_text {
    font-size: 7.5px;
    font-weight: 600;
    line-height: 8px;
    transform: scale(1, 1.1);
}
.fatherName.title.font_family {
    line-height: 17px;
    margin-top: 2px;

}
  .fatherName.main_text.font_family {
    line-height: 2px;
}
.motherName.title.font_family {
    line-height: 19px;
    margin-top: 3px;
}

.motherName.main_text.font_family {
    line-height: 2px;
}
  .en_title {
    font-size: 7px;
}
  
.dateOfBirth {
    margin-top: 3px;
}

.nid {
    line-height: 5px;
    margin-top: -10px;
}
div.nid_number.en_title {
    font-weight: bold;
    font-size: 10.5px;
    margin-top: 11.5px;
    margin-left: 13.5px;
    text-shadow: 0.2px 0.2px #000000;
    transform: scale(1, 1.3);
    letter-spacing: 0.2px;
}
  div.date_title.en_title {
    font-size: 6.3px;
    transform: scale(1, 1.1);
}

div.nid_title.en_title {
    font-size: 7px;
}

div.date_number.en_title {
    font-size: 9.5px;
    transform: scale(1, 1.1);
}
div#sing_img_div {
    position: absolute;
    z-index: 1;
    width: 79px;
    top: 184px;
    left: 17px;
    text-align: center;
}
.f_line_icon {
    display: inline-block;
    width: 5px;
    margin-right: 0.5;
    font-size: 11px;
}
  div.f_line_icon.for_last {
    margin-right: 4.7px!important;
}
.f_line_icon.for_last.i_letter {
    margin-right: 2px!important;
}
  div.en_title{
  display: inline-block;
  }
  
  
   .hidden_when_print {
            display: block;
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            max-width: 400px;
            margin-bottom: 20px;
        }


        input[type="range"] {
            width: 100%;
            margin: 10px 0;
        }


        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

  
  
   #topValueLabel,
        #paddingValueLabel {
            display: none;
        }
        /* Hide the section when printing */
        @media print {
            .hidden_when_print {
                display: none;
            }

            button {
                display: none;
            }
        }