@extends('layouts.app')

@section('title', 'Add Multiple Materials')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Add Materials to Course: ') . $course->name }}</div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('course.material.store', $course->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div id="materials-container">
                            <div class="material-group">
                                <div class="row mb-3">
                                    <label for="materials[0][title]" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>
                                    <div class="col-md-6">
                                        <input id="materials[0][title]" type="text" class="form-control" name="materials[0][title]" required autofocus>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="materials[0][content]" class="col-md-4 col-form-label text-md-end">{{ __('Content') }}</label>
                                    <div class="col-md-6">
                                        <textarea id="materials[0][content]" class="form-control" name="materials[0][content]" required></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="materials[0][file]" class="col-md-4 col-form-label text-md-end">{{ __('File') }}</label>
                                    <div class="col-md-6">
                                        <input id="materials[0][file]" type="file" class="form-control" name="materials[0][file]">
                                    </div>
                                </div>

                                <hr>
                            </div>
                        </div>

                        <button type="button" id="add-material-btn" class="btn btn-info">Add Another Material</button>

                        <div class="row mb-0 mt-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">{{ __('Save Materials') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let materialCount = 1;
    document.getElementById('add-material-btn').addEventListener('click', function () {
        const materialsContainer = document.getElementById('materials-container');

        const materialGroup = document.createElement('div');
        materialGroup.classList.add('material-group');

        materialGroup.innerHTML = `
            <div class="row mb-3">
                <label for="materials[\${materialCount}][title]" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>
                <div class="col-md-6">
                    <input id="materials[\${materialCount}][title]" type="text" class="form-control" name="materials[\${materialCount}][title]" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="materials[\${materialCount}][content]" class="col-md-4 col-form-label text-md-end">{{ __('Content') }}</label>
                <div class="col-md-6">
                    <textarea id="materials[\${materialCount}][content]" class="form-control" name="materials[\${materialCount}][content]" required></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="materials[\${materialCount}][file]" class="col-md-4 col-form-label text-md-end">{{ __('File') }}</label>
                <div class="col-md-6">
                    <input id="materials[\${materialCount}][file]" type="file" class="form-control" name="materials[\${materialCount}][file]">
                </div>
            </div>
            <hr>
        `;

        materialsContainer.appendChild(materialGroup);
        materialCount++;
    });
</script>
@endsection
