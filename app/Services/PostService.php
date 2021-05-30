<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PDOException;
class PostService
{
    public function getAllPosts()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
        return $posts;
    }

    public function storePost($data)
    {        
        $post = Post::create([
            'user_id' => Auth::id(),
            'name' => $data['postName'],
            'text' => $data['postText']
        ]);
        $post->tags()->attach($data['tags']);

        return $post;
    }

    public function updatePost(Post $post, $data)
    {
        $post->name = $data['postName'];
        $post->text = $data['postText'];
        $post->save();
        $post->tags()->sync($data['tags']);

        return $post;
    }

    public function deletePost(Post $post)
    {
        try {
            $post->delete();
            return True;
        } catch (PDOException $e) {
            report($e);
            return False;
        }
    }

    public function searchPost($searchName)
    {
        $posts = Post::where('name', 'LIKE', "%{$searchName}%")
                     ->get();
        return $posts;
    }

    public function storeComment($comment, Post $post)
    {
        $comment = Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $post->id,
            'comment' => $comment,
        ]);

        return $comment;
    }

    public function deleteComment(Comment $comment)
    {
        try {
            $comment->delete();
            return True;
        } catch (PDOException $e) {
            report($e);
            return False;
        }
    }
}