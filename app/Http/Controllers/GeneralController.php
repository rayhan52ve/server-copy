<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\BannerAndTitle;
use App\Models\Counter;
use App\Models\FooterDetail;
use App\Models\HideUnhide;
use App\Models\Logo;
use App\Models\SubmitStatus;
use App\Models\User;
use App\Models\WebsiteLinks;
use Illuminate\Http\Request;
use Auth;

class GeneralController extends Controller
{
    public function tech_web_general_settings()
    {
        return view('admin.general.general',[
            'banner_titles'=>BannerAndTitle::get(),
            'logo'=>Logo::latest()->first(),
            // 'links'=>WebsiteLinks::latest()->first(),
            'footer'=>FooterDetail::latest()->first(),
            'banners'=>Banner::get(),
            'submitStatus'=>SubmitStatus::first(),
            'hideUnhide'=>HideUnhide::first(),
        ]);
    }

    public function tech_web_profile_settings()
    {
        return view('admin.profile.profile',[
            'user'=>User::where('id',Auth::user()->id)->first(),
        ]);
    }

    public function tech_web_update_profile(Request $request)
    {

        User::update_profile($request);
        return back()->with('message','profile updated successfully');
    }

    public function user_profile_settings()
    {
        return view('User.modules.profile.profile',[
            'user'=>User::where('id',Auth::user()->id)->first(),
        ]);
    }

    public function user_update_profile(Request $request)
    {

        User::update_profile($request);
        return back()->with('message','profile updated successfully');
    }
}
