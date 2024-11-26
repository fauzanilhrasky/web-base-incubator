@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><h3>{{ __('Dashboard') }}</h3></div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="section-body">
            <div class="container-fluid mt-4">
                <div class="row justify-content-center">
                    <!-- Background Column -->
                    <div class="col-12 bg-white p-4 rounded shadow-sm">
                        <!-- Dropdown for category selection -->
                        <div class="mb-4">
                            <form method="GET" action="{{ route('home') }}">
                                @csrf
                                <select id="category_select" class="custom-select w-100" name="category" style="max-width: 400px; border-radius: 8px; border: 1px solid #252525;" onchange="this.form.submit()">
                                    <option value="" {{ request('category') == '' ? 'selected' : '' }}> All subject options</option>
                                    <option value="programming" {{ request('category') == 'programming' ? 'selected' : '' }}>Programmer</option>
                                    <option value="design" {{ request('category') == 'design' ? 'selected' : '' }}>UI UX design</option>
                                    <option value="iot" {{ request('category') == 'iot' ? 'selected' : '' }}>Internet Of Things (IoT)</option>
                                    <option value="business" {{ request('category') == 'business' ? 'selected' : '' }}>Sales and Business</option>
                                    <option value="excel" {{ request('category') == 'excel' ? 'selected' : '' }}>Microsoft Excel</option>
                                </select>
                            </form>
                        </div>

                        <!-- Section Title -->
                        <h2 class="section-title">Categories</h2>
                        <p class="section-lead">Find online learning tutorials that suit your interests</p>

                        <!-- Course Cards -->
                        <div class="row">
                            @foreach ($courses as $course)
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">     
                                    @if ($course->isPaid)
                                        <a href="{{ route('course.detail', $course->id) }}" class="text-decoration-none">
                                            <div class="article article-style-b d-flex flex-column h-100">
                                                <div class="article-header">
                                                    <div class="article-image">
                                                        <img src="/images/{{ $course->image }}" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;" alt="{{ $course->name }}">
                                                    </div>
                                                    <div class="article-badge">
                                                        <div class="article-badge-item bg-danger"><i class="fas fa-money-bill-wave"></i> Paid</div>
                                                    </div>
                                                </div>
                                                <div class="article-details flex-grow-1">
                                                    <div class="article-title">
                                                        <h2 class="text-dark">{{ $course->name }}</h2>
                                                    </div>
                                                    <p>{{ \Illuminate\Support\Str::limit($course->detail, 100) }}</p>
                                                </div>
                                                <div class="article-details d-flex justify-content-between align-items-center">
                                                    <div class="text-left">
                                                        <h5 class="text-dark ">{{ $course->price }} <span style="font-weight: normal; font-style:italic; font-size: 14px; color: gray;">/6 month</span></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @else
                                        <a href="{{ route('course.detail', $course->id) }}" class="text-decoration-none">
                                            <div class="article article-style-b d-flex flex-column h-100">
                                                <div class="article-header">
                                                    <div class="article-image">
                                                        <img src="/images/{{ $course->image }}" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;" alt="{{ $course->name }}">
                                                    </div>
                                                    <div class="article-badge">
                                                        <div class="article-badge-item bg-primary"><i class="fas fa-exclamation"></i> Free</div>
                                                    </div>
                                                </div>
                                                <div class="article-details flex-grow-1">
                                                    <div class="article-title">
                                                        <h2 class="text-dark">{{ $course->name }}</h2>
                                                    </div>
                                                    <p>{{ \Illuminate\Support\Str::limit($course->detail, 100) }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if (session('status') === 'login-success')
                Swal.fire({
                    title: 'Package Available',
                    html: `
                    <p>Are you ready? If so, <br> please click the button below</p>
                        <div class="mt-4 mb-4" style="display: flex; justify-content: space-between; text-align: left;  padding: 10px; border-radius: 8px;">
                            <!-- Basic Package -->
                            <div class="style-popup">
                                <h5 class="text-dark text-center">Basic</h5>
                                <p>
                                    <div class="text-muted">- Microlearning.</div>
                                    <div class="text-muted mt-1">- Self-learning.</div> 
                                    <div class="text-muted mt-1">- Free Courses.</div>
                                    <div class="text-muted mt-1">- Quizzes and Tests.</div>
                                    <div class="text-muted mt-1">- basic discussion.</div>
                                    <div class="text-muted mt-1">- Simple Certificate.</div>                                
                                </p>
                            </div>
                            <!-- Advance Package -->
                             <div class="style-popup">
                                <h5 class="text-success text-center">Advance</h5>
                                <p>
                                    <div class="text-muted">- Advanced Courses.</div>
                                    <div class="text-muted mt-1">- Interactive Learning.</div>
                                    <div class="text-muted mt-1">- Mentored Learning.</div>
                                    <div class="text-muted mt-1">- Certification.</div>
                                    <div class="text-muted mt-1">- Team Learning.</div>
                                    <div class="text-muted mt-1">- Full Evaluation.</div>                                 
                                </p>
                            </div>
                        </div>
                    `,
                    icon: 'info',
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Yes I Can',
                    cancelButtonText: 'Close',
                    customClass: {
                        confirmButton: 'btn btn-primary me-4 btn-lg',
                        cancelButton: 'btn btn-danger btn-lg'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log('User clicked Yes I Can');
                    } else {
                        console.log('User clicked Close');
                    }
                });
            @endif
        });
    </script>
    
    

</div>
@endsection


