@extends('layouts.app')

@section('title', 'Upload Assignment')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h5 class="text-dark">Upload Assignment</h5>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <h5>Submit Your Assignment</h5>
                    <form action="{{ route('assignments.submit', $assignment->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="file">Choose File:</label>
                            <input type="file" name="file" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit Assignment</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
