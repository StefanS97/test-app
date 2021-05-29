<div class="card m-2">
    <div class="card-body">
        <h5 class="card-title text-center">{{$post->name}}</h5>
        <hr>
        <p class="card-text">{{$post->text}}</p>
        <br>
        <p>-{{$post->user->name}}</p>
        @if ($type === 'index')
        <div class="row justify-content-end mx-1">
            <a href="{{ route('posts.show', ['post' => $post->id]) }}"
                class="btn btn-primary ml-2">Post Details</a>
        </div>
        @elseif ($type === 'show')

            <div class="row mx-1">
                @foreach ($post->tags as $tag)
                    <div class="mx-1">
                        <span class="badge bagde-pill badge-primary">{{ $tag->name }}</span>
                    </div>
                @endforeach
            </div>

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
