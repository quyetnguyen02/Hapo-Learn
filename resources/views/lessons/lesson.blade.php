<div class="lessons">
    <div class="row">
        <div class="col-md-1">
            <div class="lesson-id">
                <p>{{ $key + 1 . '.' }}</p>
            </div>
        </div>
        <div class="col-md-8">
            <div class="lesson-name">
                <p>{{ $lesson->title }}</p>
            </div>
        </div>
        <div class="col-md-3">
            <a href="{{ route('courses.lessons.show', [$course->id, $lesson->id]) }}" class="btn btn-success">Learn</a>
        </div>
    </div>
</div>
