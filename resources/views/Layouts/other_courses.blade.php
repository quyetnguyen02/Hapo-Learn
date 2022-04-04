<!--other courses start-->
<section class="list-courses  other-courses">
    <div class="container list-container">
        <div class="row-col-4 col-card">
            @foreach($courses as $course)
                <div class="card">
                    <div class="card-img img-courses html-tut">
                        <img src="{{$course->image}}" alt="Html Logo">
                    </div>
                    <div class="card-body">
                        <p class="card-title">{{$course->name}}</p>
                        <p class="card-text">{{$course->description}}</p>
                        <a href="{{route('home.show')}}" class="btn btn-courses">Take This Course</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<div class="view-all">
    <a href="#">View All Our Courses <i class="fa-solid fa-arrow-right-long"></i></a>
</div>
<!--other courses end-->
