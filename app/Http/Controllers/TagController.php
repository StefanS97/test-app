<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Services\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $tagService;

    public function __construct(TagService $service)
    {
        $this->tagService = $service;
    }

    public function index()
    {
        $tags = $this->tagService->getAllTags();
        return view('tag.index', ['tags' => $tags]);
    }

    public function create()
    {
        return view('tag.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tagName' => 'required|max:15',
        ]);
        $data = $request->all();
        $tag = $this->tagService->storeTag($data);

        if (!$tag) {
            toastr()->error('Error occured!');
            return redirect()->back();
        }
        
        toastr()->success('Tag has been created successfully!');
        return redirect()->route('tag.index');
    }

    public function edit(Tag $tag)
    {
        return view('tag.edit', ['tag' => $tag]);
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'tagName' => 'required|max:15',
        ]);
        $data = $request->all();
        $tag = $this->tagService->updateTag($tag, $data);

        if (!$tag) {
            toastr()->error('Error occured!');
            return redirect()->back();
        }
        
        toastr()->success('Tag has been updated successfully!');
        return redirect()->route('tag.index');
    }

    public function destroy(Tag $tag)
    {
        $delete = $this->tagService->deleteTag($tag);

        if (!$delete) {
            toastr()->error('Error occured!');
            return redirect()->back();
        }
        
        toastr()->success('Tag has been deleted successfully!');
        return redirect()->route('tag.index');
    }
}
