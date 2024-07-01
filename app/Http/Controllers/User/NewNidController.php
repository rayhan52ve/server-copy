<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\NewNid;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Smalot\PdfParser\Parser;
use Smalot\PdfParser\Document;

class NewNidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('User.modules.new_nid.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find($request->user_id);
        $userBalance = $user->balance;

        $price = (int)$request->price;

        if ($userBalance >= $price ) {
            $user->balance -= $price;
            $user->save();
            $data = $request->all();
            return view('pdf.new_nid_pdf', compact('data'));
        } else {
            Alert::toast("আপনার অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
            return redirect()->route('user.new-nid.index');
        }
    }

    public function signCopyUploadOld(Request $request)
    {
        $file = $request->pdf_file;
        $pdfParser = new Parser();
        $pdf = $pdfParser->parseFile($file->path());

        // Extract text content
        $content = $pdf->getText();

        // Extract images
        $images = $this->extractImages($pdf);
        // dd($images);

        // Split the content by lines
        $lines = explode("\n", $content);

        // Initialize variables to store parsed data
        $nid_number = null;
        $name_bn = null;
        $name_en = null;
        $pin = null;
        $fathers_name = null;
        $mothers_name = null;
        $birth_place = null;
        $birthday = null;
        $blood_group = null;
        $gender = null;
        $maritalStatus = null;
        $occupation = null;
        $upazila  = null;
        $district  = null;
        $house_holding  = null;
        $village_road = null;
        $post_office  = null;
        $postal_code  = null;

        foreach ($lines as $index => $line) {
            $line = trim($line);

            if (strpos($line, 'National ID') !== false) {
                $nid_number = trim(substr($line, strpos($line, 'National ID') + strlen('National ID')));
            } elseif (strpos($line, 'Name(Bangla)') !== false) {
                $name_bn = trim(substr($line, strpos($line, 'Name(Bangla)') + strlen('Name(Bangla)')));
            } elseif (strpos($line, 'Name(English)') !== false) {
                $name_en = trim(substr($line, strpos($line, 'Name(English)') + strlen('Name(English)')));
            } elseif (strpos($line, 'Pin') !== false) {
                $pin = trim(substr($line, strpos($line, 'Pin') + strlen('Pin')));
            } elseif (strpos($line, 'Date of Birth') !== false) {
                $birthday = trim(substr($line, strpos($line, 'Date of Birth') + strlen('Date of Birth')));
            } elseif (strpos($line, 'Birth Place') !== false) {
                $birth_place = trim(substr($line, strpos($line, 'Birth Place') + strlen('Birth Place')));
            } elseif (strpos($line, 'Father Name') !== false) {
                $fathers_name = trim(substr($line, strpos($line, 'Father Name') + strlen('Father Name')));
            } elseif (strpos($line, 'Mother Name') !== false) {
                $mothers_name = trim(substr($line, strpos($line, 'Mother Name') + strlen('Mother Name')));
            } elseif (strpos($line, 'Blood Group') !== false) {
                $blood_group = trim(substr($line, strpos($line, 'Blood Group') + strlen('Blood Group')));
            } elseif (strpos($line, 'Gender') !== false) {
                $gender = trim(substr($line, strpos($line, 'Gender') + strlen('Gender')));
            } elseif (strpos($line, 'Marital Status') !== false) {
                $maritalStatus = trim(substr($line, strpos($line, 'Marital Status') + strlen('Marital Status')));
            } elseif (strpos($line, 'Occupation') !== false) {
                $occupation = trim(substr($line, strpos($line, 'Occupation') + strlen('Occupation')));
            }elseif (strpos($line, 'Present Address') !== false) {
                $presentAddress = trim(substr($line, strpos($line, 'Present Address') + strlen('Present Address')));
            } elseif (strpos($line, 'Permanent Address') !== false) {
                $permanentAddress = trim(substr($line, strpos($line, 'Permanent Address') + strlen('Permanent Address')));
            } elseif (strpos($line, 'Upozila') !== false) {
                $upazila  = trim(substr($line, strpos($line, 'Upozila') + strlen('Upozila')));
            } elseif (strpos($line, 'Region') !== false) {
                $region  = trim(substr($line, strpos($line, 'Region') + strlen('Region')));
            }
            // elseif (strpos($line, 'Home/Holding') !== false) {
            //     $house_holding = trim($lines[$index + 2]) . ' ' .trim($lines[$index + 3]); // Assuming the data is on the next line
            // } elseif (strpos($line, 'Village/Road') !== false) {
            //     $village_road = trim($lines[$index + 1]); // Assuming the data is on the next line
            // }

            if (preg_match('/Upozila\s*([^\t\n]+)/', $line, $matches)) {
                $upazila = trim($matches[1]);
            }
            if (preg_match('/Post Office\s*([^\t\n]+)\s*Postal Code\s+(\d+)/', $line, $matches)) {
                $post_office = trim($matches[1]); // Capture post office name.
                $postal_code = trim($matches[2]); // Capture postal code.
            }

            if (strpos($line, 'District') !== false) {
                $district = trim(substr($line, strpos($line, 'District') + strlen('District')));
            }

            // Additional logic for multi-word fields like address
            if (strpos($line, 'Present Address') !== false) {
                $presentAddress = trim(substr($line, strpos($line, 'Present Address') + strlen('Present Address')));
                // Extracting district from present address if needed
                // This might not be necessary if district is mentioned separately in your PDF content
            }

            if (preg_match('/Home\/Holding\s*([^\t\n]+)/', $line, $matches)) {
                $house_holding = trim($matches[1]);
            }

            // Using regex to extract village/road
            if (preg_match('/Village\/Road\s*([^\t\n]+)/', $line, $matches)) {
                $village_road = trim($matches[1]);
            }

        }
        // dd($post_office,$postal_code,$upazila,$region,$presentAddress,$content);



        return view('User.modules.old_nid.create', [
            'nid_number' => $nid_number,
            'name_bn' => $name_bn,
            'name_en' => $name_en,
            'pin' => $pin,
            'birthday' => $birthday,
            'birth_place' => $birth_place,
            'fathers_name' => $fathers_name,
            'mothers_name' => $mothers_name,
            'blood_group' => $blood_group,
            'gender' => $gender,
            'maritalStatus' => $maritalStatus,
            'occupation' => $occupation,
            'nidImage' => $images['nid'] ?? null,
            'signatureImage' => $images['signature'] ?? null,
            'upazila' => $upazila,
            'district' => $district,
            'house_holding' => $house_holding,
            'village_road' => $village_road,
            'post_office' => $post_office,
            'postal_code' => $postal_code,
        ]);
    }


    public function signCopyUpload(Request $request)
    {
        $file = $request->pdf_file;
        $pdfParser = new Parser();
        $pdf = $pdfParser->parseFile($file->path());

        // Extract text content
        $content = $pdf->getText();

        // $pages = $pdf->getPages();

        // foreach ($pages as $pageNumber => $page) {
        //     // Extract text along with positions
        //     $texts = $page->getTextWithPosition();

        //     // Output text with positions for the current page
        //     echo "Page $pageNumber:\n";
        //     foreach ($texts as $text) {
        //         echo "Text: {$text['text']}\n";
        //         echo "Position: X: {$text['x']}, Y: {$text['y']}\n";
        //         echo "Font Size: {$text['fontSize']}\n";
        //         echo "Font: {$text['font']}\n\n";
        //     }
        // }
        // Extract images
        $images = $this->extractImages($pdf);
        // dd($images);

        // Split the content by lines
        $lines = explode("\n", $content);

        // Initialize variables to store parsed data
        $nid_number = null;
        $name_bn = null;
        $name_en = null;
        $pin = null;
        $fathers_name = null;
        $mothers_name = null;
        $birth_place = null;
        $birthday = null;
        $blood_group = null;
        $gender = null;
        $maritalStatus = null;
        $occupation = null;
        $presentAddress = null;
        $permanentAddress = null;
        $upazila  = null;
        $district  = null;
        $house_holding  = null;
        $village_road = null;
        $post_office  = null;
        $postal_code  = null;

        foreach ($lines as $index => $line) {
            $line = trim($line);

            if (strpos($line, 'National ID') !== false) {
                $nid_number = trim(substr($line, strpos($line, 'National ID') + strlen('National ID')));
            } elseif (strpos($line, 'Name(Bangla)') !== false) {
                $name_bn = trim(substr($line, strpos($line, 'Name(Bangla)') + strlen('Name(Bangla)')));
            } elseif (strpos($line, 'Name(English)') !== false) {
                $name_en = trim(substr($line, strpos($line, 'Name(English)') + strlen('Name(English)')));
            } elseif (strpos($line, 'Pin') !== false) {
                $pin = trim(substr($line, strpos($line, 'Pin') + strlen('Pin')));
            } elseif (strpos($line, 'Date of Birth') !== false) {
                $birthday = trim(substr($line, strpos($line, 'Date of Birth') + strlen('Date of Birth')));
            } elseif (strpos($line, 'Birth Place') !== false) {
                $birth_place = trim(substr($line, strpos($line, 'Birth Place') + strlen('Birth Place')));
            } elseif (strpos($line, 'Father Name') !== false) {
                $fathers_name = trim(substr($line, strpos($line, 'Father Name') + strlen('Father Name')));
            } elseif (strpos($line, 'Mother Name') !== false) {
                $mothers_name = trim(substr($line, strpos($line, 'Mother Name') + strlen('Mother Name')));
            } elseif (strpos($line, 'Blood Group') !== false) {
                $blood_group = trim(substr($line, strpos($line, 'Blood Group') + strlen('Blood Group')));
            } elseif (strpos($line, 'Gender') !== false) {
                $gender = trim(substr($line, strpos($line, 'Gender') + strlen('Gender')));
            } elseif (strpos($line, 'Marital Status') !== false) {
                $maritalStatus = trim(substr($line, strpos($line, 'Marital Status') + strlen('Marital Status')));
            } elseif (strpos($line, 'Occupation') !== false) {
                $occupation = trim(substr($line, strpos($line, 'Occupation') + strlen('Occupation')));
            }elseif (strpos($line, 'Present Address') !== false) {
                $presentAddress = trim(substr($line, strpos($line, 'Present Address') + strlen('Present Address')));
            } elseif (strpos($line, 'Permanent Address') !== false) {
                $permanentAddress = trim(substr($line, strpos($line, 'Permanent Address') + strlen('Permanent Address')));
            } elseif (strpos($line, 'Upozila') !== false) {
                $upazila  = trim(substr($line, strpos($line, 'Upozila') + strlen('Upozila')));
            } elseif (strpos($line, 'Region') !== false) {
                $region  = trim(substr($line, strpos($line, 'Region') + strlen('Region')));
            }
            if (preg_match('/Upozila\s*([^\t\n]+)/', $line, $matches)) {
                $upazila = trim($matches[1]);
            }
            if (preg_match('/Post Office\s*([^\t\n]+)\s*Postal Code\s+(\d+)/', $line, $matches)) {
                $post_office = trim($matches[1]); // Capture post office name.
                $postal_code = trim($matches[2]); // Capture postal code.
            }

            if (strpos($line, 'District') !== false) {
                $district = trim(substr($line, strpos($line, 'District') + strlen('District')));
            }

            // Additional logic for multi-word fields like address
            if (strpos($line, 'Present Address') !== false) {
                $presentAddress = trim(substr($line, strpos($line, 'Present Address') + strlen('Present Address')));
                // Extracting district from present address if needed
                // This might not be necessary if district is mentioned separately in your PDF content
            }

            if (preg_match('/Home\/Holding\s*([^\t\n]+)/', $line, $matches)) {
                $house_holding = trim($matches[1]);
            }

            // Using regex to extract village/road
            if (preg_match('/Village\/Road\s*([^\t\n]+)/', $line, $matches)) {
                $village_road = trim($matches[1]);
            }

        }

        // dd($house_holding,$village_road,$content);





        return view('User.modules.new_nid.create', [
            'nid_number' => $nid_number,
            'name_bn' => $name_bn,
            'name_en' => $name_en,
            'pin' => $pin,
            'birthday' => $birthday,
            'birth_place' => $birth_place,
            'fathers_name' => $fathers_name,
            'mothers_name' => $mothers_name,
            'blood_group' => $blood_group,
            'gender' => $gender,
            'maritalStatus' => $maritalStatus,
            'occupation' => $occupation,
            'nidImage' => $images['nid'] ?? null,
            'signatureImage' => $images['signature'] ?? null,
            'upazila' => $upazila,
            'district' => $district,
            'house_holding' => $house_holding,
            'village_road' => $village_road,
            'post_office' => $post_office,
            'postal_code' => $postal_code,
            'region' => $region,
        ]);
    }

    private function extractImages(Document $pdf)
    {
        $images = [];
        $count = 0;

        foreach ($pdf->getObjects() as $object) {
            if ($object instanceof \Smalot\PdfParser\XObject\Image) {
                $imageContent = $object->getContent();

                // Using count to distinguish between the first and second image
                if ($count == 0) {
                    $images['nid'] = ['data' => $imageContent];
                } else if ($count == 1) {
                    $images['signature'] = ['data' => $imageContent];
                }
                $count++;
            }
        }

        return $images;
    }
}
