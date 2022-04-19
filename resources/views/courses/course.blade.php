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
            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-success show-course-detail">More</a>
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
