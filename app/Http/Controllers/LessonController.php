<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Document;
use App\Models\Lesson;
use App\Models\UserLesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    //hiển thị thông tin lesson
    public function show($courseId, $lessonId)
    {
        $course = Course::find($courseId);
        $lesson = Lesson::find($lessonId);
        //ấn vào learn check đã có trong user_lesson .nếu chưa thì create để tính progress
        if ($lesson->isStartedLesson()) {
            $lesson->users()->attach(Auth::user()->id, ['progress' => config('lesson.progress.zero')]);
        }
        $otherCourses = Course::all()->random(config('filter.other_course'));
        return view('lessons.show', compact(['course', 'lesson', 'otherCourses']));
    }
}
