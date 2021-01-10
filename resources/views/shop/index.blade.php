@extends('layouts.vuexy')

@section('title')
{{ __('Products') }}
@endsection

@section('extra-css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/pages/app-ecommerce-shop.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/forms/wizard.css') }}">
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
                                </li>
                                <li class="breadcrumb-item active">{{ __('Products') }}
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
                    <div class="col-xl-8 col-lg-7 col-md-7 col-sm-12">
                        <section id="basic-examples">
                            <div class="row match-height">
                                @forelse($products as $product)
                                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <!--<img class="card-img img-fluid mb-1" src="../../../app-assets/images/pages/content-img-3.jpg" alt="Card image cap">-->
                                                    <h5 class="my-1">{{ $product->name }}</h5>
                                                    <p class="card-text  mb-0">{{ $product->description }}</p>
                                                    <br>

                                                    <span class="badge badge-warning badge-md mr-1 mb-1">{{ $product->type->name }}</span>
                                                    <div class="d-flex justify-content-between mt-2">
                                                        <small class="float-left font-weight-bold mb-25" id="example-caption-1"></small>
                                                        <p class="float-left font-weight-bold mb-25" id="example-caption-2">{{ __("Price") }}: {{ format_currency_helper($product->price) }}</p>
                                                    </div>
                                                    <hr class="my-1">
                                                    <div class="card-btns d-flex justify-content-between">
                                                        @if(!in_array($product->id, $coursesPurchased))
                                                            <form action="{{ route('product.add', ["id" => $product->id]) }}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-primary">
                                                                    <i class="fa fa-cart-plus"></i> {{ __("Buy Service") }}
                                                                </button>
                                                            </form>
                                                        @else
                                                            <button class="btn gradient-light-info" disabled>
                                                                {{ __("Purchased") }}
                                                            </button>
                                                        @endif
                                                        
                                                        @if(is_null($product->document))
                                                        @else
                                                            <a class="btn btn-outline-primary float-right waves-effect waves-light" href="{{ asset($product->document) }}" target="_blank" rel="noopener noreferrer">{{ __("View Info") }}</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="alert alert-info text-center">{{ __('No services available.') }}</div>
                                @endforelse
                            </div>
                        </section>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-5 col-sm-12">
                        @include('shop.sidebar')
                    </div>
                </div>
            </section>
        </div>

    </div>
</div>
<!-- END: Content-->
@endsection

@section('extra-script')
<script src="{{ asset('js/scripts/pages/app-ecommerce-shop.js') }}"></script>
@endsection