@extends('templates.main')
@section('content')
    <h1>Edit book</h1>
    <form action="{{ route('books.update', $book->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{$book->name}}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" rows="3" placeholder="Description" name="description">
                {{$book->description}}
            </textarea>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" placeholder="Author" name="author" value="{{$book->author}}">
        </div>
        <div class="mb-3">
            <label for="publication" class="form-label">Date of publication</label>
            <input type="date" class="form-control" id="publication" name="date_published" value="{{$book->date_published}}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Save</button>
            <a class="btn btn-secondary" href="{{route('books.show', $book->id)}}">Cancel</a>
        </div>
    </form>
@endsection
