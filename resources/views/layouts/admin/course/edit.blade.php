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

                            <!-- Course Name -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="name" value="{{ $course->name }}" class="form-control" placeholder="Course Name">
                                </div>
                            </div>

                            <!-- Course Detail -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Detail</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="form-control" name="detail" placeholder="Course Details" style="height:150px">{{ $course->detail }}</textarea>
                                </div>
                            </div>

                            <!-- Mentor -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mentor</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="mentor_id" class="form-control">
                                        <option value="">Select Mentor</option>
                                        @foreach ($mentors as $mentor)
                                            <option value="{{ $mentor->id }}" {{ $course->mentor_id == $mentor->id ? 'selected' : '' }}>
                                                {{ $mentor->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Course Price -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Price</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="text" name="price" value="{{ $course->price}}" class="form-control" placeholder="Course Price" required>
                                    </div>
                                </div>
                            </div>
                            
                            

                            <!-- Is Paid -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Is Paid</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="isPaid" class="form-control">
                                        <option value="0" {{ $course->isPaid == 0 ? 'selected' : '' }}>Free</option>
                                        <option value="1" {{ $course->isPaid == 1 ? 'selected' : '' }}>Paid</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Category -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="category" class="form-control">
                                        <option value="programming" {{ $course->category == 'programming' ? 'selected' : '' }}>Programming</option>
                                        <option value="design" {{ $course->category == 'design' ? 'selected' : '' }}>Design</option>
                                        <option value="business" {{ $course->category == 'business' ? 'selected' : '' }}>Business</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Image -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="file" name="image" id="imageInput" class="form-control" accept="image/*" onchange="previewImage(event)">
                                    <img id="imagePreview" src="/images/{{ $course->image }}" class="img-fluid mt-3" alt="Course Image" style="max-width: 300px;">
                                </div>
                            </div>


                            <!-- Submit Button -->
                            <div class="form-group row mb-4">
                                <div class="col-md-7 offset-md-3">
                                    <button type="submit" class="btn btn-custom">Update Course</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        function previewImage(event) {
            const image = document.getElementById('imagePreview');
            image.src = URL.createObjectURL(event.target.files[0]);
            image.onload = () => {
                URL.revokeObjectURL(image.src); // menghapus URL object setelah gambar di-load
            }
        }
    </script>
    
@endsection
