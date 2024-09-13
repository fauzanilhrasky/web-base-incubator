@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">{{ __('Edit Profile') }}</div>
            </div>

            <div class="card">
                <div class="crd card-header">
                    <h4>My Profile</h4>
                </div>
                
                <div class="card-body d-flex flex-column align-items-center">

                    <!-- Profile Image -->
                    {{-- <div class="card">         
                            <img src="https://tse4.mm.bing.net/th?id=OIP.PGJfWGMv9eCnD3Nwoqwd6wAAAA&pid=Api&P=0&h=180" 
                             class="img-fluid rounded-circle mb-3" 
                             alt="Profile Image">
                        </div> --}}
                    
                    
                
                    <!-- Profile Update Form -->
                    <form method="POST" action="{{ route('profile.update') }}" class="justify-content-center">
                        @csrf
                        @method('PUT')

                       <!-- profile -->
                        <div class="form-group row justify-content-center">

                            <!-- Kolom Bulat Kosong -->
                            <div class="row justify-content-center ">
                                
                                <!-- Default Empty Circle (if no image) -->
                                <div class="edit profile-photo-placeholder rounded-circle mb-3" style=" width: 170px; height: 170px; background-color: #f0f0f0; display: flex; align-items: center; justify-content: center;">
                                    
                                    @if($user->profile_photo_url)
                                        <img src="{{$user->profile_photo_url }}" class="img-fluid rounded-circle" alt="Profile Image" width="170">
                                    @else
                                        <i class="fas fa-user" style="font-size: 48px; color: #ccc;"></i>
                                    @endif
                                    
                                </div>
                        
                            </div>
                            
                        
                        <!-- Email -->
                        <div class="form-group row justify-content-center">
                            <div class="col-md-8">
                                <label for="email" class="col-form-label fw-bold">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email', $user->email) }}" 
                                       required autocomplete="email">
                                
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                
                        <!-- Name -->
                        <div class="form-group row justify-content-center">
                            <div class="col-md-8">
                                <label for="name" class="col-form-label fw-bold">{{ __('Name') }}</label>
                                <input id="name" type="text" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       name="name" value="{{ old('name', $user->name) }}" 
                                       required autocomplete="name" autofocus>
                                
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                
                        <!-- Nationality -->
                        <div class="form-group row justify-content-center">
                            <div class="col-md-8">
                                <label for="country" class="col-form-label fw-bold">{{ __('Nationality') }}</label>
                                <input id="country" type="text" 
                                       class="form-control @error('country') is-invalid @enderror" 
                                       name="country" value="{{ old('country', $user->country) }}" 
                                       required autocomplete="country">
                                
                                @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="form-group row justify-content-center">
                        <div class="col-md-8">
                            <label for="profile_photo" class="col-form-label fw-bold">{{ __('Change Profile Photo') }}</label>
                            <input id="profile_photo" type="file" class="form-control @error('profile_photo') is-invalid @enderror" name="profile_photo" required>
        
                            @error('profile_photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                
                        <!-- Update Button -->
                        <div class="form-group row justify-content-center">
                            <div class="col-md-8 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Profile') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection