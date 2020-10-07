@extends('layouts.dashboard')

@section('side-navbar')
    <nav class="navbar navbar-dark bg-dark align-items-start sidebar sidebar-dark accordion p-0 toggled" style="z-index: 10">
        <div id="sidebar" class="container-fluid d-flex flex-column p-0" style="transform: translateY(80px)">
            <ul class="nav navbar-nav" id="accordionSidebar">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.home') }}">
                        <i class="fas fa-home"></i>
                        <span>{{ __('Admin Home') }}</span>
                    </a>
                </li>
                <hr class="sidebar-divider" />
                @can('admin control')
                <div class="sidebar-heading">
                    <p class="mb-0">{{ __('Admin Control') }}</p>
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="fas fa-users"></i>
                        <span>{{ __('General User') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <div>
                        <a class="btn btn-link nav-link" data-toggle="collapse" href="#collapse-1">
                            <i class="fas fa-user-cog"></i>
                            <span>{{ __('Admin Account') }}</span>
                        </a>
                        <div class="collapse" id="collapse-1">
                            <div class="bg-white border rounded py-2 collapse-inner">
                                <a class="collapse-item" href="">{{ __('Manage Role') }}</a>
                                <a class="collapse-item" href="">{{ __('Manage Permission') }}</a>
                            </div>
                        </div>
                    </div>
                </li>
                <hr class="sidebar-divider" />
                @endcan
                @can('maintainer control')
                <div class="sidebar-heading">
                    <p class="mb-0">{{ __('Maintainer Control') }}</p>
                </div>
                <li class="nav-item">
                    <div>
                        <a class="btn btn-link nav-link" data-toggle="collapse" href="#collapse-3">
                            <i class="fab fa-slideshare"></i>
                            <span>{{ __('Webinars') }}</span>
                        </a>
                        <div class="collapse" id="collapse-3">
                            <div class="bg-white border rounded py-2 collapse-inner">
                                <a class="collapse-item" href="{{ route('admin.webinar.create') }}"><i class="fa fa-pencil"></i>&emsp;{{ __('Create Webinar') }}</a>
                                <a class="collapse-item" href="{{ route('admin.webinar.manage') }}"><i class="fa fa-cog"></i>&emsp;{{ __('Manage Webinar') }}</a>
                            </div>
                        </div>
                    </div>
                </li>
                <hr class="sidebar-divider" />
                @endcan
                <div class="sidebar-heading">
                    <p class="mb-0">{{ __('Links') }}</p>
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i>
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </li>
            </ul>
            <div class="text-center d-none d-md-inline">
                <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
            </div>
        </div>
    </nav>
@endsection
