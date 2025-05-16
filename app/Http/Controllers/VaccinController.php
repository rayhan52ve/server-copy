<?php

namespace App\Http\Controllers;

use App\Models\Vaccin;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class VaccinController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        return view('User.modules.vaccin.vaccin', compact('now'));
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
        $user = User::findOrFail($request->user_id);
        $userBalance = $user->balance;
    
        $price = auth()->user()->is_admin ? 0 : (int)$request->price;
    
        if ($userBalance < $price) {
            Alert::toast("আপনার অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
            return redirect()->route('user.vaccin.index');
        }
    
        // Deduct balance
        $user->balance -= $price;
        $user->save();
    
        // Create verification token
        $verificationToken = Str::random(60);
        
        // Store vaccination record
        $data = $request->except('price');
        $data['verification_token'] = $verificationToken;
        $vaccin = Vaccin::create($data);
        // dd($verificationToken);
    
        return view('pdf.vaccin_pdf', [
            'data' => $data,
            'verification_url' => route('certificate_verify', $verificationToken)
        ]);
    }
    
    public function certificate_verify($token)
    {
        $data = Vaccin::where('verification_token', $token)->firstOrFail();
        return view('User.modules.vaccin.verify.verifyCopy', compact('data'));
    }

    public function printSavedVaccin($id)
    {
        $data = Vaccin::find($id);
        $verification_url = route('certificate_verify',$data->verification_token);
        // dd($id,$data);
        $user = User::find($data->user_id);
        $userBalance = $user->balance;

        $message = Message::first();

        $price = (int)$message->vaccin_remake_price;
        if (auth()->user()->is_admin != 0) {
            $price = 0;
        }

        if ($userBalance >= $price) {
            $user->balance -= $price;
            $user->save();
            return view('pdf.vaccin_pdf', compact('data','verification_url'));
        } else {
            Alert::toast("পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
            return redirect()->back();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vaccin  $vaccin
     * @return \Illuminate\Http\Response
     */
    public function show(Vaccin $vaccin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vaccin  $vaccin
     * @return \Illuminate\Http\Response
     */
    public function edit(Vaccin $vaccin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vaccin  $vaccin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vaccin $vaccin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vaccin  $vaccin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vaccin $vaccin)
    {
        //
    }
}
