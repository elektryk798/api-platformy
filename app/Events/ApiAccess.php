<?php

namespace App\Events;

use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ApiAccess
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $type;
    public $user;

    public function __construct(string $type, $user)
    {
        $this->type = $type;
        $this->user = $user;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
