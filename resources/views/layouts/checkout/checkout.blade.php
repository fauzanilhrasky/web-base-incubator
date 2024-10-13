@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ __('Dashboard') }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="section-body">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <!-- Background Column -->
                        <div class="col-12 bg-white-400 p-4 rounded shadow-sm">


                            <!-- Section Title -->
                            <h2 class="section-title">Categories</h2>
                            <p class="section-lead">Find online learning tutorials that suit your interests</p>

                            <!-- Form Payment -->
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Kursus: {{ $course->name }}
                                    </h5>
                                    <p>
                                        Detail: {{ $course->detail }}
                                    </p>
                                    <p>
                                        Harga: {{ $course->price }}
                                    </p>
                                    <form action="{{ route('course.payment', $course->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
