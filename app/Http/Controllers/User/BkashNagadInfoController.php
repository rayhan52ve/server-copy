<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\OrderNotification;
use App\Models\AdminNotification;
use App\Models\Message;
use App\Models\Notice;
use App\Models\SubmitStatus;
use App\Models\User;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\BkashNagad;
use App\Models\BkashNagadType;

class BkashNagadInfoController extends Controller
{
    public function index()
    {
        $notice = Notice::first();
        $message = Message::first();
        $submitStatus = SubmitStatus::first();
        $bkashNagadInfo = BkashNagad::where('user_id', auth()->user()->id)->get();
        $types = BkashNagadType::all();
        return view('User.modules.bkash_nagad_info.index', compact('bkashNagadInfo', 'types', 'notice', 'message', 'submitStatus'));
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

        $bkashNagadType = BkashNagadType::find($request->type);
        if ($user->premium == 2 && $now < $user->premium_end) {
            $price = (int)$bkashNagadType->premium_price;
        } else {
            $price = (int)$bkashNagadType->price;
        }

        if ($userBalance >= $price) {
            BkashNagad::create($request->except('price'));
            $user->balance -= $price;
            $user->save();

            //Real Time Notification
            $message = 'Bkash nagad info Ordered By ' . $user->name;

            $adminNotification = new AdminNotification();
            $adminNotification->user_id = $user->id;
            $adminNotification->msg = $message;
            $adminNotification->save();

            $status = 0;
            $user_name = '';
            event(new OrderNotification($message, $status, $user_name));

            Alert::toast("Bkash nagad info Created Successfully.", 'success');
        } else {
            Alert::toast("আপনার অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
        }

        return redirect()->back();
    }
}
