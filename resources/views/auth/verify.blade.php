@extends('layouts.menu')

@section('content')
    <div class="text-center">
        <h4 class="text-dark mb-2">{{ __('Verify Your Email Address') }}</h4>
        @if (session('resent'))
            <p class="mb-4">{{ __('A fresh verification link has been sent to your email address.') }}</p>
        @endif
        <p class="mb-2">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
        <p class="mb-2">{{ __('If you did not receive the email,') }}</p></div>
    <form class="user" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button class="btn btn-primary btn-block text-white btn-user"
                type="submit">{{ __('click here to request another') }}</button>
    </form>
    <br>
    <form id="logout-foram" action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-danger w-100" type="submit">Logout</button>
    </form>
@endsection
