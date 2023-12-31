@extends('layouts.main')
@section('content')
<div>
    <h1>{{$book->name}}</h1>
    <p>Author: {{$book->author}}</p>
    <span>Description: </span>
    <p>{{$book->description}}</p>
    <div class="d-flex mb-3">
        <div class="m-1">
            <a class="btn btn-primary" href="{{route('book.edit', $book->id)}}">Edit</a>
        </div>
        <form class="m-1" action="{{route('book.destroy', $book->id)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
    <a href="{{route('book.index')}}">Go to books</a>
</div>
@endsection