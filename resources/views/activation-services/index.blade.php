@extends('layouts.vuexy')

@section('title')
{{ __('Request a Activation') }}
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
                                <li class="breadcrumb-item active">{{ __('Request a Activation') }}
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
                    <div class="col-12">
                        <section id="basic-examples">
                            @foreach ($types as $type)
                            <h2 class="text-primary my-2">{{ $type->name }}</h2>
                                <div class="row match-height">
                                    @foreach ($products as $product)
                                        @if ($product->type_id == $type->id)
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                                <div class="card">
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                            <!--<img class="card-img img-fluid mb-1" src="../../../app-assets/images/pages/content-img-3.jpg" alt="Card image cap">-->
                                                            <h5 class="my-1">{{ $product->name }}</h5>
                                                            <p class="card-text  mb-0">{{ $product->description }}</p>
                                                            <br>
                                                            <hr class="my-1">
                                                            <div class="card-btns d-flex justify-content-between">
                                                                @if(!in_array($product->id, $activationServices))
                                                                <form action="{{ route('activation.store') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="product_id" class="form-control" value="{{ $product->id }}">
                                                                    <input type="hidden" name="product_name" class="form-control" value="{{ $product->name }}">
                                                                    <input type="hidden" name="user_id" class="form-control" value="{{ Auth::user()->id }}">
                                                                    <input type="hidden" name="hostname" class="form-control" value="{{ Auth::user()->hostname }}">
                                                                    <input type="hidden" name="status" class="form-control" value="wait">
                                                                    <button type="submit" class="btn btn-primary">
                                                                        <i class="fa fa-plus"></i> {{ __("Request Activation") }}
                                                                    </button>
                                                                </form>
                                                                @else
                                                                    <button class="btn gradient-light-info" disabled>{{ __("Requested Service") }}</button>
                                                                @endif      
                                                                @if(is_null($product->document))

                                                                @else
                                                                <a class="btn btn-outline-primary float-right waves-effect waves-light" href="{{ asset($product->document) }}" target="_blank" rel="noopener noreferrer">{{ __("View Info") }}</a>
                                                                @endif
                                                            </div>
                                                            <div class="card-btns d-flex justify-content-between">
                                                                <form action="{{ route('activation.store') }}" method="POST">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="product_id" class="form-control" value="{{ $product->id }}">
                                                                        <input type="hidden" name="user_id" class="form-control" value="{{ Auth::user()->id }}">
                                                                        <input type="hidden" name="status" class="form-control" value="review">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <hr>
                            @endforeach
                        </section>
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
