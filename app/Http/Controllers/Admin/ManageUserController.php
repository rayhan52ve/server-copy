<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use RealRashid\SweetAlert\Facades\Alert;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagetitle = 'ইউজার লিস্ট';
        $users = User::where('is_admin', 0)->latest()->get();

        // Decrypt passwords securely
        $users->transform(function ($item) {
            try {
                $item->decryptedPassword = Crypt::decryptString($item->password);
            } catch (DecryptException $e) {
                $item->decryptedPassword = 'Decryption failed';
            }
            return $item;
        });

        return view('admin.manage_user.index', compact('users', 'pagetitle'));
    }

    public function premiumRequest()
    {
        $pagetitle = 'প্রিমিয়াম ইউজার রিকুয়েস্ট';
        $users = User::where('is_admin', 0)->where('premium', 1)->get();
        return view('admin.manage_user.premium_user', compact('users', 'pagetitle'));
    }

    public function premiumUser()
    {
        $pagetitle = 'প্রিমিয়াম ইউজার লিস্ট';

        $now = Carbon::now();

        $users = User::where('is_admin', 0)->where('premium', 2)->latest()->get();
        return view('admin.manage_user.premium_user', compact('users','pagetitle','now'));
    }

    public function moderatorList()
    {
        $pagetitle = 'মডারেটর লিস্ট';

        $users = User::where('is_admin', 2)->latest()->get();
        return view('admin.manage_user.index', compact('users', 'pagetitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage_user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'is_admin' => 'required',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'nullable|string|min:6',
        ]);

        $validatedData['password'] = Crypt::encryptString($request->input('password'));

        $user = User::create($validatedData);

        if ($request->is_admin == 2) {
            $user->moderatorAccess()->create([
                'user_id' => $user->id,
            ]);
        }

        Alert::toast("User Created Successfully.", 'success');
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
        $validatedData = $request->all();

        // Find the user by ID
        $user = User::findOrFail($id);

        // Update the user's name, email, and balance
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->balance = $validatedData['balance'];

        // Update the password if it's provided
        if ($request->filled('password')) {
            $user->password = Crypt::encryptString($validatedData['password']);
        }

        // Save the updated user
        $user->save();
        Alert::toast("User Updated Successfully.", 'success');
        return redirect()->route('admin.manage-user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entity = User::find($id);

        $entity->delete();
        Alert::toast("User Deleted Successfully.", 'success');
        return redirect()->back();
    }
}
