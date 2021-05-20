<div class="card m-2">
    <div class="card-body">
        <h5 class="card-title">{{$post->name}}</h5>
        <p class="card-text">{{$post->text}}</p>
        <p>By: {{$post->user->name}}</p>
        @if ($type === 'index')
            <a href="{{ route('posts.show', ['post' => $post->id]) }}"
                class="btn btn-primary">View Post</a>
        @elseif ($type === 'show')

            <div class="row">
                <form class="p-2 pb-5" action="{{ route('comment.store', ['post' => $post->id]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="comment">Add comment</label>
                        <input id="comment" name="comment" class="form-control @error('comment') is-invalid @enderror"
                        type="text" placeholder="Add comment" value="{{ old('comment') }}">
                    </div>
                    @error('comment')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
            
            @foreach ($post->comments as $comment)
                <div class="row">
                    <div class="col-6">
                        <p>- {{ $comment->comment }} </p>
                        <p>By: {{ $comment->user->name }}</p>
                    </div>
                    @can('delete', $post)
                    <form class="d-inline pr-4 " action="{{ route('comment.delete', ['comment' => $comment]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    @endcan
                </div>
            @endforeach

            <div class="row p-2 pt-5">
                @can('update', $post)
                    <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-success">Edit</a>
                @endcan
                @can('delete', $post)
                <form class="d-inline pr-4 " action="{{ route('posts.delete', ['post' => $post->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                @endcan
                <a href="{{ route('posts.index') }}" class="btn btn-primary">Back</a>
            </div>

        @endif
    </div>
</div>
