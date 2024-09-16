<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\ServerCopyUnofficial;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use RealRashid\SweetAlert\Facades\Alert;

class ServerCopyUnofficialController extends Controller
{
    // NID server copy search page start
    public function tech_web_nid_server_copy()
    {
        $now = Carbon::now();
        return view('User.modules.server_copy_unofficial.index', compact('now'));
    }
    // NID server copy search page end

    // Print NID server copy start
    public function tech_web_print_nid_server_copy(Request $request)
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
        $url = "https://api.foxithub.com/unofficial/api.php?key=hlwmember&nid={$nid}&dob={$dob}";
        // $url = "https://publicx.top/servercopy/SV.php?key=lkjhgfds&nid={$nid}&dob={$dob}";
        // dd($url);

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

        if (json_last_error() !== JSON_ERROR_NONE) {
            return back()->with('error_message', 'সার্ভার বন্ধ আছে. পরবর্তীতে আবার চেষ্টা করুন.');
        }

        // Check if the response is valid
        if (!isset($responseArray['data']['status']) || $responseArray['data']['status'] != 200) {
            return back()->with('error_message', 'NID তথ্য পাওয়া যায়নি।');
        }



        // Extract NID information from the response
        $nid_info = $responseArray['data']['data'];
        // dd($nid_info);

        // $permanentAddress = "বাসা/হোল্ডিংঃ- " . ($nid_info['permanentAddress']['houseHoldingNumber'] ?? '') .
        //     ", গ্রাম/রাস্তাঃ- " . ($nid_info['permanentAddress']['street'] ?? '') .
        //     ", মৌজা/মহল্লাঃ- " . ($nid_info['permanentAddress']['mouza'] ?? '') .
        //     ", ইউনিয়নঃ- " . ($nid_info['permanentAddress']['union'] ?? '') .
        //     ", ওয়ার্ড নংঃ- " . ($nid_info['permanentAddress']['ward'] ?? '') .
        //     ", ডাকঘরঃ- " . ($nid_info['permanentAddress']['postOffice'] ?? '') .
        //     ", পোষ্ট কোডঃ- " . ($nid_info['permanentAddress']['postCode'] ?? '') .
        //     ", উপজেলাঃ- " . ($nid_info['permanentAddress']['upazila'] ?? '') .
        //     ", জেলাঃ- " . ($nid_info['permanentAddress']['district'] ?? '') .
        //     ", বিভাগঃ- " . ($nid_info['permanentAddress']['division'] ?? '');

        // $presentAddress = "বাসা/হোল্ডিংঃ- " . ($nid_info['presentAddress']['houseHoldingNumber'] ?? '') .
        //     ", গ্রাম/রাস্তাঃ- " . ($nid_info['presentAddress']['street'] ?? '') .
        //     ", মৌজা/মহল্লাঃ- " . ($nid_info['presentAddress']['mouza'] ?? '') .
        //     ", ইউনিয়নঃ- " . ($nid_info['presentAddress']['union'] ?? '') .
        //     ", ওয়ার্ড নংঃ- " . ($nid_info['presentAddress']['ward'] ?? '') .
        //     ", ডাকঘরঃ- " . ($nid_info['presentAddress']['postOffice'] ?? '') .
        //     ", পোষ্ট কোডঃ- " . ($nid_info['presentAddress']['postCode'] ?? '') .
        //     ", উপজেলাঃ- " . ($nid_info['presentAddress']['upazila'] ?? '') .
        //     ", জেলাঃ- " . ($nid_info['presentAddress']['district'] ?? '') .
        //     ", বিভাগঃ- " . ($nid_info['presentAddress']['division'] ?? '');

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
            'occupation' => $nid_info['profession'] ?? null,
            'nationalId' => $nid_info['nationalId'],
            'permanentAddress' => $nid_info['permanentAddress'],
            'presentAddress' => $nid_info['presentAddress'],
            'photo' => $nid_info['photo'],
            // 'photoBase64' => $nid_info['photoBase64'],
            // 'mobile' => $nid_info['mobile'],
            'religion' => $nid_info['religion'] ?? null,
            'voterArea' => $nid_info['voterArea'] ?? null,
            'dateOfBirth' => $nid_info['dateOfBirth'],
            'birthPlace' => $nid_info['birthPlace'] ?? null,
            'pin' => $nid_info['pin'],
            'qr_code' => $request->qr_code,
        ]);

        // Return the view with NID info and QR code data
        if ($request->qr_code == 1) {
            return view('pdf.new_server_copy_unofficial', compact('nid_info'));
        } else {
            return view('pdf.server_copy_unofficial_without_qr_code', compact('nid_info'));
        }
    }

    public function print_saved_server_copy($id)
    {
        // Find the saved server copy by ID
        $serverCopy = ServerCopyUnofficial::find($id);

        if (!$serverCopy) {
            return back()->with('error_message', 'No data found for the given ID.');
        }

        $user = User::find($serverCopy->user_id);
        $userBalance = $user->balance;

        $message = Message::first();

        $price = (int)$message->servercopy_remake;
        if (auth()->user()->is_admin == 1) {
            $price = 0;
        }

        if ($userBalance >= $price) {
            $user->balance -= $price;
            $user->save();
            // Construct the nid_info array
            $nid_info = [
                'name' => $serverCopy->name,
                'nameEn' => $serverCopy->nameEn,
                'gender' => $serverCopy->gender,
                'bloodGroup' => $serverCopy->bloodGroup,
                'father' => $serverCopy->father,
                'mother' => $serverCopy->mother,
                'spouse' => $serverCopy->spouse,
                'occupation' => $serverCopy->occupation,
                'nationalId' => $serverCopy->nationalId,
                'permanentAddress' => $serverCopy->permanentAddress,
                'presentAddress' => $serverCopy->presentAddress,
                'photo' => $serverCopy->photo,
                // 'photoBase64' => $serverCopy->photoBase64,
                // 'mobile' => $serverCopy->mobile,
                'religion' => $serverCopy->religion,
                'voterArea' => $serverCopy->voterArea,
                'dateOfBirth' => $serverCopy->dateOfBirth,
                'birthPlace' => $serverCopy->birthPlace,
                'pin' => $serverCopy->pin,
            ];


            // Return the view with NID info
            if ($serverCopy->qr_code == 1) {
                return view('pdf.new_server_copy_unofficial', compact('nid_info'));
            } else {
                return view('pdf.server_copy_unofficial_without_qr_code', compact('nid_info'));
            }
        } else {
            Alert::toast("অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
            return redirect()->back();
        }
    }


    // Print NID server copy end
}
