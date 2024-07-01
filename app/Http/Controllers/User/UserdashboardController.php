<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BiometricInfo;
use App\Models\IdCardOrder;
use App\Models\ServerCopyOrder;
use App\Models\SignCopyOrder;
use App\Models\User;
use App\Models\Video;
use App\Models\VideoLink;
use Illuminate\Http\Request;

class UserdashboardController extends Controller
{
    public function userDashboard()
    {
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

}
