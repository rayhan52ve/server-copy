<?php

namespace App\Http\Controllers;

use App\Models\BiometricInfo;
use App\Models\IdCardOrder;
use App\Models\ServerCopyOrder;
use App\Models\SignCopyOrder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $signCopyCount = SignCopyOrder::count();
        $serverCopyCount = ServerCopyOrder::count();
        $idCardCount = IdCardOrder::count();
        $biometricCount = BiometricInfo::count();
        return view('admin.home.index',compact('signCopyCount','serverCopyCount','idCardCount','biometricCount'));
    }
}
