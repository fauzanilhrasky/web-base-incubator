@extends('layouts.landing')

@section('content')



<section class="banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-12">
                <div class="row">
                    <div class="col-lg-6 col-12 copywriting">
                        <p class="story">
                            LEARN FROM EXPERT
                        </p>
                        <h1 class="header">
                            <span class="text-white"> Start Developing your ideas by</span> <span class="text-yellow">Learning Online</span> 
                        </h1>
                        <p class="support">
                            Our app can help junior developers who are really <br> passionate about pursuing online learning.
                        </p>
                        <p class="cta">
                            <a href="{{ route('register') }}" class="btn cta-btn">
                                Get Started
                            </a>
                        </p>
                    </div>
                    <div class="col-lg-6 col-12 text-center">
                        <a href="#">
                            <img src="{{ asset('img/banner-Photoroom.png') }}" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="banner2">
    <div class="row brands">
        <div class="col-lg-12 col-12 text-center">
            <img src="{{ asset('img/brands.png') }}" alt="">
        </div>
    </div>
</section>

<section id="explanation" class="explanation section dark-background">
    <img src="{{ asset('img/penjelasan.png') }}" alt="">
  
        <div class="container">
          <div class="row justify-content-center aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
            <div class="col-xl-10">
              <div class="text-center">
                <div class="container section-title aos-init aos-animate" data-aos="fade-up">
                    <h2 class="text-white">OUR EXPLANATION</h2>
                    
                  </div>

                <h1 class="primary-header">
                    Forward Innovation
                </h1>

                <p class="support">
                    Our mission is to drive sustainable growth by fostering a culture of innovation and excellence.<br> 
                    We are committed to delivering cutting-edge solutions that exceed our customers' expectations,<br>
                    leveraging the latest technologies and creative approaches.
                    <br>
                    <br>
                    Through continuous improvement and a passion for innovation, We aim to set new standards in our industry, <br> 
                    ensuring long-term success for our stakeholders and making a positive impact on the communities we serve 
                </p>
            
              </div>
            </div>
          </div>
        </div>
  
      </section>




<section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title aos-init aos-animate" data-aos="fade-up">
        <h2 class="service">Services</h2>
        <p>Check Our <span class="description-title">Services</span></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-3 col-md-6 d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-activity icon"></i></div>
              <h4><a href="" class="stretched-link">Incubation</a></h4>
              <p>Our incubation services are designed to develop innovative ideas and turn them into viable solutions.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
              <h4><a href="" class="stretched-link">Inovation</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
              <h4><a href="" class="stretched-link">Workshop</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-broadcast icon"></i></div>
              <h4><a href="" class="stretched-link">Training</a></h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section>

<section id="call-to-action" class="call-to-action section dark-background">
    <img src="{{ asset('img/calling.png') }}" alt="">
  
        <div class="container">
          <div class="row justify-content-center aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
            <div class="col-xl-10">
              <div class="text-center">
                <h3 class="header">Get ready the Founder’s Journey!</h3>
                <p>
                    First time Founder? Or is this your second time? No problem, we are ready to help you. <br>
                     Make sure you fill out the form and choose the incubation method you want.
                     <br>
                     <br>
                     The next wave will be held in October 2024 - January 2025 (For Guided Incubation) <br>
                     Self-incubation can be done anytime!
                </p>
                <a class="cta-btn1" href="{{ route('login') }}">Apply Now ></a>
                <a class="cta-btn" href="#">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
  
      </section>

      


<section class="benefits">
    <div class="container">
        <div class="row text-center pb-70">
            <div class="col-lg-12 col-12 header-wrap">
                <p class="story">
                    OUR SUPER BENEFITS
                </p>
                <h2 class="primary-header">
                    Portofolio
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-12">
                <div class="item-benefit">
                    <img src="{{ asset('img/ic_globe.png') }}" class="icon" alt="">
                    <h3 class="title">
                        Diversity
                    </h3>
                    <p class="support">
                        Learn from anyone around the <br> world and get a new skills
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="item-benefit">
                    <img src="{{ asset('img/ic_globe-1.png') }}" class="icon" alt="">
                    <h3 class="title">
                        A.I Guideline
                    </h3>
                    <p class="support">
                        Lara will help you to choose <br> which path that suitable for you
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="item-benefit">
                    <img src="{{ asset('img/ic_globe-2.png') }}" class="icon" alt="">
                    <h3 class="title">
                        1-1 Mentoring
                    </h3>
                    <p class="support">
                        We will ensure that you will get <br> what you really do need
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="item-benefit">
                    <img src="{{ asset('img/ic_globe-3.png') }}" class="icon" alt="">
                    <h3 class="title">
                        Future Job
                    </h3>
                    <p class="support">
                        Get your dream job in your dream <br> company together with us
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="banner3">
    <div class="row brands">
        <div class="text-center d-flex flex-column align-items-center">
            <h1>OUR PARTNERS</h1>
            <p>All Partners Provided</p>
            <div class="col-lg-12 col-12 text-center">
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('img/brands.png') }}" alt="Brand Image 1">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/brands.png') }}" alt="Brand Image 2">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/brands.png') }}" alt="Brand Image 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev custom-carousel-control" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next custom-carousel-control" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>




    

<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center active">
    <i class="bi bi-arrow-up-short">
        </i>
    </a>


@endsection