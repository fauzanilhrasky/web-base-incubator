@extends('layouts.app')

@section('title', 'Detail Course')

@section('content')
    <div class="main-content">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3>{{ $course->name }}</h3>
                        <!-- Drawer Toggle Button -->
                        <div class="drawer-toggles d-flex">
                            <div class="drawer-toggler drawer-right-toggle ml-auto d-print-none">
                                <button id="drawerToggleButton" class="btn icon-no-margin bg-dark" data-toggler="drawers" data-action="toggle"
                                        data-target="theme_boost-drawers-blocks" data-toggle="tooltip"
                                        data-placement="right" data-original-title="Open block drawer"
                                        title="Open block drawer">
                                    <span class="sr-only">Open block drawer</span>
                                    <span class="dir-rtl-hide"><i class="icon fa fa-chevron-left fa-fw text-white" aria-hidden="true"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Block Drawer Content -->
                    <aside id="block-drawer" class="drawercontent drag-container d-none bg-white mt-sm-auto" style="width: 250px; position: fixed; right: 0; top: 80px; height: 100%; z-index: 1050;">
                        <div class="d-flex justify-content-between align-items-center p-3">
                            <h5 class="mt-5">Enrolled Users</h5>
                            <button id="drawerCloseButton" class="btn btn-close" title="Close drawer">
                                <span class="sr-only">Close drawer</span>
                            </button>
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($enrolledUsers as $user)
                                <li class="list-group-item">{{ $user->name }} - {{ $user->email }}</li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="section-body">
                <h2 class="section-title">Course Details</h2>
                <p class="section-lead">Below is the detailed information of the selected course.</p>

                <div class="row justify-content-center">
                    <div class="col-lg-11 bg-white p-4" style="border-radius: 10px;">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4>Course</h4>
                            <a class="btn btn-success mb-4" href="{{ route('course.material.create', $course->id) }}">
                                Create New Materials
                            </a>
                        </div>
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            @foreach ($materials as $index => $material)
                                <div class="accordion-item" style="margin-bottom: 15px; border-radius: 10px; overflow: hidden;">
                                    <h1 class="accordion-header d-flex justify-content-between align-items-center" id="heading{{ $index }}">
                                        <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#panelsStayOpen-collapse{{ $index }}"
                                            aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                            aria-controls="panelsStayOpen-collapse{{ $index }}"
                                            style="border-radius: 0;">
                                            <i class="fas fa-question-circle fa-sm me-2 opacity-70"></i>
                                            <strong style="font-size: 1.2em;">{{ $material->title }}</strong>
                                        </button>

                                        <!-- Dropdown for Edit/Delete -->
                                        <div class="dropdown">
                                            <button class="btn btn-light" type="button" id="dropdownMenuButton{{ $index }}" data-bs-toggle="dropdown" aria-expanded="false" style="border: none; background-color: transparent;">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton{{ $index }}">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('course.material.edit', ['course' => $course->id, 'material' => $material->id]) }}">Edit</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('assignment.create', ['course' => $course->id, 'material' => $material->id]) }}">Add Assignment</a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('course.material.destroy', ['course' => $course->id, 'material' => $material->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this material?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item">Delete</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </h1>

                                    <div id="panelsStayOpen-collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}">
                                        <div class="accordion-body">
                                            <strong><h5>Description</h5></strong> {{ $material->content }}<br>
                                    
                                            <!-- Conditionally Rendered HR -->
                                            @if ($material->file || $material->image || ($material->assignments && $material->assignments->isNotEmpty()))
                                                <hr>
                                            @endif
                                    
                                            <div class="d-flex justify-content-between mt-3">
                                                @if ($material->file)
                                                    <div class="col">
                                                        <i class="fas fa-book me-2"></i>
                                                        <a href="{{ asset('files/' . $material->file) }}">{{ $material->file }}</a>
                                                    </div>
                                                @endif
                                                @if ($material->image)
                                                    <div class="col">
                                                        <strong>Image:</strong>
                                                        <img src="{{ asset('uploads/' . $material->image) }}" alt="Image" style="max-width: 100px;">
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
                                                        <li class="activity activity-wrapper assign modtype_assign hasinfo" id="module-{{ $assignment->id }}" data-for="cmitem" data-id="{{ $assignment->id }}" data-indexed="true">
                                                            <div class="activity-item focus-control" data-activityname="{{ $assignment->title }}" data-region="activity-card">
                                                                <div class="d-flex align-items-start"> <!-- Flex container for icon and title -->
                                                                    <!-- Activity icon -->
                                                                    <div class="activity-icon activityiconcontainer smaller assessment courseicon me-2">
                                                                        <i class="fas fa-file fa-lg activityicon" data-region="activity-icon" data-id="{{ $assignment->id }}"></i>
                                                                    </div>
                                                                    
                                                                    <!-- Activity name -->
                                                                    <div class="activity-name-area activity-instance">
                                                                        <div class="activitytitle modtype_assign position-relative">
                                                                            <div class="activityname">
                                                                                <a href="{{ route('assignment.upload', ['course' => $course->id, 'material' => $material->id]) }}" data-bs-toggle="tooltip" data-bs-title="Default tooltip">
                                                                                    <h6>Pengumpulan Tugas: {{ $assignment->title }}</h6>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                            
                                                                        <!-- Activity dates -->
                                                                        <div data-region="activity-dates" class="activity-dates flex justify-between items-center">
                                                                            <div>
                                                                                <strong>Opened:</strong> {{ \Carbon\Carbon::parse($assignment->opened_at)->format('d M Y, H:i A') }}
                                                                                |
                                                                                <strong>Due:</strong> {{ \Carbon\Carbon::parse($assignment->due_date)->format('d M Y, H:i A') }}
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <hr class="my-2"> 
                                                                        
                                                                        <!-- Activity description -->
                                                                        <div class="activity-altcontent d-flex text-break activity-description mt-2">
                                                                            <div class="no-overflow">
                                                                                <p>{{ $assignment->description }}</p>
                                                                            </div>
                                                                        </div>
                                                                        
                                            
                                                                        <!-- Display assignment files -->
                                                                        @if ($assignment->file)
                                                                            <div class="mt-2">
                                                                                <i class="fas fa-file-download me-2"></i>
                                                                                <a href="{{ asset('assignments/' . $assignment->file) }}">{{ $assignment->file }}</a>
                                                                            </div>
                                                                        @endif
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

    <script>
        document.getElementById('drawerToggleButton').addEventListener('click', function () {
            const drawer = document.getElementById('block-drawer');
            drawer.classList.toggle('d-none');
        });
    
        document.getElementById('drawerCloseButton').addEventListener('click', function () {
            const drawer = document.getElementById('block-drawer');
            drawer.classList.add('d-none');
        });
    </script>
@endsection
