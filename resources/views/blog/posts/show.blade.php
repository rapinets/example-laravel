@extends('layout')

@section('title', $post->title)

@section('content')

    <div class="card">
        <h5 class="card-header">{{ $post->title }}</h5>
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
        </div>
    </div>

@endsection