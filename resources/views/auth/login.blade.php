<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <title>Sign In App</title>
</head>

<body>

    <section class="login-user">
        <div class="left">
            <img src="{{ asset('img/incubator.png') }}" class="logo" alt=""> 
            <h1 class="header-third">Hello Welcome Back!</h1>
            <p class="subheader">
                We accept online learning services in this application, <br> 
                <span>come on in and join together</span>
            </p>
            <img src="{{ asset('img/signin.png') }}" alt="">
            <p class="subheader">Do you have an account?</p>

            <a href="{{ route('register') }}" class="btn btn-master btn-primary">Sign Up</a>
        </div>

        <div class="right">
            <h1 class="header-third">SIGN IN</h1>
            <p class="subheader">Welcome! Please fill username and password to sign in into your account</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" :value="old('email')" required autofocus autocomplete="username">
                    <label for="email">Email address</label>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required autocomplete="current-password">
                    <label for="password">Password</label>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">Remember me</span>
                    </label>
                    
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">Forgot your password?</a>
                        @endif
                </div>

                

                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-border btn-primary">Sign In</button>
                </div>
                
                
            </form>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>
</html>