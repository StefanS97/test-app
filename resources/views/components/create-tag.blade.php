<div class="card my-4">
    <div class="card-header text-center">Create new Tag</div>
    <form class="p-3" action="{{ route('tag.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="tagName">Tag Name</label>
            <input id="tagName" name="tagName" class="form-control @error('tagName') is-invalid @enderror"
                type="text" placeholder="Tag Name" value="{{ old('tagName') }}">
        </div>
        @error('tagName')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="row justify-content-end mx-1">
            <a href="{{ route("tag.index") }}" class="btn btn-secondary"><i class="fa fa-bars"></i> View Tags</a>
            <button type="submit" class="btn btn-success ml-2"><i class="fa fa-check"></i> Submit</button>
        </div>
    </form>
</div>