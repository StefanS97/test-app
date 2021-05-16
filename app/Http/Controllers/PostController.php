<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    protected $postService;

    public function __construct(PostService $service)
    {
        $this->postService = $service;
    }

    public function index()
    {
        $posts = $this->postService->getAllPosts();
        return view('post.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'postName' => 'required|max:10',
            'postText' => 'required|max:255',
        ]);
        $data = $request->all();
        $store = $this->postService->store($data);
        return view('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
