@extends('blog.layout')

@section('content')

<div class="card">
  <div class="card-body">
    <h3 class="card-title mb-4">{{ $post->title }}</h3>
    <h6 class="card-subtitle mb-2 text-muted">{{ $post->title }}</h6>
    <p class="card-text">{{ $post->content }}</p>
    <a href="#" class="card-link">Edit</a>
    <a href="#" class="card-link">Delete</a>
  </div>
</div>

@endsection
