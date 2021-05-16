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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'postName' => 'required|max:10',
            'postText' => 'required|max:255',
        ]);
        
        $user = Auth::user();

        return Post::create([
            'user_id' => $user->id,
            'name' => $request->postName,
            'text' => $request->postText
        ]);

    }
}