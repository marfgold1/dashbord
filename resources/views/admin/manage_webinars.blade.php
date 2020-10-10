@extends('layouts.dashboard_admin')

@section('content')
    <h3 class="text-dark mb-4">{{ __('Manage Webinars') }}</h3>
    <div role="tablist" id="webinar-list">
        @forelse($webinars as $webinar)
            <div class="card shadow-sm">
                <div class="card-header" role="tab">
                    <h5 class="mb-0">
                        @can('update-webinar', $webinar)
                            <span class="badge badge-success ml-sm-2 mb-sm-0 mb-2">{{ __('Manageable') }}</span>
                        @endcan
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
                                <p class="card-text text-justify">{!! nl2br(e($webinar->deskripsi)) !!}<br></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6 mb-2">
                                <i class="fab fa-slideshare mr-2"></i>
                                <strong class="mb-2">{{ __('Category') }}&nbsp;</strong>
                                <p class="m-0">{{ $webinar->kategori }}</p>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <i class="fas fa-desktop mr-2"></i>
                                <strong>{{ __('Platform') }}&nbsp;</strong>
                                <p class="m-0">{{ $webinar->platform }}</p>
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
                            @can('update-webinar', $webinar)
                                <div class="col-sm-4 align-self-center w-100 mb-2">
                                    <form method="GET" action="{{ route('admin.webinar.edit', [ 'webinar' => $webinar ]) }}">
                                        @csrf
                                        <button class="btn btn-primary w-100" type="submit">{{ __('Edit Webinar') }}</button>
                                    </form>
                                </div>
                                <div class="col-sm-4 align-self-center w-100 mb-2">
                                    <form method="GET" action="{{ route('admin.webinar.registration.users', [ 'webinar' => $webinar ]) }}">
                                        @csrf
                                        <button class="btn btn-success w-100" type="submit">{{ __('Manage Registration') }}</button>
                                    </form>
                                </div>
                                <div class="col-sm-4 align-self-center w-100 mb-2">
                                    <form id="delete-webinar-form" method="POST" action="{{ route('admin.webinar.destroy', [ 'webinar' => $webinar ]) }}">
                                        @csrf
                                    </form>
                                    <button data-webinarname="{{ $webinar->nama }}" class="btn btn-danger w-100" type="button" data-toggle="modal" data-target="#confirmDelete">{{ __('Delete Webinar') }}</button>
                                </div>
                            @else
                                <div class="col text-center w-100 mb-2">
                                    <strong>{{ __('You are not eligible to manage this webinar.') }}</strong>
                                </div>
                            @endcan
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


    <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="cofirmDeleteTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">{{ __('Delete Webinar') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="modal-body"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('No') }}</button>
                    <button type="submit" class="btn btn-danger" form="delete-webinar-form" onclick="this.disabled=true; this.form.submit();">{{ __('Yes') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <script>
        $('#confirmDelete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var webinar_name = button.data('webinarname');
            var modal = $(this);
            modal.find('#modal-body').text('{{ __('Are you sure want to delete') }}'+' '+webinar_name+'?');
        });
    </script>
@endsection
