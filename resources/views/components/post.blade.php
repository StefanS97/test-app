<div class="card m-2">
    <div class="card-body">
        <h5 class="card-title">{{$post->name}}</h5>
        <p class="card-text">{{$post->text}}</p>
        <p>By: {{$post->user->name}}</p>
        @if ($type === 'index')
            <a href="{{ route('posts.show', ['post' => $post->id]) }}"
                class="btn btn-primary">View Post</a>
        @elseif ($type === 'show')
            <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-success">Edit</a>
            <form class="d-inline" action="{{ route('posts.delete', ['post' => $post->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('posts.index') }}" class="btn btn-primary">Back</a>
        @endif
    </div>
</div>
