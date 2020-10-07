@extends('layouts.menu')

@section('content')
    <div class="text-center">
        <h4 class="text-dark mb-4">{{ __('Register') }}</h4>
    </div>
    <form class="user" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input class="form-control form-control-user @error('name') is-invalid @enderror" type="text" id="name"
                   placeholder="John Doe" name="name" value="{{ old('name') }}">
            @error('name')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">{{ __('E-Mail Address') }}</label>
            <input class="form-control form-control-user @error('email') is-invalid @enderror" type="email" id="email"
                   aria-describedby="emailHelp" placeholder="johndoe@example.com" name="email" value="{{ old('email') }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input class="form-control form-control-user @error('password') is-invalid @enderror" type="password"
                   id="password" name="password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>
            <input class="form-control form-control-user" type="password" id="password-confirm"
                   name="password_confirmation">
        </div>
        <div class="form-group">
            <label for="date-of-birth">{{ __('Date of Birth') }}</label>
            <input class="form-control form-control-user @error('date_of_birth') is-invalid @enderror"
                   id="date-of-birth" type="date" name="date_of_birth" value="{{ old('date_of_birth') }}">
            @error('date_of_birth')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="gender" style="min-width: 100%;">Gender</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="gender-male" value="laki-laki" name="gender" {{ old('gender')=='laki-laki' ? 'checked' : old('gender', 'checked') }}>
                <label class="form-check-label" for="gender-male">{{  __('Male') }}</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="gender-female" value="perempuan" name="gender" {{ old('gender')=='perempuan' ? 'checked' : '' }}>
                <label class="form-check-label" for="gender-female">{{ __('Female') }}</label>
            </div>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control custom-select @error('category') is-invalid @enderror" id="category" name="category">
                <option value="pelajar" {{ old('category')=='pelajar' ? 'selected' : '' }}>{{ __('Student') }}</option>
                <option value="mahasiswa" {{ old('category')=='mahasiswa' ? 'selected' : '' }}>{{ __('College Student') }}</option>
                <option value="umum" {{ old('category')=='umum' ? 'selected' : '' }}>{{ __('Public') }}</option>
            </select>
            @error('category')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button class="btn btn-primary btn-block text-white btn-user" type="submit">{{ __('Register') }}</button>
    </form>
    <hr>
    <div class="text-center">
        <a class="small" href="{{ route('login') }}">{{ __('Already have an account? Login!')}}<br></a>
    </div>
@endsection
