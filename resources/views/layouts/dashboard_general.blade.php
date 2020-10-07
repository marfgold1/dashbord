@extends('layouts.dashboard')

@section('side-navbar')
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 toggled">
        <div id="sidebar" class="container-fluid d-flex flex-column p-0" style="transform: translateY(80px)">
            <ul class="nav navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.show') }}">
                        <i class="fas fa-user"></i>
                        <span>{{ __('Profile') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('webinar.list') }}">
                        <i class="fab fa-slideshare"></i>
                        <span>{{ __('Webinar') }}</span>
                    </a>
                </li>
                @can('access admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.home') }}">
                            <i class="fas fa-user-cog"></i>
                            <span>{{ __('Administrator') }}</span>
                        </a>
                    </li>
                @endcan
            </ul>
            <div class="text-center d-none d-md-inline">
                <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
            </div>
        </div>
    </nav>
@endsection
