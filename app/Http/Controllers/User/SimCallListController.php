<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Events\OrderNotification;
use App\Models\AdminNotification;
use App\Models\Message;
use App\Models\Notice;
use App\Models\SubmitStatus;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\SimCallList;
use App\Models\SimCallListType;

class SimCallListController extends Controller
{
    public function index()
    {
        $notice = Notice::first();
        $message = Message::first();
        $submitStatus = SubmitStatus::first();
        $simCallList = SimCallList::where('user_id', auth()->user()->id)->get();
        $types = SimCallListType::all();
        return view('User.modules.sim_call_list.index', compact('simCallList', 'types', 'notice', 'message', 'submitStatus'));
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
        $now = Carbon::now();

        $SimCallListType = SimCallListType::find($request->type);
        if ($user->premium == 2 && $now < $user->premium_end) {
            $price = (int)$SimCallListType->premium_price;
        } else {
            $price = (int)$SimCallListType->price;
        }

        if ($userBalance >= $price) {
            SimCallList::create($request->except('price'));
            $user->balance -= $price;
            $user->save();

            //Real Time Notification
            $message = 'Phone Number Ordered By ' . $user->name;

            $adminNotification = new AdminNotification();
            $adminNotification->user_id = $user->id;
            $adminNotification->msg = $message;
            $adminNotification->save();

            $status = 0;
            $user_name = '';
            event(new OrderNotification($message, $status, $user_name));

            Alert::toast("Phone Number Created Successfully.", 'success');
        } else {
            Alert::toast("আপনার অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
        }

        return redirect()->back();
    }
}
