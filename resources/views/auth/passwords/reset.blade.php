@extends('layouts.menu')

@section('content')
    <div class="text-center">
        <h4 class="text-dark mb-2">{{ __('Reset Password') }}</h4>
    </div>
    <form class="user" method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group">
            <input class="form-control form-control-user @error('email') is-invalid @enderror" type="email"
                   id="email"
                   aria-describedby="emailHelp" placeholder="{{ __('E-Mail Address') }}"
                   name="email" value="{{ old('email') }}" required>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <input class="form-control form-control-user @error('password') is-invalid @enderror" type="password"
                   id="password"
                   aria-describedby="emailHelp" placeholder="{{ __('New Password') }}"
                   name="password" required>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <input class="form-control form-control-user" type="password"
                   id="password"
                   aria-describedby="emailHelp" placeholder="{{ __('Confirm New Password') }}"
                   name="password_confirmation" required>
        </div>
        <button class="btn btn-primary btn-block text-white btn-user"
                type="submit">{{ __('Reset Password') }}
        </button>
    </form>
@endsection
