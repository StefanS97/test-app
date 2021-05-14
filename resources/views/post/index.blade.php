@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @foreach ($posts as $post)
        
        <div class="card m-2" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$post->name}}</h5>
                <p class="card-text">{{$post->text}}</p>
                <p>By: {{$post->user->name}}</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        
        @endforeach
    </div>
</div>
@endsection