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

        <div class="row justify-content-center">
            <h1 class="text-center text-muted">{{ __("Order Information") }}</h1>
            <table class="table table-striped">
                <thead class="text-center">
                <tr>
                    <th scope="col">{{ __("ID Order") }}</th>
                    <th scope="col">{{ __("Amount with Taxes") }}</th>
                    <th scope="col">{{ __("Status") }}</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <th scope="col">{{ $order->formatted_total_amount }}</th>
                    <th scope="col">
                        <span class="badge badge-pill badge-{{ $order->formatted_status === __("Procesado") ? "success" : "danger" }}">
                            {{ $order->formatted_status }}
                        </span>
                    </th>
                </tr>
                </tbody>
            </table>

            <h2 class="text-center text-muted">{{ __("Order Lines") }}</h2>
            <table class="table table-striped">
                <thead class="text-center">
                <tr>
                    <th scope="col">{{ __("Service") }}</th>
                    <th scope="col">{{ __("Amount without Taxes") }}</th>
                </tr>
                </thead>
                <tbody class="text-center">
                @foreach($order->orderLines as $orderLine)
                    <tr>
                        <th scope="row">
                            <a href="{{ route('course.start', ["id" => $orderLine->product->id]) }}">
                                {{ __("Empezar el curso :course", ["course" => $orderLine->product->name]) }}
                            </a>
                        </th>
                        <th scope="col">{{ format_currency_helper($orderLine->product->price) }}</th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
<!-- END: Content-->
@endsection

@section('extra-script')

@endsection