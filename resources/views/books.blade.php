@extends('template.main')
@section('content')
    <h1>Books page</h1>
    @foreach ($books as $book)
        {{ $book->name }}
    @endforeach
@endsection
