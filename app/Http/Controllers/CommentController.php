<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $postService;

    public function __construct(PostService $service)
    {
        $this->postService = $service;
    }

    public function store(Request $request, Post $post)
    {
        $request->validate([
            'comment' => 'required|max:255',
        ]);
        $comment = $this->postService->storeComment($request->comment, $post);

        if (!$comment) {
            toastr()->error('Error occured!');
            return redirect()->back();
        }
        
        toastr()->success('Comment has been posted successfully!');
        return redirect()->back();
    }

    public function destroy(Comment $comment)
    {
        $delete = $this->postService->deleteComment($comment);

        if (!$delete) {
            toastr()->error('Error occured!');
            return redirect()->back();
        }
        
        toastr()->success('Comment has been deleted successfully!');
        return redirect()->back();
    }
}
