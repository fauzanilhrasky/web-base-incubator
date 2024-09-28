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
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Details</th>
                                        <th width="400px">Action</th> <!-- Increased width for additional button -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $course)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td><img src="/images/{{ $course->image }}" width="100px"></td>
                                            <td>{{ $course->name }}</td>
                                            <td>{{ $course->detail }}</td>
                                            <td>
                                                <form action="{{ route('course.destroy', $course->id) }}" method="POST">
                                                    <a class="btn btn-info" href="{{ route('course.show', $course->id) }}">
                                                        <i class="fas fa-eye"></i> Show
                                                    </a>
                                                    <a class="btn btn-custom" href="{{ route('course.edit', $course->id) }}">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <a class="btn btn-primary" href="{{ route('course.material.create', $course->id) }}">
                                                        <i class="fas fa-plus"></i> Add Material
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
