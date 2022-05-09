<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $data = [
           'user_id' => Auth::id(),
           'course_id' => $request['course_id'],
           'content' => $request['message'],
           'vote' => $request['rating']
        ];
        Review::create($data);
        return redirect(url()->previous());
    }
}
