@extends('templates.main')
@section('content')
<h1>Posts</h1>
<a class="btn btn-primary mb-3" href="{{ route('posts.create') }}">Add new post</a>
<ul class="list-group mb-3">
    @foreach ($posts as $key => $post)
    <li class="list-group-item">{{ $key + 1 }}. <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></li>
    @endforeach
</ul>
<div class="mb-3">
    {{ $posts->links() }}
</div>
@endsection