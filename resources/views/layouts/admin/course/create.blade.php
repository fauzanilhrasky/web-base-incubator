@extends('layouts.app')

@section('title', 'Create New Course')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('course.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Create New Course</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Courses</a></div>
                    <div class="breadcrumb-item">Create New Course</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Create a New Course</h2>
                <p class="section-lead">Fill in the information below to add a new course.</p>

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
                        <h4>Course Details</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Course Name</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="name" class="form-control" placeholder="Course Name" value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Course Details</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Course Details">{{ old('detail') }}</textarea>
                                </div>
                            </div>

                            <!-- Dropdown for isPaid -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Is Paid</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="isPaid" class="form-control">
                                        <option value="0">Free</option>
                                        <option value="1">Paid</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Dropdown for category -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="category" class="form-control">
                                        <option value="programming">Programming</option>
                                        <option value="design">Design</option>
                                        <option value="business">Business</option>
                                        <!-- Tambahkan kategori lainnya sesuai kebutuhan -->
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Course Image</label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input type="file" name="image" id="image-upload" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button type="submit" class="btn mdb-btn-custom">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
@endpush
