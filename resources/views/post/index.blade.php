@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4 my-2">
            <div>
                <div class="card">
                    <div class="card-header text-center">Create new Post</div>
                    <form class="p-3" action="{{ route('posts.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="postName">Post Name</label>
                            <input id="postName" name="postName" class="form-control @error('postName') is-invalid @enderror"
                                type="text" placeholder="Post Name" value="{{ old('postName') }}">
                        </div>
                        @error('postName')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="postText">Text</label>
                            <input id="postText" name="postText" class="form-control @error('postText') is-invalid @enderror"
                                type="text" placeholder="Text" value="{{ old('postText') }}">
                        </div>
                        @error('postText')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <select name="tags[]" class="form-control @error('tags') is-invalid @enderror"
                                    multiple aria-label="Default select example">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('tags')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="row justify-content-end mx-1">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>
                @if(Auth::user()->isAdmin())
                    <div class="card my-4">
                        <div class="card-header text-center">Create new Tag</div>
                        <form class="p-3" action="{{ route('tag.store') }}" method="POST">
                            @csrf
        
                            <div class="form-group">
                                <label for="tagName">Tag Name</label>
                                <input id="tagName" name="tagName" class="form-control @error('tagName') is-invalid @enderror"
                                    type="text" placeholder="Tag Name" value="{{ old('tagName') }}">
                            </div>
                            @error('tagName')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="row justify-content-end mx-1">
                                <a href="{{ route("tag.index") }}" class="btn btn-secondary">View Tags</a>
                                <button type="submit" class="btn btn-primary ml-2">Submit</button>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                @foreach ($posts as $post)
                <div class="col-lg-6">
                    <x-post type="index" :post="$post"/>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection