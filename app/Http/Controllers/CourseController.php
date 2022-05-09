<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
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
    public function index(Request $request)
    {
        $teachers = User::teacher()->get();
        $tags = Tag::all();
        $courses = Course::search($request->all())->paginate(config('filter.item_course'));
        return view('courses.index', compact(['courses', 'teachers', 'tags', 'request']));
    }

    //hiển thị thông tin courses
    public function show($id, Request $request)
    {
        $course = Course::find($id);
        $reviews = $course->reviews()->latest()->paginate(2);
        $lessons = Lesson::lessonsForCourse($request->all(), $id)->paginate(config('filter.item_lesson'));
        $otherCourses = Course::all()->random(config('filter.other_course'));
        return view('courses.show', compact(['course', 'reviews', 'lessons', 'request', 'otherCourses']));
    }
}
