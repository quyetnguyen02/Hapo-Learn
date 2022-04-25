@extends('layouts.layout')
@section('content')
    <section class="breadcrumb-course">
        <nav class="link-course">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home </a></li>
                <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">All courses</a></li>
                <li class="breadcrumb-item"><a href="{{ route('courses.show', $course->id) }}">Course Detail</a></li>
                <li class="breadcrumb-item">Lesson detail</li>
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
                        <div class="information-other-course">
                            <div class="information">
                                <div class="information-lessons information-item">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <i class="fa-solid fa-tv"></i>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Course</p>
                                        </div>
                                        <div class="col-md-1">
                                            <p>:</p>
                                        </div>
                                        <div class="col-md-6">{{ $course->name }}</div>
                                    </div>
                                </div>
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
                                                <a href="{{ route('courses.index', ['tag' => $id])}}"
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(Auth::user()->getCourseUser($course->id) > config('lesson.ゼロ'))
                <div>
                    <label for="file"> Learning Progress:</label>
                    <progress id="file" value="{{ $lesson->learningProgress }}" max="100"></progress>
                    <label for="file">{{ $lesson->learningProgress }}%</label>
                </div>
            @endif
            <div class="detail-course-main">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body ">
                                <!-- Bordered Tabs -->
                                <ul class="nav nav-tabs nav-tabs-bordered">
                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab"
                                                data-bs-target="#profile-overview">Lessons
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">
                                            Program
                                        </button>
                                    </li>
                                </ul>
                                <div class="tab-content pt-2">
                                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                        <div class="lessons-detail">
                                            <div class="title-lesson">
                                                <p>Descriptions lesson</p>
                                                @if(Auth::user()->getCourseUser($course->id) > config('lesson.ゼロ'))
                                                    <form
                                                        action="{{ route('user-lesson.update',$lesson->id) }}"
                                                        method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <input type="hidden" name="program_lesson" value="1">
                                                        <button
                                                            @if (Auth::user()->progressLesson($lesson->id)) disabled @endif>
                                                            @if (Auth::user()->progressLesson($lesson->id))
                                                                Accomplished
                                                            @else
                                                                Complete The Lesson
                                                            @endif
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                            <div class="description-lesson">
                                                <span>{{ $lesson->description }}</span>
                                            </div>
                                            <div class="title-lesson">
                                                <p>Requirements</p>
                                            </div>
                                            <div class="description-lesson">
                                                <span>{{ $lesson->requirements }}</span>
                                            </div>
                                            <div class="title-lesson">
                                                <span>Tags:</span>
                                                <div class="tags">
                                                    @foreach($course->tags_all as $id => $name)
                                                        <div class="tag-lesson">
                                                            <a href="{{ route('courses.index', ['tag' => $id]) }}"
                                                               class="link-tag">
                                                                # {{ $name }}
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                        <div class="main-teacher">
                                            <div class="title-program">
                                                <p>Program</p>
                                            </div>
                                            @foreach($lesson->documents()->get() as $document)
                                                <div class="documents">
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <div class="document-img">
                                                                <img src="{{ $document->thumbnail }}"
                                                                     alt="{{ $document->name }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="document-type">
                                                                <p>{{ $document->type }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="document-name">
                                                                <p>{{ $document->name }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <form action="{{ route('user-lesson.update',$lesson->id) }}" method="POST">
                                                                @method('PUT')
                                                                @csrf
                                                                <input type="hidden" name="program_lesson" value="1">
                                                                <input type="hidden" name="document_id" value="{{ $document->id }}">
                                                                <button class="btn btn-success btn-view" @if ( $document->document_by_user_id ) disabled  @endif>
                                                                    @if ($document->document_by_user_id)
                                                                        Accomplished
                                                                    @else
                                                                        Complete The Lesson
                                                                    @endif
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="btn btn-success btn-view">
                                                                <a href="{{ $document->link }}">View</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="other-course">
                            <div class="header-other-course">
                                <p>Other Courses</p>
                            </div>
                            <div class="title-other-course">
                                @foreach($otherCourses as $id => $otherCourse)
                                    @include('courses.other_course')
                                @endforeach
                            </div>
                            <a href="{{ route('courses.index') }}" class="btn btn-success btn-other-course">View all
                                ours courses
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
