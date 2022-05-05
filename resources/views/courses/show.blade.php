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
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#course-preview">
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
                                                        @if(Auth::check())
                                                            @switch(Auth::user()->statusCourse($course->id))
                                                                @case(config('lesson.zero'))
                                                                <button type="button" class="btn-success btn-course" data-toggle="modal" data-target="#modalCourse"
                                                                      @if(session()->has('error_course')) disabled @endif>
                                                                    @if(session()->has('error_course'))
                                                                        {!! session()->get('error_course') !!}
                                                                    @else
                                                                    Take part in the course
                                                                    @endif
                                                                </button>
                                                                @break
                                                                @case(config('lesson.one'))
                                                                <button class="btn-success btn-course btn-course-message" disabled>JOINED</button>
                                                                @break
                                                                @case(config('lesson.two'))
                                                                <button class="btn-success btn-course btn-course-message" disabled>FINISHED</button>
                                                                @break
                                                            @endswitch
                                                        @else
                                                            @if (session()->has('message_course'))
                                                                 <button class="btn-success btn-course  @if (session()->has('message_course')) btn-course-message @endif"  @if (session()->has('message_course')) disabled @endif">{{ session()->get('message_course') }}</button>
                                                            @else
                                                                 <button type="button" class="btn-success btn-course" data-toggle="modal" data-target="#modalCourse" @if(session()->has('error_course')) disabled @endif>
                                                                     @if(session()->has('error_course'))
                                                                         {!! session()->get('error_course') !!}
                                                                     @else
                                                                         Take part in the course
                                                                     @endif
                                                                 </button>
                                                            @endif
                                                        @endif
                                                        <div class="modal fade" id="modalCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Xác Nhận</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Xác Nhận Tham Gia Khóa Học!
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                                                                        <button type="submit" class="btn btn-primary">Tham Gia</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
                                            @foreach($course->teachers as $teacher)
                                                <div class="content-teacher">
                                                    <div class="avatar-name">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="avatar">
                                                                    <img src="{{ $teacher->avatar }}"
                                                                         alt="{{ $teacher->name }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="name-teacher">
                                                                    <p class="name">{{ $teacher->name }}</p>
                                                                    <p class="job-teacher">{{ $teacher->job }}</p>
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
                                                        <p>{{ $teacher->description }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="tab-pane fade pt-3" id="course-preview">
                                        <div class="title">
                                            <span>{{ $course->count_review }} Reviews</span>
                                        </div>
                                        <div class="display-star">
                                            <div class="row row-review">
                                                <div class="col-md-4 image-review">
                                                    <p>{{ $course->avgStarReview}}</p>
                                                    <div>
                                                        @for ($i = 0; $i < $course->avgStarReview; $i++)
                                                            <i class="fa-solid fa-star start"></i>
                                                        @endfor
                                                        @for($i = 5; $i > $course->avgStarReview; $i--)
                                                            <i class="fa-solid fa-star star-special"></i>
                                                        @endfor
                                                    </div>
                                                    <span>{{ $course->countStarReview(5) }} Ratings</span>
                                                </div>
                                                <div class="col-md-7 statistics-review">
                                                    <div class="vote-review">
                                                        <label for="file">5 stars</label>
                                                        <progress id="file" value="{{ $course->starDetailReview(config('lesson.five')) }}" max="100"></progress>
                                                        <label for="file">{{ $course->countStarReview(config('lesson.five')) }}</label>
                                                    </div>
                                                    <div class="vote-review">
                                                        <label for="file">4 stars</label>
                                                        <progress id="file" value="{{ $course->starDetailReview(config('lesson.four')) }}" max="100"></progress>
                                                        <label for="file">{{ $course->countStarReview(config('lesson.four')) }}</label>
                                                    </div>
                                                    <div class="vote-review">
                                                        <label for="file">3 stars</label>
                                                        <progress id="file" value="{{ $course->starDetailReview(config('lesson.three')) }}" max="100"></progress>
                                                        <label for="file">{{ $course->countStarReview(config('lesson.three')) }}</label>
                                                    </div>
                                                    <div class="vote-review">
                                                        <label for="file">2 stars</label>
                                                        <progress id="file" value="{{ $course->starDetailReview(config('lesson.two')) }}" max="100"></progress>
                                                        <label for="file">{{ $course->countStarReview(config('lesson.two')) }}</label>
                                                    </div>
                                                    <div class="vote-review">
                                                        <label for="file">1 stars</label>
                                                        <progress id="file" value="{{ $course->starDetailReview(config('lesson.one')) }}" max="100"></progress>
                                                        <label for="file">{{ $course->countStarReview(config('lesson.one')) }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="select-review">
                                            <span class="dropdown-toggle">Show all reviews</span>
                                        </div>
                                        @foreach($reviews as $review)
                                            <div class="review">
                                                <div class="title-review">
                                                    <div class="image-review">
                                                        <img src="{{ $review->getUser()->avatar }}"
                                                             alt="avatar">
                                                    </div>
                                                    <span>{{ $review->getUser()->name }}</span>
                                                    <div>
                                                        @for($i = 0; $i < $review->vote; $i++)
                                                            <i class="fa-solid fa-star start"></i>
                                                        @endfor
                                                        @for($i = 5; $i > $review->vote; $i--)
                                                            <i class="fa-solid fa-star star-special"></i>
                                                        @endfor
                                                    </div>
                                                    <div class="date-review">
                                                        <span>{{ Helper::formatDate($review->created_at) }}</span>
                                                    </div>
                                                </div>
                                                <div class="content-review">
                                                    <p>{{ $review->content }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                        {!! $reviews->links() !!}
                                        <div class="leave-review">
                                            <span class="dropdown-toggle">Leave a Review</span>
                                        </div>
                                        <div class="form-review">
                                            <form action="{{ route('reviews.store', $course->id) }}" id="form-review" method="POST">
                                                @csrf
                                                <p>Message</p>
                                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                <textarea class="form-control" name="message" rows="4" placeholder="Message" required></textarea>
                                                <input type="hidden" id="rating" name="rating" value="0">
                                                <div class="rating">
                                                    <span>Vote</span>
                                                    <i class="ratings_stars fa start-selected fa-star" data-rating="1"></i>
                                                    <i class="ratings_stars fa start-selected fa-star" data-rating="2"></i>
                                                    <i class="ratings_stars fa start-selected fa-star" data-rating="3"></i>
                                                    <i class="ratings_stars fa start-selected fa-star" data-rating="4"></i>
                                                    <i class="ratings_stars fa start-selected fa-star" data-rating="5"></i>
                                                    <p>(stars)</p>
                                                </div>
                                                <button class="btn-send-review">Send</button>
                                            </form>
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
