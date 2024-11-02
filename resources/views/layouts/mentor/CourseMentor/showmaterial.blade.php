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
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4>Course</h4>
                        </div>

                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            @foreach ($materials as $index => $material)
                                <div class="accordion-item" style="margin-bottom: 15px; border-radius: 10px; overflow: hidden;">
                                    <h1 class="accordion-header d-flex justify-content-between align-items-center" id="heading{{ $index }}">
                                        <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#panelsStayOpen-collapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                                aria-controls="panelsStayOpen-collapse{{ $index }}" style="border-radius: 0;">
                                            <i class="fas fa-question-circle fa-sm me-2 opacity-70"></i>
                                            <strong style="font-size: 1.2em;">{{ $material->title }}</strong>
                                        </button>

                                        <!-- Dropdown for Edit/Delete -->
                                        <div class="dropdown">
                                            <button class="btn btn-light" type="button" id="dropdownMenuButton{{ $index }}" data-bs-toggle="dropdown"
                                                    aria-expanded="false" style="border: none; background-color: transparent;">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton{{ $index }}">
                                                <li><a class="dropdown-item" href="{{ route('course.material.edit', ['course' => $course->id, 'material' => $material->id]) }}">Edit</a></li>
                                                <li>
                                                    <form action="#" method="POST" onsubmit="return confirm('Are you sure you want to delete this material?');">
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
                                            <strong><h5>Description</h5></strong>
                                            {{ $material->content }}
                                            <hr>

                                            <!-- File and Image Display -->
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

                                            <hr>

                                            <!-- Activity List -->
                                            <ul class="list-unstyled">
                                                <li class="activity activity-wrapper assign modtype_assign hasinfo" id="module-3522" data-for="cmitem" data-id="3522" data-indexed="true">
                                                    <div class="activity-item focus-control" data-activityname="Praktikum Pertemuan 2" data-region="activity-card">
                                                        <div class="activity-grid">
                                                            <div class="activity-icon activityiconcontainer smaller assessment courseicon align-self-start mr-2">
                                                                <img src="https://learning-if.polibatam.ac.id/theme/image.php/moove/assign/1724726077/monologo?filtericon=1" class="activityicon" data-region="activity-icon" data-id="3522" alt="">
                                                            </div>
                                                            <div class="activity-name-area activity-instance d-flex flex-column mr-2">
                                                                <div class="activitytitle modtype_assign position-relative align-self-start">
                                                                    <div class="activityname">
                                                                        <a href="https://learning-if.polibatam.ac.id/mod/assign/view.php?id=3522" class="aalink stretched-link">
                                                                            <span class="instancename">Praktikum Pertemuan 2 <span class="accesshide">Assignment</span></span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div data-region="activity-dates" class="activity-dates mr-sm-2">
                                                                <div><strong>Opened:</strong> Tuesday, 3 September 2024, 12:00 AM</div>
                                                                <div><strong>Due:</strong> Tuesday, 10 September 2024, 12:00 AM</div>
                                                            </div>
                                                            <div class="activity-altcontent d-flex text-break activity-description">
                                                                <p>Pada materi minggu ke-2 telah dipaparkan beberapa metode yang ada dalam agile project management,</p>
                                                                <p>selanjutnya tentukan metode agile yang akan kalian gunakan untuk pengembangan PBL masing-masing tim dan bagaimana kerangka kerjanya.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Enrolled Users Section -->
                        {{-- <div class="mt-5">
                            <h4>Enrolled Users</h4>
                            <ul>
                                @foreach ($enrolledUsers as $user)
                                    <li>{{ $user->name }} - {{ $user->email }}</li>
                                @endforeach
                            </ul>
                        </div> --}}
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