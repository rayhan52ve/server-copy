<?php

namespace App\Http\Middleware;

use App\Models\Message;
use App\Models\SubmitStatus;
use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $submitStatus = SubmitStatus::first()->active_status;
        if(auth()->user()->is_admin == 1 || auth()->user()->is_admin == 2){
            return $next($request);
        }elseif ($submitStatus == 1) {
            if (auth()->user()->is_admin == 0 && auth()->user()->status == 1) {
                return $next($request);
            }
            $amount = Message::first()->active_status_price;
            Alert::toast("আপনার অ্যাকাউন্টটি সচল করতে দয়াকরে $amount ৳ রিচার্জ করুন!", 'info');
            return redirect('/bkash/payment');
        } else {
            return $next($request);
        }
    }
}
