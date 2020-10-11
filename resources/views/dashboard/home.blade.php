@extends('layouts.dashboard_general')

@section('content')
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">{{ __('Dashboard') }}</h3>
    </div>
    <div class="row">
        <div class="col mb-2" style="max-width: 100%;">
            <div class="card shadow">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-auto d-lg-flex align-self-center" style="padding: 0;padding-right: 12px;padding-left: 12px;">
                            <i class="fa fa-bullhorn"></i>
                        </div>
                        <div class="col d-lg-flex align-items-lg-center" style="padding: 0;">
                            <h6 class="text-primary d-lg-flex font-weight-bold m-0">{{ __('Announcements') }}</h6>
                        </div>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <!--
                    <li class="list-group-item">
                        <div class="row align-items-center no-gutters">
                            <div class="col-auto">
                                <span class="badge badge-info">{{ __('Info') }}</span>
                                <h5 class="mb-0"><strong>Pengumuman link webinar STEI</strong></h5>
                                <span class="text-sm">
                                    Link webinar STEI akan diumumkan via email 1 jam sebelum acara dimulai (7:45 AM)<br>
                                    Silahkan cek email anda
                                </span>
                            </div>
                        </div>
                    </li>
                    -->
                        <li class="list-group-item">
                            <div class="row align-items-center no-gutters">
                                <h6 class="mb-0">Tidak ada pengumuman</h6>
                            </div>
                        </li>
                </ul>
            </div>
        </div>
        <div class="col" style="max-width: 100%;">
            <div class="card shadow">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-auto d-lg-flex align-self-center" style="padding: 0;padding-right: 12px;padding-left: 12px;">
                            <i class="fa fa-slideshare"></i>
                        </div>
                        <div class="col d-lg-flex align-items-lg-center" style="padding: 0;">
                            <h6 class="text-primary d-lg-flex font-weight-bold m-0">{{ __('Upcoming Registered Webinars') }}</h6>
                        </div>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    @forelse($user->webinars as $webinar)
                        <li class="list-group-item">
                            <div class="row align-items-center no-gutters">
                                <div class="col-auto" style="margin-top: 10px;margin-bottom: 10px;">
                                    <span class="badge badge-primary text-wrap">{{ $webinar->fakultas }}</span>
                                    <h6 class="mb-0"><strong>{{ $webinar->nama }}</strong></h6>
                                    <div class="row">
                                        <div class="col">
                                            <i class="fas fa-clock mr-2"></i>
                                            <span class="text-xs">{{ $webinar->jadwal->format('l, j F Y g:i A') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @empty
                        <li class="list-group-item">
                            <div class="row align-items-center no-gutters">
                                <h6 class="mb-0">{{ __('No Registered Webinars') }}</h6>
                            </div>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
        <!--
        <div class="col-lg-6 mb-4" style="max-width: 100%;">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-auto d-lg-flex align-self-center" style="padding: 0;padding-right: 12px;padding-left: 12px;"><i class="fa fa-rocket"></i></div>
                        <div class="col d-lg-flex align-items-lg-center" style="padding: 0;">
                            <h6 class="text-primary d-lg-flex font-weight-bold m-0">Registered Pre-Event</h6>
                        </div>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row align-items-center no-gutters">
                            <div class="col mr-2">
                                <h6 class="mb-0"><strong>Lunch meeting</strong></h6><span class="text-xs">10:30 AM</span></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        -->
    </div>
@endsection
