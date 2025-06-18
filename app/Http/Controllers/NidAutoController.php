<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\NidAuto;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Message;
use App\Models\NidMake;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Http;


class NidAutoController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        return view('User.modules.nid_auto.nid_auto', compact('now'));
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
        // dd($request->all());
        // $request->validate([
        //     'nid_image' => 'required',
        //     'sign_image' => 'required',
        //     'name_bn' => 'required',
        //     'name_en' => 'required',
        //     'nid_number' => 'required',
        //     'pin' => 'required',
        //     'husband_father' => 'required',
        //     'fathers_name' => 'required',
        //     'mothers_name' => 'required',
        //     'birth_place' => 'required',
        //     'birthday' => 'required',
        //     'blood_group' => 'nullable',
        //     'issue_date' => 'nullable',
        //     'address' => 'required',
        // ]);

        $user = User::find($request->user_id);
        $userBalance = $user->balance;

        $price = (int)$request->price;
        if (auth()->user()->is_admin != 0) {
            $price = 0;
        }

        if ($userBalance >= $price) {
            $user->balance -= $price;
            $user->save();
            $data = $request->except('price');
            NidMake::create($data);
            $redirectRoute = 'nidAuto';
            if ($request->nid_type == '1') {
                return view('pdf.new_nid_pdf', compact('data', 'redirectRoute'));
            } else {
                return view('pdf.smart_nid_pdf', compact('data', 'redirectRoute'));
            }
        } else {
            Alert::toast("আপনার অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
            return redirect()->route('user.nid-auto.index');
        }
    }

    public function printSavedNid($id)
    {
        $data = NidAuto::find($id);
        $user = User::find($data->user_id);
        $userBalance = $user->balance;

        $message = Message::first();

        $price = (int)$message->nid_remake;
        if (auth()->user()->is_admin != 0) {
            $price = 0;
        }

        if ($userBalance >= $price) {
            $user->balance -= $price;
            $user->save();
            $redirectRoute = 'userFileList';
            if ($data->nid_type == '1') {
                return view('pdf.new_nid_pdf', compact('data', 'redirectRoute'));
            } else {
                return view('pdf.smart_nid_pdf', compact('data', 'redirectRoute'));
            }
        } else {
            Alert::toast("পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NidAuto  $nidMake
     * @return \Illuminate\Http\Response
     */
    public function show(NidAuto $nidMake)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NidAuto  $nidMake
     * @return \Illuminate\Http\Response
     */
    public function edit(NidAuto $nidMake)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NidAuto  $nidMake
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NidAuto $nidMake)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NidAuto  $nidMake
     * @return \Illuminate\Http\Response
     */
    public function destroy(NidAuto $nidMake)
    {
        //
    }


    public function nidAutoSearch(Request $request)
    {

        $request->validate([
            'nid' => 'required|string',
            'dob' => 'required|date',
        ]);

        // try {


        $nid = $request->input('nid');
        $dob = $request->input('dob');
        $price = (int) $request->input('search_price');
        if (auth()->user()->is_admin != 0) {
            $price = 0;
        }

        $user = User::find($request->user_id);
        $userBalance = $user->balance;

        // Check if user has sufficient balance
        if ($userBalance < $price) {
            Alert::toast("আপনার অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
            return redirect()->back();
        }

        // Construct API URL
        $url = "https://api.foxithub.pro/unofficial/scUpdate/api.php?key=ownx&nid=" . urlencode($nid) . "&dob=" . urlencode($dob);
        // dd($url);

        // Initialize cURL session
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute cURL request
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            $error_message = curl_error($ch);
            curl_close($ch);
            return back()->with('error_message', 'অনুগ্রহ করে আবার চেষ্টা করুন. ' . $error_message);
        }
        // dd($response);
        curl_close($ch);

        // Decode JSON response
        $apidata = json_decode($response, true);
        if (
            !$apidata ||
            !isset($apidata['national']['R1']) ||
            trim($apidata['national']['R1']) === ""
        ) {
            return back()->with('error_message', 'NID তথ্য পাওয়া যায়নি।');
        }

        $data['nid_number'] = $apidata['national']['R1'];
        $data['pin'] = $apidata['national']['R2'];
        $data['voter_no'] = $apidata['national']['R3'];
        $data['voterArea'] = $apidata['national']['R4'];
        $data['birth_place'] = $apidata['national']['R5'];

        $data['name_bn'] = $apidata['personal']['R1'];
        $data['name_en'] = $apidata['personal']['R2'];
        $data['birthday'] = $apidata['personal']['R3'];
        $data['fathers_name'] = $apidata['personal']['R4'];
        $data['mothers_name'] = $apidata['personal']['R5'];
        $data['spouse'] = $apidata['personal']['R6'];
        // $data['occupation'] = $apidata['personal']['R1'];

        $data['gender'] = $apidata['other']['R1'];
        $data['blood_group'] = $apidata['other']['R2'];
        $data['religion'] = $apidata['other']['R4'];

        $data['presentAddress'] = $apidata['presentAddress'];
        $data['permanentAddress'] = $apidata['permanentAddress'];

        $data['nidImage'] = $apidata['photo'];

        // dd($data);

        // Check if the response is valid
        if ($data['nid_number'] == null) {
            return back()->with('error_message', 'NID তথ্য পাওয়া যায়নি।');
        }
        $data['birth_place_en'] = District::where('bn_name',$data['birth_place'])->first()->name ?? null;

        // Deduct balance from user and save
        $user->balance -= $price;
        $user->save();

        // Process the response if no error
        return view('User.modules.nid_auto.nid_auto', [
            'nidImage' => $data['nidImage'] ?? null,
            // 'signatureImage' => $data['sign'] ?? null,
            'nid_number' => $data['nid_number'] ?? null,
            'name_bn' => $data['name_bn'] ?? null,
            'name_en' => $data['name_en'] ?? null,
            'pin' => $data['pin'] ?? null,
            'birthday' => $data['birthday'] ?? null,
            'birth_place' => $data['birth_place'] ?? null,
            'birth_place_en' => $data['birth_place_en'] ?? null,
            'fathers_name' => $data['fathers_name'] ?? null,
            'mothers_name' => $data['mothers_name'] ?? null,
            'blood_group' => $data['blood_group'] ?? null,
            'address' => $data['presentAddress'] ?? null,
        ]);


        // If all APIs fail due to the limit, throw an error
        return back()->withErrors(['msg' => 'All APIs have reached their daily request limit. Please try again later.']);
        // } catch (\Exception $e) {
        //     // Handle any other exceptions and display an error message
        //     Alert::toast("Something Went wrong.", 'error');
        //     return back()->withErrors(['msg' => 'An error occurred: ' . $e->getMessage()]);
        // }
    }
}
