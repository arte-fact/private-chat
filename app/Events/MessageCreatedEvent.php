<?php

namespace App\Events;

use App\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageCreatedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Message $message
     */
    public $message;

    public function __construct(Message $message)
    {

        $this->message = $message;
    }

    public function broadcastOn()
    {
        return new Channel('conversation-channel.' . (string) $this->message->getAttribute("conversation_id"));
    }
}
