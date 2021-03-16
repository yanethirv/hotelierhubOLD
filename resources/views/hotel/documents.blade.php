@extends('layouts.vuexy')

@section('title')
{{ __("My Hotel - Documents") }}
@endsection

@section('extra-css')

@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __("Dashboard") }}</a>
                                    </li>
                                    <li class="breadcrumb-item">{{ __("My Hotel") }}
                                    </li>
                                    <li class="breadcrumb-item active">{{ __("Documents") }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @livewire('hotel.documentshotel-component') <!-- 2 - Apunta a HTTP/CONTROLLERS/LIVEWIRE/HOTEL -->
        </div>
    </div>
    <!-- END: Content-->
@endsection

@section('extra-script')

@endsection