@extends('layouts.app')

@section('title', 'Show Course')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('course.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Show Course</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Courses</a></div>
                    <div class="breadcrumb-item">Show Course</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Course Details</h2>
                <p class="section-lead">
                    Below is the detailed information of the selected course.
                </p>

                <div class="card">
                    <div class="card-header">
                        <h4>{{ $course->name }}</h4>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Course Name:</strong>
                            <p>{{ $course->name }}</p>
                        </div>

                        <div class="form-group">
                            <strong>Details:</strong>
                            <p>{{ $course->detail }}</p>
                        </div>

                        <div class="form-group">
                            <strong>Image:</strong>
                            <img src="/images/{{ $course->image }}" class="img-fluid" alt="Course Image" style="max-width: 500px;">
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <a class="btn btn-primary" href="{{ route('course.index') }}">Back to Courses</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
