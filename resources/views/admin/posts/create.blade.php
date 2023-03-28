@extends('admin.layout')

@section('content')

<h1 class="display-4 mb-5">New Post</h1>

<form method="post" action="{{ route('posts.store') }}">
    @csrf
  <div class="row mb-3">
    <label for="title" class="col-sm-2 col-form-label">Post Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="title">
    </div>
  </div>
  <div class="row mb-3">
    <label for="textarea" class="col-sm-2 col-form-label">Content</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="textarea" style="height: 100px"></textarea>
    </div>
  </div>
  
  
  <button type="submit" class="btn btn-dark">Save</button>
</form>

@endsection
