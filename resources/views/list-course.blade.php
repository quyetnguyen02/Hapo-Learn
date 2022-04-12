@extends('layouts.layout')
@section('content')
    @include('layouts.login')
    <!-- Hapo-listcourses-->
    <section class="filter-search">
        <div class="container">
            <!-- Listcourse-header -->
            <div class="search-course">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="list-course-filter" id="filter">
                                    <div class="list-course-filter-content">
                                        <i class="fa-solid fa-sliders">Filter</i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="list-course-search">
                                    <form action="{{route('search')}}" id="search-form">
                                        <input type="text" name="key" placeholder="Search..." class="input-search">
                                        <i class="fa-solid fa-magnifying-glass search"></i>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('search') }}" class="list-course-btn-search"
                                   onclick="event.preventDefault(); document.getElementById('search-form').submit();">
                                    Tìm kiếm
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Listcourse-selective -->
            <div class="filter-course">
                <div class="row filter-main">
                    <div class="col-md-1">
                        <div class="filter-by">Lọc theo</div>
                    </div>
                    <div class="col-md-1">
                        <div class="list-course-filter-new">
                            <a href="#" class="filter-new">Mới nhất</a>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="list-course-filter-old">
                            <a href="#" class="filter-old">Cũ nhất</a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Teacher</option>
                            <option value="1">Teacher-1</option>
                            <option value="2">Teacher-2</option>
                            <option value="3">Teacher-3</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Số người học</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Thời gian học</option>
                            <option value="1">Ngày-1</option>
                            <option value="2">Ngày-2</option>
                            <option value="3">Ngày-3</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Số bài học</option>
                            <option value="1">Tăng dần</option>
                            <option value="2">Giảm dần</option>
                        </select>
                    </div>
                </div>
                <div class="row filter-main-second">
                    <div class="col-1"></div>
                    <div class="col-md-2">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Tags</option>
                            <option value="1">Tags-1</option>
                            <option value="2">Tags-2</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Review</option>
                            <option value="1">Review-1</option>
                            <option value="2">Review-2</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row courses-all">
                @foreach($courses as $course)
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                        <div class="course">
                            <div class="content-courses">
                                <div class="avatar">
                                    <img src="{{ $course->image }}" alt="avatar {{ $course->name }}">
                                </div>
                                <div class="content">
                                    <div class="title">{{ $course->name }}</div>
                                    <div class="description">{{ $course->description }}</div>
                                </div>
                            </div>
                            <div class="show">
                                <a href="" class="btn btn-success show-course-detail">More</a>
                            </div>
                            <div class="statistical">
                                <div class="key-value">
                                    <p class="key">Learners</p>
                                    <p class="value">{{ $course->learners }}</p>
                                </div>
                                <div class="key-value">
                                    <p class="key">Lessons</p>
                                    <p class="value">{{ $course->lessons_count }}</p>
                                </div>
                                <div class="key-value">
                                    <p class="key">Times</p>
                                    <p class="value">{{ $course->time_sum }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $courses->links() }}
        </div>
    </section>
@endsection
