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
        $now = Carbon::now();
        $notice = Notice::first();
        $message = Message::first();
        $submitStatus = SubmitStatus::first();
        $brthOrder = BirthOrder::where('user_id', auth()->user()->id)->get();
        return view('User.modules.birth_order.index', compact('brthOrder', 'notice', 'message', 'submitStatus', 'now'));
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

        $request->validate([
            'fathers_nid_file' => ['nullable', 'file'],
            'mothers_nid_file' => ['nullable', 'file'],
            'school_cirtificate' => ['nullable', 'file'],
            'tika_card' => ['nullable', 'file'],
            'nid_file' => ['nullable', 'file'],
        ], [
            'fathers_nid_file.required_without_all' => 'কমপক্ষে যেকোনো দুইটি ফাইল আপলোড করতে হবে।',
            'mothers_nid_file.required_without_all' => 'কমপক্ষে যেকোনো দুইটি ফাইল আপলোড করতে হবে।',
            'school_cirtificate.required_without_all' => 'কমপক্ষে যেকোনো দুইটি ফাইল আপলোড করতে হবে।',
            'tika_card.required_without_all' => 'কমপক্ষে যেকোনো দুইটি ফাইল আপলোড করতে হবে।',
            'nid_file.required_without_all' => 'কমপক্ষে যেকোনো দুইটি ফাইল আপলোড করতে হবে।',
        ]);
        
        // Custom Validation: Ensure at least two files are uploaded
        $fileCount = collect([
            $request->file('fathers_nid_file'),
            $request->file('mothers_nid_file'),
            $request->file('school_cirtificate'),
            $request->file('tika_card'),
            $request->file('nid_file')
        ])->filter()->count();
        
        if ($fileCount < 2) {
            Alert::toast("কমপক্ষে যেকোনো দুইটি ফাইল আপলোড করতে হবে।", 'error');
            return redirect()->back()->withErrors(['files' => 'কমপক্ষে যেকোনো দুইটি ফাইল আপলোড করতে হবে।'])->withInput();
        }

        
        $user = User::find($request->user_id);
        $userBalance = $user->balance;

        $price = (int)$request->price;

        $data = $request->except(['price', 'nid_file','tika_card','school_cirtificate','mothers_nid_file','fathers_nid_file']);

        if ($request->hasFile('nid_file')) {
            $file = $request->file('nid_file');
            $extension = $file->getClientOriginalExtension();
            $filename = 'nid' . '_' . time() . '.' . $extension;
            $path = 'uploads/id_card/';
            $file->move(public_path($path), $filename);
            $data['nid_file'] = $filename;
        }
        if ($request->hasFile('tika_card')) {
            $file = $request->file('tika_card');
            $extension = $file->getClientOriginalExtension();
            $filename = 'tika-card' . '_' . time() . '.' . $extension;
            $path = 'uploads/id_card/';
            $file->move(public_path($path), $filename);
            $data['tika_card'] = $filename;
        }
        if ($request->hasFile('school_cirtificate')) {
            $file = $request->file('school_cirtificate');
            $extension = $file->getClientOriginalExtension();
            $filename = 'school-cirtificate' . '_' . time() . '.' . $extension;
            $path = 'uploads/id_card/';
            $file->move(public_path($path), $filename);
            $data['school_cirtificate'] = $filename;
        }
        if ($request->hasFile('mothers_nid_file')) {
            $file = $request->file('mothers_nid_file');
            $extension = $file->getClientOriginalExtension();
            $filename = 'mothers-nid' . '_' . time() . '.' . $extension;
            $path = 'uploads/id_card/';
            $file->move(public_path($path), $filename);
            $data['mothers_nid_file'] = $filename;
        }
        if ($request->hasFile('fathers_nid_file')) {
            $file = $request->file('fathers_nid_file');
            $extension = $file->getClientOriginalExtension();
            $filename = 'fathers-nid' . '_' . time() . '.' . $extension;
            $path = 'uploads/id_card/';
            $file->move(public_path($path), $filename);
            $data['fathers_nid_file'] = $filename;
        }

        if ($userBalance >= $price) {
            BirthOrder::create($data);
            $user->balance -= $price;
            $user->save();

            //Real Time Notification
            $message = 'New Birth Registration Ordered By ' . $user->name;

            $adminNotification = new AdminNotification();
            $adminNotification->user_id = $user->id;
            $adminNotification->msg = $message;
            $adminNotification->save();

            $status = 0;
            $user_name = '';
            event(new OrderNotification($message, $status, $user_name));

            Alert::toast("Order Created Successfully.", 'success');
        } else {
            Alert::toast("আপনার অ্যাকাউন্টে পর্যাপ্ত ব্যালান্স নেই, দয়া করে রিচার্জ করুন।", 'error');
        }


        return redirect()->route('user.birth-order.index');
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
