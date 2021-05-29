@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <x-post type="show" :post="$post"/>
        </div>
    </div>
</div>
@endsection