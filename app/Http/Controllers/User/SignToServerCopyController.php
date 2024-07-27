<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Smalot\PdfParser\Parser;
use Smalot\PdfParser\Document;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class SignToServerCopyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();
        return view('User.modules.sign_to_server.create',compact('now'));
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

        if ($userBalance >= $price) {
            $nid_info = $request->all();
            // dd($nid_info);


            // Generate QR code
            $dataForQR = "Name:" . $nid_info['nameEn'] . "\nNID: " . $nid_info['nationalId'] . "\nDOB: " . $nid_info['dateOfBirth'];
            $qrCode = new QrCode($dataForQR);
            $qrCode->setSize(300);
            $qrCode->setMargin(10);

            $writer = new PngWriter();

            // Get QR code image data
            $qrCodeData = $writer->write($qrCode)->getString();

            // Convert image data to base64
            $base64Image = base64_encode($qrCodeData);

            $user->balance -= $price;
            $user->save();
            return view('pdf.sign_to_server', compact('nid_info','base64Image'));
        }else{
            Alert::toast("আপনার অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
            return redirect()->route('user.sign-to-server.index');
        }
    }


    public function signCopyUpload(Request $request)
    {
        $file = $request->pdf_file;
        $pdfParser = new Parser();
        $pdf = $pdfParser->parseFile($file->path());

        // Extract text content
        $content = $pdf->getText();
        // Extract images
        $images = $this->extractImages($pdf);

        // Split the content by lines
        $lines = explode("\n", $content);

        // Initialize variables to store parsed data
        $name_bn = null;
        $name_en = null;
        $nid_number = null;
        $pin = null;
        $form = null;
        $voter = null;
        $spouse = null;
        $fathers_name = null;
        $mothers_name = null;
        $birth_place = null;
        $birthday = null;
        $blood_group = null;
        $gender = null;
        $maritalStatus = null;
        $occupation = null;
        $education = null;
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
            }elseif (strpos($line, 'Form No') !== false) {
                $form = trim(substr($line, strpos($line, 'Form No') + strlen('Form No')));
            }elseif (strpos($line, 'Spouse Name') !== false) {
                $spouse = trim(substr($line, strpos($line, 'Spouse Name') + strlen('Spouse Name')));
            }elseif (strpos($line, 'Education') !== false) {
                $education = trim(substr($line, strpos($line, 'Education') + strlen('Education')));
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

            if (strpos($line, 'Voter No') !== false) {
                // Extract the voter ID
                $voterLineParts = explode(" ", $line);
                $voter = trim(end($voterLineParts)); // Get the last part which contains the voter ID
            }

        }

        // dd($content,$voter,$form,$education);


        return view('User.modules.sign_to_server.create', [
            'name_bn' => $name_bn,
            'name_en' => $name_en,
            'nid_number' => $nid_number,
            'pin' => $pin,
            'voter' => $voter,
            'form' => $form,
            'spouse' => $spouse,
            'birthday' => $birthday,
            'birth_place' => $birth_place,
            'fathers_name' => $fathers_name,
            'mothers_name' => $mothers_name,
            'blood_group' => $blood_group,
            'gender' => $gender,
            'maritalStatus' => $maritalStatus,
            'occupation' => $occupation,
            'education' => $education,
            'presentAddress' => $presentAddress,
            'permanentAddress' => $permanentAddress,
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
