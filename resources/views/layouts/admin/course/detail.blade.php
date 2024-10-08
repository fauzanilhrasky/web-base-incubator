@extends('layouts.app')

@section('title', 'Detail Course')

@section('content')
    <div class="main-content">

        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            {{ $course->name }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="section-body">
                <h2 class="section-title">Course Details</h2>
                <p class="section-lead">
                    Below is the detailed information of the selected course.
                </p>
        
                <!-- Kolom dengan latar belakang putih -->
                <div class="row justify-content-center">
                    <div class="col-lg-11 bg-white p-4" style="border-radius: 10px;"> <!-- Tambahkan kelas bg-white dan padding -->
                        <!-- Accordion with rounded corners and spacing -->
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            @for ($i = 1; $i <= 12; $i++)
                                <div class="accordion-item" style="margin-bottom: 15px; border-radius: 10px; overflow: hidden;">
                                    <h1 class="accordion-header" id="heading{{ $i }}Y">
                                        <button class="accordion-button {{ $i === 1 ? '' : 'collapsed' }}" type="button" 
                                                data-bs-toggle="collapse" 
                                                data-bs-target="#panelsStayOpen-collapse{{ $i }}" 
                                                aria-expanded="{{ $i === 1 ? 'true' : 'false' }}" 
                                                aria-controls="panelsStayOpen-collapse{{ $i }}" 
                                                style="border-radius: 0;">
                                            <i class="fas fa-question-circle fa-sm me-2 opacity-70"></i> 
                                            <strong style="font-size: 1.2em;">Learning at the meeting of the week. {{ $i }}</strong>
                                        </button>
                                    </h1>
                                    
                                    <div id="panelsStayOpen-collapse{{ $i }}" class="accordion-collapse collapse {{ $i === 1 ? 'show' : '' }}" aria-labelledby="heading{{ $i }}Y">
                                        <div class="accordion-body">
                                            <strong>This is item #{{ $i }}'s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element.
        
                                            
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
        
    </div>
@endsection
