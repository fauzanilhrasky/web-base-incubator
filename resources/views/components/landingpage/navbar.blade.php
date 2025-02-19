<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{route('welcome')}}">
            <img src="{{ asset('img/base incubator.png') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-black" aria-current="page" href="{{ route('welcome') }}">Home</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link text-black" href="#">Mentor</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link text-black" href="{{ route('pricing') }}">Pricing</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link text-white" href="#">Business</a>
                </li> --}}
            </ul>
            <div class="d-flex">
                <a href="{{ route('login') }}" class="btn btn-master me-2 text-black">
                    Sign In
                </a>
                <a href="{{ route('register') }}" class="btn1 btn-primary">
                    Sign Up
                </a>
            </div>
        </div>
    </div>
</nav>