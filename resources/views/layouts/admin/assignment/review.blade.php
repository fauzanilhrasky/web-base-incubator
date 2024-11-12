@extends('layouts.app')

@section('title', 'Review Submissions')

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
            <h1>Review Submissions for {{ $assignment->title }}</h1>
            <div class="section-header-breadcrumb breadcrumb-container">
                <div class="breadcrumb-item active"><a href="#">Courses</a></div>
                <div class="breadcrumb-item">Review Submissions</div>
            </div>
        </div>
        <br>
        <div class="card mt-2">
            <div class="card-body">
                <table class="table table-striped table-bordered-dark table-hover review-table">
                    <thead>
                        <tr class="bg-dark">
                            <th class="text-white">User</th>
                            <th class="text-white">File</th>
                            <th class="text-white">Status</th>
                            <th class="text-white">Grade</th>
                            <th class="text-white">Comment</th>
                            <th class="text-white">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-striped">
                        @forelse ($submissions as $submission)
                        <tr>
                            <td>{{ $submission->user->name }}</td>
                            <td>
                                <a href="{{ route('assignments.download', $submission->id) }}" class="">{{ $submission->user->name . '_' . $submission->file }}</a>
                            </td>
                            <td>{{ ucfirst($submission->status) }}</td>
                            <td>{{ $submission->passing_grade ?? 'N/A' }}</td>
                            <td>{{ $submission->comment ?? 'No comment' }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal{{ $submission->id }}">Grade/Comment</button>
                            </td>
                        </tr>

                        <!-- Modal for updating submission -->
                        <div class="modal fade" id="updateModal{{ $submission->id }}" tabindex="-1" aria-labelledby="updateModalLabel{{ $submission->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <form action="{{ route('assignments.updateSubmission', $submission->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateModalLabel{{ $submission->id }}">Update Submission</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="pending" {{ $submission->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="reviewed" {{ $submission->status == 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                                                    <option value="approved" {{ $submission->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="passing_grade">Grade</label>
                                                <input type="number" name="passing_grade" class="form-control" value="{{ $submission->passing_grade }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="comment">Comment</label>
                                                <textarea name="comment" class="form-control">{{ $submission->comment }}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No data available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
