<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ListCourseController extends Controller
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
        $courses = Course::latest()->paginate(14);
        return view('list-course',compact('courses'));
    }

    public function search(Request $request)
    {
        $courses = Course::where('name' , 'like' , '%' . $request->key . '%')->paginate(14);
        return view('list-course',compact('courses'));
    }
}
