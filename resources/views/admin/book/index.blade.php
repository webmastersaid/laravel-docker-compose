@extends('layouts.admin')
@section('content')
    <ul class="list-group mb-3">
        @foreach ($books as $key => $book)
            <li class="list-group-item">{{ $key + 1 }}. <a
                    href="{{ route('book.show', $book->id) }}">{{ $book->title }}</a></li>
        @endforeach
    </ul>
    <div class="mb-3">
        {{ $books->withQueryString()->links() }}
    </div>
@endsection