@extends('layouts.app')

@section('title', 'Edit Course')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('course.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Edit Course</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Courses</a></div>
                    <div class="breadcrumb-item">Edit Course</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Course</h2>
                <p class="section-lead">You can modify the details of this course here.</p>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Course Information</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('course.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="name" value="{{ $course->name }}" class="form-control" placeholder="Course Name">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Detail</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="form-control" name="detail" placeholder="Course Details" style="height:150px">{{ $course->detail }}</textarea>
                                </div>
                            </div>

                            <!-- Dropdown for isPaid -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Is Paid</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="isPaid" class="form-control">
                                        <option value="0" {{ $course->isPaid == 0 ? 'selected' : '' }}>Free</option>
                                        <option value="1" {{ $course->isPaid == 1 ? 'selected' : '' }}>Paid</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Dropdown for category -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="category" class="form-control">
                                        <option value="programming" {{ $course->category == 'programming' ? 'selected' : '' }}>Programming</option>
                                        <option value="design" {{ $course->category == 'design' ? 'selected' : '' }}>Design</option>
                                        <option value="business" {{ $course->category == 'business' ? 'selected' : '' }}>Business</option>
                                        <!-- Tambahkan kategori lainnya sesuai kebutuhan -->
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="file" name="image" class="form-control">
                                    <img src="/images/{{ $course->image }}" class="img-fluid mt-3" alt="Course Image" style="max-width: 300px;">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <div class="col-md-7 offset-md-3">
                                    <button type="submit" class="btn btn-primary">Update Course</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
