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
                <h2 class="section-title">Manage Courses Upload Assignments</h2>
                <p class="section-lead">You can update, and delete courses here.</p>
            
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
            
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">Courses Upload</h4>
                        <div class="card-header-action">
                            <!-- Dropdown Button -->
                            <div class="dropdown">
                                <button class="btn btn-icon" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <!-- Dropdown Menu -->
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                    <li><a class="dropdown-item text-danger" href="#" onclick="return confirm('Are you sure you want to delete this course?')">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="card-body">
                        <div class="row">
                            <!-- Kolom pertama -->
                            <div class="col-12 col-md-12" style="background-color: rgb(243, 243, 243)">
                                <!-- Activity dates -->
                                <div data-region="activity-dates" class="activity-dates">
                                    <div class="mt-4">
                                        <strong>Opened:</strong> {{ \Carbon\Carbon::parse($assignment->opened_at)->format('d M Y, H:i A') }} |
                                        <strong>Due:</strong> {{ \Carbon\Carbon::parse($assignment->due_date)->format('d M Y, H:i A') }}
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
                                    <a href="{{ asset('assignments/' . $assignment->file) }}">{{ $assignment->file }}</a>
                                </div>
                            @endif
                            </div>

                            <a href="{{ route('assignments.add', $assignment->id) }}" class="btn btn-primary w-25 mt-5">Add Submission</a>




                        </div>
                        <table class="submission-table upl table table-borderless table-striped mt-5">
                            <tbody>
                                <!-- Submission status -->
                                <tr>
                                    <th scope="row" class="upl">Submission status:</th>
                                    <td><span class="text-dark">No submissions have been made yet</span></td>
                                </tr>
                        
                                <!-- Grading status -->
                                <tr>
                                    <th scope="row" class="upl">Grading status:</th>
                                    <td><span class="text-dark">Not graded</span></td>
                                </tr>
                        
                                <!-- Time remaining -->
                                <tr>
                                    <th scope="row" class="upl">Time remaining:</th>
                                    <td><span class="text-success">Assignment was submitted 2 hours 13 mins early</span></td>
                                </tr>
                        
                                <!-- Last modified -->
                                <tr>
                                    <th scope="row" class="upl">Last modified:</th>
                                    <td class="text-dark">Wednesday, 18 September 2024, 9:46 PM</td>
                                </tr>
                        
                                <!-- File submissions -->
                                <tr>
                                    <th scope="row" class="upl">File submissions:</th>
                                    <td>
                                        <i class="fas fa-file-pdf text-danger me-2"></i>
                                        <a href="{{ asset('assignments/' . $assignment->file) }}">{{ $assignment->file }}</a>
                                        <small class="text-dark">18 September 2024, 9:46 PM</small>
                                    </td>
                                </tr>
                        
                                <!-- Submission comments -->
                                <tr>
                                    <th scope="row" class="upl">Submission comments:</th>
                                    <td><a href="#">Comments (0)</a></td>
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
