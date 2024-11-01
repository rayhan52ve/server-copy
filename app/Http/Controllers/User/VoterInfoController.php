<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ServerCopyUnofficial;
use App\Models\User;
use App\Models\VoterInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VoterInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();
        return view('User.modules.voter_info.index', compact('now'));
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
    // public function store(Request $request)
    // {
    //     // Increase the maximum execution time for this request (in seconds)
    //     set_time_limit(300); // 300 seconds = 5 minutes

    //     // Validate the request input
    //     $request->validate([
    //         'nid' => 'required',
    //         'dob' => 'required|date',
    //     ]);

    //     // Capture input data
    //     $nid = $request->input('nid');
    //     $dob = $request->input('dob');

    //     return view('pdf.voter_info',compact('nid','dob'));

    //     // Fetch data from the external API
    //     $url = "http://103.191.240.89/~biometri/verify/nid.php?nid=$nid&dob=$dob";
    //     $url = "http://103.191.240.89/~biometri/verify/nid.php?nid=7811013619&dob=2001-08-03";

    //     $response = file_get_contents($url);
    //     $data = json_decode($response, true);
    //     dd($data);

    //     // Check if the data is valid and return the view with data
    //     if (isset($data['message']) && $data['message'] === 'OK' && isset($data['name'])) {
    //         return view('nid-info', ['data' => $data]);
    //     }

    //     // Return with error message if no data found
    //     return view('nid-info')->with('error', 'No information found for the provided NID and DOB.');
    // }

    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'nid' => 'required|string',
            'dob' => 'required|date',
        ]);

        // Retrieve necessary data from request
        $nid = $request->input('nid');
        $dob = $request->input('dob');
        $price = (int) $request->input('price');
        if (auth()->user()->is_admin == 1) {
            $price = 0;
        }

        // Find user by ID
        $user = User::find($request->user_id);
        $userBalance = $user->balance;

        // Check if user has sufficient balance
        if ($userBalance < $price) {
            Alert::toast("আপনার অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
            return redirect()->back();
        }

        // Construct API URL using dynamic values
        // $url = "https://serversheba.my.id/CDMS/main2.php?nid=6416601885&dob=1984-12-31";
        $url = "https://serversheba.my.id/CDMS/main2.php?nid={$nid}&dob={$dob}";

        // Initialize cURL session
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute cURL request and get the response
        $response = curl_exec($ch);
        // dd($response);
        if ($response === false) {
            return back()->with('error_message', 'অনুগ্রহ করে আবার চেষ্টা করুন.' . curl_error($ch));
        }

        // Decode JSON response
        $responseArray = json_decode($response, true);
        // dd($responseArray);


        if (json_last_error() !== JSON_ERROR_NONE) {
            return back()->with('error_message', 'সার্ভার বন্ধ আছে. পরবর্তীতে আবার চেষ্টা করুন.');
        }

        if ($responseArray['status'] == 0) {
            return back()->with('error_message', 'সার্ভার বন্ধ আছে. পরবর্তীতে আবার চেষ্টা করুন.');
        }

        // Check if the response indicates failure
        // if (isset($responseArray->status['success'])) {
        //     if ($responseArray['success'] === "False" || $responseArray['Message'] === "Data not found") {
        //         return back()->with('error_message', 'NID তথ্য পাওয়া যায়নি।');
        //     }
        // }

        // Extract NID information from the response
        $nid_info = $responseArray['data'];
        // dd($responseArray,$nid_info);
        if ($nid_info['name'] == null) {
            return back()->with('error_message', 'NID তথ্য পাওয়া যায়নি।');
        }

        // $permanentAddress = "বাসা/হোল্ডিংঃ- " . ($nid_info['permanentAddress']['houseHoldingNumber'] ?? '') .
        //     ", গ্রাম/রাস্তাঃ- " . ($nid_info['permanentAddress']['street'] ?? '') .
        //     ", মৌজা/মহল্লাঃ- " . ($nid_info['permanentAddress']['mouzaMoholla'] ?? '') .
        //     ", ইউনিয়নঃ- " . ($nid_info['permanentAddress']['villageOrRoad'] ?? '') .
        //     ", ওয়ার্ড নংঃ- " . ($nid_info['permanentAddress']['ward'] ?? '') .
        //     ", ডাকঘরঃ- " . ($nid_info['permanentAddress']['postOffice'] ?? '') .
        //     ", পোষ্ট কোডঃ- " . ($nid_info['permanentAddress']['postalCode'] ?? '') .
        //     ", উপজেলাঃ- " . ($nid_info['permanentAddress']['upozila'] ?? '') .
        //     ", জেলাঃ- " . ($nid_info['permanentAddress']['district'] ?? '') .
        //     ", বিভাগঃ- " . ($nid_info['permanentAddress']['division'] ?? '');

        // $presentAddress = "বাসা/হোল্ডিংঃ- " . ($nid_info['presentAddress']['houseHoldingNumber'] ?? '') .
        //     ", গ্রাম/রাস্তাঃ- " . ($nid_info['presentAddress']['street'] ?? '') .
        //     ", মৌজা/মহল্লাঃ- " . ($nid_info['presentAddress']['mouzaMoholla'] ?? '') .
        //     ", ইউনিয়নঃ- " . ($nid_info['presentAddress']['villageOrRoad'] ?? '') .
        //     ", ওয়ার্ড নংঃ- " . ($nid_info['presentAddress']['ward'] ?? '') .
        //     ", ডাকঘরঃ- " . ($nid_info['presentAddress']['postOffice'] ?? '') .
        //     ", পোষ্ট কোডঃ- " . ($nid_info['presentAddress']['postalCode'] ?? '') .
        //     ", উপজেলাঃ- " . ($nid_info['presentAddress']['upozila'] ?? '') .
        //     ", জেলাঃ- " . ($nid_info['presentAddress']['district'] ?? '') .
        //     ", বিভাগঃ- " . ($nid_info['presentAddress']['division'] ?? '');

        $permanentAddress = $nid_info['permanentAddress']['addressLine'];
        $presentAddress = $nid_info['presentAddress']['addressLine'];

        // Deduct balance from user and save
        $user->balance -= $price;
        $user->save();

        // Save the data to ServerCopyUnofficial
        ServerCopyUnofficial::create([
            'user_id' => $request->user_id,
            'name' => $nid_info['name'],
            'nameEn' => $nid_info['nameEn'],
            'gender' => $nid_info['gender'] ?? null,
            'bloodGroup' => $nid_info['bloodGroup'] ?? null,
            'father' => $nid_info['father'],
            'mother' => $nid_info['mother'],
            'spouse' => $nid_info['spouse'] ?? null,
            'occupation' => $nid_info['occupation'] ?? null,
            'nationalId' => $nid_info['nationalId'],
            'voter_no' => $nid_info['voter_no'] ?? null,
            'permanentAddress' => $permanentAddress,
            'presentAddress' => $presentAddress,
            'photo' => $nid_info['photo'],
            // 'photoBase64' => $nid_info['photoBase64'],
            // 'mobile' => $nid_info['mobile'],
            'religion' => $nid_info['religion'] ?? null,
            'voterArea' => $nid_info['voterArea'] ?? null,
            'dateOfBirth' => $nid_info['dateOfBirth'],
            'birthPlace' => $nid_info['birthPlace']  ?? null,
            // 'pin' => $nid_info['pin'],
            'qr_code' => $request->qr_code,
        ]);

         // Return the view with NID info and QR code data
         if ($request->qr_code == 1) {
            return view('pdf.new_server_copy_unofficial', compact('nid_info', 'presentAddress', 'permanentAddress'));
        } else {
            return view('pdf.server_copy_unofficial_without_qr_code', compact('nid_info', 'presentAddress', 'permanentAddress'));
        }
        
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VoterInfo  $voterInfo
     * @return \Illuminate\Http\Response
     */
    public function show(VoterInfo $voterInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VoterInfo  $voterInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(VoterInfo $voterInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VoterInfo  $voterInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VoterInfo $voterInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VoterInfo  $voterInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(VoterInfo $voterInfo)
    {
        //
    }
}
