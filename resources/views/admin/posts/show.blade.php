@extends('layout')

@section('title', $post->title)

@section('content')

<div class="card">
  <h5 class="card-header">{{ $post->title }}</h5>
  <div class="card-body">
    <h5 class="card-title">{{ $post->title }}</h5>
    <p class="card-text">{{ $post->content }}</p>
    <div class="d-flex">
      <div class="me-2">
        <a href="{{ route('admin.posts.edit', ['post' => $post]) }}" class="btn btn-primary">Edit</a>
      </div>
      <div class="me-2">
        <form action="{{ route('admin.posts.delete', ['post' => $post]) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
