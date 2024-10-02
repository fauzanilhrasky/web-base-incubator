@extends('layouts.app')

@section('title', 'Detail Course')

@section('content')
    <div class="main-content">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ $course->name }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="section-body">
                <h2 class="section-title">Course Details</h2>
                <p class="section-lead">Below is the detailed information of the selected course.</p>

                <div class="row justify-content-center">
                    <div class="col-lg-11 bg-white p-4" style="border-radius: 10px;">
                       
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            
                            @foreach ($materials as $index => $material)
                                <div class="accordion-item" style="margin-bottom: 15px; border-radius: 10px; overflow: hidden;">
                                    <h1 class="accordion-header" id="heading{{ $index }}">
                                        <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" 
                                                data-bs-toggle="collapse" 
                                                data-bs-target="#panelsStayOpen-collapse{{ $index }}" 
                                                aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" 
                                                aria-controls="panelsStayOpen-collapse{{ $index }}" 
                                                style="border-radius: 0;">
                                            <i class="fas fa-question-circle fa-sm me-2 opacity-70"></i> 
                                            <strong style="font-size: 1.2em;">{{ $material->title }}</strong>
                                        </button>
                                    </h1>
                                    
                                    <div id="panelsStayOpen-collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}">
                                        <div class="accordion-body">
                                            <strong>DESKRIPSI :</strong> {{ $material->content }}<br>
                                            @if ($material->file)
                                                <strong>File:</strong> <a href="{{ asset('files/' . $material->file) }}">{{ $material->file }}</a><br>
                                            @endif
                                            @if ($material->image)
                                                <strong>Image:</strong> <img src="{{ asset('uploads/' . $material->image) }}" alt="Image" style="max-width: 100px;">
                                            @endif
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
@endsection
