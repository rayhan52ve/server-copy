<?php

namespace App\Http\Controllers;

use App\Models\Premium;
use App\Models\User;
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
        return view('User.modules.premium.index', compact('premium'));
    }

    public function userPremiumRequest(Request $request, Premium $premium)
    {
        $user = User::findOrFail($request->user_id);

        $userBalance = $user->balance;
        $price = (int)$request->price;
        if ($userBalance >= $price) {
            $user->balance -= $price;

            $user->premium = $request->status;
            $user->save();
            Alert::toast("Premium Feature Requested.", 'success');
        } else {
            Alert::toast("আপনার অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
        }
        return redirect()->back();
    }

    public function userPremiumStatus($id)
    {
        $user = User::find($id);
        $userBalance = $user->balance;
        $price = (int) Premium::first()->price;
        if ($user->premium == 1 || $user->premium == 0) {
            if ($userBalance >= $price) {
                $user->balance -= $price;
                $user->premium = 2;
                $user->save();
                Alert::toast("Premium Feature Activated.", 'success');
            } else {
                Alert::toast("ইউজার অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই.", 'error');
                return redirect()->back();
            }
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
        if ($user->premium == 1) {
            $user->premium = 2;
            $user->save();
            Alert::toast("Premium Feature Activated.", 'success');
        }
        return redirect()->back();
    }
}
