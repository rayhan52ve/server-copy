<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $status;
    public $user_name;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message,$status,$user_name)
    {
        $this->message = $message;
        $this->status = $status;
        $this->user_name = $user_name;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel
     */
    public function broadcastOn()
    {
        return new Channel('notify-order-channel');
    }

    public function broadcastAs()
    {
        return 'notify-order';
    }

    public function broadcastWith()
    {
        return [
            'user_name' => $this->user_name,
            'message' => $this->message,
            'status' => $this->status,
        ];
    }
}
