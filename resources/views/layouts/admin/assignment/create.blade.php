@extends('layouts.app')

@section('title', 'Add Assignment')

@section('content')
<div class="container">
    <h1>Add Assignment for {{ $material->title }}</h1>

    <form action="{{ route('assignment.store', ['course' => $course->id, 'material' => $material->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Assignment Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" id="due_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="file">Upload File (optional)</label>
            <input type="file" name="file" id="file" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Create Assignment</button>
    </form>
</div>
@endsection
