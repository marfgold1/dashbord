@extends('layouts.menu')

@section('content')
    <div class="text-center">
        <h4 class="text-dark mb-2">{{ __('Forgot Password') }}</h4>
    </div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form class="user" method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group">
            <input class="form-control form-control-user @error('email') is-invalid @enderror" type="email"
                   id="exampleInputEmail"
                   aria-describedby="emailHelp" placeholder="{{ __('E-Mail Address') }}"
                   name="email" value="{{ old('email') }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button class="btn btn-primary btn-block text-white btn-user"
                type="submit">{{ __('Send Password Reset Link') }}
        </button>
    </form>
    <div class="text-center">
        <hr>
        <a class="small" href="{{ route('register') }}">{{ __('Create an Account!') }}</a>
    </div>
    <div class="text-center">
        <a class="small" href="{{ route('login') }}">{{ __('Already have an account? Login!')}}</a>
    </div>
@endsection
