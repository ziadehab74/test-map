<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserStatus implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    /**
     * The user whose status has changed.
     *
     * @var User
     */

     public $user;
     public $status;

    /**
     * Create a new event instance.
     *
     * @param User $user
     */
    public function __construct($user,$status)
    {
        $this->user = $user;
        $this->status = $status;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return PresenceChannel
     */
    public function broadcastOn()
    {
        return new PresenceChannel('user-status');
    }
}
