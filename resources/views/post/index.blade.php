@extends('layouts.app')

@section('content')
<div class="container-fluid" style="max-width: 1440px;">
    <div class="row justify-content-center">
        <div class="col-md-4 my-2">
            <div>
                <x-create-post :tags="$tags" />
                @if(Auth::user()->isAdmin())
                    <x-create-tag />
                @endif
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                @foreach ($posts as $post)
                <div class="col-md-6">
                    <x-post type="index" :post="$post"/>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection