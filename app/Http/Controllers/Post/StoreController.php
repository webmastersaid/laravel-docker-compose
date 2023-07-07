<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'string',
            'is_published' => '',
            'category_id' => '',
            'tags' => ''
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $post = Post::create($data);
        $post->tags()->withTimestamps()->attach($tags);
        return redirect()->route('posts.index');
    }
}
