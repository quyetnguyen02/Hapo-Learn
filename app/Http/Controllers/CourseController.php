<?php

namespace App\Http\Controllers;

use App\Models\Course;
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
        $courses = Course::search($request->all())->paginate(config('filter.item_page'));
        return view('courses.index', compact(['courses', 'teachers', 'tags', 'request']));
    }
}
