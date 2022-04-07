@extends('layouts.layout')
@section('content')
    @include('layouts.login')
    <section class="banner">
        <div class="container-fluid container-banner">
            <div class="row align-items-center flex-wrap-reverse banner-row">
                <div class="col-md-6 banner-content">
                    <p class="banner-title">Learn&nbspAnytime,&nbspAnywhere</p>
                    <p class="banner-logo">at HapoLearn <img class="icon-owl" src="{{ asset('image/icon_owl.png') }}"
                                                             alt="icon-owl">!
                    </p>
                    <p class="banner-text">Interactive lessons, "on-the-go" <br>
                        practice, peer support.</p>
                    <a href="#" class="btn btn-banner">Start Learning Now!</a>
                </div>
            </div>
            <div class="gradient"></div>
        </div>
    </section>
    <section class="list-courses">
        <div class="container list-container">
            <div class="row-col-sm-4 col-card">
                @foreach($courses as $course)
                    <div class="card">
                        <div class="card-img img-courses html-tut">
                            <img src="{{ $course->image }}" alt="Html Logo">
                        </div>
                        <div class="card-body">
                            <p class="card-title">{{ $course->name }}</p>
                            <p class="card-text">{{ $course->description }}</p>
                            <a href="#" class="btn btn-courses">Take This Course</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <p class="other-text">
        <span>Other courses</span>
    </p>
    <section class="list-courses  other-courses">
        <div class="container list-container">
            <div class="row-col-4 col-card">
                @foreach($courses as $course)
                    <div class="card">
                        <div class="card-img img-courses html-tut">
                            <img src="{{ $course->image }}" alt="Html Logo">
                        </div>
                        <div class="card-body">
                            <p class="card-title">{{ $course->name }}</p>
                            <p class="card-text">{{ $course->description }}</p>
                            <a href="#" class="btn btn-courses">Take This Course</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="view-all">
        <a href="#">View All Our Courses <i class="fa-solid fa-arrow-right-long"></i></a>
    </div>
    <section class="why-hp">
        <div class="container-fluid why-container">
            <div class="mb-left">
                <img src="{{ asset('image/mb_left).png') }}" alt="mb left">
            </div>
            <b class="content-why-hp">Why HapoLearn?</b>
            <div class="why-down d-flex text-center justify-content-between">
                <div class="content d-flex justify-content-end align-items-center">
                    <b>Why HapoLearn?</b>
                    <p class="why-content"><img src="{{ asset('image/icon.png') }}" alt="icon tick">Interactive lessons,
                        "on-the-go" practice,
                        peer support.</p>
                    <p class="why-content"><img src="{{ asset('image/icon.png') }}" alt="icon tick">Interactive lessons,
                        "on-the-go" practice,
                        peer support.</p>
                    <p class="why-content"><img src="{{ asset('image/icon.png') }}" alt="icon tick">Interactive lessons,
                        "on-the-go" practice,
                        peer support.</p>
                    <p class="why-content"><img src="{{ ('image/icon.png') }}" alt="icon tick">Interactive lessons,
                        "on-the-go" practice,
                        peer support.</p>
                    <p class="why-content"><img src="{{ asset('image/icon.png') }}" alt="icon tick">Interactive lessons,
                        "on-the-go" practice,
                        peer support.</p>
                </div>
                <div class="mb-right d-flex align-items-center">
                    <img src="{{ asset('image/mb_right.png') }}" alt="mb-right">
                </div>
            </div>
        </div>
    </section>
    <div class="feedback">
        <div class="hp-feedback">
            <div class="hapo-feedback-header">
                <a class="feed-back-header-title">Feedback</a>
                <p class="feed-back-header-content">What other students turned professionals have to say about
                    us
                    <br> after learning with us and reaching their goals
                </p>
            </div>
            <div class="hapo-feed-back-body">
                <div class="row slick">
                    @foreach($reviews as $review)
                        <div class=" col-12">
                            <div class="feed-back-up">
                                <p class="feed-back-border"></p>
                                <p class="feed-back-up-content">
                                    {{ $review->content }}
                                </p>
                                <i class="fa-solid fa-sort-down"></i>
                            </div>
                            <div class="feed-back-down">
                                <div class="feed-back-img">
                                    <img src="{{ $review->user->avatar }}" alt="Hapo Avatar">
                                </div>
                                <div class="feed-back-down-content">
                                    <p class="feed-back-name">{{ $review->user->name }}</p>
                                    <p class="feed-back-span">{{ $review->user->job }}</p>
                                    <p class="feed-back-star">
                                        @for($i = 0; $i < $review->vote; $i++)
                                            <i class="fa-solid fa-star "></i>
                                        @endfor
                                        @for($i = 5; $i > $review->vote; $i--)
                                            <i class="fa-solid fa-star star-special"></i>
                                        @endfor
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <section class="become">
        <div class="content">
            <p>Become a member of our <br>
                growing community!</p>
        </div>
        <a href="#" class="btn btn-become">Start Learning Now!</a>
    </section>
    <section>
        <div class="container static-container">
            <span class="static-title"><p>Statistic</p></span>
            <div class="static-content">
                <div class="content">
                    <p class="key">Courses</p>
                    <p class="values">{!! number_format($courseCount) !!}</p>
                </div>
                <div class="content">
                    <p class="key">Lessons</p>
                    <p class="values">{!! number_format($lessonCount) !!}</p>
                </div>
                <div class="content">
                    <p class="key">Learners</p>
                    <p class="values">{!! number_format($userLessonCount) !!}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
