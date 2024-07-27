<?php

namespace App\Http\Controllers;

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
        return view('User.modules.server_copy_unofficial.index',compact('now'));
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

        // Find user by ID
        $user = User::find($request->user_id);
        $userBalance = $user->balance;

        // Check if user has sufficient balance
        if ($userBalance < $price) {
            Alert::toast("আপনার অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
            return redirect()->back();
        }

        // Construct API URL
        $url = "https://api.foxithub.com/unofficial/api.php?key=hlwmember&nid={$nid}&dob={$dob}";

        // Initialize cURL session
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute cURL request and get the response
        $response = curl_exec($ch);
        if ($response === false) {
            return back()->with('error_message', 'Sorry, the server did not respond correctly. Please try again.' . curl_error($ch));
        }

        // Decode JSON response
        $responseArray = json_decode($response, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return back()->with('error_message', 'Invalid response from server. Please try again.');
        }

        // Check if data exists in the response
        if (!isset($responseArray['data']['data'])) {
            return back()->with('error_message', 'No data found for the given NID and DOB.');
        }

        // Extract NID information
        $nid_info = $responseArray['data']['data'];

        // dd($nid_info);

        // Generate QR code with required data
        $dataForQR = "Name: " . $nid_info['nameEn'] . "\nNID: " . $nid . "\nDOB: " . $dob;
        $qrCode = new QrCode($dataForQR);
        $qrCode->setSize(300);
        $qrCode->setMargin(10);

        // Use PngWriter to generate QR code image data
        $writer = new PngWriter();
        $qrCodeData = $writer->write($qrCode)->getString();

        // Convert QR code image data to base64
        $base64Image = base64_encode($qrCodeData);

        // Deduct balance from user and save
        $user->balance -= $price;
        $user->save();

        // Save the data to ServerCopyUnofficial
        ServerCopyUnofficial::create([
            'user_id' => $request->user_id,
            'name' => $nid_info['name'],
            'nameEn' => $nid_info['nameEn'],
            'gender' => $nid_info['gender'],
            'bloodGroup' => $nid_info['bloodGroup'],
            'father' => $nid_info['father'],
            'mother' => $nid_info['mother'],
            'spouse' => $nid_info['spouse'],
            'nationalId' => $nid_info['nationalId'],
            'permanentAddress' => $nid_info['permanentAddress'],
            'presentAddress' => $nid_info['presentAddress'],
            'photo' => $nid_info['photo'],
            'mobile' => $nid_info['mobile'],
            'religion' => $nid_info['religion'],
            'nidFather' => $nid_info['nidFather'],
            'nidMother' => $nid_info['nidMother'],
            'voterArea' => $nid_info['voterArea'],
            'dateOfBirth' => $nid_info['dateOfBirth'],
            'birthPlace' => $nid_info['birthPlace'],
            'pin' => $nid_info['pin'],
            'qr_code' => $request->qr_code,
        ]);

        // Return the view with NID info and QR code data
        if ($request->qr_code == 1) {
            return view('pdf.new_server_copy_unofficial', compact('nid_info', 'base64Image'));
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

        // Construct the nid_info array
        $nid_info = [
            'name' => $serverCopy->name,
            'nameEn' => $serverCopy->nameEn,
            'gender' => $serverCopy->gender,
            'bloodGroup' => $serverCopy->bloodGroup,
            'father' => $serverCopy->father,
            'mother' => $serverCopy->mother,
            'spouse' => $serverCopy->spouse,
            'nationalId' => $serverCopy->nationalId,
            'permanentAddress' => $serverCopy->permanentAddress,
            'presentAddress' => $serverCopy->presentAddress,
            'photo' => $serverCopy->photo,
            'mobile' => $serverCopy->mobile,
            'religion' => $serverCopy->religion,
            'nidFather' => $serverCopy->nidFather,
            'nidMother' => $serverCopy->nidMother,
            'voterArea' => $serverCopy->voterArea,
            'dateOfBirth' => $serverCopy->dateOfBirth,
            'birthPlace' => $serverCopy->birthPlace,
            'pin' => $serverCopy->pin,
        ];

        // dd($nid_info);

        // Return the view with NID info
        if ($serverCopy->qr_code == 1) {
            return view('pdf.new_server_copy_unofficial', compact('nid_info'));
        } else {
            return view('pdf.server_copy_unofficial_without_qr_code', compact('nid_info'));
        }
    }


    // Print NID server copy end
}
