<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\TeacherCourseController;
use App\Http\Controllers\UserController;
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
Route::resource('profile', UserController::class)->only(['index', 'update']);
Route::resource('reviews', ReviewController::class)->only('store')->middleware('auth');
Route::get('teacher-course/search', [TeacherCourseController::class, 'getCourses'])->middleware('auth')->name('search.course');
Route::middleware(['auth', 'student', 'isJoined'])->group(function () {
    Route::resource('user-course', UserCourseController::class);
    Route::resource('courses.lessons', LessonController::class);
    Route::resource('user-lesson', UserLessonController::class);
});
Auth::routes();

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('/redirect/{social}', [SocialAuthController::class, 'redirect'])->name('redirect');
Route::get('{social}/callback', [SocialAuthController::class, 'callback']);
