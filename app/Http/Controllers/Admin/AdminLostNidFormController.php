<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Events\DeliveryNotification;
use App\Models\Message;
use App\Models\NidLostForm;
use App\Models\User;
use App\Models\UserNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;


class AdminLostNidFormController extends Controller
{
    public function index()
    {
        $now = Carbon::now();

        $nidLostForms = NidLostForm::whereIn('status', [0, 1])
            ->where('hide', 0)
            ->latest()
            ->get();
        return view('admin.nid_lost_form.index', compact('nidLostForms', 'now'));
    }

    public function completed()
    {
        $now = Carbon::now();

        $nidLostForms = NidLostForm::where('hide', 0)->where('status', 2)->latest()->get();
        return view('admin.nid_lost_form.index', compact('nidLostForms', 'now'));
    }
    public function disabled()
    {
        $now = Carbon::now();

        $nidLostForms = NidLostForm::whereIn('status', [3, 4, 5, 6, 7])
            ->where('hide', 0)
            ->latest()
            ->get();
        return view('admin.nid_lost_form.index', compact('nidLostForms', 'now'));
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
        $nid_lost_form = NidLostForm::find($id);

        $destination1 = $nid_lost_form->file;
        $destination2 =  'uploads/id_card/' . $nid_lost_form->image;

        if (File::exists($destination1)) {
            File::delete($destination1);
        }

        if (File::exists($destination2)) {
            File::delete($destination2);
        }

        $nid_lost_form->delete();
        Alert::toast('NID modification Order Deleted Successfully.', 'success');
        return redirect()->back();
    }


    public function updateStatus(Request $request, $id)
    {
        // dd($request->all(), $id);
        $data = NidLostForm::findOrFail($id);

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
        // dd($request->all());
        $request->validate([
            'file' => 'required|file',
            // 'id' => 'required|exists:nid_lost_form,id',
        ]);

        $id = $request->input('id');
        $entity = NidLostForm::findOrFail($id);
        // dd($entity);

        // Delete the old file if it exists
        if ($entity->file && File::exists(public_path($entity->file))) {
            File::delete(public_path($entity->file));
        }

        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->move(public_path('uploads/id_card/'), $filename);

        // Update the file path in the database
        $entity->file = 'uploads/id_card/' . $filename;
        $entity->status = 2;
        $entity->save();

        $user_id = $entity->user_id;
        $message = 'NID modification Uploaded.Please Reload.';

        $userNotification = new UserNotification();
        $userNotification->user_id = $user_id;
        $userNotification->msg = $message;
        $userNotification->save();

        $status = 0;
        event(new DeliveryNotification($user_id, $message, $status));

        Alert::toast('File Uploaded Successfully.', 'success');

        return redirect()->back();
    }

    public function download($id)
    {
        $entity = NidLostForm::findOrFail($id);

        // Check if the file exists
        if (!$entity->file) {
            abort(404);
        }

        // Return the file for download
        return response()->download(public_path($entity->file));
    }

    public function imageDownload($id)
    {
        $entity = NidLostForm::findOrFail($id);

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
        $data = NidLostForm::findOrFail($id);

        $data->status = $request->status;
        $data->save();

        $user_id = $data->user_id;
        $message = 'NID modification Order Refunded.Please Reload.';

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
