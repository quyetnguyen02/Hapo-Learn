@extends('layouts.layout')
@section('content')
    <section class="breadcrumb-course">
        <nav class="link-course">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">All courses</a></li>
                <li class="breadcrumb-item">Course detail</li>
            </ol>
        </nav>
    </section>
    <div class="detail-course-body">
        <div class="container container-detail-course">
            <div class="image-description">
                <div class="row">
                    <div class="col-md-8">
                        <div class="image-course">
                            <img src="{{ $course->image }}" alt="image {{ $course->name }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="description-course">
                            <div class="description-title">
                                <p>Descriptions course</p>
                            </div>
                            <div class="description-content">
                                <span>{{ $course->description }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="detail-course-main">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body ">
                                <ul class="nav nav-tabs nav-tabs-bordered">
                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab"
                                                data-bs-target="#profile-overview">Lessons
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">
                                            Tearcher
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">
                                            Reviews
                                        </button>
                                    </li>
                                </ul>
                                <div class="tab-content pt-2">
                                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                        <div class="search-lesson">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-search-lesson">
                                                        <form action="{{ route('courses.show', $course->id) }}"
                                                              method="get">
                                                            <div class="search-course">
                                                                <div class="list-course-search">
                                                                    <input type="text" name="keyword"
                                                                           placeholder="Search..."
                                                                           class="input-search"
                                                                           value="{{ $request->keyword }}">
                                                                    <i class="fa-solid fa-magnifying-glass search"></i>
                                                                </div>
                                                                <button class="list-course-btn-search">Tìm kiếm</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <form action="{{ route('user-course.store') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                        <button
                                                            class="btn-success btn-course  @if (session()->has('message_course')) btn-course-message  @endif"
                                                            @if (session()->has('message_course')) disabled @endif">
                                                            @if (session()->has('message_course'))
                                                                {{ session()->get('message_course') }}
                                                            @else
                                                                Take part in the course
                                                            @endif
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @foreach($lessons as $key => $lesson)
                                            @include('lessons.lesson')
                                        @endforeach
                                        {!! $lessons->links() !!}
                                        @if(count($lessons->items()) == 0)
                                            <div>
                                                No Course Found!
                                            </div>
                                        @endif
                                    </div>
                                    <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                        <div class="main-teacher">
                                            <div class="title-teacher">
                                                <p>Main Teachers</p>
                                            </div>
                                            <div class="content-teacher">
                                                <div class="avatar-name">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="avatar">
                                                                <img src="{{ asset('image/a_nghia_cute.png') }}"
                                                                     alt="img">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="name-teacher">
                                                                <p class="name">Luu Trung Nghia </p>
                                                                <p class="job-teacher">Second Year Teacher</p>
                                                                <div class="logo">
                                                                    <a href="#"> <img
                                                                            src="{{ asset('image/google_plus.png') }}"
                                                                            alt="logo-gg"></a>
                                                                    <a href="#"><img
                                                                            src="{{ asset('image/facebook.png') }}"
                                                                            alt="logo-fb"></a>
                                                                    <a href="#"><img
                                                                            src="{{ asset('image/slack_logo.png') }}"
                                                                            alt="logo-sl"></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="description-teacher">
                                                    <p>Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas
                                                        erat dignissim. Sed quis rutrum tellus, sit amet viverra felis.
                                                        Cras sagittis sem sit amet urna feugiat rutrum. Nam nulla ipsum,
                                                        venenatis malesuada felis quis, ultricies convallis neque.
                                                        Pellentesque tristique </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="information-other-course">
                            <div class="information">
                                <div class="information-learner information-item">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <i class="fa-solid fa-users"></i>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Learners</p>
                                        </div>
                                        <div class="col-md-1">
                                            <p>:</p>
                                        </div>
                                        <div class="col-md-6">{{ $course->learners }}</div>
                                    </div>
                                </div>
                                <div class="information-lessons information-item">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <i class="fa-solid fa-rectangle-list"></i>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Leesons</p>
                                        </div>
                                        <div class="col-md-1">
                                            <p>:</p>
                                        </div>
                                        <div class="col-md-6">{{ $course->lessons_count }}</div>
                                    </div>
                                </div>
                                <div class="information-times information-item">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <i class="fa-solid fa-clock"></i>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Times</p>
                                        </div>
                                        <div class="col-md-1">
                                            <p>:</p>
                                        </div>
                                        <div class="col-md-6">{{ $course->time_sum }}</div>
                                    </div>
                                </div>
                                <div class="information-tags information-item">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <i class="fa-solid fa-key"></i>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Tags</p>
                                        </div>
                                        <div class="col-md-1">
                                            <p>:</p>
                                        </div>
                                        <div class="col-md-6">
                                            @foreach($course->tags_all as $id => $name)
                                                <a href="{{ route('courses.index', ['tag' => $id]) }}"
                                                   class="link-tag">
                                                    # {{ $name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="information-price information-item">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <i class="fa-solid fa-money-bill-1"></i>
                                        </div>
                                        <div class="col-md-4">
                                            <p>price</p>
                                        </div>
                                        <div class="col-md-1">
                                            <p>:</p>
                                        </div>
                                        <div class="col-md-6">{{ number_format($course->price) }}$</div>
                                    </div>
                                </div>
                                <form action="{{ route('user-course.update', $course->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <button
                                        class="btn btn-success btn-end-lesson  @if (session()->has('message_end_course')) btn-course-message  @endif"
                                        @if (session()->has('message_end_course')) disabled @endif">
                                    @if (session()->has('message_end_course'))
                                        {{ session()->get('message_end_course') }}
                                    @else
                                        Kết thúc khoá học
                                        @endif
                                        </button>
                                </form>
                            </div>
                        </div>
                        <div class="other-course">
                            <div class="header-other-course">
                                <p>Other Courses</p>
                            </div>
                            <div class="title-other-course">
                                @foreach($otherCourses as $id => $otherCourse)
                                    @include('courses.other_course')
                                @endforeach
                            </div>
                            <a href="" class="btn btn-success btn-other-course">View all ours courses</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
