@extends('layouts.main')
@section('content')
    <h1>Update post</h1>
    <form action="{{ route('post.update', $post->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Title" name="title"
                value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description"
                name="description">{{ $post->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control" id="image" placeholder="Image" name="image"
                value="{{ $post->image }}">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select id="category" class="form-select" name="category_id">
                @foreach ($categories as $category)
                    <option {{ $category === $post->category ? 'selected' : '' }} value="{{ $category->id }}">
                        {{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <select id="tags" class="form-select" name="tags[]" multiple>
                @foreach ($tags as $tag)
                    <option {{ $post->tags->contains($tag) ? 'selected' : '' }} value="{{ $tag->id }}">
                        {{ $tag->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="published" name="is_published">
            <label class="form-check-label" for="published">
                Is published
            </label>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Save</button>
            <a class="btn btn-secondary" href="{{ route('post.show', $post->id) }}">Cancel</a>
        </div>
    </form>
@endsection
