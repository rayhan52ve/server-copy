<?php

namespace App\Http\Controllers\Admin;

use App\Events\DeliveryNotification;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\NameAddressId;
use App\Models\User;
use App\Models\UserNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class AdminNameAddressIdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();

        $nameAddressIds = NameAddressId::whereIn('status', [0, 1])
            ->latest()
            ->get();
        return view('admin.name_address_id.index', compact('nameAddressIds', 'now'));
    }

    public function completed()
    {
        $now = Carbon::now();

        $nameAddressIds = NameAddressId::where('status', 2)->latest()->get();
        return view('admin.name_address_id.index', compact('nameAddressIds', 'now'));
    }
    public function disabled()
    {
        $now = Carbon::now();

        $nameAddressIds = NameAddressId::whereIn('status', [3, 4, 5, 6, 7])
            ->latest()
            ->get();
        return view('admin.name_address_id.index', compact('nameAddressIds', 'now'));
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
        $nameAddressId = NameAddressId::find($id);

        $destination1 = $nameAddressId->file;
        $destination2 =  'uploads/id_card/' . $nameAddressId->image;

        if (File::exists($destination1)) {
            File::delete($destination1);
        }

        if (File::exists($destination2)) {
            File::delete($destination2);
        }

        $nameAddressId->delete();
        Alert::toast('Id Card(Name,Address) Order Deleted Successfully.', 'success');
        return redirect()->back();
    }


    public function updateStatus(Request $request, $id)
    {
        // dd($request->all(), $id);
        $data = NameAddressId::findOrFail($id);

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
            // 'id' => 'required|exists:name_address_id,id',
        ]);

        $id = $request->input('id');
        $entity = NameAddressId::findOrFail($id);
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
        $message = 'Id Card Uploaded.Please Reload.';

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
        $entity = NameAddressId::findOrFail($id);

        // Check if the file exists
        if (!$entity->file) {
            abort(404);
        }

        // Return the file for download
        return response()->download(public_path($entity->file));
    }

    public function imageDownload($id)
    {
        $entity = NameAddressId::findOrFail($id);

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
        $data = NameAddressId::findOrFail($id);

        $data->status = $request->status;
        $data->save();

        $user_id = $data->user_id;
        $message = 'Id Card(Name,Address) Order Refunded.Please Reload.';

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
