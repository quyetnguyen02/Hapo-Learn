@extends('layouts.layout')
@section('content')
    @include('layouts.login')
    <section class="filter-search">
        <div class="container">
            <form action="{{ route('courses.index') }}" id="search-form" method="get">
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
                                        <input type="text" name="keyword" placeholder="Search..." class="input-search"
                                               value="{{ $request->keyword}}">
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
                                        <input type="radio" name="created_time" id="new" value="{{ config('filter.sort.desc') }}"
                                                 @if($request->created_time ==  config('filter.sort.desc')  || is_null($request->created_time))  checked @endif/>
                                        <label for="new">Mới nhất</label>
                                    </li>
                                </div>
                                <div class="list-course-filter-new">
                                    <li>
                                        <input type="radio" id="old" name="created_time" value="{{ config('filter.sort.asc') }}"
                                               @if($request->created_time == config('filter.sort.asc'))  checked @endif/>
                                        <label for="old">Cũ nhất</label>
                                    </li>
                                </div>
                            </ul>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" aria-label="Default select example" name="teacher">
                                <option value="{{ $request->teacher }}" selected>Teacher</option>
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" @if($request->teacher) selected @endif>{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" aria-label="Default select example" name="learner">
                                <option value="{{ $request->learner }}" selected>Số người học</option>
                                <option value="{{ config('filter.sort.asc') }}" @if($request->learner == config('filter.sort.asc')) selected @endif>Tăng dần
                                </option>
                                <option value="{{ config('filter.sort.desc') }}" @if($request->learner == config('filter.sort.desc')) selected @endif>Giảm dần
                                </option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" aria-label="Default select example" name="learn_time">
                                <option value="{{ $request->learn_time }}" selected>Thời gian học</option>
                                <option value="{{ config('filter.sort.asc') }}" @if($request->learn_time == config('filter.sort.asc')) selected @endif>Tăng dần</option>
                                <option value="{{ config('filter.sort.desc') }}" @if($request->learn_time == config('filter.sort.asc')) selected @endif>Giảm dần</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" aria-label="Default select example" name="lesson">
                                <option value="{{ $request->lesson }}" selected> Số bài học</option>
                                <option value="{{ config('filter.sort.asc') }}" @if($request->lesson == config('filter.sort.asc')) selected @endif>Tăng dần</option>
                                <option value="{{ config('filter.sort.desc') }}" @if($request->lesson  == config('filter.sort.desc')) selected @endif>Giảm dần
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row filter-main-second">
                        <div class="col-1"></div>
                        <div class="col-md-2">
                            <select class="form-select" aria-label="Default select example" name="tag">
                                <option value="{{ $request->tag }}" selected>Tags</option>
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}"
                                            @if($request->tag) selected @endif>{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </form>
            @include('courses.course')
        </div>
    </section>
@endsection
