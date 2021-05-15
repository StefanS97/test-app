@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">Create new Post</div>
                <form class="p-3" action="{{ route('posts.store') }}" method="POST">
                    <div class="form-group">
                        <label for="postName">Post Name</label>
                        <input id="postName" name="postName" class="form-control"
                               type="text" placeholder="Post Name">
                    </div>
                    <div class="form-group">
                        <label for="postText">Text</label>
                        <input id="postText"" name="postText" class="form-control"
                               type="text" placeholder="Text">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection