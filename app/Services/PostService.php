<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostService
{
    public function getAllPosts()
    {
        $user = Auth::user();
        if ($user->isAdmin()) {
            return Post::all();
        }

        return $user->posts;
    }
}