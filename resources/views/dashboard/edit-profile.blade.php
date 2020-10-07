@extends('layouts.dashboard_general')

@section('content')
    <h3 class="text-dark mb-4">{{ __('Edit Profile') }}</h3>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-body text-center shadow">
                    <img class="rounded-circle mb-3 mt-4" src="{{ asset('avatars/' . $user->avatar) }}" width="160" height="160">
                    <div class="mb-3">
                        <form method="POST" action="{{ route('profile.edit_avatar') }}" enctype="multipart/form-data">
                            @csrf
                            <label for="avatarFile">{{ __('Choose Image') }}</label>
                            <input type="file" name="avatar" class="mb-2 form-control @error('avatar') is-invalid @enderror" id="avatarFile" required>
                            @error('avatar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <button class="btn btn-primary w-100" type="submit">{{ __('Change Photo') }}</button>
                        </form>
                        @if($user->avatar != 'default.jpg')
                        <form method="POST" action="{{ route('profile.delete_avatar') }}">
                            @csrf
                            <button class="btn mt-2 btn-danger w-100" type="submit">{{ __('Delete Photo') }}</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="text-primary font-weight-bold m-0">{{ __('Change Password') }}</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.edit_password') }}">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="password">
                                        <strong>{{ __('Current Password') }}</strong>
                                    </label>
                                    <input autocomplete="password" class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password">
                                    @error('password')
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
                                    <label for="new-password">
                                        <strong>{{ __('New Password') }}</strong>
                                    </label>
                                    <input autocomplete="new-password" class="form-control @error('new_password') is-invalid @enderror" type="password" id="new-password" name="new_password">
                                    @error('new_password')
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
                                    <label for="new-password-confirm">
                                        <strong>{{ __('Retype New Password') }}</strong>
                                    </label>
                                    <input autocomplete="new-password" class="form-control" type="password" id="new-password-confirm" name="new_password_confirmation">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit">{{ __('Change Password') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">{{ __('User Info') }}</p>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('profile.edit_info') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name">
                                                <strong>{{ __('Name') }}</strong>
                                            </label>
                                            <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name', $user->name) }}">
                                            @error('name')
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
                                            <label for="email">
                                                <strong>{{ __('E-Mail Address') }}</strong>
                                            </label>
                                            <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email', $user->email) }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <span class="text-danger">
                                                {{ __('If you changed your email address, your account will be locked until you confirm the new email. Proceed with careful.') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm" type="submit">{{ __('Save Info') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">{{ __('User Profile') }}</p>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('profile.edit_profile') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="date-of-birth">
                                                <strong>{{ __('Date of Birth') }}</strong><br>
                                            </label>
                                            <input class="form-control @error('date_of_birth') is-invalid @enderror form-control-user" id="date-of-birth" type="date" name="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth) }}">
                                            @error('date_of_birth')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="gender">
                                            <strong>{{ __('Gender') }}</strong>
                                            </label>
                                            <select class="form-control @error('gender') is-invalid @enderror custom-select" name="gender" id="gender">
                                                <option value="laki-laki" {{ (empty(old('gender'))? ($user->gender == 'laki-laki'? 'selected' : '') : (old('gender')=='laki-laki' ? 'selected' : '')) }}>{{ __('Male') }}</option>
                                                <option value="perempuan" {{ (empty(old('perempuan'))? ($user->gender == 'perempuan'? 'selected' : '') : (old('gender')=='perempuan' ? 'selected' : '')) }}>{{ __('Female') }}</option>
                                            </select>
                                            @error('gender')
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
                                            <label for="country">
                                                <strong>{{ __('Category') }}</strong>
                                            </label>
                                            <select class="form-control @error('category') is-invalid @enderror custom-select" name="category" id="category">
                                                <option value="pelajar" {{ (empty(old('category'))? ($user->category == 'pelajar'? 'selected' : '') : (old('category')=='pelajar' ? 'selected' : '')) }}>{{ __('Student') }}</option>
                                                <option value="mahasiswa" {{ (empty(old('category'))? ($user->category == 'mahasiswa'? 'selected' : '') : (old('category')=='mahasiswa' ? 'selected' : '')) }}>{{ __('College Student') }}</option>
                                                <option value="umum" {{ (empty(old('category'))? ($user->category == 'umum'? 'selected' : '') : (old('category')=='umum' ? 'selected' : '')) }}>{{ __('Public') }}</option>
                                            </select>
                                            @error('category')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm" type="submit">{{ __('Save Profile') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col" style="text-align: right;">
                    <a class="btn btn-info w-100" href="{{ route('profile.show') }}" type="button">{{ __('Back to Profile') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
