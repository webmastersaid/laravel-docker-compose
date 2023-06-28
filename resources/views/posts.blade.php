@extends('template.main')
@section('content')
    <h1>Posts page</h1>
    @foreach ($posts as $post)
        <div>{{ $post->title }}</div>
    @endforeach
@endsection