<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Events\OrderNotification;
use App\Models\AdminNotification;
use App\Models\HideUnhide;
use App\Models\Message;
use App\Models\Notice;
use App\Models\SubmitStatus;
use App\Models\IdCardOrder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class IdCardOrderController extends Controller
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
        $idCardOrders = IdCardOrder::where('user_id', auth()->user()->id)->get();
        return view('User.modules.id_card_order.index', compact('idCardOrders', 'notice', 'message', 'submitStatus', 'hideUnhide', 'now'));
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

        $data = $request->except(['price', 'user_file']);

        if ($userBalance >= $price) {
            if ($request->hasFile('user_file')) {
                $file = $request->file('user_file');
                $extension = $file->getClientOriginalExtension();
                $filename = uniqid() . '_' . time() . '.' . $extension;
                $path = 'uploads/id_card/';
                $file->move(public_path($path), $filename);
                $data['user_file'] = $filename;
            }

            IdCardOrder::create($data);
            $user->balance -= $price;
            $user->save();

            //Real Time Notification
            $message = 'Id Card Ordered By ' . $user->name;

            $adminNotification = new AdminNotification;
            $adminNotification->user_id = $user->id;
            $adminNotification->msg = $message;
            $adminNotification->save();

            $status = 0;
            $user_name = '';
            event(new OrderNotification($message, $status, $user_name));

            Alert::toast("Id Card Ordered Successfully.", 'success');
        } else {
            Alert::toast("আপনার অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IdCardOrder  $idCardOrder
     * @return \Illuminate\Http\Response
     */
    public function show(IdCardOrder $idCardOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IdCardOrder  $idCardOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(IdCardOrder $idCardOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IdCardOrder  $idCardOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $idCardOrder = IdCardOrder::find($id);
        // dd($idCardOrder);
        $user = User::find($idCardOrder->user->id);

        if ($request->hasFile('user_file')) {
            $file = $request->file('user_file');
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid() . '_' . time() . '.' . $extension;
            $path = 'uploads/id_card/';
            $file->move(public_path($path), $filename);
            $data['user_file'] = $filename;
        }
        $idCardOrder->user_file = $data['user_file'];
        $idCardOrder->save();

        //Real Time Notification
        $message = 'File Uploaded By ' . $user->name;

        $adminNotification = new AdminNotification;
        $adminNotification->user_id = $user->id;
        $adminNotification->msg = $message;
        $adminNotification->save();

        $status = 22;
        $user_name = '';
        event(new OrderNotification($message, $status, $user_name));

        Alert::toast("Id Card Ordered Successfully.", 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IdCardOrder  $idCardOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(IdCardOrder $idCardOrder)
    {
        //
    }
}
