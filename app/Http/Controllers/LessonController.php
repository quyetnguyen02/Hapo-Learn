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
    public function show($courseId, $lessonId)
    {
        $course = Course::find($courseId);
        $lesson = $course->getLessonById($lessonId);

        if ($lesson->lessonByUserId == config('lesson.0')) {
            $lesson->users()->attach(Auth::user()->id, ['progress' => config('lesson.progress.0')]);
        }
        $otherCourses = Course::all()->random(config('filter.other_course'));
        return view('lessons.show', compact(['course', 'lesson', 'otherCourses']));
    }
}
