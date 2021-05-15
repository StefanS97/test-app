@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <x-post :post='$post'/>
    </div>
</div>
@endsection