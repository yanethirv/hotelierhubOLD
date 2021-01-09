@extends('layouts.vuexy')

@section('title')
{{ __("My Orders") }}
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
                                <li class="breadcrumb-item active">{{ __("My Orders") }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <section id="content-types">
                <div class="row match-height">
                    <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-dark text-center">
                                        <tr>
                                            <th scope="col">{{ __("Date") }}</th>
                                            <th scope="col">{{ __("Amount") }}</th>
                                            <th scope="col">{{ __("Status") }}</th>
                                            <th scope="col">{{ __("Invoice") }}</th>
                                            <th scope="col">{{ __("Detail") }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @if ($suscription)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($suscription->created_at)->format('d/m/Y')}}</td>
                                            <td>${{ $suscription->amount }}.00</td>
                                            <td>
                                                <span class="badge badge-pill badge-success badge-md">
                                                    {{ $currentPlan->stripe_status }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route("plans.show-invoice", ["plan" => $suscription->id]) }}">
                                                    {{ __("Show Invoice") }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('plans.detail', ["id" => $suscription->id]) }}">
                                                    {{ __("See detail") }}
                                                </a>
                                            </td>
                                        </tr>
                                        @endif
                                        
                                        @forelse($orders as $order)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}}</td>
                                                <td>{{ $order->formatted_total_amount }}</td>
                                                <td>
                                                    <span class="badge badge-pill badge-{{ $order->formatted_status === __("processed") ? "success" : "danger" }} badge-md">
                                                        {{ $order->formatted_status }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @if($order->invoice_id)
                                                        <a href="{{ route("orders.show-invoice", ["order" => $order->id]) }}">
                                                            {{ __("Show Invoice") }}
                                                        </a>
                                                    @else
                                                        <form method="POST" action="{{ route('orders.to_cart', ['id' => $order->id]) }}">
                                                            @csrf
                                                            <button type="submit" class="btn btn-warning">
                                                                <i class="fa fa-shopping-cart"></i> {{ __("Dump order into cart") }}
                                                            </button>
                                                        </form>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('orders.detail', ["id" => $order->id]) }}">
                                                        {{ __("See detail") }}
                                                    </a>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="5">
                                                    <p class="alert alert-warning text-center">
                                                        {{ __("No orders in your account yet!") }}
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="row justify-content-center">
                                {{ $orders->links() }}
                            </div>
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