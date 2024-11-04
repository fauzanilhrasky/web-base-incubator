@extends('layouts.app')

@section('title', 'Add Assignment')

@section('content')

<div class="main-content">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Assignment for : <span class="text-warning">{{ $material->title }}</span></h3>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="bg-white p-4 rounded shadow-sm mt-4">
            <h2 class="text-center mb-4 mt-2 text-dark"> <span class="text-warning">Add</span> Assignment</h2>
    
            <form action="{{ route('assignment.store', ['course' => $course->id, 'material' => $material->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
    
                <div class="form-group">
                    <label for="title"><h6>Assignment Title</h6></label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
    
                <div class="form-group">
                    <label for="description"><h6>Description</h6></label>
                    <textarea name="description" id="description" class="form-control h-100" required></textarea>
                </div>
    
                <div class="form-group">
                    <label for="due_date"><h6>Due Date</h6></label>
                    <input type="date" name="due_date" id="due_date" class="form-control" required>
                </div>
    
                <div class="form-group">
                    <label for="file"><h6>Upload File (optional)</h6></label>
                    <input type="file" name="file" id="file" class="form-control">
                </div>
    
                <button type="submit" class="btn btn-dark">Create Assignment</button>
            </form>
        </div>
    </div>
    
@endsection
