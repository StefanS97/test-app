@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($tags as $tag)
        <div class="col-6">
            <x-tag type="index" :tag="$tag"/>
        </div>
        @endforeach
    </div>
</div>
@endsection