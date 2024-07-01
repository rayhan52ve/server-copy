<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recharge;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminRechargeController extends Controller
{
    public function index()
    {
        $recharges = Recharge::latest()->get();
        return view('admin.recharge.index',compact('recharges'));
    }

    public function updateRechargeStatus(Request $request, $id)
    {
        // dd($request->all(),$id);
        $recharge = Recharge::findOrFail($id);


        $status = $request->status;
        
        if ($status == 1) {
            $user = User::findOrFail(@$request->user_id);

            $recharge->status = 1;
            $recharge->save();
            $user->balance += $request->amount;
            $user->save();
            Alert::toast("Recharge Successfull.", 'success');
        } elseif ($status == 2) {
            $recharge->status = 2;
            // $recharge->employee_id = null;
            $recharge->save();
            Alert::toast("Recharge Declined.", 'success');
        }

        return redirect()->back();
    }
}
