<?php

namespace App\Http\Controllers\User;

use App\Events\OrderNotification;
use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use App\Models\Message;
use App\Models\Notice;
use App\Models\SubmitStatus;
use App\Models\SignCopyOrder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class SignCopyOrderController extends Controller
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
        $signCopyOrders = SignCopyOrder::where('user_id', auth()->user()->id)->get();
        return view('User.modules.sign_copy_order.index', compact('signCopyOrders', 'notice', 'message', 'submitStatus', 'now'));
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

        if ($userBalance >= $price) {
            SignCopyOrder::create($request->except('price'));
            $user->balance -= $price;
            $user->save();

            //Real Time Notification
            $message = 'Sign Copy Ordered By ' . $user->name;

            $adminNotification = new AdminNotification;
            $adminNotification->user_id = $user->id;
            $adminNotification->msg = $message;
            $adminNotification->save();

            $status = 0;
            $user_name = '';
            event(new OrderNotification($message, $status, $user_name));

            Alert::toast("Sign Copy Order Created Successfully.", 'success');
        } else {
            Alert::toast("আপনার অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
        }


        return redirect()->route('user.sign-copy.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SignCopyOrder  $signCopyOrder
     * @return \Illuminate\Http\Response
     */
    public function show(SignCopyOrder $signCopyOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SignCopyOrder  $signCopyOrder
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $signCopyOrder = SignCopyOrder::find($id);
        return view('User.modules.sign_copy_order.edit', compact('signCopyOrder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SignCopyOrder  $signCopyOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $signCopyOrder = SignCopyOrder::find($id);

        $data = $request->except(['nid_image', 'sign_image']);

        if ($request->hasFile('nid_image')) {
            $file = $request->file('nid_image');
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid() . '_' . time() . '.' . $extension;
            $path = 'uploads/sign_copy/';
            $file->move(public_path($path), $filename);
            $data['nid_image'] = $filename;
        }

        if ($request->hasFile('sign_image')) {
            $file = $request->file('sign_image');
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid() . '_' . time() . '.' . $extension;
            $path = 'uploads/sign_copy/';
            $file->move(public_path($path), $filename);
            $data['sign_image'] = $filename;
        }

        $signCopyOrder->update($data);

        Alert::toast("Sign Copy Order Updated Successfully.", 'success');
        return redirect()->route('user.sign-copy.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SignCopyOrder  $signCopyOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $signCopyOrder = SignCopyOrder::find($id);

        $destination1 = 'uploads/sign_copy/' . $signCopyOrder->nid_image;
        $destination2 = 'uploads/sign_copy/' . $signCopyOrder->sign_image;

        if (File::exists($destination1)) {
            File::delete($destination1);
        }

        if (File::exists($destination2)) {
            File::delete($destination2);
        }

        $signCopyOrder->delete();
        Alert::toast("Sign Copy Order Deleted Successfully.", 'success');
        return redirect()->back();
    }
}
