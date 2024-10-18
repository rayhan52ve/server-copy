<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\NewRegistration;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Smalot\PdfParser\Parser;
use Smalot\PdfParser\Document;

class NewRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();
        return view('User.modules.new_registration.create',compact('now'));
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
            $user->balance -= $price;
            $user->save();
            $data = $request->except('price');
            NewRegistration::create($data);
            return view('pdf.new_reg_pdf',compact('data'));
        }else{
            Alert::toast("আপনার অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
            return redirect()->route('user.new-registration.index');
        }

    }

    public function printSavedBirth($id)
    {
        $data = NewRegistration::find($id);
        $user = User::find($data->user_id);
        $userBalance = $user->balance;

        $message = Message::first();

        $price = (int)$message->birth_remake;
        if (auth()->user()->is_admin == 1) {
            $price = 0;
        }

        if ($userBalance >= $price) {
            $user->balance -= $price;
            $user->save();
            return view('pdf.new_reg_pdf', compact('data'));
        } else {
            Alert::toast("পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewRegistration  $newRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(NewRegistration $newRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewRegistration  $newRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(NewRegistration $newRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewRegistration  $newRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewRegistration $newRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewRegistration  $newRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewRegistration $newRegistration)
    {
        //
    }

    public function signCopyUpload(Request $request)
    {
        $file = $request->pdf_file;
        $pdfParser = new Parser();
        $pdf = $pdfParser->parseFile($file->path());

        // Extract text content
        $content = $pdf->getText();
        // Extract images
        // $images = $this->extractImages($pdf);

        // Split the content by lines
        $lines = explode("\n", $content);

        // Initialize variables to store parsed data
        $nid_number = null;
        $name_bn = null;
        $name_en = null;
        $pin = null;
        $fathers_name_bn = null;
        $fathers_name_en = null;
        $mothers_name_bn = null;
        $mothers_name_en = null;
        $birth_place_bn = null;
        $birth_place_en = null;
        $birthday = null;
        $blood_group = null;
        $gender = null;
        $maritalStatus = null;
        $occupation = null;
        $presentAddress = null;
        $permanentAddress = null;
        $upazila  = null;
        $region  = null;
        $house_holding  = null;
        $village_road = null;
        $post_office  = null;
        $postal_code  = null;

        foreach ($lines as $line) {
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
                $birth_place_bn = trim(substr($line, strpos($line, 'Birth Place') + strlen('Birth Place')));
            } elseif (strpos($line, 'Birth Place') !== false) {
                $birth_place_en = trim(substr($line, strpos($line, 'Birth Place') + strlen('Birth Place')));
            } elseif (strpos($line, 'Gender') !== false) {
                $gender = trim(substr($line, strpos($line, 'Gender') + strlen('Gender')));
            } elseif (strpos($line, 'Father Name') !== false) {
                $fathers_name_bn = trim(substr($line, strpos($line, 'Father Name') + strlen('Father Name')));
            } elseif (strpos($line, 'Father Name') !== false) {
                $fathers_name_en = trim(substr($line, strpos($line, 'Father Name') + strlen('Father Name')));
            } elseif (strpos($line, 'Mother Name') !== false) {
                $mothers_name_bn = trim(substr($line, strpos($line, 'Mother Name') + strlen('Mother Name')));
            } elseif (strpos($line, 'Mother Name') !== false) {
                $mothers_name_en = trim(substr($line, strpos($line, 'Mother Name') + strlen('Mother Name')));
            } elseif (strpos($line, 'Blood Group') !== false) {
                $blood_group = trim(substr($line, strpos($line, 'Blood Group') + strlen('Blood Group')));
            } elseif (strpos($line, 'Gender') !== false) {
                $gender = trim(substr($line, strpos($line, 'Gender') + strlen('Gender')));
            } elseif (strpos($line, 'Marital Status') !== false) {
                $maritalStatus = trim(substr($line, strpos($line, 'Marital Status') + strlen('Marital Status')));
            } elseif (strpos($line, 'Occupation') !== false) {
                $occupation = trim(substr($line, strpos($line, 'Occupation') + strlen('Occupation')));
            } elseif (strpos($line, 'Present Address') !== false) {
                $presentAddress = trim(substr($line, strpos($line, 'Present Address') + strlen('Present Address')));
            } elseif (strpos($line, 'Permanent Address') !== false) {
                $permanentAddress = trim(substr($line, strpos($line, 'Permanent Address') + strlen('Permanent Address')));
            } elseif (strpos($line, 'Upozila') !== false) {
                $upazila  = trim(substr($line, strpos($line, 'Upozila') + strlen('Upozila')));
            } elseif (strpos($line, 'Region') !== false) {
                $region  = trim(substr($line, strpos($line, 'Region') + strlen('Region')));
            } elseif (strpos($line, 'Home/Holding') !== false) {
                $house_holding  = trim(substr($line, strpos($line, 'Home/Holding') + strlen('Home/Holding')));
            } elseif (strpos($line, 'Village/Road') !== false) {
                $village_road  = trim(substr($line, strpos($line, 'Village/Road') + strlen('Village/Road')));
            } elseif (preg_match('/Post Office(.*?)Postal Code\s+(\d+)/', $line, $matches)) {
                $post_office = trim($matches[1]); // This captures the post office name.
                $postal_code = trim($matches[2]); // This captures the postal code.
            }
        }

        // dd($content,$house_holding);


        return view('User.modules.new_registration.create', [
            'nid_number' => $nid_number,
            'name_bn' => $name_bn,
            'name_en' => $name_en,
            'pin' => $pin,
            'birthday' => $birthday,
            'birth_place_bn' => $birth_place_bn,
            'birth_place_en' => $birth_place_en,
            'fathers_name_bn' => $fathers_name_bn,
            'fathers_name_en' => $fathers_name_en,
            'mothers_name_bn' => $mothers_name_bn,
            'mothers_name_en' => $mothers_name_en,
            'blood_group' => $blood_group,
            'gender' => $gender,
            'maritalStatus' => $maritalStatus,
            'occupation' => $occupation,
            'presentAddress' => $presentAddress,
            'address' => $permanentAddress,
            'upazila' => $upazila,
            'region' => $region,
            'house_holding' => $house_holding,
            'village_road' => $village_road,
            'post_office' => $post_office,
            'postal_code' => $postal_code,
        ]);
    }

    // private function extractImages(Document $pdf)
    // {
    //     $images = [];

    //     foreach ($pdf->getObjects() as $object) {
    //         // Check if the object is an instance of Smalot\PdfParser\XObject\Image
    //         if ($object instanceof \Smalot\PdfParser\XObject\Image) {
    //             // Get the raw content of the image object
    //             $imageContent = $object->getContent();

    //             // Add the image content to the images array
    //             $images[] = [
    //                 'data' => $imageContent,
    //                 // 'mime' => $object->getImageMimeType(),
    //             ];
    //         }
    //     }

    //     return $images;
    // }






}
