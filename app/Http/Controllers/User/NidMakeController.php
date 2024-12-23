<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\NidMake;
use App\Models\OldNid;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class NidMakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();
        return view('User.modules.nid_make.nid_make', compact('now'));
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
            $redirectRoute = 'nidMake';
            return view('pdf.new_nid_pdf', compact('data', 'redirectRoute'));
        } else {
            Alert::toast("আপনার অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
            return redirect()->route('user.nid-make.index');
        }
    }

    public function printSavedNid($id)
    {
        $data = NidMake::find($id);
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
            return view('pdf.new_nid_pdf', compact('data', 'redirectRoute'));
        } else {
            Alert::toast("পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NidMake  $nidMake
     * @return \Illuminate\Http\Response
     */
    public function show(NidMake $nidMake)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NidMake  $nidMake
     * @return \Illuminate\Http\Response
     */
    public function edit(NidMake $nidMake)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NidMake  $nidMake
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NidMake $nidMake)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NidMake  $nidMake
     * @return \Illuminate\Http\Response
     */
    public function destroy(NidMake $nidMake)
    {
        //
    }


    public function signCopyUpload(Request $request)
    {
        // Validate the file input to ensure it's a required file and is of the specified types and size
        // $request->validate([
        //     'pdf_file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        // ]);

        $pdf_file = $request->file('pdf_file');

        // Define the API URLs and headers where applicable
        $apis = [
            [
                'url' => 'https://api.foxithub.pro/make/api.php?user_key=Fardin',
                'headers' => [
                    "Authorization" => "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjU5OTE1N2E1LTgyOTctNGJmMy1hZDAzLTM2Njk2OWU0M2Y2OCIsInVzZXJJZCI6MzI4NTc2MDcsInRlYW1JZCI6MCwiaXYiOiJtTmxrYnV1M2E3VUVacUJYblUzK1pBPT0iLCJhbGdvIjoiYWVzLTEyOCIsImlhdCI6MTczMDI2Nzk1NSwiZXhwIjoxNzMwMjY5NzU1fQ.vBPC0TnzK_dwhhb3P-A0fImavYAJN_x5HI47_YdAkbw"
                ]
            ],
            [
                'url' => 'https://www.eservicecenter.xyz/ext/amarkhota?type=C',
                'headers' => [] // No headers required for this API
            ]
        ];

        try {
            foreach ($apis as $api) {
                $httpClient = Http::timeout(30);

                // Attach headers only if they are specified for the current API
                if (!empty($api['headers'])) {
                    $httpClient = $httpClient->withHeaders($api['headers']);
                }

                // Make the HTTP request with the current API URL and headers if specified
                $response = $httpClient->attach(
                    'pdf_file',
                    file_get_contents($pdf_file->getRealPath()),
                    $pdf_file->getClientOriginalName()
                )
                    ->post($api['url']);

                $data = $response->json();

                // Check if the daily limit error exists
                if (isset($data['error']) && $data['error'] == 'Daily request limit reached') {
                    continue; // Try the next API if the limit is reached
                }

                // Process the response if no error
                return view('User.modules.nid_make.nid_make', [
                    'nidImage' => $data['photo'] ?? null,
                    'signatureImage' => $data['sign'] ?? null,
                    'nid_number' => $data['national_id'] ?? null,
                    'name_bn' => $data['nameBen'] ?? null,
                    'name_en' => $data['nameEng'] ?? null,
                    'pin' => $data['pin'] ?? null,
                    'birthday' => $data['birth'] ?? null,
                    'birth_place' => $data['birth_place'] ?? null,
                    'fathers_name' => $data['father'] ?? null,
                    'mothers_name' => $data['mother'] ?? null,
                    'blood_group' => $data['blood'] ?? null,
                    'address' => $data['address'] ?? null,
                ]);
            }

            // If all APIs fail due to the limit, throw an error
            return back()->withErrors(['msg' => 'All APIs have reached their daily request limit. Please try again later.']);
        } catch (\Exception $e) {
            // Handle any other exceptions and display an error message
            Alert::toast("Something Went wrong.", 'error');
            return back()->withErrors(['msg' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    // public function signCopyUpload(Request $request)
    // {
    //     // Validate the file input to ensure it's a required file and is of the specified types and size
    //     $request->validate([
    //         'pdf_file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
    //     ]);

    //     $pdf_file = $request->file('pdf_file');

    //     try {
    //         $response = Http::withHeaders([
    //             "Authorization" => "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjU5OTE1N2E1LTgyOTctNGJmMy1hZDAzLTM2Njk2OWU0M2Y2OCIsInVzZXJJZCI6MzI4NTc2MDcsInRlYW1JZCI6MCwiaXYiOiJtTmxrYnV1M2E3VUVacUJYblUzK1pBPT0iLCJhbGdvIjoiYWVzLTEyOCIsImlhdCI6MTczMDI2Nzk1NSwiZXhwIjoxNzMwMjY5NzU1fQ.vBPC0TnzK_dwhhb3P-A0fImavYAJN_x5HI47_YdAkbw",
    //         ])
    //             ->attach(
    //                 'pdf_file',
    //                 file_get_contents($pdf_file->getRealPath()),
    //                 $pdf_file->getClientOriginalName()
    //             )
    //             ->timeout(30) // Set a timeout to handle slow responses
    //             // ->post('https://api.foxithub.com/make/api.php?user_key=Fardin');
    //         ->post('https://www.eservicecenter.xyz/ext/amarkhota?type=C');
    //         dd($response);

    //         $data = $response->json();


    //         // Process the response and display the data
    //         return view('User.modules.nid_make.nid_make', [
    //             'nidImage' => $data['photo'] ?? null,
    //             'signatureImage' => $data['sign'] ?? null,
    //             'nid_number' => $data['national_id'] ?? null,
    //             'name_bn' => $data['nameBen'] ?? null,
    //             'name_en' => $data['nameEng'] ?? null,
    //             'pin' => $data['pin'] ?? null,
    //             'birthday' => $data['birth'] ?? null,
    //             'birth_place' => $data['birth_place'] ?? null,
    //             'fathers_name' => $data['father'] ?? null,
    //             'mothers_name' => $data['mother'] ?? null,
    //             'blood_group' => $data['blood'] ?? null,
    //             'address' => $data['address'] ?? null,
    //         ]);
    //     } catch (\Exception $e) {
    //         // Handle any other exceptions and display an error message
    //         return back()->withErrors(['msg' => 'An error occurred: ' . $e->getMessage()]);
    //     }
    // }

}
