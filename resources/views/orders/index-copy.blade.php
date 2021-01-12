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

        <div class="row justify-content-center">
            <table class="table">
                <thead class="table-primary text-center">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __("Price") }}</th>
                    <th scope="col">{{ __("Status") }}</th>
                    <th scope="col">{{ __("Invoice") }}</th>
                    <th scope="col">{{ __("Detail") }}</th>
                </tr>
                </thead>
                <tbody class="text-center">
                @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->formatted_total_amount }}</td>
                        <td>
                                <span class="badge badge-pill badge-{{ $order->formatted_status === __("Procesado") ? "success" : "danger" }}">
                                    {{ $order->formatted_status }}
                                </span>
                        </td>
                        <td>
                            @if($order->invoice_id)
                                <a href="{{ route("orders.invoice", ["invoice" => $order->invoice_id]) }}">
                                    {{ __("Descargar factura") }}
                                </a>
                            @else
                                <form method="POST" action="{{ route('orders.to_cart', ['id' => $order->id]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-success">
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
                    <tr class="text-center">
                        <td colspan="4">
                            <p class="alert alert-info">
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
<!-- END: Content-->
@endsection

@section('extra-script')

@endsection