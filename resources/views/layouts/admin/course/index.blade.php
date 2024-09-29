@extends('layouts.app')

@section('title', 'Courses List')

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
                <h1>Courses Management</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Courses</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Manage Courses</h2>
                <p class="section-lead">You can create, update, and delete courses here.</p>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Courses List</h4>
                        <div class="card-header-action">
                            <a class="btn btn-success" href="{{ route('course.create') }}">Create New Course</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            @foreach ($courses as $course)
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <div class="article article-style-b d-flex flex-column h-100">
                                        <div class="article-header">
                                            <div class="article-image">
                                                <img src="/images/{{ $course->image }}" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;" alt="{{ $course->name }}">
                                            </div>
                                        </div>
                                        <div class="article-details flex-grow-1">
                                            <div class="article-title">
                                                <h2 class="text-dark">{{ $course->name }}</h2>
                                            </div>
                                            <p>{{ \Illuminate\Support\Str::limit($course->detail, 100) }}</p>
                                        </div>
                                        <div class="dropdown article-footer">
                                            <a href="#" data-toggle="dropdown" class="btn btn-icon btn-outline-secondary dropdown-toggle" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('course.show', $course->id) }}"><i class="fas fa-eye"></i> Show</a>
                                                <a class="dropdown-item" href="{{ route('course.edit', $course->id) }}"><i class="fas fa-edit"></i> Edit</a>
                                                <a class="dropdown-item" href="{{ route('course.material.create', $course->id) }}"><i class="fas fa-plus"></i> Add Material</a>
                                                <form action="{{ route('course.destroy', $course->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger"><i class="fas fa-trash"></i> Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        {!! $courses->links() !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
@endpush
