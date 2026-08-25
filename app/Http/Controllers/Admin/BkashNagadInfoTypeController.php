<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\BkashNagadType;

class BkashNagadInfoTypeController extends Controller
{
    public function index()
    {
        $bkashNagadType = BkashNagadType::latest()->get();
        return view('admin.bkash_nagad_info.bkash_nagad_type', compact('bkashNagadType'));
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
        BkashNagadType::create($request->all());
        Alert::toast("Type Created Successfully.", 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $bkashNagadType = BkashNagadType::find($id);

        $bkashNagadType->update($request->all());
        Alert::toast("Type Updated Successfully.", 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entity = BkashNagadType::find($id);

        $entity->delete();
        Alert::toast("Type Deleted Successfully.", 'success');
        return redirect()->back();
    }
}
