@extends('Admin.partials.super')

@section('content')
<div class="login-body d-flex">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card login-card">
                <div class="card-header login-card-header"><h3>{{ __('Admin Login') }}</h3></div>

                <div class="card-body">
                
                        <form method="POST" action="{{ route('admin.login.submit') }}" aria-label="{{ __('Admin Login') }}">
                            @csrf
                        <div class="form-group row ">
                            <label for="email" class="col-md-4 col-form-label text-md-right  login-links">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
							        <span class="input-group-text"><i class="fas fa-user"></i></span>
						        </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">                            
                            <label for="password" class="col-md-4 col-form-label text-md-right  login-links">{{ __('Password') }}</label>

                            <div class="col-md-6">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
							        <span class="input-group-text"><i class="fas  fa-key"></i></span>
						        </div>
                            
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
</div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @error('failed')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label  login-links" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn login_btn">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link login-links" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
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
@endsection
