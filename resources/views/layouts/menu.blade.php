@extends('layouts.head')

@section('body')
<body class="bg-gradient-primary">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-12 col-xl-10">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-flex">
                            <div class="flex-grow-1 bg-password-image" style="background-image: url('{{ asset('img/itb.jpeg') }}');"></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @yield('content')
                                <hr>
                                <div class="d-flex d-sm-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-xl-center align-items-xl-center">
                                    <i class="fas fa-language" style="margin-right: 10px;"></i>
                                    <a href="#" style="margin-right: 10px;">English</a>
                                    <a href="#">Indonesia</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
@endsection
