@extends('templates.main')
@section('content')
<h1>Update post</h1>
<form action="{{ route('posts.update', $post->id) }}" method="post">
    @csrf
    @method('patch')
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{$post->title}}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description"
            name="description">{{$post->description}}</textarea>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="text" class="form-control" id="image" placeholder="Image" name="image" value="{{$post->image}}">
    </div>
    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" id="published" name="is_published">
        <label class="form-check-label" for="published">
            Is published
        </label>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Save</button>
        <a class="btn btn-secondary" href="{{route('posts.show', $post->id)}}">Cancel</a>
    </div>
</form>
@endsection