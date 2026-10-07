<?php

namespace App\Http\Controllers;

use App\Events\ChatMessageNotification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * USER → ADMIN
     * Route: POST /user/chat/send  (name: user.chat.send)
     */
    public function send(Request $request)
    {
        $request->validate([
            'message'     => 'required|string|max:1000',
            'receiver_id' => 'nullable',   // admin id, optional
        ]);

        $sender = Auth::user();
        abort_unless($sender, 401);

        // Find an admin (fallback to id 1 or first admin)
        $admin = User::where('is_admin',1)->where('id',132)->first()
              ?? User::find($request->receiver_id);

        abort_unless($admin, 404, 'Admin not found');

        event(new ChatMessageNotification(
            $request->message,
            $sender->email,        // user_name = sender email
            $admin->id,            // user_id = who should see it (admin)
            $sender->id,           // sender_id
            $admin->id,            // receiver_id
            'user'                 // sender_type
        ));

        return response()->json([
            'success'      => true,
            'message'      => $request->message,
            'sender_id'    => $sender->id,
            'receiver_id'  => $admin->id,
            'sender_type'  => 'user',
            'created_at'   => now()->toDateTimeString(),
        ]);
    }

    /**
     * ADMIN → USER
     * Route: POST /admin/chat/send  (name: admin.chat.send)
     */
    public function adminSend(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'message'     => 'required|string|max:1000',
            'receiver_id' => 'required|exists:users,id',
        ]);

        $sender = Auth::user();
        abort_unless($sender && $sender->is_admin === 1, 403);

        $receiver = User::findOrFail($request->receiver_id);

        event(new ChatMessageNotification(
            $request->message,
            $sender->email,        // admin email
            $receiver->id,         // user_id = target user
            $sender->id,           // sender_id = admin id
            $receiver->id,         // receiver_id = target user
            'admin'                // sender_type
        ));

        return response()->json([
            'success'     => true,
            'message'     => $request->message,
            'sender_id'   => $sender->id,
            'receiver_id' => $receiver->id,
            'sender_type' => 'admin',
            'created_at'  => now()->toDateTimeString(),
        ]);
    }
}