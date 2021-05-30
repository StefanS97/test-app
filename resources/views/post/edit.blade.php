@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header text-center">Edit Post</div>
                <form class="p-3" action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="postName">Post Name</label>
                        <input id="postName" name="postName" class="form-control @error('postName') is-invalid @enderror"
                               type="text" placeholder="Post Name" value="{{ old('postName', $post->name) }}">
                    </div>
                    @error('postName')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="postText">Text</label>
                        <input id="postText" name="postText" class="form-control @error('postText') is-invalid @enderror"
                               type="text" placeholder="Text" value="{{ old('postText', $post->text) }}">
                    </div>
                    @error('postText')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <select name="tags[]" class="form-control @error('tags') is-invalid @enderror"
                                multiple aria-label="Default select example">
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}" 
                                        {{
                                            (collect(old('tags', $post->tags->pluck('id')))->contains($tag->id))
                                            ? "selected"
                                            : ""
                                        }}
                                >
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('tags')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="row justify-content-end mr-1">
                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection