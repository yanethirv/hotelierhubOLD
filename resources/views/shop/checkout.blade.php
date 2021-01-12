@extends('layouts.vuexy')

@section('title')
{{ __('Checkout') }}
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
                                <li class="breadcrumb-item"><a href="{{route('home')}}">{{ __('Dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ __('Checkout') }}
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
                    <div class="col-xl-8 col-md-8 col-sm-12">
                        <div class="card">
                            @inject('cart', 'App\Classes\Cart')
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="table-primary text-center">
                                            <tr>
                                                <th scope="col">{{ __("Service") }}</th>
                                                <th scope="col">{{ __("Total Price") }}</th>
                                                <th scope="col">{{ __("Actions") }}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @forelse($cart->getContent() as $product)
                                                <tr>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $cart->totalAmountForProduct($product) }}</td>
                                                    <td>
                                                        <form method="POST" action="{{ route('service.delete', ["id" => $product->id]) }}">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="alert alert-danger">
                                                                <i class="fa fa-trash"></i> {{ __("Delete") }}
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="3">
                                                        <p class="alert alert-warning text-center">
                                                            {{ __("No services selected!") }}
                                                        </p>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 col-sm-12">
                        <div class="card">
                            <div class="card-content">
                                @if($cart->hasProducts())
                                    <div class="card-body">
                                        <h5 class="my-1">{{ __("Payment Details") }}</h5>
                                        <div class="d-flex justify-content-between">
                                            <span class="card-text float-left mb-25">{{ __("Taxes") }}:</span>
                                            <p class="float-left font-weight-bold mb-25" id="example-caption-2">{{ $cart->taxes() }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span class="card-text float-left mb-25">{{ __("Total Cost") }}:</span>
                                            <p class="float-left font-weight-bold mb-25" id="example-caption-2">{{ $cart->totalAmount() }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span class="card-text float-left mb-25">{{ __("Total Cost with Taxes") }}:</span>
                                            <p class="float-left font-weight-bold mb-25" id="example-caption-2">{{ $cart->totalAmountWithTaxes() }}</p>
                                        </div>
                                        <hr class="my-1">
                                        @guest
                                            <a href="{{ route('login') }}">{{ __("Login to make payment") }}</a>
                                        @else
                                            <form method="POST" action="{{ route('orders.process') }}">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-block place-order waves-effect waves-light">
                                                    <i class="fa fa-credit-card"></i> {{ __("PLACE ORDER") }}
                                                </button>
                                            </form>
                                        @endguest
                                    </div>
                                @else
                                    <div class="card-body">
                                        <h5 class="my-1">{{ __("Checkout") }}</h5>
                                        <div class="d-flex justify-content-between">
                                            <span class="card-text float-left mb-25">{{ __("Taxes") }}:</span>
                                            <p class="float-left font-weight-bold mb-25" id="example-caption-2">$0.00</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span class="card-text float-left mb-25">{{ __("Total Cost") }}:</span>
                                            <p class="float-left font-weight-bold mb-25" id="example-caption-2">$0.00</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span class="card-text float-left mb-25">{{ __("Total Cost with Taxes") }}:</span>
                                            <p class="float-left font-weight-bold mb-25" id="example-caption-2">$0.00</p>
                                        </div>
                                        <hr class="my-1">
                                        <button type="submit" class="btn btn-outline-light btn-block place-order">
                                            <i class="fa fa-credit-card"></i> {{ __("PLACE ORDER") }}
                                        </button>
                                    </div>
                                @endif
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