<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('posts.create', compact('tags', 'categories'));
    }
    public function store()
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
        dd($data);
        $post = Post::create($data);
        $post->tags()->withTimestamps()->attach($tags);
        return redirect()->route('posts.index');
    }
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('posts.edit', compact('post', 'tags', 'categories'));
    }
    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'description' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => ''
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $post->update($data);
        $post->tags()->withTimestamps()->sync($tags);
        return redirect()->route('posts.show', $post->id);
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
    public function restore()
    {
        $post = Post::withTrashed()->find(1);
        $post->restore();
    }
    public function first_or_create()
    {
        $postArr = [
            'title' => 'Title 7',
            'description' => 'Description 7',
            'image' => 'image7.png',
            'likes' => 457,
            'is_published' => 1
        ];
        Post::firstOrCreate(['title' => 'Title 7'], $postArr);
    }
    public function update_or_create()
    {
        $postArr = [
            'title' => 'Title 6',
            'description' => 'Description 6',
            'image' => 'image6.png',
            'likes' => 456,
            'is_published' => 1
        ];
        Post::updateOrCreate(['title' => 'Title 6'], $postArr);
    }
}
