@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">Create new Post</div>
                <form class="p-3">
                    <div class="form-group">
                        <label for="postName">Post Name</label>
                        <input type="text" class="form-control" id="postName" placeholder="Post Name">
                    </div>
                    <div class="form-group">
                        <label for="postText">Text</label>
                        <input type="text" class="form-control" id="postText" placeholder="Text">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection