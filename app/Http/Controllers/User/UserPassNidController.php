<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Events\OrderNotification;
use App\Models\AdminNotification;
use App\Models\HideUnhide;
use App\Models\Message;
use App\Models\Notice;
use App\Models\SubmitStatus;
use App\Models\User;
use App\Models\UserPassNid;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserPassNidController extends Controller
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
        $hideUnhide = HideUnhide::first();
        $userPassNids = UserPassNid::where('user_id', auth()->user()->id)->get();
        return view('User.modules.user_pass_nid.index', compact('userPassNids', 'notice', 'message', 'submitStatus','hideUnhide', 'now'));
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
            UserPassNid::create($data);
            $user->balance -= $price;
            $user->save();

            //Real Time Notification
            $message = 'User Password (Nid) Ordered By ' . $user->name;

            $adminNotification = new AdminNotification();
            $adminNotification->user_id = $user->id;
            $adminNotification->msg = $message;
            $adminNotification->save();

            $status = 0;
            $user_name = '';
            event(new OrderNotification($message, $status, $user_name));

            Alert::toast("Order Created Successfully.", 'success');
        } else {
            Alert::toast("আপনার অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
        }


        return redirect()->route('user.user-pass-nid.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserPassNid  $userPassNid
     * @return \Illuminate\Http\Response
     */
    public function show(UserPassNid $userPassNid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserPassNid  $userPassNid
     * @return \Illuminate\Http\Response
     */
    public function edit(UserPassNid $userPassNid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserPassNid  $userPassNid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPassNid $userPassNid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserPassNid  $userPassNid
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPassNid $userPassNid)
    {
        //
    }
}
