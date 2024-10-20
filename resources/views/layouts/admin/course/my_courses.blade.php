@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('Mentor') }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <table class="table align-middle mb-0 bg-white">
            <<h2>Kursus Saya</h2>

                @if ($payments->isEmpty())
                    <p>Anda belum mendaftar pada kursus mana pun.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Pembayaran</th>
                                <th>Nama Kursus</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td>
                                        <img src="/images/{{ $payment->course->image }}" alt="{{ $payment->course->name }}"
                                            style="width: 100px; height: 100px"  />
                                    </td>
                                    <td>{{ $payment->course->name }}</td>
                                    <td>
                                        <a href="{{ route('course.show', $payment->course->id) }}"
                                            class="btn btn-info">Lihat Kursus</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                @endif
        </table>


    </div>
@endsection
