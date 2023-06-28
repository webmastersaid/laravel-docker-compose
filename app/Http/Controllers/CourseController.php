<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $course = Course::find(1);
        dump($course->name);
        dump($course->description);
        dump($course->video);
        dump($course->views);
        dump($course->likes);
    }
}
