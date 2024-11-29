<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BiometricInfo;
use App\Models\IdCardOrder;
use App\Models\Message;
use App\Models\NewRegistration;
use App\Models\NidMake;
use App\Models\Report;
use App\Models\ServerCopyOrder;
use App\Models\ServerCopyUnofficial;
use App\Models\SignCopyOrder;
use App\Models\TinCirtificate;
use App\Models\User;
use App\Models\UserNotification;
use App\Models\Video;
use App\Models\VideoLink;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserdashboardController extends Controller
{
    public function userDashboard()
    {
        $todaysReport = Report::whereDate('created_at', Carbon::today())->first();

        if (!$todaysReport) {
            Report::create(); 
        }
        return view('User.modules.home.index');
    }

    public function about_admin()
    {
        $admin = User::where('is_admin',1)->first();
        return view('User.modules.about_admin',compact('admin'));
    }

    public function video()
    {
        $videos = Video::all();
        $videolink = VideoLink::first();

        return view('User.modules.video',compact('videos','videolink'));
    }

    public function serverCopyUnofficialList($id)
    {
        $message = Message::first();
        $serverCopyUnoficial = ServerCopyUnofficial::where('user_id',$id)->latest()->paginate(15);

        return view('User.modules.file_list.server_copy_unofficial',compact('serverCopyUnoficial','message'));
    }

    public function nidList($id)
    {
        $message = Message::first();
        $nids = NidMake::where('user_id',$id)->latest()->paginate(15);

        return view('User.modules.file_list.nid',compact('nids','message'));
    }

    public function birthList($id)
    {
        $message = Message::first();
        $new_regs = NewRegistration::where('user_id',$id)->latest()->paginate(15);

        return view('User.modules.file_list.birth',compact('new_regs','message'));
    }

    public function tinList($id)
    {
        $message = Message::first();
        $tins = TinCirtificate::where('user_id',$id)->latest()->paginate(15);

        return view('User.modules.file_list.tin',compact('tins','message'));
    }

    
    public function userNotification()
    {
        $unreadNotifications = UserNotification::where('user_id',auth()->user()->id)->where('read_unread', 0)->get();
        foreach ($unreadNotifications as $notification) {
            $notification->read_unread = 1;
            $notification->save();
        }
        $userNotification = UserNotification::where('user_id',auth()->user()->id)->latest()->get();
        return view('User.modules.notification',compact('userNotification'));
    }

    public function clearAllUserNotification()
    {
        UserNotification::where('user_id',Auth::user()->id)->delete();
        Alert::toast("All Notification Cleared Successfully.", 'success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $notification = UserNotification::find($id);

        $notification->delete();
        Alert::toast('Notification Deleted.', 'success');
        return redirect()->back();
    }

}
