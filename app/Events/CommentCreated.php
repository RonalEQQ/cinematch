<?php

namespace App\Events;

use App\Models\Comment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class CommentCreated implements ShouldBroadcast
{
    use SerializesModels;

    public Comment $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment->load('user');
    }

    public function broadcastOn(): Channel
    {
        return new Channel('movie.' . $this->comment->movie_id);
    }
}
