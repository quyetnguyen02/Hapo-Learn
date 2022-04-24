<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\User;
use App\Models\UserLesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCourseController extends Controller
{
    public function store(Request $request)
    {
        Auth::user()->courses()->attach($request['course_id'], ['status' => config('lesson.progress.0'),]);
        return redirect()->back()->with('message_course', 'JOINED');
    }

    public function edit($id)
    {
        Auth::user()->courses()->updateExistingPivot($id, ['status' => config('lesson.progress.1')]);
        return redirect()->back()->with('message_end_course', 'FINISHED');
    }
}
