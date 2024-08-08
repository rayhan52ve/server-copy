<?php

namespace App\Http\Controllers;

use App\Models\AdminNotification;
use App\Models\BiometricInfo;
use App\Models\IdCardOrder;
use App\Models\Message;
use App\Models\NidMake;
use App\Models\ServerCopyOrder;
use App\Models\ServerCopyUnofficial;
use App\Models\SignCopyOrder;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $signCopyCount = SignCopyOrder::count();
        $serverCopyCount = ServerCopyOrder::count();
        $idCardCount = IdCardOrder::count();
        $biometricCount = BiometricInfo::count();
        return view('admin.home.index',compact('signCopyCount','serverCopyCount','idCardCount','biometricCount'));
    }

    public function fileList()
    {
        $serverCopyUnofficial = ServerCopyUnofficial::latest()->get();
        $nids = NidMake::latest()->get();
        $message = Message::first();

        return view('admin.file_list',compact('serverCopyUnofficial','nids','message'));
    }

    public function clearAll()
    {
        ServerCopyUnofficial::truncate();
        NidMake::truncate();
        Alert::toast("All Data Cleared Successfully.", 'success');
        return redirect()->back();
    }

    public function adminNotification()
    {
        $adminNotification = AdminNotification::latest()->get();
        return view('admin.notification',compact('adminNotification'));
    }

    public function clearAlladminNotification()
    {
        AdminNotification::truncate();
        Alert::toast("All Notification Cleared Successfully.", 'success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $notification = AdminNotification::find($id);

        $notification->delete();
        Alert::toast('Notification Deleted.', 'success');
        return redirect()->back();
    }
}
