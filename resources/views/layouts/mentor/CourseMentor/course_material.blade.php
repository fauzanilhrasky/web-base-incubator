@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('Courses') }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <table class="table align-middle mb-0 bg-white table-striped">
            <thead class="bg-dark">
                <tr>
                    <th class="text-white">Name</th>
                    <th  class="text-white">Category</th>
                    <th  class="text-white">Status</th>
                    <th  class="text-white">Price</th>
                    <th  class="text-white">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $course)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ $course->image ? asset('images/' . $course->image) : 'https://via.placeholder.com/45' }}"
                                    alt="{{ $course->name }}" style="width: 75px; height: 55px"/>
                                <div class="ms-4">
                                    <p class="fw-bold mb-1">{{ $course->name }}</p>
                                    <p class="text-muted mb-0">{{ $course->detail }}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ ucfirst($course->category) }}</p>
                        </td>
                        <td>
                            <span
                                class="badge {{ $course->isPaid ? 'badge-success' : 'badge-primary' }} rounded-pill d-inline">
                                {{ $course->isPaid ? 'Paid' : 'Free' }}
                            </span>
                        </td>
                        <td>
                            {{ $course->price ? $course->price : 'Free' }}
                        </td>
                        <td>
                            <a href="{{ route('CourseMentor.showmaterial', $course->id) }}" class="btn btn-link btn-sm btn-rounded">
                                Detail   
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">You have no courses yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
