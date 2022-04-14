<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

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
        $teachers = User::all()->where('role', '=', '1');
        $tags = Tag::all();
        $courses = Course::search($request)->paginate(14);
        $data = $request;
        return view('course', compact(['courses', 'teachers', 'tags', 'data']));
    }
}
