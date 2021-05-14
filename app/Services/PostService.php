<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostService
{
    public function getAllPosts()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
           ddd(Post::all());
        } else {
            $userPosts = $user->posts;
            ddd($userPosts);
        }
    }
}