<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('book.index', compact('books'));
    }

    public function create()
    {
        return view('book.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'string',
            'description' => 'string',
            'author' => 'string',
            'date_published' => 'date',
        ]);
        Book::create($data);
        return redirect()->route('book.index');
    }
    
    public function show(Book $book)
    {
        return view('book.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('book.edit', compact('book'));
    }

    public function update(Book $book)
    {
        $data = request()->validate([
            'name' => 'string',
            'description' => 'string',
            'author' => 'string',
            'date_published' => 'date',
        ]);
        $book->update($data);
        return redirect()->route('book.show', $book->id);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index');
    }

}