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

    public function storePost($data)
    {        
        $post = Post::create([
            'user_id' => Auth::id(),
            'name' => $data['postName'],
            'text' => $data['postText']
        ]);

        return $post;
    }

    public function updatePost(Post $post, $data)
    {
        $post->name = $data['postName'];
        $post->text = $data['postText'];
        $post->save();

        return $post;
    }

    public function deletePost(Post $post)
    {
        $post->delete();
    }
}