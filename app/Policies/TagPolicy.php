<?php

namespace App\Policies;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TagPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }
        return false;
    }
}
