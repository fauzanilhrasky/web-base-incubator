@extends('layouts.app')

@section('title', 'Detail Course')

@section('content')
    <div class="main-content">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ $course->name }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="section-body">
                <h2 class="section-title">Course Details</h2>
                <p class="section-lead">Below is the detailed information of the selected course.</p>

                <div class="row justify-content-center">
                    <div class="col-lg-11 bg-white p-4" style="border-radius: 10px;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4>Course</h4> <!-- Judul atau teks lain yang relevan -->

                        </div>
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            @foreach ($materials as $index => $material)
                                <div class="accordion-item"
                                    style="margin-bottom: 15px; border-radius: 10px; overflow: hidden;">
                                    <h1 class="accordion-header d-flex justify-content-between align-items-center"
                                        id="heading{{ $index }}">
                                        <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#panelsStayOpen-collapse{{ $index }}"
                                            aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                            aria-controls="panelsStayOpen-collapse{{ $index }}"
                                            style="border-radius: 0;">
                                            <i class="fas fa-question-circle fa-sm me-2 opacity-70"></i>
                                            <strong style="font-size: 1.2em;">{{ $material->title }}</strong>
                                        </button>


                                    </h1>

                                    <div id="panelsStayOpen-collapse{{ $index }}"
                                        class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                        aria-labelledby="heading{{ $index }}">
                                        <div class="accordion-body">
                                            <strong>
                                                <h5>Description</h5>
                                            </strong> {{ $material->content }}<br>

                                            <!-- Conditionally Rendered HR -->
                                            @if ($material->file || $material->image || ($material->assignments && $material->assignments->isNotEmpty()))
                                                <hr>
                                            @endif

                                            <div class="d-flex justify-content-between mt-3">
                                                @if ($material->file)
                                                    <div class="col">
                                                        <i class="fas fa-book me-2"></i>
                                                        <a
                                                            href="{{ asset('files/' . $material->file) }}">{{ $material->file }}</a>
                                                    </div>
                                                @endif
                                                @if ($material->image)
                                                    <div class="col">
                                                        <strong>Image:</strong>
                                                        <img src="{{ asset('uploads/' . $material->image) }}"
                                                            alt="Image" style="max-width: 100px;">
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- Conditionally Rendered HR for Assignments -->
                                            @if ($material->assignments && $material->assignments->isNotEmpty())
                                                <hr>
                                            @endif

                                            <!-- Display Assignments -->
                                            <ul class="list-unstyled">
                                                @if ($material->assignments && $material->assignments->isNotEmpty())
                                                    @foreach ($material->assignments as $assignment)
                                                        <li class="activity activity-wrapper assign modtype_assign hasinfo"
                                                            id="module-{{ $assignment->id }}" data-for="cmitem"
                                                            data-id="{{ $assignment->id }}" data-indexed="true">
                                                            <div class="activity-item focus-control"
                                                                data-activityname="{{ $assignment->title }}"
                                                                data-region="activity-card">
                                                                <div class="d-flex align-items-start">
                                                                    <!-- Flex container for icon and title -->
                                                                    <!-- Activity icon -->
                                                                    <div
                                                                        class="activity-icon activityiconcontainer smaller assessment courseicon me-2">
                                                                        <i class="fas fa-file fa-lg activityicon"
                                                                            data-region="activity-icon"
                                                                            data-id="{{ $assignment->id }}"></i>
                                                                    </div>

                                                                    <!-- Activity name -->
                                                                    <div class="activity-name-area activity-instance">
                                                                        <div
                                                                            class="activitytitle modtype_assign position-relative">
                                                                            <div class="activityname">
                                                                                <a href="{{ route('assignment.userUpload', ['course' => $course->id, 'material' => $material->id]) }}" data-bs-toggle="tooltip"
                                                                                    data-bs-title="Default tooltip">
                                                                                    <h6>{{ $assignment->title }}</h6>
                                                                                </a>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Activity dates -->
                                                                        <div data-region="activity-dates"
                                                                            class="activity-dates">
                                                                            <div>
                                                                                <strong>Opened:</strong>
                                                                                {{ \Carbon\Carbon::parse($assignment->opened_at)->format('d M Y, H:i A') }}
                                                                                |

                                                                                <strong>Due:</strong>
                                                                                {{ \Carbon\Carbon::parse($assignment->due_date)->format('d M Y, H:i A') }}
                                                                            </div>

                                                                        </div>

                                                                        <hr class="my-2">
                                                                        <!-- Garis batas di bawah Opened dan Due -->

                                                                        <!-- Activity description -->
                                                                        <div
                                                                            class="activity-altcontent d-flex text-break activity-description mt-2">
                                                                            <div class="no-overflow">
                                                                                <p>{{ $assignment->description }}</p>
                                                                            </div>
                                                                        </div>

                                                                        {{-- <!-- Display Assignment Actions -->
                                                                        @if ($assignment->userSubmission)
                                                                            <div>
                                                                                <p>Submitted File:
                                                                                    {{ $assignment->userSubmission->file }}
                                                                                </p>

                                                                                <!-- Review Assignment -->
                                                                                <a href="{{ route('assignments.download', $assignment->userSubmission->id) }}"
                                                                                    class="btn btn-primary mb-3">Review
                                                                                    Assignment</a>

                                                                                <!-- Edit/Upload New Assignment -->
                                                                                <form
                                                                                    action="{{ route('assignments.update', $assignment->id) }}"
                                                                                    method="POST"
                                                                                    enctype="multipart/form-data">
                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <input type="file" name="file"
                                                                                        required>
                                                                                    <button type="submit"
                                                                                        class="btn btn-secondary">Edit/Upload
                                                                                        New Assignment</button>
                                                                                </form>
                                                                            </div>
                                                                        @else
                                                                            <!-- If no submission, show the Submit form -->
                                                                            <form
                                                                                action="{{ route('assignments.submit', $assignment->id) }}"
                                                                                method="POST"
                                                                                enctype="multipart/form-data">
                                                                                @csrf
                                                                                <input type="file" name="file"
                                                                                    required>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary">Submit
                                                                                    Assignment</button>
                                                                            </form>
                                                                        @endif --}}


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                @else
                                                    <li>No assignments available for this material.</li>
                                                @endif
                                            </ul>

                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
