<?php

namespace App\Policies;

use App\Models\ForumReply;
use App\Models\User;

class ForumReplyPolicy
{
    /**
     * Determine if the user can delete the reply.
     */
    public function delete(User $user, ForumReply $reply): bool
    {
        return $user->id === $reply->user_id || $user->is_admin;
    }
}
