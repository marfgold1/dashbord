@extends('layouts.dashboard_admin')

@section('content')
    <h3 class="text-dark mb-2">{{ __('Edit Webinar') }}</h3>
    <form method="POST" action="{{ route('admin.webinar.update', [ 'webinar' => $webinar ]) }}">
        @csrf
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label for="name">
                        <strong>{{ __('Webinar Name') }}</strong><br />
                    </label>
                    <input required type="text" class="form-control @error('nama') is-invalid @enderror" id="name" name="nama" value="{{ old('nama', $webinar->nama) }}" />
                    @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="faculty">
                        <strong>{{ __('Faculty') }}</strong><br />
                    </label>
                    <input required type="text" class="form-control @error('fakultas') is-invalid @enderror" id="faculty" name="fakultas" value="{{ old('fakultas', $webinar->fakultas) }}" />
                    @error('fakultas')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label for="topic">
                        <strong>{{ __('Topic') }}</strong>
                    </label>
                    <input required type="text" class="form-control @error('topik') is-invalid @enderror" id="topic" name="topik" value="{{ old('topik', $webinar->topik) }}" />
                    @error('topik')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label for="description">
                        <strong>{{ __('Description') }}</strong>
                    </label>
                    <textarea required class="form-control @error('deskripsi') is-invalid @enderror" id="description" name="deskripsi">{{ old('deskripsi', $webinar->deskripsi) }}</textarea>
                    @error('deskripsi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label for="speaker">
                        <strong>{{ __('Speaker') }}</strong><br />
                    </label>
                    <input required type="text" class="form-control @error('narasumber') is-invalid @enderror" id="speaker" name="narasumber" value="{{ old('narasumber', $webinar->narasumber) }}" />
                    @error('narasumber')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="quota">
                                <strong>{{ __('Quota') }}</strong><br />
                            </label>
                            <input required type="number" class="form-control @error('kuota') is-invalid @enderror" id="quota" name="kuota" value="{{ old('kuota', $webinar->kuota) }}" />
                            @error('kuota')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="pic">
                        <strong>{{ __('Person in Charge') }}</strong><br />
                        {{ __('format: name-provider-contact;name-provider-contact; (semicolon separated)') }}<br />
                        {{ __('e.g.') }}: Amar-LINE-amar1234;<br />
                        {{ __('other e.g.') }}: Dinda Putri-WA-081321345624;Budi-LINE-budi1234;<br />
                    </label>
                    <input required type="text" class="form-control @error('pic') is-invalid @enderror" id="pic" name="pic" value="{{ old('pic', $webinar->pic) }}" />
                    @error('pic')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label for="schedule">
                        <strong>{{ __('Schedule') }}</strong><br />
                    </label>
                    <input required class="form-control @error('jadwal') is-invalid @enderror" id="schedule" name="jadwal" type="datetime-local" value="{{ old('jadwal', $webinar->jadwal->format('Y-m-d\TH:i')) }}" />
                    @error('jadwal')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="deadline">
                        <strong>{{ __('Registration Deadline') }}</strong><br />
                    </label>
                    <input required class="form-control @error('batas_pendaftaran') is-invalid @enderror" id="deadline" name="batas_pendaftaran" type="datetime-local" value="{{ old('batas_pendaftaran', $webinar->batas_pendaftaran->format('Y-m-d\TH:i')) }}" />
                    @error('batas_pendaftaran')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="form-group"><button class="btn btn-primary w-100" type="submit">{{ __('Edit Webinar') }}</button></div>
            </div>
        </div>
    </form>
@endsection
