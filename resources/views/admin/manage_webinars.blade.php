@extends('layouts.dashboard_admin')

@section('content')
    <h3 class="text-dark mb-4">{{ __('Manage Webinars') }}</h3>
    <div role="tablist" id="webinar-list">
        @forelse($webinars as $webinar)
            <div class="card shadow-sm">
                <div class="card-header" role="tab">
                    <h5 class="mb-0">
                        @if($webinar->isRegistrationClosed())
                            <span class="badge badge-secondary ml-sm-2 mb-sm-0 mb-2">{{ __('Closed') }}</span>
                        @elseif($webinar->isQuotaFull())
                            <span class="badge badge-danger ml-sm-2 mb-sm-0 mb-2">{{ __('Full') }}</span>
                        @else
                            <span class="badge badge-primary ml-sm-2 mb-sm-0 mb-2">{{ __('Open') }}</span>
                        @endif
                        <a data-toggle="collapse" aria-expanded="true" aria-controls="webinar-list .item-{{ $webinar->id }}" href="#webinar-list .item-{{ $webinar->id }}" class="ml-sm-2">
                            {{ $webinar->nama }}
                        </a>
                    </h5>
                </div>
                <div class="collapse hide item-{{ $webinar->id }}" role="tabpanel" data-parent="#webinar-list">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <p class="card-text text-justify">{{ $webinar->deskripsi }}<br></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6 mb-2">
                                <i class="fas fa-building mr-2"></i>
                                <strong class="mb-2">{{ __('Faculty') }}&nbsp;</strong>
                                <p class="m-0">{{ $webinar->fakultas }}</p>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <i class="fas fa-list mr-2"></i>
                                <strong>{{ __('Topic') }}&nbsp;</strong>
                                <p class="m-0">{{ $webinar->topik }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mb-2">
                                <i class="fas fa-user-tie mr-2"></i>
                                <strong>{{ __('Speaker') }}&nbsp;</strong>
                                <p class="m-0">{{ $webinar->narasumber }}<br></p>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <i class="fas fa-calendar-day mr-2"></i>
                                <strong>{{ __('Schedule') }}&nbsp;</strong>
                                <p class="m-0">{{ $webinar->jadwal->format('l, j F Y g:i A') }}<br></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4 mb-2">
                                <i class="fas fa-address-book mr-2"></i>
                                <strong>{{ __('Person in Charge') }}&nbsp;</strong>
                                @foreach( explode(';',$webinar->pic) as $pic )
                                    @if( !$pic=='' )
                                        <p class="m-0">
                                            @php
                                                $contacts=explode('-', $pic);
                                                echo htmlspecialchars($contacts[0].': '.$contacts[2].' ('.$contacts[1].')');
                                            @endphp
                                        </p>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-4 mb-2">
                                <i class="fas fa-users mr-2"></i>
                                <strong>{{ __('Quota') }}:&nbsp;</strong>
                                <span class="mr-2">{{ $webinar->count_pendaftar() }} / {{ $webinar->kuota }}</span>
                            </div>
                            <div class="col-sm-4 mb-2">
                                <i class="fas fa-clock mr-2"></i>
                                <strong>{{ __('Registration Deadline') }}:&nbsp;</strong>
                                <span class="mr-2">{{ $webinar->batas_pendaftaran->diffForHumans() }} ({{ $webinar->batas_pendaftaran->format('l, j F Y g:i A') }})</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6 align-self-center w-100 mb-2">
                                <form method="GET" action="{{ route('admin.webinar.edit', [ 'webinar' => $webinar ]) }}">
                                    @csrf
                                    <button class="btn btn-primary w-100" type="submit">{{ __('Edit Webinar') }}</button>
                                </form>
                            </div>
                            <div class="col-sm-6 align-self-center w-100 mb-2">
                                <form method="POST" action="{{ route('admin.webinar.destroy', [ 'webinar' => $webinar ]) }}">
                                    @csrf
                                    <button class="btn btn-danger w-100" type="submit">{{ __('Delete Webinar') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="list-group-item">
                <div class="row align-items-center no-gutters">
                    <h6 class="mb-0">{{ __('No Webinar') }}</h6>
                </div>
            </div>
        @endforelse
    </div>
    <div class="row mt-2">
        <div class="col-md-6 align-self-center">
            @if($webinars->total() > 0)
                <p role="status" aria-live="polite">{{ __('Showing').' '.$webinars->firstItem().' '.__('to').' '.$webinars->lastItem().' ('.__('total').' '.$webinars->total().')'}}</p>
            @endif
        </div>
        <div class="col-md-6 d-lg-flex justify-content-lg-end">
            {{ $webinars->links() }}
        </div>
    </div>
@endsection
