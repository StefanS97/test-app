@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form>
            <div class="form-group">
                <label for="PostName">Post Name</label>
                <input type="text" class="form-control" id="postname" aria-describedby="postname" placeholder="Post Name">
            </div>
            <div class="form-group">
                <label for="text">Text</label>
                <input type="text" class="form-control" id="text" placeholder="Text">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection