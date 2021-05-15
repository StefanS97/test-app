@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            @foreach ($posts as $post)
            
            <x-post :post='$post'/>
            
            @endforeach
        </div>
    </div>
</div>
@endsection