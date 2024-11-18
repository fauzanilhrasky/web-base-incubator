@extends('layouts.app')

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('course.show', $course->id) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Edit Submissions</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Upload</a></div>
                <div class="breadcrumb-item">Edit Submissions</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card bg-white mt-5">
                        <div class="card-body">
                            <form action="{{ route('assignments.update', ['course' => $course->id, 'material' => $material->id, 'assignment' => $assignment->id]) }}" 
                                  method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
        
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" 
                                           value="{{ old('title', $assignment->title) }}" required>
                                </div>
        
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="10" required>{{ old('description', $assignment->description) }}</textarea>
                                </div>
                                
        
                                <div class="form-group">
                                    <label for="due_date">Due Date</label>
                                    <input type="datetime-local" name="due_date" id="due_date" class="form-control" 
                                           value="{{ \Carbon\Carbon::parse(old('due_date', $assignment->due_date))->format('Y-m-d\TH:i') }}" required>
                                </div>
        
                                <div class="form-group">
                                    <label for="file">File</label>
                                    @if ($assignment->file)
                                        <div class="mb-2">
                                            <a href="{{ asset('assignments/' . $assignment->file) }}" target="_blank">{{ $assignment->file }}</a>
                                        </div>
                                    @endif
                                    <input type="file" name="file" id="file" class="form-control">
                                </div>
        
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update Assignment</button>
                                    <a href="{{ route('course.show', $course->id) }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
</div>

@endsection
