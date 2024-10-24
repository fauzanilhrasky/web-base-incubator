@extends('layouts.app')

@section('title', 'Courses List')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Payment List Waiting for Confirmation</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">payment</a></div>
                <div class="breadcrumb-item">pending</div>
            </div>
        </div>

        <div class="container mt-5">
            <table class="table">
                <thead class="bg-dark">
                    <tr>
                        <th style="color:aliceblue">Payment ID</th>
                        <th style="color:aliceblue">Customer name</th>
                        <th style="color:aliceblue">Email</th>
                        <th style="color:aliceblue">Payment Amount</th>
                        <th style="color:aliceblue">Status</th>
                        <th style="color:aliceblue">Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @forelse($payments as $payment)
                        <tr>
                            <td>{{ $payment->id }}</td>
                            <td>{{ $payment->user->name }}</td>
                            <td>{{ $payment->user->email }}</td>
                            <td>{{ $payment->amount }}</td>
                            <td>{{ ucfirst($payment->status) }}</td>
                            <td>
                                <a href="{{ route('payment.details', $payment->id) }}" class="btn btn-info">Lihat Rincian</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No data available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection
