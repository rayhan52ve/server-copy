<?php

namespace App\Http\Controllers\User;

use App\Events\OrderNotification;
use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use App\Models\Message;
use App\Models\NameAddressId;
use App\Models\Notice;
use App\Models\SubmitStatus;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class NameAddressIdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();
        $notice = Notice::first();
        $message = Message::first();
        $submitStatus = SubmitStatus::first();
        $nameAddressIds = NameAddressId::where('user_id', auth()->user()->id)->get();
        return view('User.modules.name_address_id.index', compact('nameAddressIds', 'notice', 'message', 'submitStatus', 'now'));
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

        $user = User::find($request->user_id);
        $userBalance = $user->balance;

        $price = (int)$request->price;

        $data = $request->except(['price', 'image']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid() . '_' . time() . '.' . $extension;
            $path = 'uploads/id_card/';
            $file->move(public_path($path), $filename);
            $data['image'] = $filename;
        }

        if ($userBalance >= $price) {
            NameAddressId::create($data);
            $user->balance -= $price;
            $user->save();

            //Real Time Notification
            $message = 'Id Card(Name,Address) Ordered By ' . $user->name;

            $adminNotification = new AdminNotification();
            $adminNotification->user_id = $user->id;
            $adminNotification->msg = $message;
            $adminNotification->save();

            event(new OrderNotification($message));

            Alert::toast("Order Created Successfully.", 'success');
        } else {
            Alert::toast("আপনার অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
        }


        return redirect()->route('user.name-address-id.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nameAddressId  $NameAddressId
     * @return \Illuminate\Http\Response
     */
    public function show(nameAddressId $NameAddressId)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nameAddressId  $NameAddressId
     * @return \Illuminate\Http\Response
     */
    public function edit(nameAddressId $NameAddressId)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nameAddressId  $NameAddressId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, nameAddressId $NameAddressId)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nameAddressId  $NameAddressId
     * @return \Illuminate\Http\Response
     */
    public function destroy(nameAddressId $NameAddressId)
    {
        //
    }
}
