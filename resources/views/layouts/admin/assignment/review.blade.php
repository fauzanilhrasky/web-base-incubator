@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Review Submissions for {{ $assignment->title }}</h3>
                </div>
            </div>
        </div>
    </div>

    <table class="table align-middle mb-0 mt-4 bg-white">
        <thead class="bg-dark">
            <tr>
                <th class="text-white">User</th>
                <th class="text-white">File</th>
                <th class="text-white">Status</th>
                <th class="text-success">Grade</th>
                <th class="text-white">Comment</th>
                <th class="text-primary">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($submissions as $submission)
            <tr>
                <td>{{ $submission->user->name }}</td>
                <td>
                    <a href="{{ route('assignments.download', $submission->id) }}" class="text-primary">
                        {{ $submission->file }}
                    </a>
                </td>
                <td>{{ ucfirst($submission->status) }}</td>
                <td>{{ $submission->passing_grade ?? 'N/A' }}</td>
                <td>{{ $submission->comment ?? 'No comment' }}</td>
                <td>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                        data-bs-target="#updateModal{{ $submission->id }}">Grade/Comment</button>
                </td>
            </tr>

            <!-- Modal for updating submission -->
            <div class="modal fade" id="updateModal{{ $submission->id }}" tabindex="-1"
                aria-labelledby="updateModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('assignments.updateSubmission', $submission->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateModalLabel">Update Submission</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="pending" {{ $submission->status == 'pending' ? 'selected' : ''
                                            }}>Pending</option>
                                        <option value="reviewed" {{ $submission->status == 'reviewed' ? 'selected' : ''
                                            }}>Reviewed</option>
                                        <option value="approved" {{ $submission->status == 'approved' ? 'selected' : ''
                                            }}>Approved</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="passing_grade">Grade</label>
                                    <input type="number" name="passing_grade" class="form-control"
                                        value="{{ $submission->passing_grade }}">
                                </div>
                                <div class="form-group">
                                    <label for="comment">Comment</label>
                                    <textarea name="comment" class="form-control">{{ $submission->comment }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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
@endsection