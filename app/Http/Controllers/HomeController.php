<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Review;
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
        return view('homepage',compact(['courses','reviews']));
    }

    public function show()
    {
        return view('homepage');
    }
}
