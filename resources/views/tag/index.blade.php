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
                            <div>
                                <a href="{{ route('tag.edit', ['tag' => $tag->id]) }}" class="btn btn-success">Edit</a>
                                <form class="d-inline pr-4 " action="{{ route('tag.delete', ['tag' => $tag->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                <a href="{{ route('tag.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>        
        </div>
    </div>
</div>
@endsection