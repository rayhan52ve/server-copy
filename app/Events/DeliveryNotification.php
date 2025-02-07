<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DeliveryNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_id;
    public $message;
    public $status;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user_id, $message,$status)
    {
        $this->user_id = $user_id;
        $this->message = $message;
        $this->status = $status;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('notify-delivery-channel');
    }

    public function broadcastAs()
    {
        return 'notify-delivery-event';
    }

    public function broadcastWith()
    {
        return [
            'user_id' => $this->user_id,
            'message' => $this->message,
            'status' => $this->status,
        ];
    }
}
