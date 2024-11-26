@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('course.show', $course->id) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Edit Submission</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Assignment</a></div>
                <div class="breadcrumb-item">Edit Submission</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Edit Assignment Details</h2>
            <p class="section-lead">Update the details of the assignment below.</p>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 bg-white p-4" style="border-radius: 10px;">
                        <form action="{{ route('assignments.update', $assignment->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Title Input -->
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" 
                                       value="{{ old('title', $assignment->title) }}" required>
                            </div>

                            <!-- Description Input -->
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $assignment->description) }}</textarea>
                            </div>

                            <!-- Due Date Input -->
                            <div class="form-group">
                                <label for="due_date">Due Date</label>
                                <input type="datetime-local" name="due_date" id="due_date" class="form-control" 
                                       value="{{ \Carbon\Carbon::parse(old('due_date', $assignment->due_date))->format('Y-m-d\TH:i') }}" required>
                            </div>

                            <!-- File or Link Input -->
                            <div class="form-group">
                                <label for="submission_method">Submission Method:</label>
                                <div>
                                    <label class="radio-inline">
                                        <input type="radio" name="submission_method" value="file" id="chooseFile"
                                            {{ $assignment->file ? 'checked' : '' }}> Choose File
                                    </label>
                                    <label class="radio-inline ml-3">
                                        <input type="radio" name="submission_method" value="link" id="chooseLink"
                                            {{ $assignment->link ? 'checked' : '' }}> Choose Link
                                    </label>
                                </div>
                            </div>

                            <!-- File Input -->
                            <div id="fileInputDiv" class="form-group" style="{{ $assignment->file ? '' : 'display: none;' }}">
                                <label for="file">File</label>
                                @if ($assignment->file)
                                    <p class="text-muted">
                                        Current File: 
                                        <a href="{{ asset('assignments/' . $assignment->file) }}" target="_blank">{{ $assignment->file }}</a>
                                    </p>
                                @endif
                                <input type="file" name="file" id="file" class="form-control">
                            </div>

                            <!-- Link Input -->
                            <div id="linkInputDiv" class="form-group" style="{{ $assignment->link ? '' : 'display: none;' }}">
                                <label for="link">Link</label>
                                <input type="url" name="link" id="link" class="form-control" 
                                       value="{{ old('link', $assignment->link) }}" placeholder="Enter URL link (e.g., GDrive)">
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Update Assignment</button>
                                <a href="{{ route('course.show', $course->id) }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
<script>
    // Toggle between file and link input based on selected submission method
    document.getElementById('chooseFile').addEventListener('change', function() {
        document.getElementById('fileInputDiv').style.display = 'block';
        document.getElementById('linkInputDiv').style.display = 'none';
    });

    document.getElementById('chooseLink').addEventListener('change', function() {
        document.getElementById('fileInputDiv').style.display = 'none';
        document.getElementById('linkInputDiv').style.display = 'block';
    });
</script>
@endpush
@endsection
