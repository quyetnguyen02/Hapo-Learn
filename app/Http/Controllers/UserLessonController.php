<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLessonController extends Controller
{
    public function update(Request $request, $lessonId)
    {
        $lesson = Lesson::find($lessonId);
        $progressLesson = Auth::user()->progressLesson($lessonId);
        $sumDocument = count($lesson->documents()->get()) + config('lesson.1');
        $progress = (($request['program_lesson'] / $sumDocument) * config('lesson.100')) + $progressLesson;
        Auth::user()->lessons()->updateExistingPivot($lessonId, ['progress' => $progress]);
        Auth::user()->documents()->attach($request['document_id']);
        return redirect(url()->previous());
    }
}
