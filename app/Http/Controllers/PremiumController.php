<?php

namespace App\Http\Controllers;

use App\Models\Premium;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PremiumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $premium = Premium::first();
        return view('admin.premium.create', compact('premium'));
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
        $data = $request->all();

        $premium = Premium::first();

        if ($premium) {
            $premium->update($data);
        } else {
            Premium::create($data);
        }
        Alert::toast("Premium Settings Updated Successfully.", 'success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Premium  $premium
     * @return \Illuminate\Http\Response
     */
    public function show(Premium $premium)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Premium  $premium
     * @return \Illuminate\Http\Response
     */
    public function edit(Premium $premium)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Premium  $premium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Premium $premium)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Premium  $premium
     * @return \Illuminate\Http\Response
     */
    public function destroy(Premium $premium)
    {
        //
    }

    public function userIndex(Premium $premium)
    {
        $premium = Premium::first();
        $now = Carbon::now();
        return view('User.modules.premium.index', compact('premium', 'now'));
    }

    public function userPremiumRequest(Request $request, Premium $premium)
    {
        $user = User::findOrFail($request->user_id);

        $userBalance = $user->balance;
        $premium = Premium::first();
        $subscription_days =  $premium->subscription_days;
        $acceptManually =  $premium->accept_request;

        if ($user->premium == 0) {
            $price = (int)$request->price;
        } elseif ($user->premium == 2) {
            $price = (int)$premium->renew_price;
        }

        if ($userBalance >= $price) {
            $user->balance -= $price;

            if ($user->premium == 0) {
                if ($acceptManually == 1) {
                    $user->premium = 1;
                } else {
                    $user->premium = 2;
                    $user->premium_start = Carbon::now();
                    $user->premium_end = Carbon::now()->addDays($subscription_days);
                }
            } elseif ($user->premium == 2) {
                $user->premium_start = Carbon::now();
                $user->premium_end = Carbon::now()->addDays($subscription_days);
            }
            $user->save();
            Alert::toast("Premium Feature Requested.", 'success');
        } else {
            Alert::toast("আপনার অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
        }
        return redirect()->back();
    }

    public function userPremiumStatus(Request $request,$id)
    {
        // dd($request->all());
        $user = User::find($id);
        $userBalance = $user->balance;
        $premium = Premium::first();
        $subscription_days =  $premium->subscription_days;
        $price = (int)$premium->price;
        if(auth()->user()->is_admin == 1){
            $price = 0;
            $subscription_days =  $request->manual_subscription_days ?? $premium->subscription_days;
        }

        if ($user->premium == 0) {
            if ($userBalance >= $price ) {
                $user->balance -= $price;
                $user->premium = 2;
                $user->premium_start = Carbon::now();
                $user->premium_end = Carbon::now()->addDays($subscription_days);
                $user->save();
                Alert::toast("Premium Feature Activated.", 'success');
            } else {
                Alert::toast("ইউজার অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই।", 'error');
                return redirect()->back();
            }
        } elseif ($user->premium == 1) {
            $user->premium = 2;
            $user->premium_start = Carbon::now();
            $user->premium_end = Carbon::now()->addDays($subscription_days);
            $user->save();
            Alert::toast("Premium Feature Activated.", 'success');
        } elseif ($user->premium == 2) {
            $user->premium = 0;
            $user->save();
            Alert::toast("Premium Feature Deactivated.", 'success');
        }
        return redirect()->back();
    }

    public function userPremiumRequestAccept($id)
    {
        $user = User::find($id);
        $userBalance = $user->balance;
        $premium = Premium::first();
        $subscription_days =  $premium->subscription_days;
        $price = (int)$premium->renew_price;
        if ($user->premium == 1) {
            $user->premium = 2;
            $user->premium_start = Carbon::now();
            $user->premium_end = Carbon::now()->addDays($subscription_days);
            $user->save();
            Alert::toast("Premium Feature Activated.", 'success');
        } elseif ($user->premium == 2) {
            if ($userBalance >= $price) {
                $user->balance -= $price;
                $user->premium_start = Carbon::now();
                $user->premium_end = Carbon::now()->addDays($subscription_days);
                $user->save();
                Alert::toast("Premium Feature Renewed.", 'success');
            } else {
                Alert::toast("ইউজার অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই।", 'error');
                return redirect()->back();
            }
        }
        return redirect()->back();
    }
}
