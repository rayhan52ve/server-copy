<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\OrderNotification;
use App\Models\AdminNotification;
use App\Models\Message;
use App\Models\Notice;
use App\Models\SubmitStatus;
use App\Models\TinOrder;
use App\Models\User;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class TinOrderController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $notice = Notice::first();
        $message = Message::first();
        $submitStatus = SubmitStatus::first();
        $tinOrders = TinOrder::where('user_id', auth()->user()->id)->get();
        return view('User.modules.tin_order.index', compact('tinOrders', 'notice', 'message', 'submitStatus', 'now'));
    }

    public function store(Request $request)
    {

        $user = User::find($request->user_id);
        $userBalance = $user->balance;

        $price = (int)$request->price;

        if ($userBalance >= $price) {
            TinOrder::create($request->except('price'));
            $user->balance -= $price;
            $user->save();

            //Real Time Notification
            $message = 'Tin Ordered By ' . $user->name;

            $adminNotification = new AdminNotification;
            $adminNotification->user_id = $user->id;
            $adminNotification->msg = $message;
            $adminNotification->save();

            $status = 0;
            $user_name = '';
            event(new OrderNotification($message, $status, $user_name));

            Alert::toast("Tin order Created Successfully.", 'success');
        } else {
            Alert::toast("আপনার অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
        }

        return redirect()->route('user.tin-order.index');
    }
}
