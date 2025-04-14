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
use App\Models\NidLostForm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class NidLostFormController extends Controller
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
        $nidLostForms = NidLostForm::where('user_id', auth()->user()->id)->get();
        return view('User.modules.nid_lost_form.index', compact('nidLostForms', 'notice', 'message', 'submitStatus','hideUnhide', 'now'));
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

        $data = $request->except(['price']);

        if ($userBalance >= $price) {
            NidLostForm::create($data);
            $user->balance -= $price;
            $user->save();

            //Real Time Notification
            $message = 'NID modification form Ordered By ' . $user->name;

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


        return redirect()->route('user.nid-lost-form.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NidLostForm  $nidLostForm
     * @return \Illuminate\Http\Response
     */
    public function show(NidLostForm $nidLostForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NidLostForm  $nidLostForm
     * @return \Illuminate\Http\Response
     */
    public function edit(NidLostForm $nidLostForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NidLostForm  $nidLostForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NidLostForm $nidLostForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NidLostForm  $nidLostForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(NidLostForm $nidLostForm)
    {
        //
    }
}
