@extends('layouts.admin')
@section('content')
    <ul class="list-group mb-3">
        @foreach ($posts as $key => $post)
            <li class="list-group-item">{{ $key + 1 }}. <a
                    href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></li>
        @endforeach
    </ul>
    <div class="mb-3">
        {{ $posts->withQueryString()->links() }}
    </div>
@endsection
