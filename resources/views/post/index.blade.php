@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @foreach ($posts as $post)
        
        <x-post/>
        
        @endforeach
        
    </div>
</div>
@endsection