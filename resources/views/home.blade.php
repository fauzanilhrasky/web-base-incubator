@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
            </div>
        </div>
    </div>

    

    <section class="section">
        <div class="section-body">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <!-- Background Column -->
                    <div class="col-12 bg-white-400 p-4 rounded shadow-sm">
                        <!-- Dropdown for category selection -->
                        <div class=" mb-4">
                            <select id="url_select66e28d97b5db92" 
                                class="custom-select w-100" 
                                name="jump" 
                                style="max-width: 400px; border-radius: 8px; border: 1px solid #252525;"
                                data-init-value="/course/index.php?categoryid=26">
                                <option value="#">Programmer</option>
                                <option value="#">Bootcamp</option>
                                <option value="#">Internet Of Things (IoT)</option>
                                <option value="#">UI/UX Design</option>
                                <option value="#">Sales and Business</option>
                                <option value="#">Microsoft Excel</option>
                            </select>
                        </div>
    
                        <!-- Section Title -->
                        <h2 class="section-title ">Categories</h2>
                        <p class="section-lead ">Find online learning tutorials that suit your interests</p>
                        
                        <!-- Course Cards -->
                        <div class="row">
                            @foreach ($courses as $course)
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <a href="{{ route('course.detail', $course->id) }}" class="text-decoration-none">
                                        <div class="article article-style-b d-flex flex-column h-100">
                                            <div class="article-header">
                                                <div class="article-image">
                                                    <img src="/images/{{ $course->image }}" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;" alt="{{ $course->name }}">
                                                </div>
                        
                                                <!-- Badge for Free or Paid Course -->
                                                @if (!$course->isPaid)
                                                    <div class="article-badge">
                                                        <div class="article-badge-item bg-primary"><i class="fas fa-exclamation"></i> Free</div>
                                                    </div>
                                                @endif
                                            </div>
                        
                                            <div class="article-details flex-grow-1">
                                                <div class="article-title">
                                                    <h2 class="text-dark">{{ $course->name }}</h2>
                                                </div>
                                                <p>{{ \Illuminate\Support\Str::limit($course->detail, 100) }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</div>
@endsection
