<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use App\Services\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }

    public function index()
    {
        $courses = Auth::user()->courses()->get();
        return view('profiles.profile', compact('courses'));
    }

    public function update(ProfileRequest $request, Cloudinary $cloudinary, $id)
    {
        $data = [
            'name' => $request['name'],
            'birthday' => $request['birthday'],
            'address' => $request['address'],
            'job' =>  $request['job'],
            'phone' => $request['phone'],
            'description' => $request['description'],
        ];
        if (isset($request['avatar'])) {
            $urlImage = $cloudinary->upload($request->file('avatar'));
            $data['avatar'] = $urlImage;
            if (is_null($request['name'])) {
                $data = [
                    'name' => Auth::user()->name,
                    'birthday' => Auth::user()->birthday,
                    'address' => Auth::user()->address,
                    'job' => Auth::user()->job,
                    'phone' => Auth::user()->phone,
                    'description' => Auth::user()->description,
                    'avatar' => $urlImage,
                ];
            }
        }
        Auth::user()->update($data);
        return redirect(url()->previous());
    }
}
