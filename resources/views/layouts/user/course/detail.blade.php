@extends('layouts.app')

@section('title', 'Detail Course')

@section('content')
    <div class="main-content">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Base Incubator | Course Details</h5>
                    </div>
                </div>
            </div>
        </div>

        <section class="pricing custom-background">
            <div class="container">
                <div class="row pb-70 d-flex">
                    <!-- Bagian tulisan di sebelah kiri -->
                    <div class="col-md-7 copy text-left">
                        <h3 class="text-white">{{ $course->name }}</h3>

                        <p class="paragraf">{{ \Illuminate\Support\Str::limit($course->detail, 300) }}</p>
                        <p class="support text-white">
                            Come learn and develop your skills by learning to understand more deeply and create your final
                            project <br>
                            and receive important feedback.
                        </p>
                    </div>

                    <!-- Bagian 'Your Cart' di sebelah kanan -->
                    <div class="col-md-5 col-lg-4 custom-border">
                        <div class="bg-white p-4 rounded shadow-sm" style="height: auto;">
                            <h4 class="text-center mb-3">
                                <span class="text-dark">Your cart</span>
                            </h4>

                            <!-- Gambar kursus dengan badge Free/Paid -->
                            <ul class="list-group mb-3 position-relative">
                                <div class="position-relative">
                                    <img src="/images/{{ $course->image }}" class="img-fluid"
                                        style="height: 200px; width: 100%; object-fit: cover;" alt="{{ $course->name }}">

                                    <!-- Menampilkan badge Free atau Paid di sudut kanan atas -->
                                    <span class="text-left position-absolute top-0 end-0 m-2">
                                        @if ($course->isPaid)
                                            <span class="badge bg-danger">Paid</span>
                                        @else
                                            <span class="badge bg-primary">Free</span>
                                        @endif
                                    </span>
                                </div>

                                <h5 class="text-dark mt-4">
                                    {{ $course->price }}
                                    <span style="font-weight: normal; font-style:italic; font-size: 14px; color: gray;">/6
                                        months</span>
                                </h5>
                            </ul>

                            <div class="d-grid gap-2">
                                @if ($isEnrolled)
                                <a href="{{ route('course.showdetail', $course->id) }}" class="btn btn-info w-75 d-flex justify-content-center mx-auto">View Course</a>

                                @elseif ($course->isPaid)
                                    <form action="{{ route('checkout', $course->id) }}" method="GET">
                                        <button type="submit" class="btn btn-warning btn-block w-75">Buy Now</button>
                                    </form>
                                @else
                                    <form action="{{ route('course.enroll', $course->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-block w-75">Enroll Me</button>
                                    </form>
                                @endif
                        </div>


                        <!-- Penjelasan kursus yang memanjang ke bawah -->
                        <div class="d-grid gap-2">
                            <h5 class="kursus text-dark">This course covers:</h5>
                            <ul style="list-style: none; padding-left: 0;">
                                <li class="details">
                                    <i class="fas fa-video" style="margin-right: 10px;"></i>
                                    <span>17 hours of on-demand video</span>
                                </li>
                                <li class="details">
                                    <i class="fas fa-file-alt" style="margin-right: 10px;"></i>
                                    <span>Article</span>
                                </li>
                                <li class="details">
                                    <i class="fas fa-file-pdf" style="margin-right: 10px;"></i>
                                    <span>Explanation in PDF form and description</span>
                                </li>
                                <li class="details">
                                    <i class="fas fa-tasks" style="margin-right: 10px;"></i>
                                    <span>Project assignments and testing</span>
                                </li>
                                <li class="details">
                                    <i class="fas fa-certificate" style="margin-right: 10px;"></i>
                                    <span>Certificates and course assessment results</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- penjelasan details users --}}
            <div class="dsk row">
                <div class="col-lg-7 col-md-6 col-12">
                    <div class="card bg-white-400"> <!-- Menggunakan bg-white-400 -->
                        <div class="card-header">
                            <h5 class="mb-0 text-dark">Welcome to the {{ $course->name }} course!</h5>
                        </div>
                        <div class="card-body flex justify-start">
                            <p>This course is designed to help you master {{ $course->name }} in a fun and interactive way.
                                In this course, you will learn key concepts, techniques, and best practices that will help
                                you “develop new skills,
                                earn certifications, advance your career, etc.</p>
                        </div>

                        <div class="d-grid gap-2 flex">
                            <h5 class="kursus text-dark flex">This course covers:</h5>
                            <ul class="list-none pl-0">
                                <li class="details flex items-center">
                                    <span>Who is this course for? This course is suitable for:</span>
                                </li>

                                <li class="details flex items-center">
                                    <i class="fas fa-check mr-8"></i>
                                    <span>Beginners who want to understand {{ $course->name }}.</span>
                                </li>

                                <li class="details flex items-center">
                                    <i class="fas fa-check mr-8"></i>
                                    <span>Professionals who want to improve their skills and knowledge.</span>
                                </li>

                                <li class="details flex items-center">
                                    <i class="fas fa-check mr-8"></i>
                                    <span>Anyone who is passionate about learning and growing in the field</span>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body flex justify-start">
                            <h6>Come on guys Join Now!</h6>
                            <p>
                                Don’t miss out on your chance to be part of our community of learners.
                                Enroll now and begin your journey towards {{ $course->name }} mastery.
                                Are you ready to take the next step in your career or personal development? Click the buy
                                now,
                                and Enroll Me buttons next to this to get started!
                            </p>
                        </div>
                    </div>
                </div>
            </div>

    </div>

    </section>

    </div>
    
@endsection
