@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4 my-2">
            <div>
                <x-create-post :tags="$tags" />
                @if(Auth::user()->isAdmin())
                    <x-create-tag />
                @endif
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                @foreach ($posts as $post)
                <div class="col-lg-6">
                    <x-post type="index" :post="$post"/>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection