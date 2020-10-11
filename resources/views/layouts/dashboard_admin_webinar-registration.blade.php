@extends('layouts.dashboard_admin')

@section('content')
    <a href="{{ route('admin.webinar.manage') }}">
        <i class="fas fa-arrow-circle-left mr-2"></i>{{ __('Back') }}
    </a>
    <h3 class="text-dark">{{ __('Manage Webinar Registration') }}</h3>
    <h6 class="text-dark mb-4">{{ $webinar->nama }}</h6>
    <div class="card shadow-sm">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item"><a class="nav-link {{ Request::is('admin/webinars/manage/*/registration/users') ? 'active disabled' : '' }}" href="{{ route('admin.webinar.registration.users', $webinar->id) }}">{{ __('Registered Users') }}</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('admin/webinars/manage/*/registration/email') ? 'active disabled' : '' }}" href="{{ route('admin.webinar.registration.email', $webinar->id) }}">{{ __('Send Email') }}</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('admin/webinars/manage/*/registration/data') ? 'active disabled' : '' }}" href="{{ route('admin.webinar.registration.data', $webinar->id) }}">{{ __('Download Data') }}</a></li>
            </ul>
        </div>
        <div class="card-body text-truncate">
            @yield('card-content')
        </div>
    </div>
@endsection
