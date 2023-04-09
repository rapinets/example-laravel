@extends('layout')

@section('title', $post->title)

@section('content')

<h1 class="display-4 mb-5">Update Post</h1>

<form method="post" action="{{ route('admin.posts.update', ['post' => $post]) }}">
    @csrf
    @method('PATCH')
  <div class="row mb-3">
    <label for="title" class="col-sm-2 col-form-label">Post Title</label>
    <div class="col-sm-10">
      <input type="text" class="@error('title') is-invalid @enderror form-control" id="title" name="title" value="{{ $post->title }}">
      @error('title')
        <div class="alert">Fill in the field</div>
      @enderror
    </div>
  </div>
  <div class="row mb-3">
    <label for="textarea" class="col-sm-2 col-form-label">Content</label>
    <div class="col-sm-10">
    <textarea class="@error('content') is-invalid @enderror form-control" id="textarea" name="content" style="height: 100px">{{ $post->content }}</textarea>
    @error('content')
      <div class="alert">Fill in the field</div>
    @enderror
    </div>
  </div>
  
  
  <button type="submit" class="btn btn-dark">Save</button>
</form>

@endsection
