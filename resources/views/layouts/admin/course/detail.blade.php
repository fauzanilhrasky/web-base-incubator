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
                        <h5>{{ $course->name }}</h5>
                        <p>{{ \Illuminate\Support\Str::limit($course->detail, 200) }}</p>
                        <p class="support">
                            Come learn and develop your skills by learning to understand more deeply and create your final project <br>
                            and receive important feedback.
                        </p>
                    </div>

                    <!-- Bagian 'Your Cart' di sebelah kanan -->
                    <div class="col-md-5 col-lg-4 custom-border">
                        <div class="cart-content bg-white p-4 rounded shadow-sm">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-warning">Your cart</span>
                            </h4>

                            <!-- Gambar kursus dengan badge Free/Paid -->
                            <ul class="list-group mb-3 position-relative">
                                <img src="/images/{{ $course->image }}" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;" alt="{{ $course->name }}">

                                <!-- Menampilkan badge Free atau Paid -->
                                <span class="badge-course position-absolute">
                                    @if ($course->isPaid)
                                        <span class="badge bg-danger">Paid</span>
                                    @else
                                        <span class="badge bg-primary">Free</span>
                                    @endif
                                    
                                </span>
                                <h5 class="text-dark mt-2">
                                    {{ $course->price }} 
                                    <span style="font-weight: normal; font-style:italic; font-size: 14px; color: gray;">/6 months</span>
                                </h5>
                            </ul>

                            <!-- Tombol Enroll Me atau Buy Now sesuai kategori kursus -->
                            <div class="d-grid gap-2">
                                @if ($course->isPaid)
                                <form action="{{ route('checkout', $course->id) }}" method="GET">
                                    <button type="submit" class="btn btn-primary btn-block">Buy Now</button>
                                </form>
                                @else
                                    <button class="btn btn-success btn-block">Enroll Me</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
