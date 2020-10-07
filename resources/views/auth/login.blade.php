@extends('layouts.menu')

@section('content')
    <div class="p-5">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="text-center">
            <h4 class="text-dark mb-4">{{ __('Login') }}</h4>
        </div>
        <form class="user" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <input class="form-control form-control-user @error('email') is-invalid @enderror" type="email" id="email" aria-describedby="emailHelp" placeholder="{{ __('E-Mail Address') }}" name="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control form-control-user @error('password') is-invalid @enderror" type="password" id="password" placeholder="{{ __('Password') }}" name="password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox small">
                    <div class="form-check">
                        <input class="form-check-input custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                    </div>
                </div>
            </div><button class="btn btn-primary btn-block text-white btn-user" type="submit">{{ __('Login') }}</button>
            <hr>
        </form>
        <div class="text-center"><a class="small" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a></div>
        <div class="text-center"><a class="small" href="{{ route('register') }}">{{ __('Create an Account!') }}</a></div>
    </div>
@endsection
