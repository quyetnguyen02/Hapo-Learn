<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\User;
use App\Models\UserLesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCourseController extends Controller
{
    //tham gia khóa học
    public function store(Request $request)
    {
        Auth::user()->courses()->attach($request['course_id'], ['status' => config('lesson.progress.ゼロ'),]);
        return redirect()->back()->with('message_course', 'JOINED');
    }

    //kết thúc khóa học
    public function update(Request $request, $id)
    {
        Auth::user()->courses()->updateExistingPivot($id, ['status' => config('lesson.progress.いち')]);
        return redirect()->back()->with('message_end_course', 'FINISHED');
    }
}
