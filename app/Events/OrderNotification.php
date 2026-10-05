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
    public $transaction_id;
    public $amount;
    public $payment_number;
    public $photo;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message,$status,$user_name, $transaction_id = null, $amount = null, $payment_number = null, $photo = null)
    {
        $this->message = $message;
        $this->status = $status;
        $this->user_name = $user_name;
        $this->transaction_id = $transaction_id;  
        $this->amount = $amount;  
        $this->payment_number = $payment_number;  
        $this->photo = $photo;  
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
            'transaction_id' => $this->transaction_id,
            'amount' => $this->amount,
            'payment_number' => $this->payment_number,
            'photo' => $this->photo,
        ];
    }
}
