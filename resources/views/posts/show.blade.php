@extends('templates.main')
@section('content')
<div>
    <h1>{{ $post->title }}</h1>
    <img class="img-fluid" src="{{ $post->image }}" alt="{{ $post->title }}">
    <p>{{ $post->description }}</p>
    <div class="d-flex mb-3">
        <div class="m-1">
            <a class="btn btn-primary" href="{{ route('posts.edit', $post->id) }}">Edit</a>
        </div>
        <form class="m-1" action="{{route('posts.destroy', $post->id)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
    <a href="{{route('posts.index')}}">Go to posts</a>
</div>
@endsection