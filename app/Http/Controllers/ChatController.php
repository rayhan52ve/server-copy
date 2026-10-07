<?php

namespace App\Http\Controllers;

use App\Events\ChatMessageNotification;
use App\Models\PopupMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{
    /**
     * USER → ADMIN
     * POST /user/chat/send  (name: user.chat.send)
     */
    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'nullable|string|max:1000',
            'file'    => 'nullable|file|mimes:jpg,jpeg,png,webp,pdf,doc,docx,txt,zip|max:5120', // 5MB
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error'   => $validator->errors()->first(),
            ], 422);
        }

        // Require at least one of message or file
        if (!$request->filled('message') && !$request->hasFile('file')) {
            return response()->json([
                'success' => false,
                'error'   => 'Message or file is required.',
            ], 422);
        }

        $sender = Auth::user();
        abort_unless($sender, 401);

        // Choose admin (fallback to id 132 or first admin)
        $admin = User::where('is_admin', 1)->where('id', 132)->first()
            ?? User::where('is_admin', 1)->first()
            ?? User::find($request->receiver_id);

        abort_unless($admin, 404, 'Admin not found');

        // ---------- Save to popup_messages ----------
        $popupMessage = new PopupMessage();
        $popupMessage->user_id     = $sender->id;
        $popupMessage->message     = $request->input('message', '');
        $popupMessage->reply       = null;
        $popupMessage->sender_type = 'user';   // ✅ tag
        $popupMessage->status      = 0;

        // Handle file upload
        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $uploadPath = public_path('uploads/chat');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $filename);
            $filePath = 'uploads/chat/' . $filename;
            $popupMessage->file = $filePath;
        }

        $popupMessage->save();

        // ---------- Broadcast to all admins ----------
        $broadcastMessage = $popupMessage->message
            ?: ($filePath ? '[File]' : '');

        event(new ChatMessageNotification(
            $broadcastMessage,
            $sender->email,
            50,                 // broadcast to all admins
            $sender->id,
            50,                 // receiver_id = 50 (all admins)
            'user'
        ));

        return response()->json([
            'success'      => true,
            'id'           => $popupMessage->id,
            'message'      => $popupMessage->message,
            'file'         => $popupMessage->file,
            'file_url'     => $popupMessage->file ? asset($popupMessage->file) : null,
            'sender_id'    => $sender->id,
            'receiver_id'  => 50,
            'sender_type'  => 'user',
            'created_at'   => $popupMessage->created_at->toDateTimeString(),
        ]);
    }

    /**
     * USER → fetch own chat history
     * GET /user/chat/history  (name: user.chat.history)
     */
    public function history(Request $request)
    {
        $user = Auth::user();
        abort_unless($user, 401);

        $messages = PopupMessage::where('user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->get()
            ->map(function ($m) {
                $isAdmin = ($m->sender_type === 'admin');
                return [
                    'id'         => ($isAdmin ? 'r-' : 'u-') . $m->id,
                    'type'       => $isAdmin ? 'received' : 'sent',
                    'message'    => $isAdmin ? $m->reply : $m->message,
                    'file_url'   => $m->file ? asset($m->file) : null,
                    'file_name'  => $m->file ? basename($m->file) : null,
                    'created_at' => optional($m->created_at)->toDateTimeString(),
                ];
            })
            ->values();

        return response()->json(['success' => true, 'messages' => $messages]);
    }

    /**
     * ADMIN → USER
     * POST /admin/chat/send  (name: admin.chat.send)
     */
    public function adminSend(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message'     => 'nullable|string|max:1000',
            'file'        => 'nullable|file|mimes:jpg,jpeg,png,webp,pdf,doc,docx,txt,zip|max:5120',
            'receiver_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->errors()->first()], 422);
        }
        if (!$request->filled('message') && !$request->hasFile('file')) {
            return response()->json(['success' => false, 'error' => 'Message or file is required.'], 422);
        }

        $sender = Auth::user();
        abort_unless($sender && $sender->is_admin == 1, 403);

        $receiver = User::findOrFail($request->receiver_id);

        // ✅ ALWAYS create a NEW row for admin messages — no overwriting
        $popup = new PopupMessage();
        $popup->user_id     = $receiver->id;
        $popup->message     = '';
        $popup->reply       = $request->input('message', '');
        $popup->sender_type = 'admin';   // ✅ tag as admin
        $popup->status      = 1;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $uploadPath = public_path('uploads/chat');
            if (!file_exists($uploadPath)) mkdir($uploadPath, 0755, true);
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $filename);
            $popup->file = 'uploads/chat/' . $filename;
        }

        $popup->save();

        event(new ChatMessageNotification(
            $request->input('message', '') ?: '[File]',
            $sender->email,
            $receiver->id,
            $sender->id,
            $receiver->id,
            'admin'
        ));

        return response()->json([
            'success'     => true,
            'id'          => $popup->id,
            'message'     => $request->input('message', ''),
            'file_url'    => $popup->file ? asset($popup->file) : null,
            'sender_id'   => $sender->id,
            'receiver_id' => $receiver->id,
            'sender_type' => 'admin',
            'created_at'  => $popup->created_at->toDateTimeString(),
        ]);
    }

    /**
     * ADMIN → fetch all chats grouped by user
     * GET /admin/chat/history  (name: admin.chat.history)
     */
    public function adminHistory(Request $request)
    {
        $admin = Auth::user();
        abort_unless($admin && $admin->is_admin == 1, 403);

        $rows = PopupMessage::with(['user:id,email'])
            ->orderBy('created_at', 'asc')
            ->get();

        $grouped = [];

        foreach ($rows as $m) {
            $userId = (string) $m->user_id;
            if (!isset($grouped[$userId])) {
                $grouped[$userId] = [
                    'user_id'  => $m->user_id,
                    'email'    => optional($m->user)->email ?? ('User #' . $m->user_id),
                    'messages' => [],
                ];
            }

            // ✅ Use sender_type column
            $isAdmin = ($m->sender_type === 'admin');

            $grouped[$userId]['messages'][] = [
                'id'         => ($isAdmin ? 'a-' : 'u-') . $m->id,
                'type'       => $isAdmin ? 'admin' : 'user',
                'message'    => $isAdmin ? $m->reply : $m->message,
                'file_url'   => $m->file ? asset($m->file) : null,
                'file_name'  => $m->file ? basename($m->file) : null,
                'created_at' => optional($m->created_at)->toDateTimeString(),
                'ts'         => optional($m->created_at)->getTimestampMs() ?: 0,
            ];
        }

        foreach ($grouped as &$g) {
            usort($g['messages'], fn($a, $b) => ($a['ts'] ?? 0) <=> ($b['ts'] ?? 0));
        }
        unset($g);

        return response()->json(['success' => true, 'chats' => array_values($grouped)]);
    }
}
