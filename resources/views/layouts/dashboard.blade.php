@extends('layouts.head')

@section('body')
    <body id="page-top" class="sidebar-toggled">
    <div id="wrapper">
        @yield('side-navbar')
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar-light navbar-expand bg-white shadow mb-4 topbar static-top"></nav>
                <nav class="navbar fixed-top navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid">
                        <a class="navbar-brand d-flex justify-content-center align-items-center m-0" href="#">
                            <div class="sidebar-brand-icon">
                                <img src="{{ asset('img/icon.png') }}" width="40" height="40">
                            </div>
                            <div class="d-sm-block d-none sidebar-brand-text mx-3">
                                <span>{{ config('app.name', 'TPB 2020') }}</span>
                            </div>
                        </a>
                        <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <!--
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle active nav-link" data-toggle="dropdown" aria-expanded="false" id="notif-btn" href="#">
                                        <i class="fas fa-bell fa-fw"></i>
                                        <span id="notif-number" class="badge badge-danger badge-counter">7</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in">
                                        <h6 class="dropdown-header">alerts center</h6>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="dropdown-list-image mr-3">
                                                <img class="rounded-circle" src="">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate">
                                                    <span>Hi there! I am wondering if you can help me with a problem I've been having.</span>
                                                </div>
                                                <p class="small text-gray-500 mb-0">Emily Fowler - 58m</p>
                                            </div>
                                        </a>
                                        <a class="text-center dropdown-item small text-gray-500" href="#">Show All Alerts</a>
                                    </div>
                                </div>
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            -->
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                                        <span class="d-none d-lg-inline mr-2 text-gray-600 small" id="pr-name">{{ Auth::user()->name }}</span>
                                        <img alt="profile-picture" class="border rounded-circle img-profile" id="pr-picture" src="{{ asset('avatars/' . Auth::user()->avatar) }}">
                                    </a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in">
                                        <a class="dropdown-item" href="{{ route('profile.show') }}">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;{{ __('Profile') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;{{ __('Edit Profile') }}
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button class="dropdown-item" type="submit">
                                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;{{ __('Logout') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © {{ config('app.name', 'TPB 2020') }}</span></div>
                </div>
            </footer>
        </div>
        <a class="border rounded d-inline scroll-to-top" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/script.min.js') }}"></script>
    @yield('custom-script')
    </body>
@endsection
