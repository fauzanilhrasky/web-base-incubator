@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 text-center user-assignment-title">User Assignment Assessment Page</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-md-12 col-lg-10">
            <div class="card bg-white mt-5">
                <h3 class="text-center user-name mt-3">FAUZAN ILHARASKY</h3>
                <div class="card-body">
                    <div class="table-responsive mt-4 mb-4 user-table-container">
                        <table class="table align-middle mb-0 bg-white table-striped">
                            <thead class="bg-dark">
                                <tr>
                                    <th class="text-white">Course Material Title</th>
                                    {{-- <th class="text-white">Category</th> --}}
                                    <th class="text-white">Assignment link</th>
                                    <th class="text-white">Value</th>
                                    <th class="text-white">Comment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://via.placeholder.com/50" alt="Course Image" class="rounded-circle" style="width: 50px; height: 50px;">
                                            <div class="ms-4">
                                                <p class="fw-bold mb-1">Learn Frontend Developer for Beginners</p>
                                                <p class="text-muted mb-0">Beginner Level</p>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- <td>
                                        <p class="fw-normal mb-1">Programming</p>
                                    </td> --}}
                                    <td>
                                        <a href="#">gdrive/link/example</a>
                                    </td>
                                    <td>
                                        <h6>90%</h6>
                                    </td>
                                    <td>
                                        Great job! Keep coding and growing!
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- PDF Button -->
                <div class="form-group d-flex justify-content-center user-button-container">
                    <button type="button" class="btn btn-primary btn-lg w-25 sm:w-1/4 mb-4 mt-4">Generate to PDF</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection