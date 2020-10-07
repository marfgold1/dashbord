@extends('layouts.dashboard_general')

@section('content')
    <div class="row">
        <div class="col d-flex">
            <h3 class="text-dark mb-4">{{ __('Profile') }}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-body text-center shadow">
                    <img class="rounded-circle mb-3 mt-4" src="{{ asset('avatars/' . $user->avatar) }}" width="160" height="160">
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card shadow h-100">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">{{ __('Profile Summary') }}</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col mb-1">
                            <strong class="mr-2">{{ __('Name') }}:</strong
                            ><span>{{ $user->name }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-1">
                            <strong class="mr-2">{{ __('E-Mail Address') }}:</strong>
                            <span>{{ $user->email }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-1">
                            <strong class="mr-2">{{ __('Date of Birth') }}:</strong>
                            <span>{{ $user->date_of_birth }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-1">
                            <strong class="mr-2">{{ __('Gender') }}:</strong>
                            @if($user->gender == 'laki-laki')
                                <span>{{ __('Male')  }}</span>
                            @else
                                <span>{{ __('Female')  }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <strong class="mr-2">{{ __('Category') }}:</strong>
                            @if($user->category == 'pelajar')
                                <span>{{ __('Student')  }}</span>
                            @elseif($user->category == 'mahasiswa')
                                <span>{{ __('College Student')  }}</span>
                            @else
                                <span>{{ __('Public')  }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col d-flex">
            <a class="btn btn-primary w-100" type="button" href="{{ route('profile.edit') }}">Edit Profile</a>
        </div>
    </div>
@endsection
