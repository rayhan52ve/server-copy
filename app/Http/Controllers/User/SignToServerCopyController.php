<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\TinCirtificate;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Smalot\PdfParser\Parser;
use Smalot\PdfParser\Document;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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
        return view('User.modules.sign_to_server.create', compact('now'));
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
        // Validate the incoming request data
        $request->validate([
            'type' => 'required|string',
            'tin' => 'required',
            'price' => 'required|numeric',
            'user_id' => 'required|exists:users,id', // Ensure user exists
        ]);

        // Retrieve request data
        $type = $request->input('type');
        $tin = $request->input('tin');
        $price = (int) $request->input('price');

        // If the authenticated user is an admin, set the price to 0
        if (auth()->user()->is_admin == 1) {
            $price = 0;
        }

        // Find the user by ID
        $user = User::find($request->user_id);

        // Check if the user has sufficient balance
        if ($user->balance < $price) {
            Alert::toast("আপনার অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
            return redirect()->back()->withInput(); // Preserve input data
        }

        // Construct API URL using dynamic values
        $url = "https://api.server24x.online/tinServer/api.php?key=fardin&type={$type}&tin={$tin}";

        // Initialize cURL session
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute cURL request and get the response
        $response = curl_exec($ch);

        if ($response === false) {
            return back()->with('error_message', 'অনুগ্রহ করে আবার চেষ্টা করুন.' . curl_error($ch));
        }

        // Decode JSON response
        $data = json_decode($response, true);

        // Check if the API response indicates data was not found
        if (isset($data['message']) && $data['message'] === 'Data not found') {
            return back()->with('error_message', 'তথ্য পাওয়া যায়নি। অনুগ্রহ করে সঠিক তথ্য প্রদান করুন।' . curl_error($ch));
        }



        // Deduct balance from user and save
        $user->balance -= $price;
        $user->save();

        TinCirtificate::create([
            'user_id' => $request->user_id,
            'name_english' => @$data['nameEnglish'],
            'father_name_english' => @$data['fatherNameEn'],
            'mother_name_english' => @$data['motherNameEn'],
            'present_address' => @$data['presentAddress'],
            'permanent_address' => @$data['permanentAddress'],
            'tin' => @$data['tin'],
            'previous_tin' => @$data['previousTIN'],
            'tax_zone' => @$data['taxZone'],
            'tax_circle' => @$data['taxCircle'],
            'status' => @$data['status'],
            'date' => @$data['date'],
            'qr_code_url' => @$data['QR'],
            'zone_address' => @$data['zoneAddress'],
            'zone_phone' => @$data['zonePhone'],

        ]);

        // If API returns valid data, proceed to generate the PDF or show the view
        return view('pdf.tin_cirtificate', compact('data'));
    }


    public function print_saved_tin($id)
    {
        // Find the saved server copy by ID
        $tin = TinCirtificate::find($id);

        if (!$tin) {
            return back()->with('error_message', 'No data found for the given ID.');
        }

        $user = User::find($tin->user_id);
        $userBalance = $user->balance;

        $message = Message::first();

        $price = (int)$message->tin_remake_price;
        if (auth()->user()->is_admin != 0) {
            $price = 0;
        }

        if ($userBalance >= $price) {
            $user->balance -= $price;
            $user->save();
            // Construct the nid_info array
            $data = [
                'nameEnglish' => $tin->name_english,
                'fatherNameEn' => $tin->father_name_english,
                'motherNameEn' => $tin->mother_name_english,
                'presentAddress' => $tin->present_address,
                'permanentAddress' => $tin->permanent_address,
                'tin' => $tin->tin,
                'previousTIN' => $tin->previous_tin,
                'taxZone' => $tin->tax_zone,
                'taxCircle' => $tin->tax_circle,
                'status' => $tin->status,
                'date' => $tin->date,
                'QR' => $tin->qr_code_url,
                'zoneAddress' => $tin->zone_address,
                'zonePhone' => $tin->zone_phone,
            ];

            return view('pdf.tin_cirtificate', compact('data'));

        } else {
            Alert::toast("অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
            return redirect()->back();
        }
    }



    // public function store(Request $request)
    // {
    //     $now = Carbon::now();
    //     $user = User::find($request->user_id);
    //     $userBalance = $user->balance;

    //     $price = (int)$request->price;

    //     if ($userBalance >= $price) {
    //         $nid_info = $request->all();
    //         // dd($nid_info);


    //         // Generate QR code
    //         $dataForQR = "Name:" . $nid_info['nameEn'] . "\nNID: " . $nid_info['nationalId'] . "\nDOB: " . $nid_info['dateOfBirth'];
    //         $qrCode = new QrCode($dataForQR);
    //         $qrCode->setSize(300);
    //         $qrCode->setMargin(10);

    //         $writer = new PngWriter();

    //         // Get QR code image data
    //         $qrCodeData = $writer->write($qrCode)->getString();

    //         // Convert image data to base64
    //         $base64Image = base64_encode($qrCodeData);

    //         $user->balance -= $price;
    //         $user->save();
    //         return view('pdf.sign_to_server', compact('nid_info','base64Image','now'));
    //     }else{
    //         Alert::toast("আপনার অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
    //         return redirect()->route('user.sign-to-server.index');
    //     }
    // }


    // public function signCopyUpload(Request $request)
    // {
    //     $now = Carbon::now();
    //     $file = $request->pdf_file;
    //     $pdfParser = new Parser();
    //     $pdf = $pdfParser->parseFile($file->path());

    //     // Extract text content
    //     $content = $pdf->getText();
    //     // Extract images
    //     $images = $this->extractImages($pdf);

    //     // Split the content by lines
    //     $lines = explode("\n", $content);

    //     // Initialize variables to store parsed data
    //     $name_bn = null;
    //     $name_en = null;
    //     $nid_number = null;
    //     $pin = null;
    //     $form = null;
    //     $voter = null;
    //     $spouse = null;
    //     $fathers_name = null;
    //     $mothers_name = null;
    //     $birth_place = null;
    //     $birthday = null;
    //     $blood_group = null;
    //     $gender = null;
    //     $maritalStatus = null;
    //     $occupation = null;
    //     $education = null;
    //     $presentAddress = null;
    //     $permanentAddress = null;
    //     $upazila  = null;
    //     $district  = null;
    //     $house_holding  = null;
    //     $village_road = null;
    //     $post_office  = null;
    //     $postal_code  = null;

    //     foreach ($lines as $index => $line) {
    //         $line = trim($line);

    //         if (strpos($line, 'National ID') !== false) {
    //             $nid_number = trim(substr($line, strpos($line, 'National ID') + strlen('National ID')));
    //         } elseif (strpos($line, 'Name(Bangla)') !== false) {
    //             $name_bn = trim(substr($line, strpos($line, 'Name(Bangla)') + strlen('Name(Bangla)')));
    //         } elseif (strpos($line, 'Name(English)') !== false) {
    //             $name_en = trim(substr($line, strpos($line, 'Name(English)') + strlen('Name(English)')));
    //         } elseif (strpos($line, 'Pin') !== false) {
    //             $pin = trim(substr($line, strpos($line, 'Pin') + strlen('Pin')));
    //         } elseif (strpos($line, 'Date of Birth') !== false) {
    //             $birthday = trim(substr($line, strpos($line, 'Date of Birth') + strlen('Date of Birth')));
    //         } elseif (strpos($line, 'Birth Place') !== false) {
    //             $birth_place = trim(substr($line, strpos($line, 'Birth Place') + strlen('Birth Place')));
    //         } elseif (strpos($line, 'Father Name') !== false) {
    //             $fathers_name = trim(substr($line, strpos($line, 'Father Name') + strlen('Father Name')));
    //         } elseif (strpos($line, 'Mother Name') !== false) {
    //             $mothers_name = trim(substr($line, strpos($line, 'Mother Name') + strlen('Mother Name')));
    //         } elseif (strpos($line, 'Blood Group') !== false) {
    //             $blood_group = trim(substr($line, strpos($line, 'Blood Group') + strlen('Blood Group')));
    //         } elseif (strpos($line, 'Gender') !== false) {
    //             $gender = trim(substr($line, strpos($line, 'Gender') + strlen('Gender')));
    //         } elseif (strpos($line, 'Marital Status') !== false) {
    //             $maritalStatus = trim(substr($line, strpos($line, 'Marital Status') + strlen('Marital Status')));
    //         } elseif (strpos($line, 'Occupation') !== false) {
    //             $occupation = trim(substr($line, strpos($line, 'Occupation') + strlen('Occupation')));
    //         }elseif (strpos($line, 'Form No') !== false) {
    //             $form = trim(substr($line, strpos($line, 'Form No') + strlen('Form No')));
    //         }elseif (strpos($line, 'Spouse Name') !== false) {
    //             $spouse = trim(substr($line, strpos($line, 'Spouse Name') + strlen('Spouse Name')));
    //         }elseif (strpos($line, 'Education') !== false) {
    //             $education = trim(substr($line, strpos($line, 'Education') + strlen('Education')));
    //         } elseif (strpos($line, 'Region') !== false) {
    //             $region  = trim(substr($line, strpos($line, 'Region') + strlen('Region')));
    //         }

    //         if (preg_match('/Upozila\s*([^\t\n]+)/', $line, $matches)) {
    //             $upazila = trim($matches[1]);
    //         }
    //         if (preg_match('/Post Office\s*([^\t\n]+)\s*Postal Code\s+(\d+)/', $line, $matches)) {
    //             $post_office = trim($matches[1]); // Capture post office name.
    //             $postal_code = trim($matches[2]); // Capture postal code.
    //         }

    //         if (strpos($line, 'District') !== false) {
    //             $district = trim(substr($line, strpos($line, 'District') + strlen('District')));
    //         }

    //         // Additional logic for multi-word fields like address
    //         if (strpos($line, 'Present Address') !== false) {
    //             $presentAddress = trim(substr($line, strpos($line, 'Present Address') + strlen('Present Address')));
    //             // Extracting district from present address if needed
    //             // This might not be necessary if district is mentioned separately in your PDF content
    //         }

    //         if (preg_match('/Home\/Holding\s*([^\t\n]+)/', $line, $matches)) {
    //             $house_holding = trim($matches[1]);
    //         }

    //         // Using regex to extract village/road
    //         if (preg_match('/Village\/Road\s*([^\t\n]+)/', $line, $matches)) {
    //             $village_road = trim($matches[1]);
    //         }

    //         if (strpos($line, 'Voter No') !== false) {
    //             // Extract the voter ID
    //             $voterLineParts = explode(" ", $line);
    //             $voter = trim(end($voterLineParts)); // Get the last part which contains the voter ID
    //         }

    //     }

    //     // dd($content,$voter,$form,$education);


    //     return view('User.modules.sign_to_server.create', [
    //         'now' => $now,
    //         'name_bn' => $name_bn,
    //         'name_en' => $name_en,
    //         'nid_number' => $nid_number,
    //         'pin' => $pin,
    //         'voter' => $voter,
    //         'form' => $form,
    //         'spouse' => $spouse,
    //         'birthday' => $birthday,
    //         'birth_place' => $birth_place,
    //         'fathers_name' => $fathers_name,
    //         'mothers_name' => $mothers_name,
    //         'blood_group' => $blood_group,
    //         'gender' => $gender,
    //         'maritalStatus' => $maritalStatus,
    //         'occupation' => $occupation,
    //         'education' => $education,
    //         'presentAddress' => $presentAddress,
    //         'permanentAddress' => $permanentAddress,
    //         'nidImage' => $images['nid'] ?? null,
    //         'signatureImage' => $images['signature'] ?? null,
    //         'upazila' => $upazila,
    //         'district' => $district,
    //         'house_holding' => $house_holding,
    //         'village_road' => $village_road,
    //         'post_office' => $post_office,
    //         'postal_code' => $postal_code,
    //         'region' => $region,
    //     ]);
    // }

    // private function extractImages(Document $pdf)
    // {
    //     $images = [];
    //     $count = 0;

    //     foreach ($pdf->getObjects() as $object) {
    //         if ($object instanceof \Smalot\PdfParser\XObject\Image) {
    //             $imageContent = $object->getContent();

    //             // Using count to distinguish between the first and second image
    //             if ($count == 0) {
    //                 $images['nid'] = ['data' => $imageContent];
    //             } else if ($count == 1) {
    //                 $images['signature'] = ['data' => $imageContent];
    //             }
    //             $count++;
    //         }
    //     }

    //     return $images;
    // }
}
