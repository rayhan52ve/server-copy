<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\SubmitStatus;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $submitStatus = SubmitStatus::first();
        $user = User::where('email', $input['email'])->first();

        // Check if login is blocked and the user is not an admin
        if ($submitStatus->login == 0 && $user && $user->is_admin == 0) {
            Alert::toast('Login Blocked. Please Try Again Later', 'error');
            return redirect()->back();
        }

        if ($user) {
            try {
                $decryptedPassword = Crypt::decryptString($user->password);
            } catch (DecryptException $e) {
                return redirect()->route('login')->with('error', 'Something went wrong. Please try again.');
            }

            if ($input['password'] === $decryptedPassword) {
                auth()->login($user);

                if ($user->is_admin == 1 || $user->is_admin == 2) {
                    Alert::toast('Login successful', 'success');
                    return redirect()->route('admin.home');
                } elseif ($user->is_admin == 0) {
                    Alert::toast('Login successful', 'success');
                    return redirect()->route('user.home');
                } else {
                    Alert::toast('Login successful', 'success');
                    return redirect()->route('front.page');
                }
            } else {
                return redirect()->route('login')->with('error', 'Email-Address and Password are incorrect.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Email-Address and Password are incorrect.');
        }
    }

    // public function login(Request $request)
    // {
    //     $input = $request->all();

    //     $this->validate($request, [
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     $submitStatus = SubmitStatus::first();
    //     $user = User::where('email', $input['email'])->first();
    //     // dd($user,$submitStatus);


    //     if ($submitStatus->login == 0 && $user->is_admin == 0) {
    //         Alert::toast('Login Blocked.Please Try Again Later', 'success');
    //         return redirect()->back();
    //     }

    //     if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
    //         if (auth()->user()->is_admin == 1 || auth()->user()->is_admin == 2) {
    //             Alert::toast('Login successfull', 'success');
    //             return redirect()->route('admin.home');
    //         } elseif (auth()->user()->is_admin == 0) {
    //             Alert::toast('Login successfull', 'success');
    //             return redirect()->route('user.home');
    //         } else {
    //             Alert::toast('Login successfully', 'success');
    //             return redirect()->route('front.page');
    //         }
    //     } else {
    //         return redirect()->route('login')
    //             ->with('error', 'Email-Address And Password Are Wrong.');
    //     }
    // }
}
