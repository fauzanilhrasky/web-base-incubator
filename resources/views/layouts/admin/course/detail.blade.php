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

                <div class="accordion" id="accordionExampleY">
                    @for ($i = 1; $i <= 12; $i++)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $i }}Y">
                                <button class="accordion-button {{ $i === 1 ? '' : 'collapsed' }}" type="button" 
                                        data-mdb-toggle="collapse" 
                                        data-mdb-target="#collapse{{ $i }}Y" 
                                        aria-expanded="{{ $i === 1 ? 'true' : 'false' }}" 
                                        aria-controls="collapse{{ $i }}Y">
                                    <i class="fas fa-question-circle fa-sm me-2 opacity-70"></i>Accordion Item #{{ $i }}
                                </button>
                            </h2>
                            <div id="collapse{{ $i }}Y" class="accordion-collapse collapse {{ $i === 1 ? 'show' : '' }}" aria-labelledby="heading{{ $i }}Y" data-mdb-parent="#accordionExampleY">
                                <div class="accordion-body">
                                    <strong>This is item #{{ $i }}'s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element.
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </section>
    </div>
@endsection
