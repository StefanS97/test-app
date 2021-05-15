@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card" style="width: 25rem;">
            <div class="card-body">
                <h5 class="card-title">{{$post->name}}</h5>
                <p class="card-text">{{$post->text}}</p>
                <p>By: {{$post->user->name}}</p>
                <p>Created at: {{$post->created_at->format('d/m/Y')}}</p>
                <a href="/post" class="btn btn-primary">Back to Home</a>
            </div>
        </div>
    </div>
</div>
@endsection