<div class="card m-2">
    <div class="card-body">
        <h5 class="card-title text-center">{{$post->name}}</h5>
        <hr>
        <p class="card-text mt-4">{{$post->text}}</p>
        <p>-{{$post->user->name}}</p>
        @if ($type === 'index')
        <div class="row justify-content-end mx-1">
            <a href="{{ route('posts.show', ['post' => $post->id]) }}"
                class="btn btn-primary ml-2"><i class="fa fa-bars"></i> Post Details</a>
        </div>
        @elseif ($type === 'show')
            <div class="row mx-1">
                @foreach ($post->tags as $tag)
                    <div class="mx-1">
                        <span class="badge bagde-pill badge-primary">{{ $tag->name }}</span>
                    </div>
                @endforeach
            </div>
            <hr>
            <div class="row mt-4">
                <form class="d-flex align-items-center p-2 pb-5" action="{{ route('comment.store', ['post' => $post->id]) }}" method="POST">
                    @csrf
                    <div class="form-group col-md-8">
                        <label for="comment">Add comment</label>
                        <input id="comment" name="comment" class="form-control @error('comment') is-invalid @enderror"
                        type="text" placeholder="Add comment" value="{{ old('comment') }}">
                    </div>
                    @error('comment')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-md-4 mt-3">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-plus"></i> Add
                        </button>
                    </div>
                </form>
            </div>
            @foreach ($post->comments as $comment)
                <hr>
                <div class="row justify-content-between">
                    <div class="col-8">
                        <p>- {{ $comment->comment }} </p>
                        <p>By: {{ $comment->user->name }}</p>
                    </div>
                    @can('delete', $post)
                    <form class="d-inline pr-4" action="{{ route('comment.delete', ['comment' => $comment]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ">
                            <i class="fa fa-trash align-items-center"></i>
                        </button>
                    </form>
                    @endcan
                </div>
            @endforeach
            <div class="row p-2 pt-5">
                @can('update', $post)
                    <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-success"><i class="fa fa-pen"></i> Edit Post</a>
                @endcan
                @can('delete', $post)
                <form class="d-inline pr-4 ml-2" action="{{ route('posts.delete', ['post' => $post->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete Post</button>
                </form>
                @endcan
                <a href="{{ route('posts.index') }}" class="btn btn-primary ml-auto"><i class="fa fa-backward"></i> Back</a>
            </div>
        @endif
    </div>
</div>
