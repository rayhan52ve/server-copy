<?php

namespace App\Http\Controllers;

use App\Models\AdminNotification;
use App\Models\BiometricInfo;
use App\Models\IdCardOrder;
use App\Models\Message;
use App\Models\NewRegistration;
use App\Models\NidMake;
use App\Models\Report;
use App\Models\ServerCopyOrder;
use App\Models\ServerCopyUnofficial;
use App\Models\SignCopyOrder;
use Carbon\Carbon;
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
        $todaysReport = Report::whereDate('created_at', Carbon::today())->first();

        if (!$todaysReport) {
            Report::create();
        }
        $signCopyCount = SignCopyOrder::count();
        $serverCopyCount = ServerCopyOrder::count();
        $idCardCount = IdCardOrder::count();
        $biometricCount = BiometricInfo::count();
        return view('admin.home.index', compact('signCopyCount', 'serverCopyCount', 'idCardCount', 'biometricCount'));
    }


    public function serverCopyUnofficialList()
    {
        $serverCopyUnofficial = ServerCopyUnofficial::latest()->get();
        $message = Message::first();

        return view('admin.file_list.server_copy_unofficial', compact('serverCopyUnofficial', 'message'));
    }

    public function clearServerCopyUnofficial()
    {
        ServerCopyUnofficial::truncate();
        Alert::toast("All Server Copy Unofficial Data Cleared Successfully.", 'success');
        return redirect()->back();
    }

    public function nidList()
    {
        $nids = NidMake::latest()->get();
        $message = Message::first();

        return view('admin.file_list.nid', compact('nids', 'message'));
    }

    public function clearAllNid()
    {
        NidMake::truncate();
        Alert::toast("All NId Data Cleared Successfully.", 'success');
        return redirect()->back();
    }

    public function birthList()
    {
        $new_regs = NewRegistration::latest()->get();
        $message = Message::first();

        return view('admin.file_list.birth', compact('new_regs', 'message'));
    }

    public function clearAllbirth()
    {
        NewRegistration::truncate();
        Alert::toast("All New Registration Data Cleared Successfully.", 'success');
        return redirect()->back();
    }

    public function adminNotification()
    {
        $unreadNotifications = AdminNotification::where('read_unread', 0)->get();
        foreach ($unreadNotifications as $notification) {
            $notification->read_unread = 1;
            $notification->save();
        }

        $adminNotification = AdminNotification::latest()->get();
        return view('admin.notification', compact('adminNotification'));
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
