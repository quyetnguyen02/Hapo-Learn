<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Review;
use App\Models\UserLesson;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::all()->random(3);
        $reviews = Review::all()->random(4);
        $courseCount = Course::count();
        $lessonCount = Lesson::count();
        $userLessonCount = UserLesson::count();
        return view('index', compact(['courses', 'reviews', 'courseCount', 'lessonCount', 'userLessonCount']));
    }
}
