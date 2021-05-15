<div class="card m-2" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">{{$slot->name}}</h5>
        <p class="card-text">{{$slot->text}}</p>
        <p>By: {{$slot->user->name}}</p>
        <a href="/post/{{$slot->id}}" class="btn btn-primary">View Post</a>
    </div>
</div>
