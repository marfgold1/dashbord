@extends('layouts.dashboard_admin')

@section('content')
    <h3 class="text-dark mb-2">{{ __('Create Webinar') }}</h3>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form method="POST" action="{{ route('admin.webinar.store') }}">
        @csrf
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label for="name">
                        <strong>{{ __('Webinar Name') }}</strong><br />
                    </label>
                    <input required type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" />
                    @error('name')
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
                    <input required type="text" class="form-control @error('faculty') is-invalid @enderror" id="faculty" name="faculty" value="{{ old('faculty') }}" />
                    @error('faculty')
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
                    <input required type="text" class="form-control @error('topic') is-invalid @enderror" id="topic" name="topic" value="{{ old('topic') }}" />
                    @error('topic')
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
                    <textarea required class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                    @error('description')
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
                    <input required type="text" class="form-control @error('speaker') is-invalid @enderror" id="speaker" name="speaker" value="{{ old('speaker') }}" />
                    @error('speaker')
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
                            <input required type="number" class="form-control @error('quota') is-invalid @enderror" id="quota" name="quota" value="{{ old('quota') }}" />
                            @error('quota')
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
                    <input required type="text" class="form-control @error('pic') is-invalid @enderror" id="pic" name="pic" value="{{ old('pic') }}" />
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
                    <input required class="form-control @error('schedule') is-invalid @enderror" id="schedule" name="schedule" type="date" value="{{ old('schedule') }}" />
                    @error('schedule')
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
                    <input required class="form-control @error('deadline') is-invalid @enderror" id="deadline" name="deadline" type="date" value="{{ old('deadline') }}" />
                    @error('deadline')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="form-group"><button class="btn btn-primary w-100" type="submit">{{ __('Create Webinar') }}</button></div>
            </div>
        </div>
    </form>
@endsection
