@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                {{-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div> --}}

                
            </div>
        </div>
    </div>

    <section class="section">       
            <div class="section-body">
                {{-- <div class="flex items-center justify-end"> <!-- Flex container -->
                    <div class="relative"> <!-- Added relative position to the container -->
                        <input type="search" id="form1" class="form-control pl-10 pr-10 py-2 rounded-lg border-gray-300" placeholder="Search Course"/>
                        
                    </div>
                    
                    <!-- Search Button aligned to the right -->
                    <button id="search-button" type="button" class="btn btn-primary ml-2 rounded-lg">
                        <i class="fas fa-search"></i> <!-- Search icon -->
                    </button>
                </div> --}}

       
    <div class="container-fluid bg-blue">
        <select id="url_select66e28d97b5db92" 
        class="custom-select urlselect text-truncate w-100" 
        name="jump" 
        style="margin-top: 40px; margin-bottom: 20px; max-width: 400px ; border-radius: 8px 8px 8px 8px; border: 1px solid #252525;"  
        data-init-value="/course/index.php?categoryid=26">
        
        <option value="#">Programmer</option>
        <option value="#">Bootcamp</option>
        <option value="#">Internet Of Things (IoT)</option>
        <option value="#">UI/UX Design</option>
        <option value="#">Sales and Business</option>
        <option value="#">Microsoft Excel</option>
    </select>

    <!-- Tombol Create -->
<button class="crt btn btn-primary rounded-lg ml-3 lg:ml-auto">
    + Create
