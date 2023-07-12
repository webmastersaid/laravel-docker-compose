<?php

namespace App\Http\Controllers\Admin\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Filters\PostFilter;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $books = Post::filter($filter)->paginate(10);
        return view('admin.book.index', compact('books'));
    }
}
