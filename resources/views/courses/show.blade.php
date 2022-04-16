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
                       <div class="list-lessons">

                       </div>

                   </div>
                   <div class="col-md-4">
                       <div class="information-other-course">
                           <div class="information">

                           </div>
                           <div class="other-course">

                           </div>

                       </div>

                   </div>
               </div>
           </div>
       </div>

    </div>
@endsection
