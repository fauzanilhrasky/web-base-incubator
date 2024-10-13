<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <title>Pricing BASE INCUBATOR</title>
</head>

<body>

   @include('components.landingpage.navbar')

   <section class="pricing">
    <div class="container">
        <div class="row pb-70 text-center">
            <div class="col-12 copywriting">
                <p class="story">GOOD INVESTMENT</p>
                <h2 class="primary-header text-white">Start Your Journey</h2>
                <p class="support">Learn how to speak in public to demonstrate your <br> final project and receive important feedback.</p>
                <p class="mt-3">
                    <a href="#" class="vw btn btn-master btn-primary me-3">View Syllabus</a>
                </p>
            </div>
        </div>

        <div class="row text-center">
            <!-- Pricing Table 1 -->
            <div class="col-lg-4 col-md-6 col-12 mb-2">
                <div class="table-pricing paket-biasa">
                    <p class="story">Medium</p>
                    <h1 class="price">$140K</h1>
                    <div class="item-benefit-pricing mb-4">
                        <img src="{{ asset('images/ic_check.svg') }}" alt="">
                        <p>1-1 Mentoring Program</p>
                    </div>
                    <div class="item-benefit-pricing mb-4">
                        <img src="{{ asset('images/ic_check.svg') }}" alt="">
                        <p>Final Project Certificate</p>
                    </div>
                    <div class="item-benefit-pricing mb-4">
                        <img src="{{ asset('images/ic_check.svg') }}" alt="">
                        <p>Offline Course Videos</p>
                    </div>
                    <div class="item-benefit-pricing">
                        <img src="{{ asset('images/ic_check.svg') }}" alt="">
                        <p>Future Job Opportunity</p>
                    </div>
                    <p>
                        <a href="#" class="btn btn-master btn-secondary w-100 mt-3">Start With This Plan</a>
                    </p>
                </div>
            </div>

            <!-- Pricing Table 2 -->
            <div class="col-lg-4 col-md-6 col-12 mb-2">
                <div class="table-pricing paket-gila">
                    <p class="story">PREMIUM</p>
                    <h1 class="price">$280K</h1>
                    <div class="item-benefit-pricing mb-4">
                        <img src="{{ asset('images/ic_check.svg') }}" alt="">
                        <p>Pro Techstack Kit</p>
                    </div>
                    <div class="item-benefit-pricing mb-4">
                        <img src="{{ asset('images/ic_check.svg') }}" alt="">
                        <p>iMac Pro 2021 & Display</p>
                    </div>
                    <div class="item-benefit-pricing mb-4">
                        <img src="{{ asset('images/ic_check.svg') }}" alt="">
                        <p>1-1 Mentoring Program</p>
                    </div>
                    <div class="item-benefit-pricing mb-4">
                        <img src="{{ asset('images/ic_check.svg') }}" alt="">
                        <p>Final Project Certificate</p>
                    </div>
                    <div class="item-benefit-pricing mb-4">
                        <img src="{{ asset('images/ic_check.svg') }}" alt="">
                        <p>Offline Course Videos</p>
                    </div>
                    <div class="item-benefit-pricing mb-4">
                        <img src="{{ asset('images/ic_check.svg') }}" alt="">
                        <p>Future Job Opportunity</p>
                    </div>
                    <div class="item-benefit-pricing mb-4">
                        <img src="{{ asset('images/ic_check.svg') }}" alt="">
                        <p>Premium Design Kit</p>
                    </div>
                    <div class="item-benefit-pricing">
                        <img src="{{ asset('images/ic_check.svg') }}" alt="">
                        <p>Website Builder</p>
                    </div>
                    <p>
                        <a href="{{ route('register') }}" class="btn btn-master btn-dark w-100 mt-3">Take This Plan</a>
                    </p>
                </div>
            </div>

            <!-- Pricing Table 3 -->
            <div class="col-lg-4 col-md-6 col-12 mb-2">
                <div class="table-pricing paket-biasa">
                    <p class="story">beginners</p>
                    <h1 class="price">$100K</h1>
                    <div class="item-benefit-pricing mb-4">
                        <img src="{{ asset('images/ic_check.svg') }}" alt="">
                        <p>1-1 Mentoring Program</p>
                    </div>
                    <div class="item-benefit-pricing mb-4">
                        <img src="{{ asset('images/ic_check.svg') }}" alt="">
                        <p>Final Project Certificate</p>
                    </div>
                    <div class="item-benefit-pricing mb-4">
                        <img src="{{ asset('images/ic_check.svg') }}" alt="">
                        <p>Offline Course Videos</p>
                    </div>
                    <div class="item-benefit-pricing">
                        <img src="{{ asset('images/ic_check.svg') }}" alt="">
                        <p>Future Job Opportunity</p>
                    </div>
                    <p>
                        <a href="#" class="btn btn-master btn-secondary w-100 mt-3">Start With This Plan</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="row pb-70 mt-5">
            <div class="col-lg-12 col-12 text-center">
                <img src="{{ asset('images/brands.png') }}" height="30" alt="">
            </div>
        </div>
    </div>
   </section>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
{{-- <footer>
    @include('components.landingpage.footer')
</footer> --}}

</html>
