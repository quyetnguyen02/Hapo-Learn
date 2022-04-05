@extends('Layouts.index')
@section('content')
    <!--login form start-->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="login" id="login">
                        <div class="login-form">
                            <div class="close-form" id="close" data-dismiss="modal"><i class="fa-solid fa-xmark"></i>
                            </div>
                            <div class="d-flex login-register">
                                <a class="link-login" id="btnLogin">login</a>
                                <a class="link-register" id="btnRegister">register</a>
                            </div>
                            <div class="col-md-12 form-lg">
                                <div id="closeFormLogin">
                                    <form action="#" method="post">
                                        <div class="form-group">
                                            <label>Username:</label>
                                            <input type="text" name="userName" class="form-control"
                                                   placeholder="User Name"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Password:</label>
                                            <input type="password" name="password" class="form-control"
                                                   placeholder="Password"/>
                                        </div>
                                        <div class="checkbox-a">
                                            <input type="checkbox"/>
                                            <label class="control control--checkbox mb-0"><span class="caption">Remember
                                                    me</span></label>
                                            <a href="#">Forgot password</a>
                                        </div>
                                        <button class="btn btn-login" type="submit">LOGIN</button>
                                    </form>
                                    <p class="line"><span>Login with</span></p>
                                    <a class="login-gg" href="#"><i class="fa-brands fa-google-plus-g"></i>Google</a>
                                    <a class="login-rg" href="#"><i class="fa-brands fa-facebook-f"></i>Facebook</a>
                                </div>
                                <div id="closeRegisterForm">
                                    <form action="#" method="post">
                                        <div class="form-group">
                                            <label>Username:</label>
                                            <input type="text" name="userName" class="form-control"
                                                   placeholder="User Name"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="email" name="email" class="form-control" placeholder="Email"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Password:</label>
                                            <input type="password" name="password" class="form-control"
                                                   placeholder="Password"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Repeat Password::</label>
                                            <input type="password" name="confirmPassword" class="form-control"
                                                   placeholder=" Repeat Password"/>
                                        </div>
                                        <button class="btn btn-login" type="submit">REGISTER</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--login form end-->
    <!--banner section start-->
    <section class="banner">
        <div class="container-fluid container-banner">
            <div class="row align-items-center flex-wrap-reverse banner-row">
                <div class="col-md-6 banner-content">
                    <p class="banner-title">Learn&nbspAnytime,&nbspAnywhere</p>
                    <p class="banner-logo">at HapoLearn <img class="icon-owl" src="{{asset('image/icon_owl.png')}}"
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
    <!--banner section end-->
    <!--list courses section start-->
    <section class="list-courses">
        <div class="container list-container">
            <div class="row-col-sm-4 col-card">
                @foreach($courses as $course)
                    <div class="card">
                        <div class="card-img img-courses html-tut">
                            <img src="{{$course->image}}" alt="Html Logo">
                        </div>
                        <div class="card-body">
                            <p class="card-title">{{$course->name}}</p>
                            <p class="card-text">{{$course->description}}</p>
                            <a href="{{route('home.show')}}" class="btn btn-courses">Take This Course</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <p class="other-text">
        <span>Other courses</span>
    </p>
    <!--list courses end-->
    <!--other courses start-->
    <section class="list-courses  other-courses">
        <div class="container list-container">
            <div class="row-col-4 col-card">
                @foreach($courses as $course)
                    <div class="card">
                        <div class="card-img img-courses html-tut">
                            <img src="{{$course->image}}" alt="Html Logo">
                        </div>
                        <div class="card-body">
                            <p class="card-title">{{$course->name}}</p>
                            <p class="card-text">{{$course->description}}</p>
                            <a href="{{route('home.show')}}" class="btn btn-courses">Take This Course</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="view-all">
        <a href="#">View All Our Courses <i class="fa-solid fa-arrow-right-long"></i></a>
    </div>
    <!--other courses end-->
    <section class="why-hp">
        <div class="container-fluid why-container">
            <div class="mb-left">
                <img src="{{asset('image/mb_left).png')}}" alt="mb left">
            </div>
            <b class="content-why-hp">Why HapoLearn?</b>
            <div class="why-down d-flex text-center justify-content-between">
                <div class="content d-flex justify-content-end align-items-center">
                    <b>Why HapoLearn?</b>
                    <p class="why-content"><img src="{{asset('image/icon.png')}}" alt="icon tick">Interactive lessons,
                        "on-the-go" practice,
                        peer support.</p>
                    <p class="why-content"><img src="{{asset('image/icon.png')}}" alt="icon tick">Interactive lessons,
                        "on-the-go" practice,
                        peer support.</p>
                    <p class="why-content"><img src="{{asset('image/icon.png')}}" alt="icon tick">Interactive lessons,
                        "on-the-go" practice,
                        peer support.</p>
                    <p class="why-content"><img src="{{asset('image/icon.png')}}" alt="icon tick">Interactive lessons,
                        "on-the-go" practice,
                        peer support.</p>
                    <p class="why-content"><img src="{{asset('image/icon.png')}}" alt="icon tick">Interactive lessons,
                        "on-the-go" practice,
                        peer support.</p>
                </div>
                <div class="mb-right d-flex align-items-center">
                    <img src="{{asset('image/mb_right.png')}}" alt="mb-right">
                </div>
            </div>
        </div>
    </section>
    <!--Why hapolearn end-->
    <!--feedback start-->
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
                                    {{$review->content}}
                                </p>
                                <i class="fa-solid fa-sort-down"></i>
                            </div>
                            <div class="feed-back-down">
                                <div class="feed-back-img">
                                    <img src="{{$review->user->avatar}}" alt="Hapo Avatar">
                                </div>
                                <div class="feed-back-down-content">
                                    <p class="feed-back-name">{{$review->user->name}}</p>
                                    <p class="feed-back-span">{{$review->user->job}}</p>
                                    <p class="feed-back-star">
                                        @switch($review->vote)
                                            @case(1)
                                            <i class="fa-solid fa-star"></i>
                                            @for($i=1 ; $i < 5; $i++ )
                                                <i class="fa-solid fa-star star-special"></i>
                                            @endfor
                                            @break
                                            @case(2)
                                            @for($i=1 ; $i < 3; $i++ )
                                                <i class="fa-solid fa-star"></i>
                                            @endfor
                                            @for($i=1 ; $i < 4; $i++ )
                                                <i class="fa-solid fa-star star-special"></i>
                                            @endfor
                                            @break
                                            @case(3)
                                            @for($i=1 ; $i < 4; $i++ )
                                                <i class="fa-solid fa-star"></i>
                                            @endfor
                                            @for($i=1 ; $i < 3; $i++ )
                                                <i class="fa-solid fa-star star-special"></i>
                                            @endfor
                                            @break
                                            @case(4)
                                            @for($i=1 ; $i < 5; $i++ )
                                                <i class="fa-solid fa-star"></i>
                                            @endfor
                                            <i class="fa-solid fa-star star-special"></i>
                                            @break
                                            @case(5)
                                            @for($i=1 ; $i < 6; $i++)
                                                <i class="fa-solid fa-star star-special"></i>
                                            @endfor
                                            @break
                                        @endswitch
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--feedback end-->
    <!--become start-->
    <section class="become">
        <div class="content">
            <p>Become a member of our <br>
                growing community!</p>
        </div>
        <a href="#" class="btn btn-become">Start Learning Now!</a>
    </section>
    <!--become end-->
    <!--static start-->
    <section>
        <div class="container static-container">
            <span class="static-title"><p>Statistic</p></span>
            <div class="static-content">
                <div class="content">
                    <p class="key">Courses</p>
                    <p class="values">{!! number_format($countCourses) !!}</p>
                </div>
                <div class="content">
                    <p class="key">Lessons</p>
                    <p class="values">{!! number_format($countLessons) !!}</p>
                </div>
                <div class="content">
                    <p class="key">Learners</p>
                    <p class="values">{!! number_format($countLearners) !!}</p>
                </div>
            </div>
        </div>
    </section>
    <!--static end-->
@endsection
