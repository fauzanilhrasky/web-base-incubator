@extends('layouts.app')

@section('title', 'Upload Courses ')

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
                <h5 class="text-dark">{{ $course->name }}</h5>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Course</a></div>
                    <div class="breadcrumb-item">Upload</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title"> Upload Assignments</h2>
                <p class="section-lead">You can upload, and update courses here.</p>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">Courses Upload</h4>
                        <div class="card-header-action">
                            
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="row">
                            <!-- Kolom pertama -->
                            <div class="col-12 col-md-12" style="background-color: rgb(243, 243, 243)">
                                <!-- Activity dates -->
                                <div data-region="activity-dates" class="activity-dates">
                                    <div class="mt-4">
                                        <strong>Opened:</strong>
                                        {{ \Carbon\Carbon::parse($assignment->opened_at)->format('d M Y, H:i A') }} |
                                        <strong>Due:</strong>
                                        {{ \Carbon\Carbon::parse($assignment->due_date)->format('d M Y, H:i A') }}
                                    </div>
                                    <hr>
                                </div>

                                <!-- Activity description -->
                                <div class="activity-altcontent d-flex text-break activity-description mt-2">
                                    <div class="no-overflow">
                                        <p>{{ $assignment->description }}</p>
                                    </div>
                                </div>

                                @if ($assignment->file)
                                    <div class="mt-2">
                                        <i class="fas fa-file-download me-2"></i>
                                        <a
                                            href="{{ asset('assignments/' . $assignment->file) }}">{{ $assignment->file }}</a>
                                    </div>
                                @endif
                            </div>

                            <!-- Tombol Add/Update Submission -->
                            @if ($userSubmissions->isNotEmpty())
                                <a href="{{ route('userSubmit.edit', ['course' => $course->id, 'material' => $material->id, 'assignment' => $assignment->id]) }}"
                                    class="btn btn-primary w-25 mt-5">
                                    Edit Submission
                                </a>
                            @else
                                <a href="{{ route('assignments.add', $assignment->id) }}"
                                    class="btn btn-primary w-25 mt-5">Add Submission</a>
                            @endif


                        </div>
                        <table class="submission-table upl table table-borderless table-striped mt-5">
                            <tbody>
                                <!-- Submission status -->
                                <tr>
                                    <th scope="row" class="upl">Submission status:</th>
                                    <td>
                                        @if ($userSubmissions->isNotEmpty())
                                            <ul class="list-unstyled">
                                                @foreach ($userSubmissions as $submission)
                                                    <li class="mb-2">
                                                        <p>Your submission is {{ $submission->status ?? 'Not graded' }}.
                                                        </p>
                                                        {{-- <small class="text-muted">Submitted on: {{ $submission->created_at->format('d M Y, H:i A') }}</small> --}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p>No comments yet.</p>
                                        @endif
                                    </td>
                                </tr>

                                <!-- Grading status -->
                                <tr>
                                    <th scope="row" class="upl">Grading status:</th>
                                    <td>
                                        @if ($userSubmissions->isNotEmpty())
                                            <ul class="list-unstyled bold">
                                                @foreach ($userSubmissions as $submission)
                                                    <li class="mb-2">
                                                        <p>{{ $submission->passing_grade ?? 'Not graded.' }}</p>
                                                        {{-- <small class="text-muted">Submitted on: {{ $submission->created_at->format('d M Y, H:i A') }}</small> --}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p>No comments yet.</p>
                                        @endif
                                    </td>
                                </tr>

                                <!-- Time remaining -->
                                <tr>
                                    <th scope="row" class="upl">Time remaining:</th>
                                    <td>
                                        @if ($userSubmissions->isNotEmpty())
                                            @foreach ($userSubmissions as $submission)
                                                <span class="{{ $submission->is_early ? 'text-success' : 'text-danger' }}">
                                                    Assignment was submitted
                                                    {{ $submission->time_difference }}
                                                    {{ $submission->is_early ? 'early' : 'late' }}
                                                </span>
                                            @endforeach
                                        @else
                                            <span class="text-muted">No submissions yet.</span>
                                        @endif
                                    </td>
                                </tr>


                                <!-- Last modified -->
                                <tr>
                                    <th scope="row" class="upl">Last modified:</th>
                                    <td>
                                        @if ($userSubmissions->isNotEmpty())
                                            {{ $userSubmissions->last()->updated_at->format('d M Y, H:i A') }}
                                        @else
                                            <span class="text-muted">No submissions yet.</span>
                                        @endif
                                    </td>
                                </tr>

                                <!-- File submissions -->
                                <tr>
                                    <th scope="row" class="upl">File submissions:</th>
                                    <td>
                                        @if ($userSubmissions->isNotEmpty())
                                            <i class="fas fa-file-pdf text-danger me-2"></i>
                                            <a href="{{ asset('uploads/' . $userSubmissions->last()->file) }}">
                                                {{ $userSubmissions->last()->file }}
                                            </a>
                                            <small class="text-dark">
                                                {{ $userSubmissions->last()->updated_at->format('d M Y, H:i A') }}
                                            </small>
                                        @else
                                            <span class="text-muted">No submissions yet.</span>
                                        @endif
                                    </td>
                                </tr>

                                <!-- Submission comments -->
                                <tr>
                                    <th scope="row" class="upl">Submission comments:</th>
                                    <td>
                                        @if ($userSubmissions->isNotEmpty())
                                            <ul class="list-unstyled">
                                                @foreach ($userSubmissions as $submission)
                                                    <li class="mb-2">
                                                        <p>{{ $submission->comment ?? 'No comments yet.' }}</p>
                                                        {{-- <small class="text-muted">Submitted on: {{ $submission->created_at->format('d M Y, H:i A') }}</small> --}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p>No comments yet.</p>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>



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
