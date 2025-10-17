<?php

namespace App\Http\Controllers;

use App\Events\OrderNotification;
use App\Models\AdminNotification;
use App\Models\PreTransaction;
use App\Models\Recharge;
use App\Models\Report;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class RechargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recharges = Recharge::where('user_id', auth()->user()->id)->latest()->get();
        // dd($recharges);
        return view('User.modules.recharge.create', compact('recharges'));
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
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:1',
            'transaction_id' => 'required|string|max:255|unique:recharges,transaction_id',
        ]);

        // If validation fails
        if ($validator->fails()) {
            $errorMessages = implode(' ', $validator->errors()->all());
            Alert::toast($errorMessages, 'error');
            return redirect()->back()->withInput();
        }
        $user = User::findOrFail($request->user_id);
        $hasPreTrx = PreTransaction::where('trx_id', $request->transaction_id)->where('status', 0)->first();
        $recharge = new Recharge();
        if ($hasPreTrx) {
            $recharge->status = 1;
            $recharge->amount = $hasPreTrx->amount;

            $hasPreTrx->status = 1;
            $hasPreTrx->save();


            $user->balance += $hasPreTrx->amount;
            $user->save();

            //report
            $todaysReport = Report::whereDate('created_at', Carbon::today())->first();
            if ($todaysReport) {
                $todaysReport->manual_recharge += $hasPreTrx->amount;
                $todaysReport->income = $todaysReport->manual_recharge + $todaysReport->auto_recharge;
                $todaysReport->profit = $todaysReport->income - $todaysReport->expense;
                $todaysReport->save();
            } else {
                Report::create([
                    'manual_recharge' => $hasPreTrx->amount,
                    'income' => $hasPreTrx->amount,
                    'profit' => $hasPreTrx->amount,
                ]);
            }
        } else {
            $recharge->status = 0;
            $recharge->amount = $request->amount;
        }
        $recharge->transaction_id = $request->transaction_id;
        $recharge->payment_number = $request->payment_number;
        $recharge->user_id = $request->user_id;
        $recharge->method = $request->method;
        $recharge->save();

        //Real Time Notification
        $message = 'Recharge Request Sent By ' . $user->name;

        $adminNotification = new AdminNotification();
        $adminNotification->user_id = $user->id;
        $adminNotification->msg = $message;
        $adminNotification->save();

        $status = 0;
        $user_name = '';
        event(new OrderNotification($message, $status, $user_name));

        Alert::toast("Recharge Request submitted Successfully.", 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
