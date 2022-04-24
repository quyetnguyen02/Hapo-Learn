<div class="lessons">
    <div class="row">
        <div class="col-md-1">
            <div class="lesson-id">
                @if(isset($request['page']))
                    <p>{{ ($request['page'] - config('filter.number_page')) * config('filter.item_lesson') + $key + config('filter.number_page') }}</p>
                @else
                    <p>{{ $key + config('filter.number_page') }}</p>
                @endif
            </div>
        </div>
        <div class="col-md-8">
            <div class="lesson-name">
                <p>{{ $lesson->title }}</p>
            </div>
        </div>
        <div class="col-md-3">
            <a href="{{ route('courses.lessons.show', [$course->id, $lesson->id]) }}" class="btn btn-success">
                @if (Auth::user()->progressLesson($lesson->id) == config('filter.progress'))
                    Accomplished
                @else
                Learn
                @endif
            </a>
        </div>
    </div>
</div>
