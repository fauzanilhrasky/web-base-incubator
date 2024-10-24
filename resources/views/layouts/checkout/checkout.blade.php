@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ __('Base Incubator | Checkout') }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="section-body">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <!-- Background Column -->
                        <div class="col-12 bg-white-400 p-4 ">

                            {{-- checkout --}}
                            <div class="container mt-4">
                                <main>
                                    <div class="bg-white p-4 rounded shadow-sm">
                                        <div class="py-6 text-center">
                                            <img class="d-block mx-auto mb-4"
                                                src="https://tse3.mm.bing.net/th?id=OIP.XxkMJ5Ywcu6328Xfs9lMLAAAAA&pid=Api&P=0&h=180"
                                                alt="" width="72" height="67">
                                            <h3 class="text-dark">Checkout for {{ $course->name }}</h3>
                                            <p class="lead">Complete the form below to proceed with your payment.</p>
                                        </div>

                                        <form id="checkout-form" action="{{ route('course.payment', $course->id) }}" method="POST"
                                            enctype="multipart/form-data" class="needs-validation" novalidate>

                                            @csrf
                                            <div class="row g-3 justify-content-center">
                                                <hr class="my-4">
                                                <div class="text-center">
                                                    <label for="card-image" class="form-label">QR Code Image</label>
                                            
                                                    <img id="card-image"
                                                        src="https://tse1.mm.bing.net/th?id=OIP.3jdaKGRcvypGXL-mNIQ8lwHaHa&pid=Api&P=0&h=180"
                                                        alt="Card Image" class="img-fluid rounded shadow-sm mx-auto d-block w-25">
                                                    
                                                    <small class="text-dark">
                                                        <h6 class="mt-2">qris payment scan image</h6>
                                                    </small>
                                                </div>
                                            
                                                <hr>

                                                


                                                  {{-- Upload Payment Proof --}}
                                            <div class="col-md-12 mt-4">
                                                <label for="payment-proof" class="form-label text-dark">Upload Payment</label>
                                                <input type="file" class="form-control" id="payment-proof" name="payment_proof" required>
                                                <div class="invalid-feedback">
                                                    Payment proof is required.
                                                </div>
                                            </div>
                                
                                            </div>

                                              <!-- Course Price -->
                                              <div class="col-md-3 mt-5">
                                                <label for="cc-expiration" class="form-label">Price :</label>
                                                <h5 class="mt-2" style="color:rgb(255, 20, 20)">
                                                    {{ $course->price }}
                                                    <span style="font-weight: normal; font-style:italic; font-size: 12px; color: gray;">
                                                        /6 months
                                                    </span>
                                                </h5>
                                            </div>
                                        
                                        <button id="checkout-btn" class="w-100 btn btn-primary btn-lg mt-5" type="submit">
                                            Continue to checkout
                                        </button>
                                    </form>
                                </main>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- SweetAlert2 notification --}}
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.getElementById('checkout-btn').addEventListener('click', function (event) {
                event.preventDefault(); // Mencegah form terkirim langsung
                
                // SweetAlert2 notification
                Swal.fire({
                    title: 'Checkout Successfully!',
                    text: 'Successfully, you have checked out. Please wait for confirmation of acceptance from the admin. If it has been accepted, please always check your "My Course" page.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit form jika pengguna klik 'OK'
                        document.getElementById('checkout-form').submit();
                    }
                });
            });
        </script>
    @endpush

@endsection
