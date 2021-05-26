<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\PostService;
use App\Services\TagService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    protected $postService;
    protected $tagService;

    public function __construct(PostService $postService, TagService $tagService)
    {
        $this->postService = $postService;
        $this->tagService = $tagService;
    }

    public function index()
    {
        $posts = $this->postService->getAllPosts();
        return view('post.index', ['posts' => $posts]);
    }

    public function create()
    {
        $tags = $this->tagService->getAllTags();
        return view('post.create', ['tags' => $tags]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'postName' => 'required|max:10',
            'postText' => 'required|max:255',
            'tags' => 'required',
        ]);
        $data = $request->all();
        $post = $this->postService->storePost($data);

        if (!$post) {
            toastr()->error('Error occured!');
            return redirect()->back();
        }
        
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        return view('post.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        return view('post.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'postName' => 'required|max:10',
            'postText' => 'required|max:255',
        ]);
        $data = $request->all();
        $post = $this->postService->updatePost($post, $data);

        if (!$post) {
            toastr()->error('Error occured!');
            return redirect()->back();
        }
        
        toastr()->success('Data has been updated successfully!');
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    public function destroy(Post $post)
    {
        $delete = $this->postService->deletePost($post);

        if (!$delete) {
            toastr()->error('Error occured!');
            return redirect()->back();
        }
        
        toastr()->success('Data has been deleted successfully!');
        return redirect()->route('posts.index');
    }
}
