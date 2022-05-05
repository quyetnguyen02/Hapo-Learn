@extends('layouts.layout')
@section('content')
    <form action="{{ route('profile.update', Auth::id()) }}" method="POST" enctype=multipart/form-data>
        @method('PUT')
        @csrf
        <div class="profile">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 d-flex flex-column align-items-center">
                        <div class="avatar-user">
                            <img src="{{ Auth::user()->avatar }}" id="image" alt="avatar">
                            <label for="fileInput">
                                <i class="fa-solid fa-camera"></i>
                            </label>
                            <input id="fileInput" type="file" name="avatar" accept=".JPEG, .JPG, .PNG,  .GIF"/>
                        </div>
                        <div class="name-email">
                            <span class="name">{{ Auth::user()->name }}</span>
                            <span class="email">{{ Auth::user()->email }}</span>
                            <span class="email">{{ Auth::user()->job }}</span>
                        </div>
                        <div class="birthday">
                            <img src="{{ asset('image/birthday.png') }}" alt="">
                            <span>{{ Auth::user()->birthday }}</span>
                        </div>
                        <div class="phone">
                            <img src="{{ asset('image/phone.png') }}" alt="">
                            <span>{{ Auth::user()->phone }}</span>
                        </div>
                        <div class="address">
                            <img src="{{ asset('image/address.png') }}" alt="">
                            <span>{{ Auth::user()->address }}</span>
                        </div>
                        <div class="description">
                            <span>{{ Auth::user()->description }}</span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="my-course">
                            <span>My courses</span>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="user-course">
                            @foreach($courses as $course)
                                <div class="d-flex justify-content-center flex-column align-items-center">
                                    <div class="img-course">
                                        <img src="{{ $course->image }}" alt="{{ $course->name }}">
                                    </div>
                                    <div class="name-course">
                                        <span>{{ $course->name }}</span>
                                    </div>
                                </div>
                            @endforeach
                            <div>
                                <div class="add-course img-course rounded-circle">
                                    <a href="{{ route('courses.index') }}"><i class="fa-solid fa-plus plus"></i></a>
                                </div>
                                <div class="name-course">
                                    <span>Add course</span>
                                </div>
                            </div>
                        </div>
                        <div class="my-course">
                            <span>Edit profile</span>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="update-profile">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label>Name:</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               name="name" placeholder="Your name..." value="{{ Auth::user()->name }}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group d-flex flex-column">
                                        <label>Date of birthday:</label>
                                        <input type="date"
                                               class="form-control @error('birthday') is-invalid @enderror"
                                               name="birthday" placeholder="dd/mm/yyyy" value="{{ Auth::user()->birthday }}">
                                        @error('birthday')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group d-flex flex-column">
                                        <label>Address:</label>
                                        <input type="text"
                                               class="form-control @error('address') is-invalid @enderror"
                                               name="address" placeholder="Your address..." value="{{ Auth::user()->address }}">
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label>Job:</label>
                                        <input type="text" class="form-control @error('job') is-invalid @enderror"
                                               name="job" placeholder="Your Job..." value="{{ Auth::user()->job }}">
                                        @error('job')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group d-flex flex-column">
                                        <label>Phone:</label>
                                        <input type="number"
                                               class="form-control @error('phone') is-invalid @enderror"
                                               name="phone" placeholder="Your phone..." value="{{ Auth::user()->phone }}">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group d-flex flex-column">
                                        <label>About me:</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror"
                                                  name="description" rows="4" placeholder="About you...">{{ Auth::user()->description }}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center btn-submit">
                                <button type="reset" class="btn-send-profile btn-reset">Reset</button>
                                <button type="submit" class="btn-send-review">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
