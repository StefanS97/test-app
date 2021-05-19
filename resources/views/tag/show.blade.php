@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <x-tag type="show" :tag="$tag"/>
    </div>
</div>
@endsection