<?php

namespace App\Services;

use App\Models\Post;
use GuzzleHttp\Psr7\Request;
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

    public function storePost($data)
    {        
        $user_id = Auth::id();

        $post = Post::create([
            'user_id' => $user_id,
            'name' => $data['postName'],
            'text' => $data['postText']
        ]);

        return $post;
    }
}