<?php

namespace App\Http\Controllers\Admin;

use App\Events\DeliveryNotification;
use App\Http\Controllers\Controller;
use App\Models\SignCopyOrder;
use App\Models\User;
use App\Models\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class AdminSignCopyOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $signCopyOrders = SignCopyOrder::whereIn('status', [0, 1])
            ->latest()
            ->get();
        return view('admin.sign_copy_order.index', compact('signCopyOrders'));
    }

    public function completed()
    {
        $signCopyOrders = SignCopyOrder::where('status', 2)->latest()->get();
        return view('admin.sign_copy_order.index', compact('signCopyOrders'));
    }
    public function disabled()
    {
        $signCopyOrders = SignCopyOrder::whereIn('status', [3, 4, 5, 6, 7])
            ->latest()
            ->get();
        return view('admin.sign_copy_order.index', compact('signCopyOrders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sign_copy_order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SignCopyOrder::create($request->except(['nid_image', 'sign_image']));
        Alert::toast('Sign Copy order Created Successfully.', 'success');
        return redirect()->route('admin.sign-copy.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SignCopyOrder  $signCopyOrder
     * @return \Illuminate\Http\Response
     */
    public function show(SignCopyOrder $signCopyOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SignCopyOrder  $signCopyOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(SignCopyOrder $signCopyOrder)
    {
        return view('admin.sign_copy_order.edit', compact('signCopyOrder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SignCopyOrder  $signCopyOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SignCopyOrder $signCopyOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SignCopyOrder  $signCopyOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $signCopyOrder = SignCopyOrder::find($id);

        $destination = $signCopyOrder->file;

        if (File::exists($destination)) {
            File::delete($destination);
        }

        $signCopyOrder->delete();
        Alert::toast('Sign Copy Order Deleted Successfully.', 'success');
        return redirect()->back();
    }

    public function updateStatus(Request $request, $id)
    {
        // dd($request->all(), $id);
        $data = SignCopyOrder::findOrFail($id);

        $data->status = $request->status;
        $data->save();

        return redirect()->back();
    }

    public function fileUpload(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
            'id' => 'required|exists:sign_copy_orders,id',
        ]);

        $id = $request->input('id');
        $entity = SignCopyOrder::findOrFail($id);

        // Delete the old file if it exists
        if ($entity->file && File::exists(public_path($entity->file))) {
            File::delete(public_path($entity->file));
        }

        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->move(public_path('uploads/sign_copy/'), $filename);

        // Update the file path in the database
        $entity->file = 'uploads/sign_copy/' . $filename;
        $entity->status = 2;
        $entity->admin_comment = $request->admin_comment;
        $entity->save();

        $user_id = $entity->user_id;
        $message = 'Sign Copy Uploaded.Please Reload.';

        $userNotification = new UserNotification();
        $userNotification->user_id = $user_id;
        $userNotification->msg = $message;
        $userNotification->save();

        event(new DeliveryNotification($user_id, $message));

        Alert::toast('File Uploaded Successfully.', 'success');

        return redirect()->back();
    }

    public function download($id)
    {
        $entity = SignCopyOrder::findOrFail($id);

        // Check if the file exists
        if (!$entity->file) {
            abort(404);
        }

        // Return the file for download
        return response()->download(public_path($entity->file));
    }

    public function refund(Request $request, $id)
    {
        $data = SignCopyOrder::findOrFail($id);

        $data->status = $request->status;
        $data->save();

        $user_id = $data->user_id;
        $message = 'Sign Copy Order Refunded.Please Reload.';
        
        $userNotification = new UserNotification();
        $userNotification->user_id = $user_id;
        $userNotification->msg = $message;
        $userNotification->save();

        event(new DeliveryNotification($user_id, $message));

        $user = User::find($request->user_id);
        $userBalance = $user->balance;

        $price = (int)$request->price;

        $user->balance += $price;
        $user->save();

        Alert::toast("Refund Successfull.", 'success');

        return redirect()->back();
    }
}
