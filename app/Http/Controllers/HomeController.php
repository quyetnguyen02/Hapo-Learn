<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Review;
use App\Models\UserCourse;
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
        $courses = Course::inRandomOrder()->limit(3)->get();
        $reviews = Review::inRandomOrder()->limit(4)->get();
        $courseCount = Course::count();
        $lessonCount = Lesson::count();
        $userLessonCount = UserCourse::count();
        return view('index', compact(['courses', 'reviews', 'courseCount', 'lessonCount', 'userLessonCount']));
    }
}
