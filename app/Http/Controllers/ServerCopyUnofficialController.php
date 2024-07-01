<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        return view('User.modules.server_copy_unofficial.index');
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

        // Return the view with NID info and QR code data
        // return view('pdf.server_copy_unofficial', compact('nid_info', 'base64Image'));
        return view('pdf.new_server_copy_unofficial', compact('nid_info', 'base64Image'));
    }

    // Print NID server copy end
}
