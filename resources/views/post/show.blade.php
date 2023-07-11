@extends('layouts.main')
@section('content')
    <div>
        <h1>{{ $post->title }}</h1>
        <h2>{{ $post->category->title }}</h2>
        <img class="img-fluid" src="{{ $post->image }}" alt="{{ $post->title }}">
        <p>{{ $post->description }}</p>
        <span>tags:</span>
        <p>
            @foreach ($post->tags as $tag)
                {{ $tag->title }},
            @endforeach
        </p>
        <div class="d-flex mb-3">
            <div class="m-1">
                <a class="btn btn-primary" href="{{ route('post.edit', $post->id) }}">Edit</a>
            </div>
            <form class="m-1" action="{{ route('post.destroy', $post->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
        <a href="{{ route('post.index') }}">Go to posts</a>
    </div>
@endsection
