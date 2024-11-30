@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 text-center user-assignment-title">User Assignment Assessment Page</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-10">
                <div class="card bg-white mt-5">
                    <h3 class="text-center user-name mt-3">{{ Auth::user()->name }}</h3>
                    <div class="card-body">
                        <div class="table-responsive mt-4 mb-4 user-table-container">
                            <table class="table align-middle mb-0 bg-white table-striped">
                                <thead class="bg-dark">
                                    <tr>
                                        <th class="text-white">Course Material Title</th>
                                        <th class="text-white">Assignment link</th>
                                        <th class="text-white">Value</th>
                                        <th class="text-white">Comment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assignments as $assignment)
                                        @foreach ($assignment->userSubmissions as $submission)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="/images/{{ $assignment->material->course->image ?? 'default.png' }}"
                                                            alt="Course Image" class="rounded-circle"
                                                            style="width: 50px; height: 50px;">
                                                        <div class="ms-4">
                                                            <p class="fw-bold mb-1">
                                                                {{ $assignment->material->title ?? 'No Title' }}</p>
                                                            <p class="text-muted mb-0">
                                                                {{ $assignment->material->course->name ?? 'No Course Name' }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($submission->file)
                                                        <a href="{{ asset('storage/' . $submission->file) }}"
                                                            download="">View Assignment</a>
                                                    @else
                                                        No Submission
                                                    @endif
                                                </td>
                                                <td>
                                                    <h6>{{ $submission->passing_grade ?? 'Not Graded' }}</h6>
                                                </td>
                                                <td>
                                                    {{ $submission->comment ?? 'No Comment' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination Links -->
                        <div class="d-flex justify-content-center">
                            {{ $assignments->links() }}
                        </div>
                    </div>

                    <!-- PDF Button -->
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('generate.pdf') }}"
                            class=" btn btn-primary btn-lg w-25 sm:w-1/4 mb-4">Generate
                            to
                            PDF</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
