<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Hotelier Hub">
    <meta name="keywords" content="Hotelier">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hotelier Hub - {{ __("Login") }}</title>
    <link rel="apple-touch-icon" href="{{ asset('images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/authentication.css') }}">
    <!-- END: Page CSS-->
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" data-layout="semi-dark-layout">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-11 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                    <!--<img src="{{ asset('images/pages/login.png') }}" alt="branding logo">-->
                                    <h1 class="text-primary">HOTELIER HUB</h1>
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">{{ __("Login") }}</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">{{ __("Welcome back, please login to your account.") }}</p>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <form method="POST" action="{{ route('login') }}">
                                                    @csrf
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input id="email" type="email" class="form-control" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="{{ __('Email') }}" required>
                                                        @error('email')
                                                        <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                                            <i class="feather icon-info mr-1 align-middle"></i>
                                                            <span>{{ $message }}</span>
                                                        </div>
                                                        @enderror
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label for="email">{{ __('E-Mail Address') }}</label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                        <input id="password" type="password" class="form-control" @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="{{ __('Password') }}" required>
                                                        @error('password')
                                                        <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                                            <i class="feather icon-info mr-1 align-middle"></i>
                                                            <span>{{ $message }}</span>
                                                        </div>
                                                        @enderror

                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label for="user-password">{{ __('Password') }}</label>
                                                    </fieldset>

                                                    <div class="form-group d-flex justify-content-between align-items-center">
                                                        <div class="text-left">
                  
                                                        </div>
                                                        <div class="text-right">
                                                            @if (Route::has('password.request'))
                                                                <a class="card-link" href="{{ route('password.request') }}">
                                                                    {{ __('Forgot your password?') }}
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <a href="{{ route('register') }}" class="btn btn-outline-primary float-left btn-inline">{{ __('Register') }}</a>
                                                    <button type="submit" class="btn btn-primary float-right btn-inline">{{ __('Log In') }}</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="login-footer">
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('js/core/app-menu.js') }}"></script>
    <script src="{{ asset('js/core/app.js') }}"></script>
    <script src="{{ asset('js/scripts/components.js') }}"></script>
    <!-- END: Theme JS-->
</body>
<!-- END: Body-->
</html>