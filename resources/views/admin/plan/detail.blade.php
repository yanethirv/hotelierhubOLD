@extends('layouts.vuexy')

@section('title')
{{ __("Order Details") }}
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
                                <li class="breadcrumb-item"><a href="{{route('home')}}">{{ __("Dashboard") }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ __("Orders") }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <!-- invoice functionality start -->
            <section class="invoice-print mb-1">
                 <div class="row">
                    <fieldset class="col-12 col-md-5 mb-1 mb-md-0">
                        <div class="input-group">

                            </div>
                    </fieldset> 
                    <div class="col-12 col-md-7 d-flex flex-column flex-md-row justify-content-end">
                        <a href="{{ route('orders.index') }}" class="btn btn-outline-primary ml-0 ml-md-1">{{ __("Back") }}</a>
                    </div>
                </div>
            </section>
            <!-- invoice functionality end -->
            <section id="content-types">
                <div class="row match-height">
                    <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="card">
                            <h1 class="text-center my-2">{{ __("Order Information") }}</h1>
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-dark text-center">
                                        <tr>
                                            <th scope="col">{{ __("ID Order") }}</th>
                                            <th scope="col">{{ __("Amount with Taxes") }}</th>
                                            <th scope="col">{{ __("Status") }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                            <tr>
                                                <th scope="row">{{ $currentPlan->id }}</th>
                                                <th scope="col">${{ $plan->amount }}.00</th>
                                                <th scope="col">
                                                    <span class="badge badge-pill badge-success badge-md">
                                                        {{ $currentPlan->stripe_status }}
                                                    </span>
                                                </th>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card">
                            <h1 class="text-center my-2">{{ __("Order Lines") }}</h1>
                            <table class="table mb-0">
                                <thead class="thead-dark text-center">
                                <tr>
                                    <th scope="col">{{ __("Service") }}</th>
                                    <th scope="col">{{ __("Amount without Taxes") }}</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <th scope="row">
                                            <p>{{ __("Service :course", ["course" => $plan->nickname]) }}</p>
                                        </th>
                                        <th scope="col">${{ $plan->amount }}.00</th>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection

@section('extra-script')

@endsection