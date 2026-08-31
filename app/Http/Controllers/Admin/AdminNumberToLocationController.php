<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NumberToLocation;
use App\Events\DeliveryNotification;
use App\Models\Message;
use App\Models\User;
use App\Models\UserNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class AdminNumberToLocationController extends Controller
{
    public function index()
    {
        $now = Carbon::now();

        $numberToLocations = NumberToLocation::whereIn('status', [0, 1])
            ->where('hide', 0)
            ->latest()
            ->get();
        return view('admin.number_to_location.index', compact('numberToLocations', 'now'));
    }

    public function completed()
    {
        $now = Carbon::now();

        $numberToLocations = NumberToLocation::where('hide', 0)->where('status', 2)->latest()->get();
        return view('admin.number_to_location.index', compact('numberToLocations', 'now'));
    }
    public function disabled()
    {
        $now = Carbon::now();

        $numberToLocations = NumberToLocation::whereIn('status', [3, 4, 5, 6, 7])
            ->where('hide', 0)
            ->latest()
            ->get();
        return view('admin.number_to_location.index', compact('numberToLocations', 'now'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $NumberToLocation = NumberToLocation::find($id);

        $NumberToLocation->delete();
        Alert::toast('Order Deleted Successfully.', 'success');
        return redirect()->back();
    }


    public function updateStatus(Request $request, $id)
    {
        // dd($request->all(), $id);
        $data = NumberToLocation::findOrFail($id);

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
        $entity = NumberToLocation::findOrFail($id);
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
        $data = NumberToLocation::findOrFail($id);

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
