@extends('layouts.app')

@section('content')
<div class="main-content">
    <!-- Card Header with Assignment Title -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ $assignment->title }}</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Section for Assignment Details -->
    <section class="section">
        <div class="section-body">
            <h2 class="section-title">Handover of Duties</h2>
            <p class="section-lead">Below is the detailed information of the selected course.</p>

            <div class="container">
                <div class="assignment-detail">
                    <div class="row justify-content-center">
                        <div class="col-lg-11 bg-white p-4" style="border-radius: 10px;">
                            <h5>Question</h5>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <p>{{ $assignment->description }}</p>
                            </div>

                            @if ($assignment->userSubmission)
                            
                                <div>
                                    <!-- Display Submitted File -->
                                    <h4>Submitted File: {{ $assignment->userSubmission->file }}</h4>

                                    <!-- Review Assignment -->
                                    <a href="{{ route('assignments.download', $assignment->userSubmission->id) }}" class="btn btn-primary mb-3">
                                        Review Assignment
                                    </a>

                                    <!-- Edit/Upload New Assignment -->
                                    <form action="{{ route('assignments.update', $assignment->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="file">Choose New File (optional)</label>
                                            <input type="file" name="file" id="file" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-secondary">Edit/Upload New Assignment</button>
                                    </form>
                                </div>
                            @else
                                <!-- Display Form to Submit Assignment -->
                                <form action="{{ route('assignments.submit', $assignment->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <hr>
                                    <!-- Choose Submission Method -->
                                    <div class="form-group">
                                        <label for="submissionMethod">Choose Submission Method:</label>
                                        <div>
                                            <label class="radio-inline">
                                                <input type="radio" name="submission_method" value="file" id="chooseFile" checked> Choose File
                                            </label>
                                            <label class="radio-inline ml-3">
                                                <input type="radio" name="submission_method" value="link" id="chooseLink"> Choose Link
                                            </label>
                                        </div>
                                    </div>

                                    <!-- File Input (default) -->
                                    <div id="fileInputDiv" class="form-group">
                                        <label for="file">Choose File</label>
                                        <input type="file" name="file" id="file" class="form-control" required>
                                    </div>

                                    <!-- Link Input (hidden by default) -->
                                    <div id="linkInputDiv" class="form-group" style="display: none;">
                                        <label for="link">Submit Link</label>
                                        <input type="url" name="link" id="link" class="form-control" placeholder="Enter URL link GDrive to your assignment">
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-3">Submit Assignment</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
<script>
    // JavaScript to toggle between file input and link input
    document.getElementById('chooseFile').addEventListener('change', function() {
        document.getElementById('fileInputDiv').style.display = 'block';
        document.getElementById('linkInputDiv').style.display = 'none';
    });

    document.getElementById('chooseLink').addEventListener('change', function() {
        document.getElementById('fileInputDiv').style.display = 'none';
        document.getElementById('linkInputDiv').style.display = 'block';
    });

    // SweetAlert2 Notification on Success
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            confirmButtonText: 'OK'
        });
    @endif
</script>
@endpush

@endsection
