<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserPassNid;
use App\Events\DeliveryNotification;
use App\Models\Message;
use App\Models\User;
use App\Models\UserNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class AdminUserpassNidController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();

        $userPassNids = UserPassNid::whereIn('status', [0, 1])
            ->where('hide', 0)
            ->latest()
            ->get();
        return view('admin.user_pass_nid.index', compact('userPassNids', 'now'));
    }

    public function completed()
    {
        $now = Carbon::now();

        $userPassNids = UserPassNid::
        where('hide', 0)->where('status', 2)->latest()->get();
        return view('admin.user_pass_nid.index', compact('userPassNids', 'now'));
    }
    public function disabled()
    {
        $now = Carbon::now();

        $userPassNids = UserPassNid::whereIn('status', [3, 4, 5, 6, 7])
            ->where('hide', 0)
            ->latest()
            ->get();
        return view('admin.user_pass_nid.index', compact('userPassNids', 'now'));
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
        //
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
        $userPassNid = UserPassNid::find($id);

        // $destination1 = $userPassNid->file;
        $destination2 =  'uploads/id_card/' . $userPassNid->image;

        // if (File::exists($destination1)) {
        //     File::delete($destination1);
        // }

        if (File::exists($destination2)) {
            File::delete($destination2);
        }

        $userPassNid->delete();
        Alert::toast('User Password (Nid) Order Deleted Successfully.', 'success');
        return redirect()->back();
    }


    public function updateStatus(Request $request, $id)
    {
        // dd($request->all(), $id);
        $data = UserPassNid::findOrFail($id);

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
        $entity = UserPassNid::findOrFail($id);
        // dd($entity);

        $entity->status = 2;
        $entity->userId = $request->userId;
        $entity->password = $request->password;
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

    public function download($id)
    {
        $entity = UserPassNid::findOrFail($id);

        // Check if the file exists
        if (!$entity->file) {
            abort(404);
        }

        // Return the file for download
        return response()->download(public_path($entity->file));
    }

    public function imageDownload($id)
    {
        $entity = UserPassNid::findOrFail($id);

        // dd($entity,$id);
        // Check if the file exists
        if (!$entity->image) {
            abort(404);
        }

        // Return the file for download
        return response()->download(public_path('/uploads/id_card/' . $entity->image));
    }

    public function refund(Request $request, $id)
    {
        // dd($request->all());
        $data = UserPassNid::findOrFail($id);

        $data->status = $request->status;
        $data->save();

        $user_id = $data->user_id;
        $message = 'User Password (Nid) Order Refunded.Please Reload.';

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
