<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Register | {{ env('APP_NAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ env('APP_DESC') }}" name="description" />
    <meta content="{{ env('APP_AUTHOR') }}" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('img/fav.png') }}">

    <!-- Layout config Js -->
    <script src="{{ asset('invoika') }}/assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('invoika') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('invoika') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('invoika') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <style>
        body {
            background: url('{{ asset('img/puskesmas-lohbener-bg.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body class="auth-bg 100-vh">
    <div class="bg-overlay bg-light"></div>

    <div class="account-pages">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="auth-full-page-content d-flex min-vh-100 py-sm-5 py-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100 py-0 py-xl-4">

                                <div class="text-center mb-5">
                                    <a href="index.html">
                                        <span class="logo-lg">
                                            <img src="{{ asset('img/logouptd.png') }}" alt="" style="width: 400px;">
                                        </span>
                                    </a>
                                </div>

                                <div class="card my-auto overflow-hidden" style="border-radius:5%;">
                                    <div class="row g-0">
                                        <div class="col-lg-12">
                                            <div class="p-lg-5 p-4">
                                                <div class="text-center">
                                                    <h5 class="mb-0">{{ env('APP_NAME') }}</h5>
                                                    <p class="text-muted mt-2">{{ env('APP_DESC') }}</p>
                                                </div>
                                                @include('components.flash_messages')

                                                <div class="mt-4">
                                                    <form method="POST" action="{{ route('register') }}">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Name</label>
                                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="{{ old('name') }}" required autofocus>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="username" class="form-label">Username</label>
                                                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" value="{{ old('username') }}" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="password" class="form-label">Password</label>
                                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                                <input type="password" class="form-control pe-5 password-input" name="password" placeholder="Enter password" id="password-input" required autocomplete="new-password">
                                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="las la-eye align-middle fs-18"></i></button>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                                <input type="password" class="form-control pe-5 password-input" name="password_confirmation" placeholder="Confirm password" id="password-confirmation-input" required>
                                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-confirmation-addon"><i class="las la-eye align-middle fs-18"></i></button>
                                                            </div>
                                                        </div>

                                                        <div class="mt-2">
                                                            <button class="btn btn-warning w-100" type="submit">Register</button>
                                                        </div>
                                                    </form>
                                                    <div class="mt-3 text-center">
                                                        <a href="{{ route('login') }}" class="btn btn-link">Already registered? Log In</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->

                                <div class="mt-5 text-center">
                                    <p class="mb-0 text-muted">© 2024 {{ env('APP_NAME') }}. Developed by Wahyu Ramadhan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('invoika') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('invoika') }}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('invoika') }}/assets/libs/node-waves/waves.min.js"></script>
    <script src="{{ asset('invoika') }}/assets/libs/feather-icons/feather.min.js"></script>
    <script src="{{ asset('invoika') }}/assets/js/plugins.js"></script>

    <!-- password-addon init -->
    <script src="{{ asset('invoika') }}/assets/js/pages/password-addon.init.js"></script>

</body>
</html>
