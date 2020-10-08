@extends('layouts.menu')

@section('content')
    @if (session('resent'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ __('A fresh verification link has been sent to your email address.') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="text-center">
        <h4 class="text-dark mb-2">{{ __('Verify Your Email Address') }}</h4>
        <p class="mb-2">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
        <p class="mb-2">{{ __('If you did not receive the email,') }}</p></div>
    <form class="user" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button class="btn btn-primary btn-block text-white btn-user"
                type="submit">{{ __('click here to request another') }}</button>
    </form>
    <hr>
    <form class="user" id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-danger btn-block text-white btn-user" type="submit">{{ __('Logout') }}</button>
    </form>
@endsection
