@extends('layouts.app')

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
            <h1>Payment Details</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Payment</a></div>
                <div class="breadcrumb-item">Pending</div>
            </div>
        </div>

        <div class="container">
            
            <div class="card mt-5">
                <div class="mt-5 text-center">
                    <h5>Customer Payment Information</h5>
                </div>
                
                <div class="card-body d-flex flex-column align-items-center mt-5 ">

                    <div class="mb-3 w-50">
                        <label for="userName" class="form-label"><strong>Username Customer:</strong></label>
                        <input type="text" class="form-control" id="userName" value="{{ $payment->user->name }}" readonly>
                    </div>
                
                    <div class="mb-3 w-50">
                        <label for="userEmail" class="form-label"><strong>Email:</strong></label>
                        <input type="email" class="form-control" id="userEmail" value="{{ $payment->user->email }}" readonly>
                    </div>
                
                    <div class="mb-3 w-50">
                        <label for="paymentAmount" class="form-label"><strong>Payment Amount:</strong></label>
                        <input type="text" class="form-control" id="paymentAmount" value=" {{ ($payment->amount) }}" readonly>
                    </div>
                
                    <div class="mb-3 w-50">
                        <label for="paymentStatus" class="form-label"><strong>Status:</strong></label>
                        <input type="text" class="form-control" id="paymentStatus" value="{{ ucfirst($payment->status) }}" readonly>
                    </div>
                
                    <div class="mb-3 mt-3 w-50">
                        <p><strong>Proof of payment:</strong></p>
                        <p>Please click to see a clearer image display</p>
                        @if($payment->payment_proof)
                            <a href="{{ asset('images/' . $payment->payment_proof) }}" target="_blank">
                                <img src="{{ asset('images/' . $payment->payment_proof) }}" alt="Bukti Pembayaran" style="max-width: 300px; cursor: pointer;">
                            </a>
                        @else
                            <p>No proof of payment uploaded.</p>
                        @endif
                    </div>
                    
                
                </div>
                <form action="{{ route('payment.confirm', $payment->id) }}" method="POST" class="mt-3 d-flex flex-column align-items-center mb-4 ">
                    @csrf
                    <button type="submit" class="btn w-25" style="background-color: #f3bf39;" id="paymentButton" onclick="changeButtonColor()">
                        <h7><strong>Payment Confirmation</strong></h7>
                    </button>
                
                    
                </form>
            </div>

            
        </div>
    </section>
</div>

<script>
    function changeButtonColor() {
        // Mengubah warna tombol menjadi hijau (success)
        document.getElementById('paymentButton').style.backgroundColor = '#28a745';
    }
</script>
@endsection
