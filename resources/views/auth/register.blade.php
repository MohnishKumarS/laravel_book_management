@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-lg-10">
            <div class="row">
                <div class="col-lg-6">
                    <div>
                        <img src="{{asset('assets/image/reg.svg')}}" alt="register-page" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header text-center fw-bold">{{ __('Register') }}</div>
        
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
        
                                <div class="row mb-3">
                                    <label for="name" class=" col-form-label">{{ __('Name') }}</label>
        
                                    <div class="col-12">
                                        <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <label for="email" class=" col-form-label">{{ __('Email Address') }}</label>
        
                                    <div class="col-12">
                                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <label for="password" class=" col-form-label">{{ __('Password') }}</label>
        
                                    <div class="col-12">
                                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <label for="password-confirm" class=" col-form-label">{{ __('Confirm Password') }}</label>
        
                                    <div class="col-12">
                                        <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
        
                                <div class="row mb-0">
                                    <div class="col-12 text-center my-3">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                    <div class=" text-center">
                                        @if (Route::has('login'))
                                        <a class="btn btn-link" href="{{ route('login') }}">
                                            Already have an account?
                                        </a>
                                    @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
