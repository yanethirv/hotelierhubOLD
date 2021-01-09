@extends('layouts.vuexy')

@section('title')
Dashboard
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body">
                @role('super-admin|admin')
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
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
                                    <h4 class="mb-0">{{ __("Products Request") }}</h4>
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
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between pb-0">
                                    <h4 class="card-title">Clients</h4>
                                    <div class="dropdown chart-dropdown">
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
                        <div class="col-lg-8 col-md-8 col-12">
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
                        <!--<div class="col-lg-8 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between pb-0">
                                    <h4 class="card-title">Support Tracker</h4>
                                    <div class="dropdown chart-dropdown">
                                        <button class="btn btn-sm border-0 dropdown-toggle p-0" type="button" id="dropdownItem4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Last 7 Days
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownItem4">
                                            <a class="dropdown-item" href="#">Last 28 Days</a>
                                            <a class="dropdown-item" href="#">Last Month</a>
                                            <a class="dropdown-item" href="#">Last Year</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-sm-2 col-12 d-flex flex-column flex-wrap text-center">
                                                <h1 class="font-large-2 text-bold-700 mt-2 mb-0">163</h1>
                                                <small>Tickets</small>
                                            </div>
                                            <div class="col-sm-10 col-12 d-flex justify-content-center">
                                                <div id="support-tracker-chart"></div>
                                            </div>
                                        </div>
                                        <div class="chart-info d-flex justify-content-between">
                                            <div class="text-center">
                                                <p class="mb-50">New Tickets</p>
                                                <span class="font-large-1">29</span>
                                            </div>
                                            <div class="text-center">
                                                <p class="mb-50">Open Tickets</p>
                                                <span class="font-large-1">63</span>
                                            </div>
                                            <div class="text-center">
                                                <p class="mb-50">Response Time</p>
                                                <span class="font-large-1">1d</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>

                </section>
                <!-- Dashboard Analytics end -->
                @endrole

                @role('user')
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="mb-0">Subscriptions Request</h4>
                                </div>
                                <div class="card-content">
                                    <div class="table-responsive mt-1">
                                        <table class="table table-hover-animation mb-0">
                                            <thead>
                                                <tr>
                                                    <th>ORDER</th>
                                                    <th>PRODUCT</th>
                                                    <th>STATUS</th>
                                                    <th>DATE</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($userSubscriptionsRequest as $subscriptionsRequest)
                                                <tr>
                                                    <td>{{ $subscriptionsRequest->subscription->stripe_id }}</td>
                                                    <td>{{ $subscriptionsRequest->subscription->stripe_plan }}</td>
                                                    @if ($subscriptionsRequest->status == 'process')
                                                        <td><i class="fa fa-circle font-small-3 text-primary mr-50"></i>
                                                            {{ $subscriptionsRequest->status }}
                                                        </td>
                                                    @endif
                                                    @if ($subscriptionsRequest->status == 'review')
                                                        <td><i class="fa fa-circle font-small-3 text-warning mr-50"></i>
                                                            {{ $subscriptionsRequest->status }}
                                                        </td>
                                                    @endif
                                                    @if ($subscriptionsRequest->status == 'wait')
                                                        <td><i class="fa fa-circle font-small-3 text-warning mr-50"></i>
                                                            {{ $subscriptionsRequest->status }}
                                                        </td>
                                                    @endif
                                                    @if ($subscriptionsRequest->status == 'active')
                                                        <td><i class="fa fa-circle font-small-3 text-success mr-50"></i>
                                                            {{ $subscriptionsRequest->status }}
                                                        </td>
                                                    @endif
                                                    @if ($subscriptionsRequest->status == 'inactive')
                                                        <td><i class="fa fa-circle font-small-3 text-danger mr-50"></i>
                                                            {{ $subscriptionsRequest->status }}
                                                        </td>
                                                    @endif
                                                    <td>{{ $subscriptionsRequest->created_at }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="mb-0">Products Request</h4>
                                </div>
                                <div class="card-content">
                                    <div class="table-responsive mt-1">
                                        <table class="table table-hover-animation mb-0">
                                            <thead>
                                                <tr>
                                                    <th>ORDER</th>
                                                    <th>PRODUCT</th>
                                                    <th>STATUS</th>
                                                    <th>DATE</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($userProductsRequest as $productRequest)
                                                <tr>
                                                    <td>{{ $productRequest->orderLine->order->invoice_id }}</td>
                                                    <td>{{ $productRequest->orderLine->product->name }}</td>
                                                    @if ($productRequest->status == 'process')
                                                        <td><i class="fa fa-circle font-small-3 text-primary mr-50"></i>
                                                            {{ $productRequest->status }}
                                                        </td>
                                                    @endif
                                                    @if ($productRequest->status == 'review')
                                                        <td><i class="fa fa-circle font-small-3 text-warning mr-50"></i>
                                                            {{ $productRequest->status }}
                                                        </td>
                                                    @endif
                                                    @if ($productRequest->status == 'wait')
                                                        <td><i class="fa fa-circle font-small-3 text-warning mr-50"></i>
                                                            {{ $productRequest->status }}
                                                        </td>
                                                    @endif
                                                    @if ($productRequest->status == 'active')
                                                        <td><i class="fa fa-circle font-small-3 text-success mr-50"></i>
                                                            {{ $productRequest->status }}
                                                        </td>
                                                    @endif
                                                    @if ($productRequest->status == 'inactive')
                                                        <td><i class="fa fa-circle font-small-3 text-danger mr-50"></i>
                                                            {{ $productRequest->status }}
                                                        </td>
                                                    @endif
                                                    <td>{{ $productRequest->created_at }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Dashboard Analytics end -->
                @endrole
            </div>
        </div>
    </div>
    <!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
@endsection
