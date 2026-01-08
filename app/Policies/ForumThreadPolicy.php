<?php

namespace App\Policies;

use App\Models\ForumThread;
use App\Models\User;

class ForumThreadPolicy
{
    /**
     * Determine if the user can update the thread.
     */
    public function update(User $user, ForumThread $thread): bool
    {
        return $user->id === $thread->user_id || $user->role === 'admin';
    }

    /**
     * Determine if the user can delete the thread.
     */
    public function delete(User $user, ForumThread $thread): bool
    {
        return $user->id === $thread->user_id || $user->role === 'admin';
    }

    /**
     * Determine if the user can pin/unpin the thread.
     */
    public function pin(User $user): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine if the user can lock/unlock the thread.
     */
    public function lock(User $user): bool
    {
        return $user->role === 'admin';
    }
}
