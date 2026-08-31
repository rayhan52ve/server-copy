<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\OrderNotification;
use App\Models\AdminNotification;
use App\Models\HideUnhide;
use App\Models\Message;
use App\Models\Notice;
use App\Models\SubmitStatus;
use App\Models\User;
use App\Models\NumberToLocation;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class NumberToLocationController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $notice = Notice::first();
        $message = Message::first();
        $submitStatus = SubmitStatus::first();
        $hideUnhide = HideUnhide::first();
        $numberToLocation = NumberToLocation::where('user_id', auth()->user()->id)->get();
        return view('User.modules.number_to_location.index', compact('numberToLocation', 'notice', 'message', 'submitStatus', 'hideUnhide', 'now'));
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

        $data = $request->except('price');

        if ($userBalance >= $price) {
            NumberToLocation::create($data);
            $user->balance -= $price;
            $user->save();

            //Real Time Notification
            $message = 'Number To Location Ordered By ' . $user->name;

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


        return redirect()->route('user.number-to-location.index');
    }
}
