<?php

namespace App\Http\Controllers\Admin;

use App\Events\DeliveryNotification;
use App\Http\Controllers\Controller;
use App\Models\IdCardOrder;
use App\Models\User;
use App\Models\UserNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class AdminIdCardController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $idCardOrders = IdCardOrder::whereIn('status', [0, 1])->where('hide', 0)->latest()->get();
        return view('admin.id_card_order.index', compact('idCardOrders', 'now'));
    }

    public function completed()
    {
        $now = Carbon::now();

        $idCardOrders = IdCardOrder::where('status', 2)->where('hide', 0)->latest()->get();
        return view('admin.id_card_order.index', compact('idCardOrders', 'now'));
    }
    public function disabled()
    {
        $now = Carbon::now();

        $idCardOrders = IdCardOrder::whereIn('status', [3, 4, 5, 6, 7])->where('hide', 0)->latest()->get();
        return view('admin.id_card_order.index', compact('idCardOrders', 'now'));
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
        // IdCardOrder::create($request->except(['nid_image', 'sign_image']));
        // Alert::toast("Sign Copy order Created Successfully.", 'success');
        // return redirect()->route('user.sign-copy.index');
    }

    public function updateStatus(Request $request, $id)
    {
        $data = IdCardOrder::findOrFail($id);

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

    public function destroy($id)
    {
        $entity = IdCardOrder::find($id);

        $destination = $entity->file;

        if (File::exists($destination)) {
            File::delete($destination);
        }


        $entity->delete();
        Alert::toast("Id Card Order Deleted Successfully.", 'success');
        return redirect()->back();
    }

    public function fileUpload(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
        ]);

        $id = $request->input('id');
        $entity = IdCardOrder::findOrFail($id);

        if ($entity->file && File::exists(public_path($entity->file))) {
            File::delete(public_path($entity->file));
        }

        $file = $request->file('file');
        $filename = uniqid() . '-' . time() . '_' . $file->getClientOriginalName();
        $path = $file->move(public_path('uploads/file/'), $filename);

        $entity->file = 'uploads/file/' . $filename;
        $entity->status = 2;
        $entity->admin_comment = $request->admin_comment;
        $entity->save();

        $user_id = $entity->user_id;
        $message = 'Id Card Uploaded.Please Reload.';

        $userNotification = new UserNotification();
        $userNotification->user_id = $user_id;
        $userNotification->msg = $message;
        $userNotification->save();

        $status = 0;
        event(new DeliveryNotification($user_id, $message, $status));

        Alert::toast("File Uploaded Successfully.", 'success');

        return redirect()->back();
    }

    public function download($id)
    {
        $entity = IdCardOrder::findOrFail($id);

        // Check if the file exists
        if (!$entity->file) {
            abort(404);
        }

        // Return the file for download
        return response()->download(public_path($entity->file));
    }

    public function refund(Request $request, $id)
    {
        $data = IdCardOrder::findOrFail($id);

        $data->status = $request->status;
        $data->save();

        $user_id = $data->user_id;
        $message = 'Id Card Order Refunded.Please Reload.';

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
