@extends('layouts.layout')
@section('content')
    @include('layouts.login')
    <section class="filter-search">
        <div class="container">
            <form action="{{ route('list courses.index') }}" id="search-form" method="get">
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
                                        <input type="radio" name="searchNewOld" id="new" value="{{ config('filter.sort.desc') }}"
                                                 @if($request->searchNewOld ==  config('filter.sort.desc')  || is_null($request->searchNewOld))  checked @endif/>
                                        <label for="new">Mới nhất</label>
                                    </li>
                                </div>
                                <div class="list-course-filter-new">
                                    <li>
                                        <input type="radio" id="old" name="searchNewOld" value="{{ config('filter.sort.asc') }}"
                                               @if($request->searchNewOld == config('filter.sort.asc'))  checked @endif/>
                                        <label for="old">Cũ nhất</label>
                                    </li>
                                </div>
                            </ul>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" aria-label="Default select example" name="searchTeacher">
                                <option value="{{ $request->searchTeacher }}" selected>Teacher</option>
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" @if($request->searchTeacher) selected @endif>{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" aria-label="Default select example" name="searchLearner">
                                <option value="{{ $request->searchLearner }}" selected>Số người học</option>
                                <option value="{{ config('filter.sort.asc') }}" @if($request->searchLearner == config('filter.sort.asc')) selected @endif>Tăng dần
                                </option>
                                <option value="{{ config('filter.sort.desc') }}" @if($request->searchLearner == config('filter.sort.desc')) selected @endif>Giảm dần
                                </option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" aria-label="Default select example" name="searchTime">
                                <option value="{{ $request->searchTime }}" selected>Thời gian học</option>
                                <option value="{{ config('filter.sort.asc') }}" @if($request->searchTime == config('filter.sort.asc')) selected @endif>Tăng dần</option>
                                <option value="{{ config('filter.sort.desc') }}" @if($request->searchTime == config('filter.sort.asc')) selected @endif>Giảm dần</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" aria-label="Default select example" name="searchLesson">
                                <option value="{{ $request->searchLesson }}" selected> Số bài học</option>
                                <option value="{{ config('filter.sort.asc') }}" @if($request->searchLesson == config('filter.sort.asc')) selected @endif>Tăng dần</option>
                                <option value="{{ config('filter.sort.desc') }}" @if($request->searchLesson == config('filter.sort.desc')) selected @endif>Giảm dần
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
