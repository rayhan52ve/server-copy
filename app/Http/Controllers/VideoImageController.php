<?php

namespace App\Http\Controllers;

use App\Models\VideoImage;
use Illuminate\Http\Request;

class VideoImageController extends Controller
{
    public function tech_web_add_division()
    {
        return view('admin.division.division',[
            'divisions'=>VideoImage::get(),
        ]);

    }

    public function tech_web_store_division(Request $request)
    {
        // dd($request->all());
        VideoImage::save_division($request);
        return back()->with('message','division added successfully');
    }

    public function tech_web_edit_division($id)
    {
        return view('admin.division.edit_division',[
            'division'=>VideoImage::find($id),
        ]);
    }

    public function tech_web_update_division(Request $request)
    {
        // dd($request->all());
        VideoImage::update_division($request);
        return back()->with('message','division update successfully');
    }
}
