<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::find(1);
        dump($news->title);
        dump($news->description);
        dump($news->image);
        dump($news->views);
    }
}
