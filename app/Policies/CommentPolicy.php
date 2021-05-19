<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Comment $comment)
    {
        if ($user->isAdmin() || $user->id === $comment->user->id)
        {
            return True;
        }

        return False;
    }
}
