<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class PostService
{
    public function getAllPosts()
    {
        $user = Auth::user();
        $userPosts = $user->posts;
        return $userPosts;
    }
}