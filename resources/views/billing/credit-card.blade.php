@extends('layouts.vuexy')

@section('title')
{{ __("My Card") }}
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
                                <li class="breadcrumb-item active">{{ __("My Card") }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7 mx-auto">
                @if(session('message'))
                    <div class="alert alert-{{ session('message')[0] }}">
                        {!! session('message')[1] !!}
                    </div>
                @endif
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <!-- Credit card form tabs -->
                    <h3 class="mb-4 text-center"><i class="fa fa-credit-card-alt"></i>
                        {{ __("Your card information at :app", ["app" => env("APP_NAME")]) }}</h3>
                    <!-- End -->
                    <!-- Credit card form content -->
                    <div class="tab-content">
                        <!-- credit card info-->
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <form role="form" action="{{ route("billing.process_credit_card") }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="card_number">{{ __("Card number") }}</label>
                                    <div class="input-group">
                                        <input
                                            type="text"
                                            name="card_number"
                                            placeholder="{{ __("Card number") }}"
                                            class="form-control"
                                            required
                                            value="{{
                                                old('card_number') ? old('card_number') : (auth()->user()->card_last_four ? '************' . auth()->user()->card_last_four : null)
                                            }}"
                                        />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-cc-visa mx-1"></i>
                                                <i class="fa fa-cc-mastercard mx-1"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label><span class="hidden-xs">{{ __("Expiration date") }}</span></label>
                                            <div class="input-group">
                                                <input type="number" placeholder="{{ __("MM") }}" name="card_exp_month" class="form-control" required>
                                                <input type="number" placeholder="{{ __("YY") }}" name="card_exp_year" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-4">
                                            <label data-toggle="tooltip" title="{{ __("Enter the 3 security digits of your card") }}">{{ __("CVC") }}
                                                <i class="fa fa-question-circle"></i>
                                            </label>
                                            <input type="text" name="cvc" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <a href="{{ route('home') }}" class="btn btn-outline-primary">{{ __("Back") }}</a>
                                        <button type="submit" class="subscribe btn btn-primary float-right">{{ __("Save") }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End -->
                    </div>
                    <!-- End -->
                </div>
            </div>
        </div>
        <!-- End - Credit card form content -->
    </div>
</div>
<!-- END: Content-->
@endsection

@section('extra-script')

@endsection