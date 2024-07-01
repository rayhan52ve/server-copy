<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Notice;
use App\Models\SubmitStatus;
use App\Models\BiometricInfo;
use App\Models\BiometricType;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BiometricInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notice = Notice::first();
        $message = Message::first();
        $submitStatus = SubmitStatus::first();
        $biometricInfo = BiometricInfo::where('user_id', auth()->user()->id)->get();
        $types = BiometricType::all();
        return view('User.modules.biometric_info.index', compact('biometricInfo', 'types', 'notice', 'message', 'submitStatus'));
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

        $user = User::find($request->user_id);
        $userBalance = $user->balance;

        $biometricType = BiometricType::find($request->type);
        if ($user->premium == 2) {
            $price = (int)$biometricType->premium_price;
        } else {
            $price = (int)$biometricType->price;
        }

        if ($userBalance >= $price) {
            BiometricInfo::create($request->except('price'));
            $user->balance -= $price;
            $user->save();
            Alert::toast("Biometric Info Created Successfully.", 'success');
        } else {
            Alert::toast("আপনার অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BiometricInfo  $biometricInfo
     * @return \Illuminate\Http\Response
     */
    public function show(BiometricInfo $biometricInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BiometricInfo  $biometricInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(BiometricInfo $biometricInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BiometricInfo  $biometricInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BiometricInfo $biometricInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BiometricInfo  $biometricInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(BiometricInfo $biometricInfo)
    {
        //
    }
}
