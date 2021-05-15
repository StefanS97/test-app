@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="name">
            </div>
            <div class="form-group">
              <label for="text">text</label>
              <input type="text" class="form-control" id="text" placeholder="text">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>
@endsection