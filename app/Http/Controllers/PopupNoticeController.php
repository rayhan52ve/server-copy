<?php

namespace App\Http\Controllers;

use App\Events\DeliveryNotification;
use App\Models\PopupNotice;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Events\OrderNotification;
use Carbon\Carbon;

class PopupNoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popupNotices = PopupNotice::where('notice_type', 0)->latest()->get();
        return view('admin.popup_notice', compact('popupNotices'));
    }

    public function draft()
    {
        $popupNotices = PopupNotice::where('notice_type', 1)->latest()->get();
        return view('admin.popup_notice', compact('popupNotices'));
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
        // dd($request->all());
        $user_id = 0;
        $message = $request->message;

        // Store hour & minute separately
        $popupNotice = new PopupNotice();
        $popupNotice->message = $message;
        $popupNotice->hour = $request->hour;
        $popupNotice->minute = $request->minute;
        $popupNotice->notice_type = $request->notice_type;
        $popupNotice->save();

        // Calculate `end_time`
        $createdAt = Carbon::parse($popupNotice->created_at); // Created timestamp
        $endTime = $createdAt->addHours($popupNotice->hour)->addMinutes($popupNotice->minute); // Add both hour & minute

        // Store end time
        if ($request->notice_type == 1) {
            $popupNotice->end_time = null;
        } else {
            $popupNotice->end_time = $endTime;
        }
        $popupNotice->status = $popupNotice->id;
        $popupNotice->save();
        $status = $popupNotice->status;
        if ($request->notice_type == 1) {
            Alert::toast('Notice Saved Successfully.', 'success');
        } else {
            event(new DeliveryNotification($user_id, $message, $status));
            Alert::toast('Notice Sent Successfully.', 'success');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PopupNotice  $popupNotice
     * @return \Illuminate\Http\Response
     */
    public function show(PopupNotice $popupNotice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PopupNotice  $popupNotice
     * @return \Illuminate\Http\Response
     */
    public function edit(PopupNotice $popupNotice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PopupNotice  $popupNotice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all(),$id);
        $popupNotice = PopupNotice::find($request->status);
        $popupNotice->users()->attach($id);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PopupNotice  $popupNotice
     * @return \Illuminate\Http\Response
     */
    public function destroy(PopupNotice $popupNotice)
    {
        $popupNotice->users()->detach();
        $popupNotice->delete();
        Alert::toast('Notices Deleted.', 'success');
        return redirect()->back();
    }


    public function clearAllPopup()
    {
        $popupNotices = PopupNotice::where('notice_type',0)->get();

        // Detach all users from all popup notices in a single operation
        foreach ($popupNotices as $popupNotice) {
            $popupNotice->users()->sync([]); // This clears the many-to-many relation
        }

        // Delete all popup notices in a single query
        PopupNotice::where('notice_type',0)->delete();
        Alert::toast("All Popup Notices Cleared Successfully.", 'success');
        return redirect()->back();
    }

    public function updatePublished(Request $request, $id)
    {
        // dd($request->all());
        // Store hour & minute separately
        $popupNotice = PopupNotice::find($id);
        $popupNotice->users()->detach();
        // Calculate `end_time`
        $now = Carbon::now();
        $endTime = $now->addHours($request->hour)->addMinutes($request->minute); // Add both hour & minute

        // Store end time
        if ($request->notice_type == 1) {
            $popupNotice->end_time = null;
        } else {
            $popupNotice->end_time = $endTime;
        }
        $popupNotice->status = $popupNotice->id;
        $popupNotice->hour = $request->hour;
        $popupNotice->minute = $request->minute;
        $popupNotice->message = $request->message;
        $popupNotice->save();


        $user_id = 0;
        $message = $popupNotice->message;
        $status = $popupNotice->status;

        if ($request->notice_type == 1) {
            Alert::toast('Notice Saved Successfully.', 'success');
        } else {
            event(new DeliveryNotification($user_id, $message, $status));
            Alert::toast('Notice Sent Successfully.', 'success');
        }

        return redirect()->back();
    }

    public function publish($id)
    {
        // Store hour & minute separately
        $popupNotice = PopupNotice::find($id);
        $popupNotice->users()->detach();
        // Calculate `end_time`
        $now = Carbon::now();
        $endTime = $now->addHours($popupNotice->hour)->addMinutes($popupNotice->minute); // Add both hour & minute

        // Store end time
        $popupNotice->end_time = $endTime;
        $popupNotice->status = $popupNotice->id;
        $popupNotice->save();


        $user_id = 0;
        $message = $popupNotice->message;
        $status = $popupNotice->status;

        event(new DeliveryNotification($user_id, $message, $status));

        Alert::toast('Notice Sent Successfully.', 'success');

        return redirect()->back();
    }
}
