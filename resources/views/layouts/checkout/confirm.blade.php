@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Rincian Pembayaran</h2>
    
    <div class="card">
        <div class="card-header">Informasi Pembayaran</div>
        <div class="card-body">
            <p><strong>Nama Pengguna:</strong> {{ $payment->user->name }}</p>
            <p><strong>Email:</strong> {{ $payment->user->email }}</p>
            <p><strong>Jumlah Pembayaran:</strong> Rp.{{ $payment->amount}}</p>
            <p><strong>Status:</strong> {{ ucfirst($payment->status) }}</p>
            <p><strong>Bukti Pembayaran:</strong></p>
            @if($payment->payment_proof)
                <img src="{{ asset('images/' . $payment->payment_proof) }}" alt="Bukti Pembayaran" style="max-width: 300px;">
            @else
                <p>Tidak ada bukti pembayaran yang diunggah.</p>
            @endif
        </div>
    </div>

    <form action="{{ route('payment.confirm', $payment->id) }}" method="POST" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-success">Konfirmasi Pembayaran</button>
    </form>
</div>
@endsection
