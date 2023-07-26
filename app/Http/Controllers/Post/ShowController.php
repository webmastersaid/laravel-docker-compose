<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        return $post instanceof Post ? new PostResource($post) : $post;
        // return view('post.show', compact('post'));
    }
}