</button>

    
        <h2 class="section-title">category</h2>
        <p class="section-lead">Find online learning tutorials that suit your interests</p>
        <div class="row d-flex flex-wrap">
            <!-- Kolom 1 -->
            <div class="bd col-12 col-sm-6 col-md-6 col-lg-3 d-flex mb-4 ">
                <a href="target-page.html" class="d-flex flex-column flex-grow-1 text-decoration-none">
                    <article class="article article-style-b d-flex flex-column flex-grow-1 border-blue">
                        <div class="article-header">
                            <div class="article-image">
                                <img src="https://tse2.mm.bing.net/th?id=OIP.FKNCCm-FeSwYUHi5yOeHxQHaEK&pid=Api&P=0&h=180" alt="Article Image" class="img-fluid">
                            </div>
                            <div class="article-badge">
                                <div class="article-badge-item bg-primary"><i class="fas fa-exclamation"></i> Free</div>
                            </div>
                        </div>
                        <div class="article-details flex-grow-1 d-flex flex-column">
                            <div class="article-title">
                                <h2>Learn online Laravel 11 for beginners</h2>
                            </div>
                            <p>Laravel 11 is suitable for beginners with practice making CRUD from scratch. Guaranteed you will understand Laravel after following this tutorial.</p>
                        </div>
                    </article>
                </a>
            </div>
    
            <!-- Kolom 2 -->
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 d-flex mb-4">
                <a href="target-page.html" class="d-flex flex-column flex-grow-1 text-decoration-none">
                    <article class="article article-style-b d-flex flex-column flex-grow-1">
                        <div class="article-header">
                            <div class="article-image">
                                <img src="https://static.vecteezy.com/system/resources/previews/013/976/941/original/internet-of-things-background-iot-technology-background-eps-10-vector.jpg" alt="Article Image" class="img-fluid">
                            </div>
                        </div>
                        <div class="article-details flex-grow-1 d-flex flex-column">
                            <div class="article-title">
                                <h2>Learn online Laravel 11 for beginners</h2>
                            </div>
                            <p>Laravel 11 is suitable for beginners with practice making CRUD from scratch. Guaranteed you will understand Laravel after following this tutorial.</p>
                        </div>
                    </article>
                </a>
            </div>
    
            <!-- Kolom 3 -->
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 d-flex mb-4">
                <a href="target-page.html" class="d-flex flex-column flex-grow-1 text-decoration-none">
                    <article class="article article-style-b d-flex flex-column flex-grow-1">
                        <div class="article-header">
                            <div class="article-image">
                                <img src="https://yourserveradmin.com/wp-content/uploads/2020/04/uxui.jpg" alt="Article Image" class="img-fluid">
                            </div>
                        </div>
                        <div class="article-details flex-grow-1 d-flex flex-column">
                            <div class="article-title">
                                <h2>Learn online Laravel 11 for beginners</h2>
                            </div>
                            <p>Laravel 11 is suitable for beginners with practice making CRUD from scratch. Guaranteed you will understand Laravel after following this tutorial.</p>
                        </div>
                    </article>
                </a>
            </div>
    
            <!-- Kolom 4 -->
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 d-flex mb-4">
                <a href="target-page.html" class="d-flex flex-column flex-grow-1 text-decoration-none">
                    <article class="article article-style-b d-flex flex-column flex-grow-1">
                        <div class="article-header">
                            <div class="article-image">
                                <img src="https://wallpaperaccess.com/full/1804132.jpg" alt="Article Image" class="img-fluid">
                            </div>
                        </div>
                        <div class="article-details flex-grow-1 d-flex flex-column">
                            <div class="article-title">
                                <h2>Learn online Laravel 11 for beginners</h2>
                            </div>
                            <p>Laravel 11 is suitable for beginners with practice making CRUD from scratch. Guaranteed you will understand Laravel after following this tutorial.</p>
                        </div>
                    </article>
                </a>
            </div>
        </div>
    </div>
    

    
                   
                {{-- <h2 class="section-title">Article Style C</h2>
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-4">
                        <article class="article article-style-c">
                            <div class="article-header">
                                <div class="article-image"
                                    data-background="{{ asset('img/news/img13.jpg') }}">
                                </div>
                            </div>
                            <div class="article-details">
                                <div class="article-category"><a href="#">News</a>
                                    <div class="bullet"></div> <a href="#">5 Days</a>
                                </div>
                                <div class="article-title">
                                    <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                </div>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. </p>
                                <div class="article-user">
                                    <img alt="image"
                                        src="{{ asset('img/avatar/avatar-1.png') }}">
                                    <div class="article-user-details">
                                        <div class="user-detail-name">
                                            <a href="#">Hasan Basri</a>
                                        </div>
                                        <div class="text-job">Web Developer</div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">
                        <article class="article article-style-c">
                            <div class="article-header">
                                <div class="article-image"
                                    data-background="{{ asset('img/news/img14.jpg') }}">
                                </div>
                            </div>
                            <div class="article-details">
                                <div class="article-category"><a href="#">News</a>
                                    <div class="bullet"></div> <a href="#">5 Days</a>
                                </div>
                                <div class="article-title">
                                    <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                </div>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. </p>
                                <div class="article-user">
                                    <img alt="image"
                                        src="{{ asset('img/avatar/avatar-3.png') }}">
                                    <div class="article-user-details">
                                        <div class="user-detail-name">
                                            <a href="#">Rizal Fakhri</a>
                                        </div>
                                        <div class="text-job">UX Designer</div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">
                        <article class="article article-style-c">
                            <div class="article-header">
                                <div class="article-image"
                                    data-background="{{ asset('img/news/img01.jpg') }}">
                                </div>
                            </div>
                            <div class="article-details">
                                <div class="article-category"><a href="#">News</a>
                                    <div class="bullet"></div> <a href="#">5 Days</a>
                                </div>
                                <div class="article-title">
                                    <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                </div>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. </p>
                                <div class="article-user">
                                    <img alt="image"
                                        src="{{ asset('img/avatar/avatar-2.png') }}">
                                    <div class="article-user-details">
                                        <div class="user-detail-name">
                                            <a href="#">Irwansyah Saputra</a>
                                        </div>
                                        <div class="text-job">Mobile Developer</div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section> --}}
</div>
@endsection
