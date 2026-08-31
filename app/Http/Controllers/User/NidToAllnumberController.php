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
use App\Models\NidToAllnumber;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class NidToAllnumberController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $notice = Notice::first();
        $message = Message::first();
        $submitStatus = SubmitStatus::first();
        $hideUnhide = HideUnhide::first();
        $nidToAllnumber = NidToAllnumber::where('user_id', auth()->user()->id)->get();
        return view('User.modules.nid_to_allnumber.index', compact('nidToAllnumber', 'notice', 'message', 'submitStatus', 'hideUnhide', 'now'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nid' => [
                'nullable',
                'required_without:pin',
            ],
            'pin' => [
                'nullable',
                'required_without:nid',
            ],
        ], [
            'nid.required_without' => 'এন.আইডি নাম্বার অথবা পিন নাম্বার যেকোনো একটি দিতে হবে।',
            'pin.required_without' => 'এন.আইডি নাম্বার অথবা পিন নাম্বার যেকোনো একটি দিতে হবে।',
        ]);

        if ($validator->fails()) {
            $firstError = $validator->errors()->first();
            Alert::toast($firstError, 'error');
            return redirect()->back()->withInput();
        }

        $user = User::find($request->user_id);
        $userBalance = $user->balance;

        $price = (int)$request->price;

        $data = $request->except('price');

        if ($userBalance >= $price) {
            NidToAllnumber::create($data);
            $user->balance -= $price;
            $user->save();

            //Real Time Notification
            $message = 'Nid to all number Ordered By ' . $user->name;

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


        return redirect()->route('user.nid-to-allnumber.index');
    }
}
