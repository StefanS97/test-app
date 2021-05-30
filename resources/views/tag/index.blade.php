@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
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
                    <tr>
                        <th>{{ $tag->id }}<th>
                        <td>{{ $tag->name }}</td>
                        <td>
                            <a href="{{ route('tag.edit', ['tag' => $tag->id]) }}" class="btn btn-success">Edit</a>
                            <form class="d-inline" action="{{ route('tag.delete', ['tag' => $tag->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <td class="row justify-content-end mr-1">
                            <a href="{{ route('posts.index') }}" class="btn btn-primary">Back</a>
                        </td>
                    </tr>
                </tbody>
            </table>        
        </div>
    </div>
</div>
@endsection