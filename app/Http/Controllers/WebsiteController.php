<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Blog;
use App\Models\Team;
use App\Models\About;
use App\Models\Affiliate;
use App\Models\Apply;
use App\Models\State;
use App\Models\Banner;
use App\Models\Career;
use App\Models\Counter;
use App\Models\Gallery;
use App\Models\Package;
use App\Models\Service;
use App\Models\Division;
use App\Models\Property;
use App\Models\Management;
use App\Models\Testimonial;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use App\Models\BannerAndTitle;
use App\Models\FieldAgent;
use App\Models\MemberProcedure;
use App\Models\RecruiterCompany;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    public function home()
    {
        return view('frontend.home.home',[
            'properties'=>Property::where('status',1)->where('property_home',1)->get(),
            'services'=>Service::where('status',1)->where('service_home',1)->get(),
            'about'=>DB::table('abouts')->latest()->first(),
            'teams'=>Team::where('status',1)->where('add_home',1)->get(),
            'testimonials'=>Testimonial::where('status',1)->where('add_home',1)->get(),
            'info'=>DB::table('appointment_infos')->latest()->first(),
            'packages'=>Package::where('status',1)->where('add_home',1)->get(),
            'blogs'=>Blog::where('status',1)->where('add_home',1)->get(),
            'titles'=>BannerAndTitle::get(),
            'banners'=>Banner::get(),
            'counter'=>Counter::latest()->first(),
           'galleries'=>VideoGallery::where('status',1)->take('3')->get(),
        ]);
    }
    public function tech_web_services_details($id)
    {
        return view('frontend.services.service_details',[
            'service'=>Service::find($id),
            'services'=>Service::where('status',1)->where('service_home',1)->get(),
        ]);
    }

    public function tech_web_all_services()
    {

        return view('frontend.services.all_services',[
            'services'=>Service::where('status',1)->paginate(8),
            'banner'=>BannerAndTitle::where('page','services')->latest()->first(),
        ]);
    }

    public function tech_web_property_details($id)
    {
        return view('frontend.properties.property_details',[
            'property'=>Property::find($id),
            'properties'=>Property::where('status',1)->where('property_home',1)->get(),
        ]);
    }

    public function tech_web_all_properties()
    {

        return view('frontend.properties.all_properties',[
            'properties'=>Property::where('status',1)->paginate(8),
            'banner'=>BannerAndTitle::where('page','gallery')->latest()->first(),
        ]);
    }

    public function tech_web_recruiter_details()
    {

        return view('frontend.recruiter.recruiter',[
            'recruiter'=>RecruiterCompany::latest()->first(),
            'banner'=>BannerAndTitle::where('page','gallery')->latest()->first(),
        ]);
    }

    public function tech_web_memberprocedure_details()
    {

        return view('frontend.memberprocedure.memberprocedure',[
            'memberprocedure'=>MemberProcedure::latest()->first(),
            'banner'=>BannerAndTitle::where('page','gallery')->latest()->first(),
        ]);
    }

    public function tech_web_about_page()
    {
        return view('frontend.about.about_page',[
            'about'=>DB::table('abouts')->latest()->first(),
            'banner'=>BannerAndTitle::where('page')->latest()->first(),
        ]);
    }
    public function tech_web_mission_vission_page()
    {
        return view('frontend.about.mission_vission',[
            'about'=>DB::table('abouts')->latest()->first(),
            'banner'=>BannerAndTitle::where('page')->latest()->first(),
            'memberprocedure'=>MemberProcedure::latest()->first(),
        ]);
    }

    public function tech_web_career_page()
    {
        return view('frontend.career.career',[
            'careers'=>Career::where('status',1)->paginate(8),
            'banner'=>BannerAndTitle::where('page','gallery')->latest()->first(),
        ]);
    }
    public function tech_web_career_details($id)
    {
        return view('frontend.career.career_details',[
            'career'=>Career::find($id),
            'careers'=>Career::get(),
            'banner'=>BannerAndTitle::where('page','gallery')->latest()->first(),
        ]);
    }
  public function tech_web_team_page()
    {
       return view('frontend.team.team_page',[
            'teams'=>Team::where('status',1)->get(),
            'banner'=>BannerAndTitle::where('page','doctors')->latest()->first(),
            'services'=>Service::get(),
        ]);
    }
    public function tech_web_management_page()
    {
        return view('frontend.management.management_page',[
            'managements'=>Management::where('status',1)->paginate(8),
            'banner'=>BannerAndTitle::where('page','managements')->latest()->first(),
        ]);
    }
    public function testimonial_page()
    {
        return view('frontend.testimonial.testimonial_page',[
            'testimonials'=>Testimonial::where('status',1)->paginate(8),
            'banner'=>BannerAndTitle::where('page','testimonial')->latest()->first(),
        ]);
    }
    public function tech_web_appointment_page()
    {
        return view('frontend.appointment.appointment_page',[
            'banner'=>BannerAndTitle::where('page','appointment')->latest()->first(),
            'services'=>Service::where('status',1)->where('service_home',1)->get(),

        ]);
    }
    public function tech_web_package_page()
    {
        return view('frontend.package.package_page',[
            'packages'=>Package::where('status',1)->paginate(6),
            'banner'=>BannerAndTitle::where('page','packages')->latest()->first(),
        ]);
    }
    public function tech_web_blogs_page()
    {
        return view('frontend.blogs.blogs_page',[
            'blogs'=>Blog::where('status',1)->paginate(6),
            'banner'=>BannerAndTitle::where('page','blogs')->latest()->first(),
        ]);
    }
    public function tech_web_blogs_details($id)
    {
        return view('frontend.blogs.blogs_details',[
            'blog'=>Blog::find($id),

        ]);
    }

    public function tech_web_gallery_page()
    {
        return view('frontend.gallery.gallery_page',[
            'galleries'=>Gallery::where('status',1)->get(),
            'banner'=>BannerAndTitle::where('page','gallery')->latest()->first(),
        ]);
    }
    public function tech_web_video_gallery_page()
    {
        return view('frontend.gallery.video_gallery_page',[
            'galleries'=>VideoGallery::where('status',1)->get(),
            'banner'=>BannerAndTitle::where('page','gallery')->latest()->first(),
        ]);
    }

    public function tech_web_contacts()
    {
        return view('frontend.contact.contact',[
            'banner'=>BannerAndTitle::where('page','contacts')->latest()->first(),
        ]);

    }

    public function tech_web_state_details($state_slug)
    {
        $state = State::where('state_slug', $state_slug)->with('divisions')->first();
        $banner = BannerAndTitle::where('page','gallery')->latest()->first();
        return view('frontend.state.state_details', compact('state', 'banner'));
    }

    public function tech_web_division_details($id)
    {
        $division = Division::where('id', $id)->first();
        $banner = BannerAndTitle::where('page','gallery')->latest()->first();
        return view('frontend.division.division_details', compact('division', 'banner'));

    }

    public function tech_web_store_apply(Request $request)
    {
        Apply::save_apply($request);
        return back()->with('message','Successfully Applied');
    }

    // serviceprovider start
    public function tech_web_add_serviceprovider()
    {
        return view('frontend.serviceprovider.serviceprovider', [
            'banner'=>BannerAndTitle::where('page','gallery')->latest()->first()
        ]);
    }
    public function tech_web_store_serviceprovider(Request $request)
    {
        // dd($request->all());
        ServiceProvider::save_ServiceProvider($request);
        return back()->with('message','Successfully Applied');
    }
    // serviceprovider end

    // affiliate start
    public function tech_web_add_affiliate()
    {
        return view('frontend.affiliate.affiliate', [
            'banner'=>BannerAndTitle::where('page','gallery')->latest()->first()
        ]);
    }
    public function tech_web_store_affiliate(Request $request)
    {
        Affiliate::save_affiliate($request);
        return back()->with('message','Successfully Applied');
    }
    // affiliate end

    // field agent start
    public function tech_web_add_fieldagent()
    {
        return view('frontend.fieldagent.fieldagent',[
            'banner'=>BannerAndTitle::where('page','gallery')->latest()->first()
        ]);

    }

    public function tech_web_store_fieldagent(Request $request)
    {
        FieldAgent::save_fieldagent($request);
        return back()->with('message','Successfully Applied');
    }
    // field agent end

    public function tech_web_faq_page()
    {
        return view('frontend.faq.faq',[
            'faqs'=>Faq::where('status',1)->paginate(8),
            'banner'=>BannerAndTitle::where('page','gallery')->latest()->first(),
        ]);
    }

}
