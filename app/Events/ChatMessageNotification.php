<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatMessageNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $status = 100;
    public $user_name;
    public $user_id;
    public $sender_id;
    public $receiver_id;
    public $sender_type;
    public $created_at;

    public function __construct(
        $message,
        $user_name,
        $user_id,
        $sender_id,
        $receiver_id,
        $sender_type = 'user'
    ) {
        $this->message     = $message;
        $this->user_name   = $user_name;
        $this->user_id     = (string) $user_id;
        $this->sender_id   = (string) $sender_id;
        $this->receiver_id = (string) $receiver_id;
        $this->sender_type = $sender_type;
        $this->created_at  = now()->toDateTimeString();
    }

    public function broadcastOn(): array
    {
        return [new Channel('notify-delivery-channel')];
    }

    public function broadcastAs(): string
    {
        return 'notify-delivery-event';
    }

    public function broadcastWith(): array
    {
        return [
            'message'      => $this->message,
            'status'       => $this->status,
            'user_name'    => $this->user_name,
            'user_id'      => $this->user_id,
            'sender_id'    => $this->sender_id,
            'receiver_id'  => $this->receiver_id,
            'sender_type'  => $this->sender_type,
            'created_at'   => $this->created_at,
        ];
    }
}