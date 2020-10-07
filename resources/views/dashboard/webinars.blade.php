@extends('layouts.dashboard_general')

@section('content')
    <h3 class="text-dark mb-4">{{ __('Webinars') }}</h3>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @error('webinar')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    <div role="tablist" id="webinar-list">
        @forelse($webinars as $webinar)
            <div class="card">
                <div class="card-header" role="tab">
                    <h5 class="mb-0">
                        @if($user->isRegisteredInWebinar($webinar))
                            <span class="badge badge-success mb-sm-0 mb-2">{{ __('Registered') }}</span>
                        @else
                            <span class="badge badge-danger mb-sm-0 mb-2">{{ __('Not Registered') }}</span>
                        @endif
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
                            <div class="col my-2">
                                <i class="fas fa-building mr-2 mb-2"></i>
                                <strong class="mb-2">{{ __('Faculty') }}&nbsp;</strong>
                                <p class="m-0 mb-2">{{ $webinar->fakultas }}</p>
                            </div>
                            <div class="col my-2">
                                <i class="fas fa-list mr-2"></i>
                                <strong>{{ __('Topic') }}&nbsp;</strong>
                                <p class="m-0">{{ $webinar->topik }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <i class="fas fa-user-tie mr-2"></i>
                                <strong>{{ __('Speaker') }}&nbsp;</strong>
                                <p class="m-0">{{ $webinar->narasumber }}<br></p>
                            </div>
                            <div class="col mb-2">
                                <i class="fas fa-calendar-day mr-2"></i>
                                <strong>{{ __('Schedule') }}&nbsp;</strong>
                                <p class="m-0">{{ $webinar->jadwal }}<br></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <i class="fas fa-address-book mr-2"></i>
                                <strong>{{ __('Person in Chargew') }}&nbsp;</strong>
                                @foreach( explode(';',$webinar->pic) as $pic )
                                    @if( !$pic=='' )
                                        <p class="m-0">
                                            @php
                                                $contacts=explode('-', $pic);
                                                echo $contacts[0].': '.$contacts[2].' ('.$contacts[1].')';
                                            @endphp
                                        </p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            @if($webinar->isRegistrationClosed())
                                <div class="col-sm-3 align-self-center">
                                    <i class="fas fa-users mr-2"></i>
                                    <strong>{{ __('Quota') }}:&nbsp;</strong>
                                    <span class="mr-2">{{ $webinar->count_pendaftar() }} / {{ $webinar->kuota }}</span>
                                </div>
                                <div class="col-sm-3 align-self-center">
                                    <i class="fas fa-clock mr-2"></i>
                                    <strong>{{ __('Registration Deadline') }}:&nbsp;</strong>
                                    <span class="mr-2">{{ $webinar->batas_pendaftaran->diffForHumans() }}</span>
                                    <span class="badge badge-danger">{{  __('Closed') }}</span>
                                </div>
                                <div class="col align-self-center mt-sm-0 mt-2">
                                    <button class="btn btn-secondary w-100" type="submit" disabled>{{ __('Registration Closed') }}</button>
                                </div>
                            @elseif($user->isRegisteredInWebinar($webinar))
                                <div class="col-sm-3 align-self-center">
                                    <i class="fas fa-users mr-2"></i>
                                    <strong>{{ __('Quota') }}:&nbsp;</strong>
                                    <span class="mr-2">{{ $webinar->count_pendaftar() }} / {{ $webinar->kuota }}</span>
                                    <span class="badge badge-info">{{  __('Registered') }}</span>
                                </div>
                                <div class="col-sm-3 align-self-center">
                                    <i class="fas fa-clock mr-2"></i>
                                    <strong>{{ __('Registration Deadline') }}:&nbsp;</strong>
                                    <span class="mr-2">{{ $webinar->batas_pendaftaran->diffForHumans() }}</span>
                                    <span class="badge badge-info">{{  __('Open') }}</span>
                                </div>
                                <div class="col align-self-center mt-sm-0 mt-2">
                                    <form method="POST" action="{{ route('webinar.unregister', [ 'webinar' => $webinar->id ]) }}">
                                        @csrf
                                        <button class="btn btn-danger w-100" type="submit">{{ __('Unregister') }}</button>
                                    </form>
                                </div>
                            @elseif($webinar->isQuotaFull())
                                <div class="col-sm-3 align-self-center">
                                    <i class="fas fa-users mr-2"></i>
                                    <strong>{{ __('Quota') }}:&nbsp;</strong>
                                    <span class="mr-2">{{ $webinar->count_pendaftar() }} / {{ $webinar->kuota }}</span>
                                    <span class="badge badge-danger">{{  __('Full') }}</span>
                                </div>
                                <div class="col-sm-3 align-self-center">
                                    <i class="fas fa-clock mr-2"></i>
                                    <strong>{{ __('Registration Deadline') }}:&nbsp;</strong>
                                    <span class="mr-2">{{ $webinar->batas_pendaftaran->diffForHumans() }}</span>
                                    <span class="badge badge-info">{{  __('Open') }}</span>
                                </div>
                                <div class="col align-self-center mt-sm-0 mt-2">
                                    <button class="btn btn-secondary w-100 disabled" type="submit" disabled>{{ __('Registration Full') }}</button>
                                </div>
                            @else
                                <div class="col-sm-3 align-self-center">
                                    <i class="fas fa-users mr-2"></i>
                                    <strong>{{ __('Quota') }}:&nbsp;</strong>
                                    <span class="mr-2">{{ $webinar->count_pendaftar() }} / {{ $webinar->kuota }}</span>
                                    <span class="badge badge-success">{{  __('Available') }}</span>
                                </div>
                                <div class="col-sm-3 align-self-center">
                                    <i class="fas fa-clock mr-2"></i>
                                    <strong>{{ __('Registration Deadline') }}:&nbsp;</strong>
                                    <span class="mr-2">{{ $webinar->batas_pendaftaran->diffForHumans() }}</span>
                                    <span class="badge badge-info">{{  __('Open') }}</span>
                                </div>
                                <div class="col align-self-center mt-sm-0 mt-2">
                                    <form method="POST" action="{{ route('webinar.register', [ 'webinar' => $webinar->id ]) }}">
                                        @csrf
                                        <button class="btn btn-primary w-100" type="submit">{{ __('Register') }}</button>
                                    </form>
                                </div>
                            @endif
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
