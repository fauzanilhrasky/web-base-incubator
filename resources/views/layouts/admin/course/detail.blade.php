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
        
                                            <!-- Form untuk menambahkan file, teks, dan gambar -->
                                            {{-- <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="textInput{{ $i }}" class="form-label">Add Text:</label>
                                                    <input type="text" class="form-control" id="textInput{{ $i }}" name="textInput{{ $i }}" placeholder="Enter some text">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="fileInput{{ $i }}" class="form-label">Upload File:</label>
                                                    <input type="file" class="form-control" id="fileInput{{ $i }}" name="fileInput{{ $i }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="imageInput{{ $i }}" class="form-label">Upload Image:</label>
                                                    <input type="file" class="form-control" id="imageInput{{ $i }}" name="imageInput{{ $i }}" accept="image/*">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form> --}}
        
                                            <!-- Tampilkan data yang sudah diupload -->
                                            {{-- <div class="mt-3">
                                                <h5>Uploaded Data:</h5>
                                                <!-- Logika untuk menampilkan data yang telah di-upload -->
                                                <!-- Misalnya menggunakan loop untuk menampilkan data yang sudah ada -->
                                                @foreach($uploadedData as $data)
                                                    <div class="border p-2 mb-2">
                                                        <p><strong>Text:</strong> {{ $data->text }}</p>
                                                        @if ($data->file)
                                                            <p><strong>File:</strong> <a href="{{ asset('uploads/' . $data->file) }}">{{ $data->file }}</a></p>
                                                        @endif
                                                        @if ($data->image)
                                                            <p><strong>Image:</strong> <img src="{{ asset('uploads/' . $data->image) }}" alt="Image" style="max-width: 100px;"></p>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div> --}}
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
