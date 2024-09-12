@extends('layouts.signup')

@section('content')
<section class="signup-user">
    <div class="right">
        <img src="{{ asset('images/incubator.png') }}" class="logo" alt="">
        <h1 class="header-third">
            Get Ready for the Founder's Journey!
        </h1>
        <p class="subheader">
            First-time Founder? Or is this your second time? No problem, <br>we're here to help. Make sure you fill out the <br> form and choose the incubation method you prefer. <br>
            <br>The next wave will be held in October 2024 - January 2025 <br> (For Mentored Incubation) Self-incubation can be done anytime
        </p>
        <img src="{{ asset('images/signup.png') }}" alt="">
        <p class="subheader">
            Have you successfully created an account?
        </p>
        <a href="{{ route('login') }}" class="btn btn-master btn-primary">
            Sign In
        </a>
    </div>

    <div class="left">
        <h1 class="header-third">SIGN UP</h1>
        <h2 class="header-second">CREATE AN ACCOUNT</h2>
        <p class="subheader">
            Come on, fill in your account details <br> completely immediately and accurately
        </p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Full Name -->
            <div class="form-floating mb-3">
                <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="fullname" required autofocus autocomplete="name" />
                <label for="name">Full Name</label>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Username -->
            {{-- <div class="form-floating mb-3">
                <input id="username" class="form-control" type="text" name="username" value="{{ old('username') }}" placeholder="username" required autofocus autocomplete="username" />
                <label for="username">Username</label>
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div> --}}

            <!-- Email Address -->
            <div class="form-floating mb-3">
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" />
                <label for="email">Email address</label>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Phone Number -->
            {{-- <div class="form-floating mb-3">
                <input id="phone" class="form-control" type="tel" name="phone" value="{{ old('phone') }}" placeholder="Phone Number" required autocomplete="phone" />
                <label for="phone">Phone Number</label>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- City -->
            <div class="form-floating mb-3">
                <input id="city" class="form-control" type="text" name="city" value="{{ old('city') }}" placeholder="City" required autocomplete="city" />
                <label for="city">City</label>
                @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div> --}}

            <!-- Country nationality -->
            <div class="form-floating mb-3">
                <select id="country" name="country" class="form-select" required>
                    <option value="">{{ __('Select a country') }}</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->code }}" {{ old('country') == $country->code ? 'selected' : '' }}>
                            {{ $country->name }}
                        </option>
                    @endforeach
                </select>
                <label for="country">Country</label>
                @error('country')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-floating mb-3">
                <input id="password" class="form-control" type="password" name="password" placeholder="Password" required autocomplete="new-password" />
                <label for="password">Password</label>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="form-floating mb-3">
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" />
                <label for="password_confirmation">Confirm Password</label>
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="btn btn-border btn-primary">Register</button>
                <a class="btn btn-link" href="{{ route('login') }}">Already registered?</a>
            </div>
        </form>
    </div>
</section>
@endsection
