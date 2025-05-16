<?php

namespace App\Http\Controllers;

use App\Models\AdminNotification;
use App\Models\BiometricInfo;
use App\Models\BirthOrder;
use App\Models\IdCardOrder;
use App\Models\Message;
use App\Models\NameAddressId;
use App\Models\NewRegistration;
use App\Models\NidLostForm;
use App\Models\NidMake;
use App\Models\Report;
use App\Models\ServerCopyOrder;
use App\Models\ServerCopyUnofficial;
use App\Models\SignCopyOrder;
use App\Models\TinCirtificate;
use App\Models\UserPassNid;
use App\Models\Vaccin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
        $signCopyCount = SignCopyOrder::where('status', '0')->count();
        $serverCopyCount = ServerCopyOrder::where('status', '0')->count();
        $idCardCount = IdCardOrder::where('status', '0')->count();
        $biometricCount = BiometricInfo::where('status', '0')->count();
        $nameAddressCount = NameAddressId::where('status', '0')->count();
        $birthRegCount = BirthOrder::where('status', '0')->count();
        $userPassCount = UserPassNid::where('status', '0')->count();
        $nidLostFormCount = NidLostForm::where('status', '0')->count();
        return view('admin.home.index', compact('signCopyCount', 'serverCopyCount', 'idCardCount', 'biometricCount', 'nameAddressCount', 'birthRegCount','userPassCount','nidLostFormCount'));
    }


    public function serverCopyUnofficialList()
    {
        $serverCopyUnofficial = ServerCopyUnofficial::where('hide',0)->latest()->get();
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
        $nids = NidMake::where('hide',0)->latest()->get();
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
        $new_regs = NewRegistration::where('hide',0)->latest()->get();
        $message = Message::first();

        return view('admin.file_list.birth', compact('new_regs', 'message'));
    }

    public function clearAllbirth()
    {
        NewRegistration::truncate();
        Alert::toast("All New Registration Data Cleared Successfully.", 'success');
        return redirect()->back();
    }

    public function vaccineList()
    {
        $new_regs = Vaccin::where('hide',0)->latest()->get();
        $message = Message::first();

        return view('admin.file_list.vaccine', compact('new_regs', 'message'));
    }

    public function clearAllVaccine()
    {
        Vaccin::truncate();
        Alert::toast("All Vaccine Data Cleared Successfully.", 'success');
        return redirect()->back();
    }

    public function tinList()
    {
        $tins = TinCirtificate::where('hide',0)->latest()->get();
        $message = Message::first();

        return view('admin.file_list.tin', compact('tins', 'message'));
    }

    public function clearAllTin()
    {
        TinCirtificate::truncate();
        Alert::toast("All Tin Cirtificate Data Cleared Successfully.", 'success');
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

    public function clearOldOrders()
    {

        SignCopyOrder::where('status', '!=', 0)->where('hide', 0)->update(['hide' => 1]);

        ServerCopyOrder::where('status', '!=', 0)->where('hide', 0)->update(['hide' => 1]);

        IdCardOrder::where('status', '!=', 0)->where('hide', 0)->update(['hide' => 1]);

        BiometricInfo::where('status', '!=', 0)->where('hide', 0)->update(['hide' => 1]);

        NameAddressId::where('status', '!=', 0)->where('hide', 0)->update(['hide' => 1]);
        
        UserPassNid::where('status', '!=', 0)->where('hide', 0)->update(['hide' => 1]);

        NidLostForm::where('status', '!=', 0)->where('hide', 0)->update(['hide' => 1]);

        Alert::toast('Completed orders and associated files cleared.', 'success');
        return redirect()->back();
    }

    public function clearFileListData()
    {

        ServerCopyUnofficial::where('hide', 0)->update(['hide' => 1]);
        NidMake::where('hide', 0)->update(['hide' => 1]);
        NewRegistration::where('hide', 0)->update(['hide' => 1]);
        TinCirtificate::where('hide', 0)->update(['hide' => 1]);
        Vaccin::where('hide', 0)->update(['hide' => 1]);


        Alert::toast('All file list data removed.', 'success');
        return redirect()->back();
    }

    public function clearAllPermanently()
    {

        // Delete SignCopyOrders and associated files
        $signCopyOrders = SignCopyOrder::where('status', '!=', 0)->get();
        foreach ($signCopyOrders as $order) {
            $filePath = public_path($order->file); // Assuming the file is in the public directory
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }
        SignCopyOrder::where('status', '!=', 0)->delete();

        $serverCopyOrders = ServerCopyOrder::where('status', '!=', 0)->get();
        foreach ($serverCopyOrders as $order) {
            $filePath = public_path($order->file);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }
        ServerCopyOrder::where('status', '!=', 0)->delete();

        $idCards = IdCardOrder::where('status', '!=', 0)->get();
        foreach ($idCards as $order) {
            $filePath = public_path($order->file);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }
        IdCardOrder::where('status', '!=', 0)->delete();

        $biometric = BiometricInfo::where('status', '!=', 0)->get();
        foreach ($biometric as $order) {
            $filePath = public_path($order->file);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }
        BiometricInfo::where('status', '!=', 0)->delete();

        $nameAddressId = NameAddressId::where('status', '!=', 0)->get();
        foreach ($nameAddressId as $order) {
            $filePath = public_path($order->file);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
            $imagePathNAI = public_path('uploads/id_card/' .$order->image);
            if (File::exists($imagePathNAI)) {
                File::delete($imagePathNAI);
            }
        }
        NameAddressId::where('status', '!=', 0)->delete();

        $userPassNid = UserPassNid::where('status', '!=', 0)->get();
        foreach ($userPassNid as $order) {
            $filePath = public_path($order->file);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
            $imagePathUserPassNid = public_path('uploads/id_card/' . $order->image);
            if (File::exists($imagePathUserPassNid)) {
                File::delete($imagePathUserPassNid);
            }
        }
        UserPassNid::where('status', '!=', 0)->delete();

        $nidLostForm = NidLostForm::where('status', '!=', 0)->get();
        foreach ($nidLostForm as $order) {
            $filePath = public_path($order->file);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }
        NidLostForm::where('status', '!=', 0)->delete();

        ServerCopyUnofficial::query()->delete();
        NidMake::query()->delete();
        NewRegistration::query()->delete();
        TinCirtificate::query()->delete();
        Vaccin::query()->delete();

        Alert::toast('All the data and associated files cleared.', 'success');
        return redirect()->back();
    }
}
