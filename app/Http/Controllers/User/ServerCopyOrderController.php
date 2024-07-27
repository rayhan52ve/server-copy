<?php

namespace App\Http\Controllers\User;

use App\Events\OrderNotification;
use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use App\Models\Message;
use App\Models\Notice;
use App\Models\SubmitStatus;
use App\Models\ServerCopyOrder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ServerCopyOrderController extends Controller
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
        $serverCopyOrders = ServerCopyOrder::where('user_id', auth()->user()->id)->get();
        return view('User.modules.server_copy_order.index', compact('serverCopyOrders', 'notice', 'message', 'submitStatus','now'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('User.modules.server_copy_order.create');
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

        if ($userBalance >= $price) {
            ServerCopyOrder::create($request->except('price'));
            $user->balance -= $price;
            $user->save();

            //Real Time Notification
            $message = 'Server Copy Ordered By ' . $user->name;

            $adminNotification = new AdminNotification;
            $adminNotification->user_id = $user->id;
            $adminNotification->msg = $message;
            $adminNotification->save();

            event(new OrderNotification($message));

            Alert::toast("Server Copy order Created Successfully.", 'success');
        } else {
            Alert::toast("আপনার অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
        }

        return redirect()->route('user.server-copy.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServerCopyOrder  $serverCopyOrder
     * @return \Illuminate\Http\Response
     */
    public function show(ServerCopyOrder $serverCopyOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServerCopyOrder  $serverCopyOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(ServerCopyOrder $serverCopyOrder)
    {
        return view('User.modules.server_copy_order.edit', compact('serverCopyOrder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServerCopyOrder  $serverCopyOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServerCopyOrder $serverCopyOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServerCopyOrder  $serverCopyOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServerCopyOrder $serverCopyOrder)
    {
        //
    }
}
