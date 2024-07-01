<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HideUnhide;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HideUnhideController extends Controller
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

        $hideUnhide = HideUnhide::first();

        if ($hideUnhide) {
            $hideUnhide->update($data);
        } else {
            HideUnhide::create($data);
        }
        Alert::toast("Updated Successfully.", 'success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HideUnhide  $hideUnhide
     * @return \Illuminate\Http\Response
     */
    public function show(HideUnhide $hideUnhide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HideUnhide  $hideUnhide
     * @return \Illuminate\Http\Response
     */
    public function edit(HideUnhide $hideUnhide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HideUnhide  $hideUnhide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HideUnhide $hideUnhide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HideUnhide  $hideUnhide
     * @return \Illuminate\Http\Response
     */
    public function destroy(HideUnhide $hideUnhide)
    {
        //
    }
}
