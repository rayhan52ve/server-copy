<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NidToAllnumber;
use App\Events\DeliveryNotification;
use App\Models\Message;
use App\Models\User;
use App\Models\UserNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class AdminNidToAllnumberController extends Controller
{
    public function index()
    {
        $now = Carbon::now();

        $nidToAllnumbers = NidToAllnumber::whereIn('status', [0, 1])
            ->where('hide', 0)
            ->latest()
            ->get();
        return view('admin.nid_to_allnumber.index', compact('nidToAllnumbers', 'now'));
    }

    public function completed()
    {
        $now = Carbon::now();

        $nidToAllnumbers = NidToAllnumber::where('hide', 0)->where('status', 2)->latest()->get();
        return view('admin.nid_to_allnumber.index', compact('nidToAllnumbers', 'now'));
    }
    public function disabled()
    {
        $now = Carbon::now();

        $nidToAllnumbers = NidToAllnumber::whereIn('status', [3, 4, 5, 6, 7])
            ->where('hide', 0)
            ->latest()
            ->get();
        return view('admin.nid_to_allnumber.index', compact('nidToAllnumbers', 'now'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nidToAllnumber = NidToAllnumber::find($id);

        $nidToAllnumber->delete();
        Alert::toast('Order Deleted Successfully.', 'success');
        return redirect()->back();
    }


    public function updateStatus(Request $request, $id)
    {
        // dd($request->all(), $id);
        $data = NidToAllnumber::findOrFail($id);

        $data->status = $request->status;
        $data->save();

        if ($request->status == 1) {
            $user_id = $data->user_id;
            $message = 'orderReceived';
            $status = 0;
            event(new DeliveryNotification($user_id, $message, $status));
        }

        return redirect()->back();
    }

    public function fileUpload(Request $request)
    {

        $id = $request->input('id');
        $entity = NidToAllnumber::findOrFail($id);
        // dd($entity);

        $entity->status = 2;
        $entity->admin_text = $request->admin_text;
        $entity->save();

        $user_id = $entity->user_id;
        $message = 'File Uploaded.Please Reload.';

        $userNotification = new UserNotification();
        $userNotification->user_id = $user_id;
        $userNotification->msg = $message;
        $userNotification->save();

        $status = 0;
        event(new DeliveryNotification($user_id, $message, $status));

        Alert::toast('Updated Successfully.', 'success');

        return redirect()->back();
    }


    public function refund(Request $request, $id)
    {
        // dd($request->all());
        $data = NidToAllnumber::findOrFail($id);

        $data->status = $request->status;
        $data->save();

        $user_id = $data->user_id;
        $message = 'Order Refunded.Please Reload.';

        $userNotification = new UserNotification();
        $userNotification->user_id = $user_id;
        $userNotification->msg = $message;
        $userNotification->save();

        $status = 0;
        event(new DeliveryNotification($user_id, $message, $status));

        $user = User::find($request->user_id);
        $userBalance = $user->balance;

        $price = (int)$request->price;

        $user->balance += $price;
        $user->save();

        Alert::toast("Refund Successfull.", 'success');

        return redirect()->back();
    }
}
