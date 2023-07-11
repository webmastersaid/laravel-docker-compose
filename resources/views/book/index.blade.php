@extends('layouts.main')
@section('content')
    <h1>Books</h1>
    <a class="btn btn-primary mb-3" href="{{ route('book.create') }}">Add new book</a>
    <ul class="list-group">
        @foreach ($books as $key => $book)
            <li class="list-group-item">{{ $key + 1 }}. <a
                    href="{{ route('book.show', $book->id) }}">{{ $book->name }}</a></li>
        @endforeach
    </ul>
@endsection
