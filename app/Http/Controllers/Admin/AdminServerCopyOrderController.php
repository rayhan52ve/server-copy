<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServerCopyOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class AdminServerCopyOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serverCopyOrders = ServerCopyOrder::whereIn('status',[0,1])->latest()->get();
        return view('admin.server_copy_order.index', compact('serverCopyOrders'));
    }

    public function completed()
    {
        $serverCopyOrders = ServerCopyOrder::where('status',2)->latest()->get();
        return view('admin.server_copy_order.index', compact('serverCopyOrders'));
    }
    public function disabled()
    {
        $serverCopyOrders = ServerCopyOrder::whereIn('status',[3,4,5,6,7])->latest()->get();
        return view('admin.server_copy_order.index', compact('serverCopyOrders'));
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
        // ServerCopyOrder::create($request->except(['nid_image', 'sign_image']));
        // Alert::toast("Sign Copy order Created Successfully.", 'success');
        // return redirect()->route('user.sign-copy.index');
    }

    public function updateStatus(Request $request, $id)
    {
        $data = ServerCopyOrder::findOrFail($id);

        $data->status = $request->status;
        $data->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $signCopyOrder = ServerCopyOrder::find($id);

        $destination = $signCopyOrder->file;

        if (File::exists($destination)) {
            File::delete($destination);
        }


        $signCopyOrder->delete();
        Alert::toast("Server Copy Order Deleted Successfully.", 'success');
        return redirect()->back();
    }

    public function fileUpload(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
        ]);

        $id = $request->input('id');
        $entity = ServerCopyOrder::findOrFail($id);

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

        Alert::toast("File Uploaded Successfully.", 'success');

        return redirect()->back();
    }

    public function download($id)
    {
        $entity = ServerCopyOrder::findOrFail($id);

        // Check if the file exists
        if (!$entity->file) {
            abort(404);
        }

        // Return the file for download
        return response()->download(public_path($entity->file));
    }

    public function refund(Request $request, $id)
    {
        $data = ServerCopyOrder::findOrFail($id);

        $data->status = $request->status;
        $data->save();

        $user = User::find($request->user_id);
        $userBalance = $user->balance;

        $price = (int)$request->price;

            $user->balance += $price;
            $user->save();
            Alert::toast("Refund Successfull.", 'success');

        return redirect()->back();
    }
}