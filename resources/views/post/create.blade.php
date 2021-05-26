@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">Create new Post</div>
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
                        <select class="custom-select" multiple aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('postText')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection