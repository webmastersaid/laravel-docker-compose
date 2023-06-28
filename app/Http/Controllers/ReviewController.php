<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $review = Review::find(1);
        dump($review->name);
        dump($review->surname);
        dump($review->rate);
        dump($review->comment);
    }
}
