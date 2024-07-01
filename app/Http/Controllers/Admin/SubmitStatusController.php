<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubmitStatus;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubmitStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $data = $request->all();

        $submitStatus = SubmitStatus::first();

        if ($submitStatus) {
            $submitStatus->update($data);
        } else {
            SubmitStatus::create($data);
        }
        Alert::toast("Status Updated Successfully.", 'success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubmitStatus  $submitStatus
     * @return \Illuminate\Http\Response
     */
    public function show(SubmitStatus $submitStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubmitStatus  $submitStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(SubmitStatus $submitStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubmitStatus  $submitStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubmitStatus $submitStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubmitStatus  $submitStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubmitStatus $submitStatus)
    {
        //
    }
}
