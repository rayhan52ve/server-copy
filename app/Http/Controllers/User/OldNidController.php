<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\OldNid;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OldNidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oldNid = OldNid::where('user_id',auth()->user()->id)->first();
        return view('User.modules.old_nid.create', compact('oldNid'));
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
        $oldNid = OldNid::where('user_id',auth()->user()->id)->first();

        $data = $request->except(['nid_image', 'sign_image']);

        if ($request->hasFile('nid_image')) {

            if ($oldNid && $oldNid->nid_image) {
                $oldImagePath = public_path('uploads/nid/' . $oldNid->nid_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $file = $request->file('nid_image');
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid() . '_' . time() . '.' . $extension;
            $path = 'uploads/nid/';
            $file->move(public_path($path), $filename);
            $data['nid_image'] = $filename;
        }

        if ($request->hasFile('sign_image')) {

            if ($oldNid && $oldNid->sign_image) {
                $oldImagePath = public_path('uploads/sign/' . $oldNid->sign_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $file = $request->file('sign_image');
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid() . '_' . time() . '.' . $extension;
            $path = 'uploads/sign/';
            $file->move(public_path($path), $filename);
            $data['sign_image'] = $filename;
        }

        if ($oldNid) {
            $oldNid->update($data);
            Alert::toast("New Nid Updated Successfully.", 'success');
        } else {
            OldNid::create($data);
            Alert::toast("New Nid Created Successfully.", 'success');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OldNid  $oldNid
     * @return \Illuminate\Http\Response
     */
    public function show(OldNid $oldNid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OldNid  $oldNid
     * @return \Illuminate\Http\Response
     */
    public function edit(OldNid $oldNid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OldNid  $oldNid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OldNid $oldNid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OldNid  $oldNid
     * @return \Illuminate\Http\Response
     */
    public function destroy(OldNid $oldNid)
    {
        //
    }
}
