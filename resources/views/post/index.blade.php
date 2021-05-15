@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($posts as $post)
        <div class="col-6">
            
            <x-post :post='$post'/>
            
        </div>
            @endforeach
    </div>
</div>
@endsection