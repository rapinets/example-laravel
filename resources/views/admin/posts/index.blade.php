@extends('layout')

@section('title', 'Posts')

@section('content')
    <div class="row mb-4">
        @foreach($posts as $post)
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ Str::limit($post->content, 100, '...') }}</p>
                    <a href="{{ route('admin.posts.show', ['post' => $post]) }}" class="btn btn-primary">More...</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $posts->links() }}
@endsection
