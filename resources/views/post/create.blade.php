@extends('layouts.main')
@section('content')
    <h1>Create post</h1>
    <form action="{{ route('post.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Title" name="title"
                value="{{ old('title') }}">
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" rows="3" placeholder="Description" name="description">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control" id="image" placeholder="Image" name="image"
                value="{{ old('image') }}">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select id="category" class="form-select" name="category_id">
                @foreach ($categories as $category)
                    <option {{ old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
                        {{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <select id="tags" class="form-select" name="tags[]" multiple>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">
                        {{ $tag->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="published" name="is_published"
                value="{{ old('is_published') }}">
            <label class="form-check-label" for="published">
                Is published
            </label>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
@endsection
