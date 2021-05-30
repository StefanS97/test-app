@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header text-center">Edit Tag</div>
                <form class="p-3" action="{{ route('tag.update', ['tag' => $tag->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="tagName">Tag Name</label>
                        <input id="tagName" name="tagName" class="form-control @error('tagName') is-invalid @enderror"
                               type="text" placeholder="Tag Name" value="{{ old('tagName', $tag->name) }}">
                    </div>
                    @error('tagName')
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