<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recharge;
use App\Models\Report;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
}
