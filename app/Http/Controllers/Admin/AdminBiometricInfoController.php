<?php

namespace App\Http\Controllers\Admin;

use App\Events\DeliveryNotification;
use App\Http\Controllers\Controller;
use App\Models\BiometricInfo;
use App\Models\BiometricType;
use App\Models\User;
use App\Models\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class AdminBiometricInfoController extends Controller
{
    public function index()
    {
        $biometricInfo = BiometricInfo::whereIn('status',[0,1])->latest()->get();
        return view('admin.biometric_info.index', compact('biometricInfo'));
    }

    public function completed()
    {
        $biometricInfo = BiometricInfo::where('status',2)->latest()->get();
        return view('admin.biometric_info.index', compact('biometricInfo'));
    }
    public function disabled()
    {
        $biometricInfo = BiometricInfo::whereIn('status',[3,4,5,6,7])->latest()->get();
        return view('admin.biometric_info.index', compact('biometricInfo'));
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
        // BiometricInfo::create($request->except(['nid_image', 'sign_image']));
        // Alert::toast("Sign Copy order Created Successfully.", 'success');
        // return redirect()->route('user.sign-copy.index');
    }

    public function updateStatus(Request $request, $id)
    {
        $data = BiometricInfo::findOrFail($id);

        $data->status = $request->status;
        $data->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $entity = BiometricInfo::find($id);

        $destination = $entity->file;

        if (File::exists($destination)) {
            File::delete($destination);
        }


        $entity->delete();
        Alert::toast("Biometric Info Order Deleted Successfully.", 'success');
        return redirect()->back();
    }

    public function fileUpload(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
        ]);

        $id = $request->input('id');
        $entity = BiometricInfo::findOrFail($id);

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
        $message = 'Biometric Copy Uploaded.Please Reload.';
        
        $userNotification = new UserNotification();
        $userNotification->user_id = $user_id;
        $userNotification->msg = $message;
        $userNotification->save();

        event(new DeliveryNotification($user_id, $message));

        Alert::toast("File Uploaded Successfully.", 'success');

        return redirect()->back();
    }

    public function download($id)
    {
        $entity = BiometricInfo::findOrFail($id);

        // Check if the file exists
        if (!$entity->file) {
            abort(404);
        }

        // Return the file for download
        return response()->download(public_path($entity->file));
    }

    public function refund(Request $request, $id)
    {
        // dd($request->all());

        $data = BiometricInfo::findOrFail($id);

        $data->status = $request->status;
        $data->save();

        $user_id = $data->user_id;
        $message = 'Biometric Order Refunded.Please Reload.';
        
        $userNotification = new UserNotification();
        $userNotification->user_id = $user_id;
        $userNotification->msg = $message;
        $userNotification->save();

        event(new DeliveryNotification($user_id, $message));

        $user = User::find($request->user_id);
        // $biometricType = BiometricType::find($request->type);
        // $price = (int)$request->price;


        $price = (int)$request->price;

            $user->balance += $price;
            $user->save();
            Alert::toast("Refund Successfull.", 'success');

        return redirect()->back();
    }
}
