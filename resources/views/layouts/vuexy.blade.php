<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Hotelier Hub - @yield('title')</title>
    <!-- Scripts -->
    <script src="{{ asset('js-old/app.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
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
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/extensions/sweetalert2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/extensions/toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/themes/semi-dark-layout.css') }}">
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/core/colors/palette-gradient.css') }}">
    <!-- END: Page CSS-->
    @yield('extra-css')
    @livewireStyles
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- nav bar include -->
    @include('layouts.partials.nav')

    <!-- side bar -->
    @include('layouts.partials.side-bar')

    @yield('content')

    <!-- include footer -->
    @include('layouts.partials.footer')

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('vendors/js/extensions/toastr.min.js') }}"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('js/core/app-menu.js') }}"></script>
    <script src="{{ asset('js/core/app.js') }}"></script>
    <script src="{{ asset('js/scripts/components.js') }}"></script>
    <script src="{{ asset('js/scripts/extensions/sweet-alerts.min.js') }}"></script>
    <!-- END: Theme JS-->

    @include('common.messages-toastr')
    
    @yield('extra-script')
    @livewireScripts
</body>
<!-- END: Body-->
</html>
