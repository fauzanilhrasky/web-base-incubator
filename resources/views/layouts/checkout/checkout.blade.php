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
                                            <img class="d-block mx-auto mb-5"
                                                src="https://tse3.mm.bing.net/th?id=OIP.XxkMJ5Ywcu6328Xfs9lMLAAAAA&pid=Api&P=0&h=180"
                                                alt="" width="72" height="67">
                                            <h3 class="text-dark">Checkout for {{ $course->name }}</h3>
                                            <p class="lead">Complete the form below to proceed with your payment.</p>
                                        </div>

                                        {{-- <div class="bg-white p-4 rounded shadow-sm"> <!-- Tambahkan background putih di sini -->
                                          <h4 class="mb-3">Payment address</h4>
                                          <form action="" method="POST" class="needs-validation" novalidate>
                                            @csrf
                                            <div class="row g-3">
                              
                                            <hr class="my-4">

                                            <div class="row gy-2">
                                                <div class="col-md-4">
                                                    <label for="card-image" class="form-label">QR Code Image</label>
                                                   
                                                    <div>
                                                      <img id="card-image" src="https://tse1.mm.bing.net/th?id=OIP.3jdaKGRcvypGXL-mNIQ8lwHaHa&pid=Api&P=0&h=180" alt="Card Image" class="img-fluid rounded shadow-sm">
                                                    </div>
                                                    <small class=" text-dark"><h6 class="mt-2">qris payment scan image</h6></small>
                                                    <div class="invalid-feedback">
                                                      Image is required
                                                    </div>
                                                  </div>               
                              
                                                  <div class="col-md-0 mt-4">
                                                    <label for="cc-file" class="form-label text-dark">Upload Credit Card Image</label>
                                                    <input type="file" class="form-control" id="cc-file" required>
                                                    <div class="invalid-feedback">
                                                      Credit card image is required.
                                                    </div>
                                                  </div>

                                                  <hr>
                                                  
                                              <div class="col-md-3 mt-4">
                                                <label for="cc-expiration" class="form-label">Price :</label>
                                                <h5 class="text-danger mt-2">
                                                     {{ $course->price }} <span style="font-weight: normal; font-style:italic; font-size: 12px; color: gray;">/6 months</span>
                                                </h5>
                                              </div>
                              
                                              
                                            <hr>
                                            <form action="{{ route('course.payment', $course->id) }}" method="POST">
                                                @csrf
                                            <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                                            </form>
                                          </form>
                                        </div> --}}

                                        <form action="{{ route('course.payment', $course->id) }}" method="POST"
                                            enctype="multipart/form-data" class="needs-validation" novalidate>

                                            @csrf
                                            <div class="row g-3">
                                                <hr class="my-4">
                                                <label for="card-image" class="form-label">QR Code Image</label>

                                                <div>
                                                    <img id="card-image"
                                                        src="https://tse1.mm.bing.net/th?id=OIP.3jdaKGRcvypGXL-mNIQ8lwHaHa&pid=Api&P=0&h=180"
                                                        alt="Card Image" class="img-fluid rounded shadow-sm">
                                                </div>
                                                <small class=" text-dark">
                                                    <h6 class="mt-2">qris payment scan image</h6>
                                                </small>
                                            </div>

                                            {{-- Upload Payment Proof --}}

                                            <div class="col-md-6 mt-4">
                                                <label for="payment-proof" class="form-label text-dark">Upload
                                                    Payment</label>
                                                <input type="file" class="form-control" id="payment-proof"
                                                    name="payment_proof" required>
                                                <div class="invalid-feedback">
                                                    Payment proof is required.
                                                </div>
                                            </div>

                                            <!-- Course Price -->
                                            <div class="col-md-3 mt-4">
                                                <label for="cc-expiration" class="form-label">Price :</label>
                                                <h5 class="text-danger mt-2">
                                                    {{ $course->price }}
                                                    <span
                                                        style="font-weight: normal; font-style:italic; font-size: 12px; color: gray;">/6
                                                        months</span>
                                                </h5>
                                            </div>
                                    </div>

                                    <hr>
                                    <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to
                                        checkout</button>


                                    </form>

                            </div>
                        </div>
                        </main>


                    </div>
                </div>

            </div>
    </div>
    </div>
    </div>
    </section>

    </div>
@endsection
