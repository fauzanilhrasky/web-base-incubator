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


                            <!-- Section Title -->
                            <h2 class="section-title">Categories</h2>
                            <p class="section-lead">Find online learning tutorials that suit your interests</p>

                            
                            {{-- checkout --}}

                            <div class="container mt-4">
                                <main>
                                  <div class="bg-white p-4 rounded shadow-sm"> 
                                    <div class="py-6 text-center">
                                      <img class="d-block mx-auto mb-5" src="https://tse3.mm.bing.net/th?id=OIP.XxkMJ5Ywcu6328Xfs9lMLAAAAA&pid=Api&P=0&h=180" alt="" width="72" height="67">
                                      <h3 class="text-dark">Checkout for {{ $course->name }}</h3>
                                      <p class="lead">Complete the form below to proceed with your payment.</p>
                                    </div>
                                    
                                    {{-- <div class="row g-5">
                                      <div class="col-md-5 col-lg-4 order-md-last custom-border"> 
                                          <div class="bg-white p-4 rounded shadow-sm"> <!-- Background putih di sini -->
                                              <h4 class="d-flex justify-content-between align-items-center mb-3">
                                                  <span class="text-warning">Your cart</span>
                                              </h4>
                                              <ul class="list-group mb-3">
                                                  <li class="list-group-item d-flex justify-content-between lh-sm">
                                                      <div>
                                                          <h6 class="my-0">{{ $course->name }}</h6>
                                                          <small class="text-muted">{{ \Illuminate\Support\Str::limit($course->detail, 50) }}</small>
                                                      </div>
                                                      <span class="text-muted">Rp. {{ number_format($course->price, 0, ',', '.') }}</span>
                                                  </li>
                                                  <li class="list-group-item d-flex justify-content-between">
                                                      <span>Total (IDR)</span>
                                                      <strong>Rp. {{ number_format($course->price, 0, ',', '.') }}</strong>
                                                  </li>
                                              </ul>
                                      
                                              <form class="card p-2">
                                                  <div class="input-group">
                                                      <input type="text" class="form-control" placeholder="Promo code">
                                                      <button type="submit" class="btn btn-secondary">Redeem</button>
                                                  </div>
                                              </form>
                                          </div>
                                      </div> --}}
                                      
                              
                                     
                                        <div class="bg-white p-4 rounded shadow-sm"> <!-- Tambahkan background putih di sini -->
                                          <h4 class="mb-3">Payment address</h4>
                                          <form action="" method="POST" class="needs-validation" novalidate>
                                            @csrf
                                            <div class="row g-3">
                                              <div class="col-sm-6">
                                                <label for="fullName" class="form-label">FullName</label>
                                                <input type="text" class="form-control" id="fullName" placeholder="Full Name" required>
                                                <div class="invalid-feedback">
                                                  Valid Full name is required.
                                                </div>
                                              </div>
                              
                                              <div class="col-sm-6">
                                                <label for="userName" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="userName" placeholder="username" required>
                                                <div class="invalid-feedback">
                                                  Valid username is required.
                                                </div>
                                              </div>
                              
                                              <div class="col-12">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" placeholder="you@example.com" required>
                                                <div class="invalid-feedback">
                                                  Please enter a valid email address for shipping updates.
                                                </div>
                                              </div>
                              
                                              <div class="col-12">
                                                <label for="phone" class="form-label">Phone</label>
                                                <input type="tel" class="form-control" id="phone" placeholder="Your Phone" required>
                                                <div class="invalid-feedback">
                                                  Please enter your Phone Number.
                                                </div>
                                              </div>
                              
                                              <div class="col-md-5">
                                                <label for="country" class="form-label">Country</label>
                                                <select class="form-select" id="country" required>
                                                  <option value="">Choose...</option>
                                                  <option>Indonesia</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                  Please select a valid country.
                                                </div>
                                              </div>
                              
                                              <div class="col-md-4">
                                                <label for="state" class="form-label">State</label>
                                                <select class="form-select" id="state" required>
                                                  <option value="">Choose...</option>
                                                  <option>DKI Jakarta</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                  Please provide a valid state.
                                                </div>
                                              </div>
                              
                                              <div class="col-md-3">
                                                <label for="zip" class="form-label">Zip</label>
                                                <input type="text" class="form-control" id="zip" placeholder="" required>
                                                <div class="invalid-feedback">
                                                  Zip code required.
                                                </div>
                                              </div>
                                            </div>
                              
                                            <hr class="my-4">
                              
                                           
                              
                                            <div class="row gy-3">
                                                <div class="col-md-4">
                                                    <label for="card-image" class="form-label">QR Code Image</label>
                                                    <!-- Gambar ditampilkan di sini -->
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
                                        </div>
                                      
                                    </div>
                                  </div>
                                </main>
                              

                            <!-- Form Payment -->
                           {{-- <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Kursus: {{ $course->name }}
                                    </h5>
                                    <p>
                                        Detail: {{ $course->detail }}
                                    </p>
                                    <p>
                                        Harga: {{ $course->price }}
                                    </p>
                                     <form action="{{ route('course.payment', $course->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
                                    </form> --}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection

{{-- @section('scripts')
<script>
    document.getElementById('checkoutButton').addEventListener('click', function (e) {
        e.preventDefault(); // Mencegah form langsung terkirim

        Swal.fire({
            icon: 'info', // Icon yang digunakan: info
            title: 'Processing Payment',
            text: 'Silahkan anda untuk menunggu verifikasi di terima oleh admin. Ketika sudah terima, silahkan cek halaman My Course anda.',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika user mengklik tombol OK, kirim form
                document.getElementById('paymentForm').submit();
            }
        });
    });
</script>
@endsection --}}