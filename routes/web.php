<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\UserLessonController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group whichr
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('', HomeController::class)->only('index');
Route::resource('courses', CourseController::class)->only(['index', 'show']);
Route::middleware(['auth', 'student', 'isJoined'])->group(function () {
    Route::resource('user-course', UserCourseController::class);
    Route::resource('courses.lessons', LessonController::class);
    Route::resource('user-lesson', UserLessonController::class);
});
Auth::routes();
