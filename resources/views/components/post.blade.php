<div class="card m-2" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">{{$post->name}}</h5>
        <p class="card-text">{{$post->text}}</p>
        <p>By: {{$post->user->name}}</p>
        <a href="/post/{{$post->id}}" class="btn btn-primary">View Post</a>
    </div>
</div>
