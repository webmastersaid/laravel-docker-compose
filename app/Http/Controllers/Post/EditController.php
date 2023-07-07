<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class EditController extends Controller
{
    public function __invoke(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('posts.edit', compact('post', 'tags', 'categories'));
    }
}
