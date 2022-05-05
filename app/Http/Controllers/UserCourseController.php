<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use App\Models\UserLesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserCourseController extends Controller
{
    //tham gia khóa học
    public function store(Request $request)
    {
        try {
            $course = Course::findOrFail($request['course_id']);
            if ($course) {
                if (Auth::user()->getCourseUser($course->id) == config('lesson.zero')) {
                    Auth::user()->courses()->attach($request['course_id'], ['status' => config('lesson.one'),]);
                    return redirect()->back()->with('message_course', 'JOINED');
                }else {
                    return redirect()->back()->with('message_end_course', 'có lỗi xảy ra');
                }

            }else {
                return redirect()->back()->with('error_course', 'có lỗi xảy ra');
            }
        }catch (\Exception $e) {
            return redirect()->back()->with('error_course', 'có lỗi xảy ra');
        }

    }

    //kết thúc khóa học
    public function update(Request $request, $id)
    {
        try {
            $course = Course::findOrFail($id);
            if ($course) {
                if (Auth::user()->getCourseUser($course->id) == config('lesson.zero')) {
                    Auth::user()->courses()->updateExistingPivot($id, ['status' => config('lesson.two')]);
                    return redirect()->back()->with('message_end_course', 'FINISHED');
                }else {
                    return redirect()->back()->with('message_end_course', 'có lỗi xảy ra');
                }
            }else {
                return redirect()->back()->with('message_end_course', 'có lỗi xảy ra');
            }
        }catch (\Exception $e) {
            return redirect()->back()->with('message_end_course', 'có lỗi xảy ra');
        }

    }
}
