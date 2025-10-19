<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PreTransaction;
use App\Models\Recharge;
use App\Models\Report;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AdminRechargeController extends Controller
{
    public function index()
    {
        $recharges = Recharge::latest()->get();
        return view('admin.recharge.index', compact('recharges'));
    }

    public function updateRechargeStatus(Request $request, $id)
    {
        $recharge = Recharge::findOrFail($id);


        $status = $request->status;

        if ($status == 1) {
            $user = User::findOrFail(@$request->user_id);

            $recharge->status = 1;
            $recharge->save();
            $user->balance += $request->amount;
            $user->save();

            //report
            $todaysReport = Report::whereDate('created_at', Carbon::today())->first();
            if ($todaysReport) {
                $todaysReport->manual_recharge += $request->amount;
                $todaysReport->income = $todaysReport->manual_recharge + $todaysReport->auto_recharge;
                $todaysReport->profit = $todaysReport->income - $todaysReport->expense;
                $todaysReport->save();
            } else {
                Report::create([
                    'manual_recharge' => $request->amount,
                    'income' => $request->add_balance,
                    'profit' => $request->add_balance,
                ]);
            }
            Alert::toast("Recharge Successfull.", 'success');
        } elseif ($status == 2) {
            $recharge->status = 2;
            $recharge->save();
            Alert::toast("Recharge Declined.", 'success');
        }

        return redirect()->back();
    }

    public function clearAllRecharge()
    {
        Recharge::truncate();
        Alert::toast("All Recharge Data Cleared Successfully.", 'success');
        return redirect()->back();
    }


    public function preTrxindex()
    {
        $preTransactions = PreTransaction::latest()->get();
        return view('admin.recharge.pre_transaction', compact('preTransactions'));
    }



    public function preTrxstore(Request $request)
    {
        // dd($request->all());
        // Validate input
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:1',
            'trx_id' => 'required|string|max:255|unique:pre_transactions,trx_id',
        ]);

        // If validation fails
        if ($validator->fails()) {
            $errorMessages = implode(' ', $validator->errors()->all());
            Alert::toast($errorMessages, 'error');
            return redirect()->back()->withInput();
        }

        $hasRechargeTrx = Recharge::where('transaction_id', $request->trx_id)->where('status', 0)->first();
        $transaction = new PreTransaction();

        if ($hasRechargeTrx) {
            $hasRechargeTrx->status = 1;
            $hasRechargeTrx->amount = $request->amount;
            $hasRechargeTrx->save();

            $user = User::findOrFail($hasRechargeTrx->user_id);

            $user->balance += $request->amount;
            $user->save();

            //report
            $todaysReport = Report::whereDate('created_at', Carbon::today())->first();
            if ($todaysReport) {
                $todaysReport->manual_recharge += $request->amount;
                $todaysReport->income = $todaysReport->manual_recharge + $todaysReport->auto_recharge;
                $todaysReport->profit = $todaysReport->income - $todaysReport->expense;
                $todaysReport->save();
            } else {
                Report::create([
                    'manual_recharge' => $request->amount,
                    'income' => $request->amount,
                    'profit' => $request->amount,
                ]);
            }

            $transaction->status = 1; // default status

        } else {
            $transaction->status = 0; // default status
        }

        // Create new PreTransaction record
        $transaction->amount = $request->amount;
        $transaction->trx_id = $request->trx_id;
        $transaction->user_id = auth()->id(); // optional, if transactions belong to users
        $transaction->save();



        Alert::toast("Transaction saved successfully.", 'success');
        return redirect()->back();
    }

    public function preTrxupdate(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'trx_id' => 'required|string|max:255|unique:pre_transactions,trx_id,' . $id,
        ]);

        $preTransaction = PreTransaction::findOrFail($id);
        $preTransaction->amount = $request->amount;
        $preTransaction->trx_id = $request->trx_id;
        $preTransaction->save();

        Alert::toast("Transaction updated successfully.", 'success');
        return redirect()->back();
    }

    public function preTrxdelete($id)
    {
        $preTransaction = PreTransaction::findOrFail($id);
        $preTransaction->delete();

        Alert::toast("Transaction deleted successfully.", 'success');
        return redirect()->back();
    }
}
