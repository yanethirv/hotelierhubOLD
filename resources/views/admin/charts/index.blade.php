@extends('layouts.vuexy')

@section('title')
{{ __("Charts") }}
@endsection

@section('extra-css')
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/charts/apexcharts.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/pages/dashboard-ecommerce.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/pages/card-analytics.css') }}">
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
                                    <li class="breadcrumb-item"><a href="">{{ __("Dashboard") }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="">{{ __("Reports") }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __("Charts") }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-2">
                                    <div class="avatar bg-rgba-primary p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-users text-primary font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{ $clientsTotal }}</h2>
                                    <p class="mb-0">{{ __("Clients") }}</p>
                                </div>
                               {{-- <div class="card-content">
                                    <div id="line-area-chart-1"></div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-2">
                                    <div class="avatar bg-rgba-success p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-credit-card text-success font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{ $totalAmountSubscriptions }}$</h2>
                                    <p class="mb-0">{{ __("Revenue Generated from Subscriptions") }}</p>
                                </div>
                                {{-- <div class="card-content">
                                    <div id="line-area-chart-2"></div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-2">
                                    <div class="avatar bg-rgba-warning p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-package text-warning font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{ $totalAmountProducts }}$</h2>
                                    {{-- <p class="mb-0">Quarterly Sales</p> --}}
                                    <p class="mb-0">{{ __("Revenue Generated from Products") }}</p>
                                </div>
                                {{--  <div class="card-content">
                                    <div id="line-area-chart-3"></div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-2">
                                    <div class="avatar bg-rgba-danger p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-shopping-cart text-danger font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{ $totalOrders }}</h2>
                                    <p class="mb-0">{{ __("Orders Received") }}</p>
                                </div>
                                {{--  <div class="card-content">
                                    <div id="line-area-chart-4"></div>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- <div class="col-lg-4 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-end">
                                    <h4>Sessions By Device</h4>
                                    <div class="dropdown chart-dropdown">
                                        <button class="btn btn-sm border-0 dropdown-toggle px-0" type="button" id="dropdownItem1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Last 7 Days
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownItem1">
                                            <a class="dropdown-item" href="#">Last 28 Days</a>
                                            <a class="dropdown-item" href="#">Last Month</a>
                                            <a class="dropdown-item" href="#">Last Year</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body pt-0">
                                        <div id="session-chart" class="mb-1"></div>
                                        <div class="chart-info d-flex justify-content-between mb-1">
                                            <div class="series-info d-flex align-items-center">
                                                <i class="feather icon-monitor font-medium-2 text-primary"></i>
                                                <span class="text-bold-600 mx-50">Desktop</span>
                                                <span> - 58.6%</span>
                                            </div>
                                            <div class="series-result">
                                                <span>2%</span>
                                                <i class="feather icon-arrow-up text-success"></i>
                                            </div>
                                        </div>
                                        <div class="chart-info d-flex justify-content-between mb-1">
                                            <div class="series-info d-flex align-items-center">
                                                <i class="feather icon-tablet font-medium-2 text-warning"></i>
                                                <span class="text-bold-600 mx-50">Mobile</span>
                                                <span> - 34.9%</span>
                                            </div>
                                            <div class="series-result">
                                                <span>8%</span>
                                                <i class="feather icon-arrow-up text-success"></i>
                                            </div>
                                        </div>
                                        <div class="chart-info d-flex justify-content-between mb-50">
                                            <div class="series-info d-flex align-items-center">
                                                <i class="feather icon-tablet font-medium-2 text-danger"></i>
                                                <span class="text-bold-600 mx-50">Tablet</span>
                                                <span> - 6.5%</span>
                                            </div>
                                            <div class="series-result">
                                                <span>-5%</span>
                                                <i class="feather icon-arrow-down text-danger"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="col-lg-4 col-sm-4 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between pb-0">
                                    <h4 class="card-title">Clients</h4>
                                    <div class="dropdown chart-dropdown">
                                        {{--  <button class="btn btn-sm border-0 dropdown-toggle px-0" type="button" id="dropdownItem3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Last 7 Days
                                        </button> --}}
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body py-0">
                                        {!! $usersStatus->container() !!}
 
                                        <script src="{{ asset('vendor/larapex-charts/apexcharts.js') }}"></script>
                                        
                                
                                        {{ $usersStatus->script() }}
                                    </div>
                                    <ul class="list-group list-group-flush customer-info">
                                        <li class="list-group-item d-flex justify-content-between ">
                                            <div class="series-info">
                                                <i class="fa fa-circle font-small-3 text-primary"></i>
                                                <span class="text-bold-600">Actives</span>
                                            </div>
                                            <div class="product-result">
                                                <span>{{ $usersActives }}</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between ">
                                            <div class="series-info">
                                                <i class="fa fa-circle font-small-3 text-danger"></i>
                                                <span class="text-bold-600">Inactives</span>
                                            </div>
                                            <div class="product-result">
                                                <span>{{ $usersInactives}}</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-sm-8 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-end">
                                    <h4 class="mb-0">{{ __("Total Clients Monthly") }}</h4>
                                    <p class="font-medium-5 mb-0"><i class="feather icon-help-circle text-muted cursor-pointer"></i></p>
                                </div>
                                <div class="card-content">
                                    <div class="card-body py-0">
                                        {!! $usersPerMonth->container() !!}
 
                                        <script src="{{ asset('vendor/larapex-charts/apexcharts.js') }}"></script>
                                        
                                
                                        {{ $usersPerMonth->script() }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-md-4 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Browser Statistics</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-25">
                                            <div class="browser-info">
                                                <p class="mb-25">Google Chrome</p>
                                                <h4>73%</h4>
                                            </div>
                                            <div class="stastics-info text-right">
                                                <span>800 <i class="feather icon-arrow-up text-success"></i></span>
                                                <span class="text-muted d-block">13:16</span>
                                            </div>
                                        </div>
                                        <div class="progress progress-bar-primary mb-2">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="73" aria-valuemin="73" aria-valuemax="100" style="width:73%"></div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-25">
                                            <div class="browser-info">
                                                <p class="mb-25">Opera</p>
                                                <h4>8%</h4>
                                            </div>
                                            <div class="stastics-info text-right">
                                                <span>-200 <i class="feather icon-arrow-down text-danger"></i></span>
                                                <span class="text-muted d-block">13:16</span>
                                            </div>
                                        </div>
                                        <div class="progress progress-bar-primary mb-2">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="8" aria-valuemin="8" aria-valuemax="100" style="width:8%"></div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-25">
                                            <div class="browser-info">
                                                <p class="mb-25">Firefox</p>
                                                <h4>19%</h4>
                                            </div>
                                            <div class="stastics-info text-right">
                                                <span>100 <i class="feather icon-arrow-up text-success"></i></span>
                                                <span class="text-muted d-block">13:16</span>
                                            </div>
                                        </div>
                                        <div class="progress progress-bar-primary mb-2">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="19" aria-valuemin="19" aria-valuemax="100" style="width:19%"></div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-25">
                                            <div class="browser-info">
                                                <p class="mb-25">Internet Explorer</p>
                                                <h4>27%</h4>
                                            </div>
                                            <div class="stastics-info text-right">
                                                <span>-450 <i class="feather icon-arrow-down text-danger"></i></span>
                                                <span class="text-muted d-block">13:16</span>
                                            </div>
                                        </div>
                                        <div class="progress progress-bar-primary mb-50">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="27" aria-valuemin="27" aria-valuemax="100" style="width:27%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    
                    <div class="row">
                        {{-- <div class="col-lg-8 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-end">
                                    <h4 class="card-title">Revenue</h4>
                                    <p class="font-medium-5 mb-0"><i class="feather icon-settings text-muted cursor-pointer"></i></p>
                                </div>
                                <div class="card-content">
                                    <div class="card-body pb-0">
                                        <div class="d-flex justify-content-start">
                                            <div class="mr-2">
                                                <p class="mb-50 text-bold-600">This Month</p>
                                                <h2 class="text-bold-400">
                                                    <sup class="font-medium-1">$</sup>
                                                    <span class="text-success">86,589</span>
                                                </h2>
                                            </div>
                                            <div>
                                                <p class="mb-50 text-bold-600">Last Month</p>
                                                <h2 class="text-bold-400">
                                                    <sup class="font-medium-1">$</sup>
                                                    <span>73,683</span>
                                                </h2>
                                            </div>

                                        </div>
                                        <div id="revenue-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-end">
                                    <h4 class="mb-0">{{ __("Services Request") }}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body px-0 pb-0">
                                        <div class="row text-center mx-0">
                                            <div class="col-6 border-top border-right d-flex align-items-between flex-column py-2">
                                                <p class="badge badge-warning badge-lg mr-1 mb-1 mb-50">{{ __("On Wait") }}</p>
                                                <p class="font-large-1 text-bold-700 mt-1">{{ $productsRequestWait }}</p>
                                            </div>
                                            <div class="col-6 border-top d-flex align-items-between flex-column py-2">
                                                <p class="badge badge-primary badge-lg mr-1 mb-1 mb-50">{{ __("In Process") }}</p>
                                                <p class="font-large-1 text-bold-700 mt-1">{{ $productsRequestProcess }}</p>
                                            </div>
                                        </div>
                                        <div class="row text-center mx-0">
                                            <div class="col-6 border-top border-right d-flex align-items-between flex-column py-2">
                                                <p class="badge badge-success badge-lg mr-1 mb-1 mb-50">{{ __("Active") }}</p>
                                                <p class="font-large-1 text-bold-700 mt-1">{{ $productsRequestActive }}</p>
                                            </div>
                                            <div class="col-6 border-top d-flex align-items-between flex-column py-2">
                                                <p class="badge badge-danger badge-lg mr-1 mb-1 mb-50">{{ __("Inactive") }}</p>
                                                <p class="font-large-1 text-bold-700 mt-1">{{ $productsRequestActive }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-end">
                                    <h4 class="mb-0">{{ __("Subscriptions Request") }}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body px-0 pb-0">
                                        <div class="row text-center mx-0">
                                            <div class="col-6 border-top border-right d-flex align-items-between flex-column py-2">
                                                <p class="badge badge-warning badge-lg mr-1 mb-1 mb-50">{{ __("On Wait") }}</p>
                                                <p class="font-large-1 text-bold-700 mt-1">{{ $subscriptionsRequestWait }}</p>
                                            </div>
                                            <div class="col-6 border-top d-flex align-items-between flex-column py-2">
                                                <p class="badge badge-primary badge-lg mr-1 mb-1 mb-50">{{ __("In Process") }}</p>
                                                <p class="font-large-1 text-bold-700 mt-1">{{ $subscriptionsRequestProcess }}</p>
                                            </div>
                                        </div>
                                        <div class="row text-center mx-0">
                                            <div class="col-6 border-top border-right d-flex align-items-between flex-column py-2">
                                                <p class="badge badge-success badge-lg mr-1 mb-1 mb-50">{{ __("Active") }}</p>
                                                <p class="font-large-1 text-bold-700 mt-1">{{ $subscriptionsRequestActive }}</p>
                                            </div>
                                            <div class="col-6 border-top d-flex align-items-between flex-column py-2">
                                                <p class="badge badge-danger badge-lg mr-1 mb-1 mb-50">{{ __("Inactive") }}</p>
                                                <p class="font-large-1 text-bold-700 mt-1">{{ $subscriptionsRequestActive }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-end">
                                    <h4 class="mb-0">{{ __("Total Amount Subscriptions Monthly") }}</h4>
                                    <p class="font-medium-5 mb-0"><i class="feather icon-help-circle text-muted cursor-pointer"></i></p>
                                </div>
                                <div class="card-content">
                                    <div class="card-body py-0">
                                        {!! $amountPerMonthSubscriptions->container() !!}
 
                                        <script src="{{ asset('vendor/larapex-charts/apexcharts.js') }}"></script>
                                        
                                
                                        {{ $amountPerMonthSubscriptions->script() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-end">
                                    <h4 class="mb-0">{{ __("Total Amount Products Monthly") }}</h4>
                                    <p class="font-medium-5 mb-0"><i class="feather icon-help-circle text-muted cursor-pointer"></i></p>
                                </div>
                                <div class="card-content">
                                    <div class="card-body py-0">
                                        {!! $amountPerMonthProducts->container() !!}
 
                                        <script src="{{ asset('vendor/larapex-charts/apexcharts.js') }}"></script>
                                        
                                
                                        {{ $amountPerMonthProducts->script() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bar 
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-end">
                                    <h4 class="mb-0">{{ __("Bar") }}</h4>
                                    <p class="font-medium-5 mb-0"><i class="feather icon-help-circle text-muted cursor-pointer"></i></p>
                                </div>
                                <div class="card-content">
                                    <div class="card-body py-0">
                                        {!! $nuevo->container() !!}
 
                                        <script src="{{ asset('vendor/larapex-charts/apexcharts.js') }}"></script>
                                        
                                
                                        {{ $nuevo->script() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->

                    

                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-end">
                                    <h4 class="mb-0">{{ __("Total Subscriptions Monthly") }}</h4>
                                    <p class="font-medium-5 mb-0"><i class="feather icon-help-circle text-muted cursor-pointer"></i></p>
                                </div>
                                <div class="card-content">
                                    <div class="card-body py-0">
                                        {!! $requestPerMonthSubscription->container() !!}
 
                                        <script src="{{ asset('vendor/larapex-charts/apexcharts.js') }}"></script>
                                        
                                
                                        {{ $requestPerMonthSubscription->script() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-end">
                                    <h4 class="mb-0">{{ __("Total Products Monthly") }}</h4>
                                    <p class="font-medium-5 mb-0"><i class="feather icon-help-circle text-muted cursor-pointer"></i></p>
                                </div>
                                <div class="card-content">
                                    <div class="card-body py-0">
                                        {!! $requestPerMonthProducts->container() !!}
 
                                        <script src="{{ asset('vendor/larapex-charts/apexcharts.js') }}"></script>
                                        
                                
                                        {{ $requestPerMonthProducts->script() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>

        </div>
    </div>
    <!-- END: Content-->
@endsection

@section('extra-script')
    <script src="{{ asset('vendors/js/tables/ag-grid/ag-grid-community.min.noStyle.js') }}"></script>
    <script src="{{ asset('vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('js/scripts/pages/dashboard-ecommerce.js') }}"></script>
@endsection