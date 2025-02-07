<?php

namespace App\Http\Controllers;

use App\Events\OrderNotification;
use App\Models\PopupMessage;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PopupMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popupMessages = PopupMessage::latest()->get();
        return view('admin.popup_message', compact('popupMessages'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PopupMessage  $popupMessage
     * @return \Illuminate\Http\Response
     */
    public function show(PopupMessage $popupMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PopupMessage  $popupMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(PopupMessage $popupMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PopupMessage  $popupMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // dd($request->all(),$id);
        $popupMessage = PopupMessage::where('user_id',$id)->where('reply',null)->latest()->first();
        $popupMessage->update($request->all());
        $message = $request->reply;
        $status = 15;
        $user_name = auth()->user()->name;
        event(new OrderNotification($message,$status,$user_name));
        Alert::toast('Reply Sent to Admin.', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PopupMessage  $popupMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(PopupMessage $popupMessage)
    {
        $popupMessage->delete();
        Alert::toast('Message Deleted.', 'success');
        return redirect()->back();
    }

    
    public function clearAllPopup()
    {
        PopupMessage::truncate();
        Alert::toast("All Popup Message Cleared Successfully.", 'success');
        return redirect()->back();
    }
}
