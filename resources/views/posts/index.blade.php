@extends('templates.main')
@section('content')
    <h1>Posts</h1>
    <a class="btn btn-primary mb-3" href="{{ route('posts.create') }}">Add new post</a>
    <form class="d-flex mb-3" action="{{ route('posts.index') }}" method="get">
        <input class="form-control m-1" type="text" name="title" placeholder="Post title">
        <button class="btn btn-primary m-1" type="submit">search</button>
    </form>
    <ul class="list-group mb-3">
        @foreach ($posts as $key => $post)
            <li class="list-group-item">{{ $key + 1 }}. <a
                    href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></li>
        @endforeach
    </ul>
    <div class="mb-3">
        {{ $posts->withQueryString()->links() }}
    </div>
@endsection
