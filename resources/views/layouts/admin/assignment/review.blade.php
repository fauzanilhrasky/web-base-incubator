@extends('layouts.app')

@section('title', 'Review Submissions')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Review Submissions for {{ $assignment->title }}</h3>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>File</th>
                                <th>Status</th>
                                <th>Grade</th>
                                <th>Comment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($submissions as $submission)
                            <tr>
                                <td>{{ $submission->user->name }}</td>
                                <td>
                                    <a href="{{ route('assignments.download', $submission->id) }}" class="btn btn-primary btn-sm">Download</a>
                                </td>
                                <td>{{ ucfirst($submission->status) }}</td>
                                <td>{{ $submission->passing_grade ?? 'N/A' }}</td>
                                <td>{{ $submission->comment ?? 'No comment' }}</td>
                                <td>
                                    <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal{{ $submission->id }}">Grade/Comment</button>
                                </td>
                            </tr>

                            <!-- Modal for updating submission -->
                            <div class="modal fade" id="updateModal{{ $submission->id }}" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ route('assignments.updateSubmission', $submission->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateModalLabel">Update Submission</h5>
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
