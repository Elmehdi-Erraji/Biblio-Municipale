@extends('layouts.login')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
   
    <title>Bookie</title>

   
</head>
@section('content')
<body class="authentication-bg position-relative">
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xxl-8 col-lg-10">
            <div class="card overflow-hidden">
                <div class="row g-0">
                    <div class="col-lg-6 d-none d-lg-block p-2">
                        <img src="{{ asset('images/auth-img.jpg') }}" alt="" class="img-fluid rounded h-100">
                    </div>
                    <div class="col-lg-6">
                        <div class="d-flex flex-column h-100">
                            <div class="p-4 my-auto">
                                <h4 class="fs-20">Sign In</h4>
                                <p class="text-muted mb-3">Enter your email address and password to access account.</p>

                                <!-- Laravel Blade form -->
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="emailaddress" class="form-label">Email address</label>
                                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="emailaddress"  value="{{ old('email') }}" placeholder="Enter your email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <a href="{{ route('password.request') }}" class="text-muted float-end"><small>Forgot your password?</small></a>
                                        <label for="password" class="form-label">Password</label>
                                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"  id="password" placeholder="Enter your password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-0 text-start">
                                        <button class="btn btn-soft-primary w-100" type="submit" name="login"><i class="ri-login-circle-fill me-1"></i> <span class="fw-bold">Log In</span> </button>
                                    </div>
                                </form>
                                <!-- End Laravel Blade form -->

                                <div class="text-center mt-4">
                                    <p class="text-muted fs-16">Sign in with</p>
                                    <div class="d-flex gap-2 justify-content-center mt-3">
                                        <a href="#" class="btn btn-soft-primary"><i class="ri-facebook-circle-fill"></i></a>
                                        <a href="#" class="btn btn-soft-danger"><i class="ri-google-fill"></i></a>
                                        <a href="#" class="btn btn-soft-info"><i class="ri-twitter-fill"></i></a>
                                        <a href="#" class="btn btn-soft-dark"><i class="ri-github-fill"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
            </div>
        </div>
           <!-- end row -->
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <p class="text-dark-emphasis">Don't have an account? <a href="{{ route('register') }}" class="text-dark fw-bold ms-1 link-offset-3 text-decoration-underline"><b>Sign up</b></a>
            </p>
            
        </div> <!-- end col -->
    </div>
</div>
<footer class="footer footer-alt fw-medium">
    <span class="text-dark-emphasis">
        <script>
            document.write(new Date().getFullYear())
        </script> © Mehdi
    </span>
</footer>
@endsection

@section('scripts')
<!-- Include your JS files -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/vendor.js') }}"></script>
</body>
@endsection
