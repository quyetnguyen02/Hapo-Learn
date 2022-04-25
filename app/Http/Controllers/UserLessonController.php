<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\UserLesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLessonController extends Controller
{
    public function update(Request $request, $lessonId)
    {
        //update tiến trình học của 1 lesson
        $lesson = Lesson::find($lessonId);
        $data = [
            'program_lesson' => $request['program_lesson'],
            'progressLesson' => $lesson->learning_progress,
            'sumDocument' => $lesson->documents()->count(),
        ];
        $progress = UserLesson::sumProgress($data);
        Auth::user()->lessons()->updateExistingPivot($lessonId, ['progress' => $progress]);
        Auth::user()->documents()->attach($request['document_id']);
        return redirect(url()->previous());
    }
}
