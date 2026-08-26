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
use App\Models\PassportServerCopy;
use App\Models\PassportServerCopyType;

class PassportServerCopyController extends Controller
{
    public function index()
    {
        $notice = Notice::first();
        $message = Message::first();
        $submitStatus = SubmitStatus::first();
        $passportServerCopy = PassportServerCopy::where('user_id', auth()->user()->id)->get();
        $types = PassportServerCopyType::all();
        return view('User.modules.passport_server_copy.index', compact('passportServerCopy', 'types', 'notice', 'message', 'submitStatus'));
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

        $passportServerCopyType = PassportServerCopyType::find($request->type);
        if ($user->premium == 2 && $now < $user->premium_end) {
            $price = (int)$passportServerCopyType->premium_price;
        } else {
            $price = (int)$passportServerCopyType->price;
        }

        if ($userBalance >= $price) {
            PassportServerCopy::create($request->except('price'));
            $user->balance -= $price;
            $user->save();

            //Real Time Notification
            $message = 'Passport Server Copy Ordered By ' . $user->name;

            $adminNotification = new AdminNotification();
            $adminNotification->user_id = $user->id;
            $adminNotification->msg = $message;
            $adminNotification->save();

            $status = 0;
            $user_name = '';
            event(new OrderNotification($message, $status, $user_name));

            Alert::toast("Passport Server Copy Created Successfully.", 'success');
        } else {
            Alert::toast("আপনার অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
        }

        return redirect()->back();
    }
}
