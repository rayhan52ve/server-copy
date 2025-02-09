<?php

namespace App\Http\Controllers\User;

use App\Events\OrderNotification;
use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use App\Models\Message;
use App\Models\Notice;
use App\Models\SubmitStatus;
use App\Models\SignCopyOrder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\BirthOrder;
use Illuminate\Http\Request;

class BirthOrderController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BirthOrder  $birthOrder
     * @return \Illuminate\Http\Response
     */
    public function show(BirthOrder $birthOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BirthOrder  $birthOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(BirthOrder $birthOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BirthOrder  $birthOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BirthOrder $birthOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BirthOrder  $birthOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(BirthOrder $birthOrder)
    {
        //
    }
}
