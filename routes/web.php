<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListCourseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('homepage');

});
Route::controller(ListCourseController::class)->group(function () {
    Route::get('/list courses', 'index')->name('list-course');
    Route::get('/list courses/search', 'search')->name('search');
});
Auth::routes();

