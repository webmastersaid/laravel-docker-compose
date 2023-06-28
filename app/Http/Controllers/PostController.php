<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts', compact('posts'));
    }
    public function create()
    {
        $postsArr = [
            [
                'title' => 'Title 1',
                'description' => 'Description 1',
                'image' => 'image1.png',
                'likes' => 451,
                'is_published' => 1
            ],
            [
                'title' => 'Title 2',
                'description' => 'Description 2',
                'image' => 'image2.png',
                'likes' => 452,
                'is_published' => 1
            ],
            [
                'title' => 'Title 3',
                'description' => 'Description 3',
                'image' => 'image3.png',
                'likes' => 453,
                'is_published' => 1
            ],
            [
                'title' => 'Title 4',
                'description' => 'Description 4',
                'image' => 'image4.png',
                'likes' => 454,
                'is_published' => 1
            ]
        ];
        foreach ($postsArr as $item) {
            Post::create($item);
        }
    }
    public function update()
    {
        $post = Post::find(3);
        $post->update(['title'=>'2 post title']);
    }
    public function delete()
    {
        $post = Post::find(1);
        $post->delete();
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