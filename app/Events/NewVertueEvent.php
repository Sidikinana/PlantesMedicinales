<?php

namespace App\Events;

use App\Models\Vertue;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewVertueEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $vertue;

    /**
     * Create a new event instance.
     *
     * @param Vertue $vertue
     * @return void
     */
    public function __construct(Vertue $vertue)
    {
        $this->vertue = $vertue;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
