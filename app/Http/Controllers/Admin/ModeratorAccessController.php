<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModeratorAccess;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ModeratorAccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $moderatorAccess = ModeratorAccess::first();
        // return view('admin.moderator_access.index',compact('moderatorAccess'));
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
        $data = $request->except('moderator_access_id');

        $moderatorAccess = ModeratorAccess::find($request->moderator_access_id);

        if ($moderatorAccess) {
            $moderatorAccess->update($data);
        } else {
            ModeratorAccess::create($data);
        }
        Alert::toast("Updated Successfully.", 'success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ModeratorAccess  $moderatorAccess
     * @return \Illuminate\Http\Response
     */
    public function show(ModeratorAccess $moderatorAccess)
    {
        return view('admin.moderator_access.index',compact('moderatorAccess'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ModeratorAccess  $moderatorAccess
     * @return \Illuminate\Http\Response
     */
    public function edit(ModeratorAccess $moderatorAccess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ModeratorAccess  $moderatorAccess
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModeratorAccess $moderatorAccess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ModeratorAccess  $moderatorAccess
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModeratorAccess $moderatorAccess)
    {
        //
    }
}
