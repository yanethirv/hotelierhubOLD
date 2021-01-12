
@extends('layouts.vuexy')

@section('title')
{{ __('Subscriptions') }}
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
                                <li class="breadcrumb-item active">{{ __('Subscriptions') }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(session('message'))
            <div class="alert alert-{{ session('message')[0] }}">
                {!! session('message')[1] !!}
            </div>
        @endif

        @role('super-admin|user')
            @if(! auth()->user()->hasPaymentMethod())
                <div class="col-xl-12 col-md-12 col-sm-12 alert alert-danger text-center">
                    <span class="fa fa-exclamation-circle"></span> {{ __("You have not yet linked any cards to your account!") }} <a href="{{ route('billing.credit_card_form') }}">{{ __("Do it now!") }}</a>
                </div>
            @endif
        @endrole

        <div class="content-body">
            @role('super-admin|user')
                <!-- Tabla de Suscripción Actual -->
                @include('admin.plan.current-plan')
            @endrole

            <section id="content-types">
                <div class="row match-height">
                    <div class="col-xl-12  col-md-12 col-sm-12">
                        {{ $hotel->range_rooms }}
                        <section id="basic-examples">
                            <div class="row match-height">
                                @forelse($plans as $plan)
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <form action="{{ route("plans.buy") }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="plan" value="{{ $plan->id }}">
                                                    <div class="card-body">
                                                        <h3 class="text-muted text-uppercase text-center mb-2">{{ __($plan->nickname) }}</h3>
                                                        <p class="text-center"><span class="font-large-2 text-center">{{ __(":amountUSD", ["amount" => $plan->amount]) }}</span><span>{{ __("/monthly") }}</span></p>
                                                        <hr>
                                                        <ul class="fa-ul">
                                                            <li><span class="fa-li"><i class="fa fa-check"></i></span>{{ __($plan->description) }}</li>
                                                            
                                                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Range of Rooms: {{ __($plan->range_rooms) }}</li>
                                                        </ul>
                                                        @if(is_null($plan->document))
                                                        @else
                                                            <a class="btn btn-block btn-outline-primary float-right waves-effect waves-light mb-2" href="{{ asset($plan->document) }}" target="_blank" rel="noopener noreferrer">{{ __("View Info") }}</a>
                                                        @endif
                                                            @if( ! auth()->user()->hasIncompletePayment('main'))
                                                                @if(auth()->user()->subscribed('main'))
                                                                    @if(auth()->user()->subscription('main')->stripe_plan === $plan->slug)
                                                                        <button type="button" class="btn btn-block btn-success text-uppercase">{{ __("Your current subscription") }}</button>
                                                                    @else
                                                                        @if($priceCurrentPlan < $plan->amount)
                                                                            <button type="submit" class="btn btn-block btn-primary text-uppercase">{{ __("Change subscription") }}</button>
                                                                        @else
                                                                            <button type="button" disabled class="btn btn-block btn-outline-dark text-uppercase">{{ __("It is not possible to descend") }}</button>
                                                                        @endif
                                                                    @endif
                                                                @else
                                                                    @if ($plan->range_rooms === $hotel->range_rooms)
                                                                        <button type="submit" class="btn btn-block btn-primary text-uppercase">{{ __("Subscribe me") }}</button>
                                                                    @endif
                                                                @endif
                                                            @else
                                                                @if(auth()->user()->subscription('main')->stripe_plan === $plan->slug)
                                                                    <a class="btn btn-block btn-warning text-uppercase" href="{{ route('cashier.payment', auth()->user()->subscription('main')->latestPayment()->id) }}">
                                                                        {{ __("Confirm your payment here") }}
                                                                    </a>
                                                                @else
                                                                    <button type="button" disabled class="btn btn-block btn-primary text-uppercase">{{ __("Waiting...") }}</button>
                                                                @endif
                                                            @endif
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-xl-12 col-md-12 col-sm-12 alert alert-info text-center">{{ __('No suscriptions available.') }}</div>
                                @endforelse
                            </div>
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

@endsection