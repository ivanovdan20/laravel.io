<?php

namespace App\Forum\Exceptions;

use App\Replies\Reply;

class CouldNotMarkReplyAsSolution extends \Exception
{
    public static function replyAbleIsNotAThread(Reply $reply): self
    {
        return new self("The reply with an id of [{$reply->id()} is not linked to a thread.]");
    }
}
