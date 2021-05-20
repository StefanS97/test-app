@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th></th>
                    <th>Tag Name</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <x-tag type="index" :tag="$tag"/>
                @endforeach
            </tbody>
        </table>        
    </div>
</div>
@endsection