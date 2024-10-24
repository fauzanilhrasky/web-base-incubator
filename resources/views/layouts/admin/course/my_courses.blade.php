@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('personal learning courses') }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="section-body">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12 bg-white-400 p-4 rounded shadow-sm">
                            <!-- Section Title -->
                            <h2 class="section-title">My Courses</h2>
                            <p class="section-lead">Courses you have registered for</p>
        
                            <!-- Check if there are any payments -->
                            @if ($payments->isEmpty())
                                <p>You have not registered for any courses..</p>
                            @else
                                <!-- Course Cards -->
                                <div class="row">
                                    @foreach ($payments as $payment)
                                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                            <a href="{{ route('course.showdetail', $payment->course->id) }}" class="text-decoration-none">
                                                <div class="article article-style-b d-flex flex-column h-100">
                                                    <div class="article-header">
                                                        <div class="article-image">
                                                            <img src="/images/{{ $payment->course->image }}" alt="{{ $payment->course->name }}" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;">
                                                        </div>
                                                    </div>
                                                    <div class="article-details flex-grow-1">
                                                        <div class="article-title">
                                                            <h2 class="text-dark">{{ $payment->course->name }}</h2>
                                                        </div>
                                                        <p>{{ \Illuminate\Support\Str::limit($payment->course->detail, 100) }}</p>
                                                    </div>
                                                    <div class="article-footer d-flex justify-content-between align-items-center">
                                                        <div class="text-left">
                                                            <h5 class="text-dark">{{ $payment->course->price }}</h5>
                                                        </div>
                                                        <div>
                                                            <span>
                                                                Click Here <i class="fas  fa-mouse-pointer" style="margin-right: 6px"></i>
                                                            </span>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        

        {{-- <table class="table align-middle mb-0 bg-white">
            <h2>My Courses</h2>

                @if ($payments->isEmpty())
                    <p>You have not registered for any courses..</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Pembayaran</th>
                                <th>Nama Kursus</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td>
                                        <img src="/images/{{ $payment->course->image }}" alt="{{ $payment->course->name }}"
                                            style="width: 100px; height: 100px"  />
                                    </td>
                                    <td>{{ $payment->course->name }}</td>
                                    <td>
                                        <a href="{{ route('course.show', $payment->course->id) }}"
                                            class="btn btn-info">Lihat Kursus</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                @endif
        </table>  --}}


    </div>
@endsection
