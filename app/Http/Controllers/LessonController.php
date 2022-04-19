<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Document;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show($courseId, $lessonId)
    {
        //dd($lessonId);
        $course = Course::find($courseId);
        $lesson = Lesson::find($lessonId);

        //dd($lesson->documents()->get());
        $otherCourses = Course::all()->random(5);
        return view('lessons.show', compact(['course', 'lesson', 'otherCourses']));
    }
}
