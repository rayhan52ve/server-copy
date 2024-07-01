<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\VideoLink;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Video::get();
        $videolink = VideoLink::first();

        return view('admin.video.index', compact( 'posts','videolink'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = new Video();
        $url = $request->video;
        $pattern = '/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
        preg_match($pattern, $url, $matches);

        $videoId = isset($matches[1]) ? $matches[1] : null;
        $input->title = $request->title;
        $input->video = $videoId;
        $input->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $posts = Video::find($id);
        return view('admin.video.edit', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $input = Video::find($id);

        $url = $request->video;
        $pattern = '/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
        preg_match($pattern, $url, $matches);

        $videoId = isset($matches[1]) ? $matches[1] : null;

        $input->title = $request->title;
        if($request->video){
        $input->video = $videoId;
        }
        $input->save();
        return redirect()->route('admin.video.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Video::find($id);

        $post->delete();

        return redirect()->back();
    }

    public function buttonStore(Request $request)
    {
        $videolink = VideoLink::first();

        if($videolink){
            $videolink->update($request->all());
            Alert::toast("Updated Successfully.", 'success');
        }else{
            VideoLink::create($request->all());
            Alert::toast("Created Successfully.", 'success');
        }

        return redirect()->back();

    }
}
