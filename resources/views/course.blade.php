@extends('layouts.layout')
@section('content')
    @include('layouts.login')
    <section class="filter-search">
        <div class="container">
            <form action="{{ route('list course.index') }}" id="search-form" method="get">
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
                                        <input type="text" name="key" placeholder="Search..." class="input-search"
                                               value="">
                                        <i class="fa-solid fa-magnifying-glass search"></i>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button class="list-course-btn-search">Tìm kiếm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter-course">
                    <div class="row filter-main">
                        <div class="col-md-1">
                            <div class="filter-by">Lọc theo</div>
                        </div>
                        <div class="col-md-2 col-ul">
                            <ul class="filter-time">
                                <div class="list-course-filter-new">
                                    <li>
                                        <input type="radio" name="search_new_old" id="new" value="{{ config('filter.sort.desc') }}"
                                                 @if($data->searchNewOld ==  config('filter.sort.desc')  || is_null($data->searchNewOld))  checked @endif/>
                                        <label for="new">Mới nhất</label>
                                    </li>
                                </div>
                                <div class="list-course-filter-new">
                                    <li>
                                        <input type="radio" id="old" name="search_new_old" value="{{ config('filter.sort.asc') }}"
                                               @if($data->searchNewOld == 'desc')  checked @endif/>
                                        <label for="old">Cũ nhất</label>
                                    </li>
                                </div>
                            </ul>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" aria-label="Default select example" name="search_teacher">
                                <option value="{{ $data->searchTeacher }}" selected>Teacher</option>
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}"
                                            @if($data->searchTeacher) selected @endif>{{ searchTeacher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" aria-label="Default select example" name="search_learner">
                                <option value="{{ $data->searchLearner }}" selected>Số người học</option>
                                <option value="{{ config('filter.sort.asc') }}" @if($data->searchLearner == config('filter.sort.asc')) selected @endif>Tăng dần
                                </option>
                                <option value="{{ config('filter.sort.desc') }}" @if($data->searchLearner == config('filter.sort.desc')) selected @endif>Giảm dần
                                </option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" aria-label="Default select example" name="search_time">
                                <option value="{{ $data->searchTime }}" selected>Thời gian học</option>
                                <option value="{{ config('filter.sort.asc') }}" @if($data->searchTime == config('filter.sort.asc')) selected @endif>Tăng dần</option>
                                <option value="{{ config('filter.sort.desc') }}" @if($data->searchTime == config('filter.sort.asc')) selected @endif>Giảm dần</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" aria-label="Default select example" name="search_lesson">
                                <option value="{{ $data->searchLesson }}" selected> Số bài học</option>
                                <option value="{{ config('filter.sort.asc') }}" @if($data->searchLesson == config('filter.sort.asc')) selected @endif>Tăng dần</option>
                                <option value="{{ config('filter.sort.desc') }}" @if($data->searchLesson == config('filter.sort.desc')) selected @endif>Giảm dần
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row filter-main-second">
                        <div class="col-1"></div>
                        <div class="col-md-2">
                            <select class="form-select" aria-label="Default select example" name="tag">
                                <option value="{{ $data->tag }}" selected>Tags</option>
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}"
                                            @if($data->tag) selected @endif>{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row courses-all">
                @if(session()->has('message_search') )
                    <div>
                        {{ session()->get('message_search') }}
                    </div>
                @else
                    @foreach($courses as $course)
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="course">
                                <div class="content-courses">
                                    <div class="avatar">
                                        <div class="avatar-img">
                                            <img src="{{ $course->image }}" alt="avatar {{ $course->name }}">
                                        </div>
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
                    {{ $courses->links() }}
                @endif
            </div>
        </div>
    </section>
@endsection
