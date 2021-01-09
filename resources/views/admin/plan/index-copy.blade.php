
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
        @if(! auth()->user()->hasPaymentMethod())
            <div class="m-3 alert alert-danger text-center">
                <span class="fa fa-exclamation-circle"></span> {{ __("You have not yet linked any cards to your account!") }} <a href="{{ route('billing.credit_card_form') }}">{{ __("Do it now!") }}</a>
            </div>
        @endif
        <section class="pricing py-5">
            <div class="container">
                <div class="row">
                    @foreach($plans as $plan)
                        <div class="col-lg-4">
                            <div class="card mb-5 mb-lg-0">
                                <form action="{{ route("plans.buy") }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="plan" value="{{ $plan->id }}">
                                    <div class="card-body">
                                        <h3 class="text-muted text-uppercase text-center mb-2">{{ __($plan->nickname) }}</h3>
                                        <p class="text-center"><span class="font-large-2 text-center">{{ __(":amountUSD", ["amount" => $plan->amount]) }}</span><span>{{ __("/mensual") }}</span></p>
                                        <hr>
                                        <ul class="fa-ul">
                                            <li><span class="fa-li"><i class="fa fa-check"></i></span>{{ __("Acceso a todo") }}</li>
                                            <li><span class="fa-li"><i class="fa fa-check"></i></span>{{ __("Proyectos ilimitados") }}</li>
                                            @if($plan->slug === 'basic')
                                                <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>{{ __("Soporte") }}</li>
                                            @else
                                                <li><span class="fa-li"><i class="fa fa-check"></i></span>{{ __("Soporte") }}</li>
                                            @endif

                                            @if($plan->slug === 'premium')
                                                <li><span class="fa-li"><i class="fa fa-check"></i></span>{{ __("Soporte Premium") }}</li>
                                            @else
                                                <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>{{ __("Soporte Premium") }}</li>
                                            @endif
                                        </ul>

                                        @if( ! auth()->user()->hasIncompletePayment('main'))
                                            @if(auth()->user()->subscribed('main'))
                                                @if(auth()->user()->subscription('main')->stripe_plan === $plan->slug)
                                                    <button type="button" disabled class="btn btn-block btn-primary text-uppercase">{{ __("Tu plan actual") }}</button>
                                                @else
                                                    @if($priceCurrentPlan < $plan->amount)
                                                        <button type="submit" class="btn btn-block btn-primary text-uppercase">{{ __("Cambiar de plan") }}</button>
                                                    @else
                                                        <button type="button" disabled class="btn btn-block btn-primary text-uppercase">{{ __("No es posible bajar") }}</button>
                                                    @endif
                                                @endif
                                            @else
                                                <button type="submit" class="btn btn-block btn-primary text-uppercase">{{ __("Suscribirme") }}</button>
                                            @endif
                                        @else
                                            @if(auth()->user()->subscription('main')->stripe_plan === $plan->slug)
                                                <a class="btn btn-block btn-info text-uppercase" href="{{ route('cashier.payment', auth()->user()->subscription('main')->latestPayment()->id) }}">
                                                    {{ __("Confirma tu pago aquí") }}
                                                </a>
                                            @else
                                                <button type="button" disabled class="btn btn-block btn-primary text-uppercase">{{ __("Esperando...") }}</button>
                                            @endif
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Tabla de Suscripción Actual -->
        @include('admin.plan.current-plan')

    </div>
</div>
<!-- END: Content-->
@endsection

@section('extra-script')

@endsection