@extends('layouts.vuexy')

@section('title')
{{ __("Subscriptions Request") }}
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
                                    <li class="breadcrumb-item"><a href="">{{ __("Subscriptions Request") }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __("List Subscriptions Request") }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @livewire('admin.subscriptions-request-component')
        </div>
    </div>
    <!-- END: Content-->
@endsection

@section('extra-script')
    <script src="{{ asset('vendors/js/tables/ag-grid/ag-grid-community.min.noStyle.js') }}"></script>
    <script src="{{ asset('js/scripts/modal/components-modal.js') }}"></script>
@endsection
                