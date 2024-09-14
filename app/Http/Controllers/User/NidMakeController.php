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
        $request->validate([
            'nid_image' => 'required',
            'sign_image' => 'required',
            'name_bn' => 'required',
            'name_en' => 'required',
            'nid_number' => 'required',
            'pin' => 'required',
            'husband_father' => 'required',
            'fathers_name' => 'required',
            'mothers_name' => 'required',
            'birth_place' => 'required',
            'birthday' => 'required',
            'blood_group' => 'nullable',
            'issue_date' => 'nullable',
            'address' => 'required',
        ]);

        $user = User::find($request->user_id);
        $userBalance = $user->balance;

        $price = (int)$request->price;
        if (auth()->user()->is_admin == 1) {
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
        if (auth()->user()->is_admin == 1) {
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
        // $request->validate([
        //     'pdf_file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        // ]);

        $pdf_file = $request->file('pdf_file');

        try {
            $response = Http::attach(
                'pdf_file',
                file_get_contents($pdf_file->getRealPath()),
                $pdf_file->getClientOriginalName()
            )->post('https://api24.pythonanywhere.com/ext/webmetrix');

            if ($response->successful()) {
                $data = $response->json();

                return view('User.modules.nid_make.nid_make', [
                    'nidImage' => $data['photo'] ?? null,
                    'signatureImage' => $data['sign'] ?? null,
                    'nid_number' => $data['national_id'] ?? null,
                    'name_bn' => $data['nameBen'] ?? null,
                    'name_en' => $data['nameEng'] ?? null,
                    'pin' => $data['pin'] ?? null,
                    'birthday' => $data['birth'] ?? null,
                    'birth' => $data['birth'] ?? null,
                    'birth_place' => $data['birth_place'] ?? null,
                    'fathers_name' => $data['father'] ?? null,
                    'mothers_name' => $data['mother'] ?? null,
                    'blood_group' => $data['blood'] ?? null,
                    'address' => $data['address'] ?? null,
                ]);
            } else {
                return back()->withErrors(['msg' => 'File upload failed. Please try again.']);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['msg' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
