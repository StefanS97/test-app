@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">Create new Tag</div>
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

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection