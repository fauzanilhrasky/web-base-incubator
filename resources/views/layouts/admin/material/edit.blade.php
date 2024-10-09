@extends('layouts.app')

@section('title', 'Edit Material')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('course.show', $course->id) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Edit Material</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Courses</a></div>
                    <div class="breadcrumb-item">Edit Material</div>
                </div>
            </div>

            <!-- Notifikasi sukses -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="section-body">
                <h2 class="section-title">Edit Material</h2>
                <p class="section-lead">You can modify the details of this material here.</p>

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
                        <h4>Material Information</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('course.material.update', ['course' => $course->id, 'material' => $material->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Material Title -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><h6>Title</h6></label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title" value="{{ $material->title }}" class="form-control" placeholder="Material Title" required>
                                </div>
                            </div>

                            <!-- Material Content -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><h6>Content</h6></label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="form-control" name="content" placeholder="Material Content" style="height:150px" required>{{ $material->content }}</textarea>
                                </div>
                            </div>

                            <!-- File -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><h6>File (optional)</h6></label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="file" name="file" class="form-control">
                                    @if($material->file)
                                        <p class="mt-2">Current file: <a href="{{ asset('files/' . $material->file) }}">{{ $material->file }}</a></p>
                                    @endif
                                </div>
                            </div>

                            <!-- Image -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><h6>Image (optional)</h6></label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="file" name="image" class="form-control">
                                    @if($material->image)
                                        <img src="{{ asset('uploads/' . $material->image) }}" class="img-fluid mt-3" alt="Material Image" style="max-width: 300px;">
                                    @endif
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group row mb-4">
                                <div class="col-md-7 offset-md-3">
                                    <button type="submit" class="btn btn-custom">Update Material</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
