@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Pembayaran Menunggu Konfirmasi</h2>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID Pembayaran</th>
                <th>Nama Pengguna</th>
                <th>Email</th>
                <th>Jumlah Pembayaran</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->user->name }}</td>
                    <td>{{ $payment->user->email }}</td>
                    <td>Rp.{{ $payment->amount }}</td>
                    <td>{{ ucfirst($payment->status) }}</td>
                    <td>
                        <a href="{{ route('payment.details', $payment->id) }}" class="btn btn-info">Lihat Rincian</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
