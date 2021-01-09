<div class="card">
    <div class="card-header">
        <h4 class="card-title">{{ __("Your Subscription") }}</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <!--<p class="card-text">Use <code class="highlighter-rouge">.table-striped</code> to add zebra-striping to any table row within the <code class="highlighter-rouge">&lt;tbody&gt;</code>. This styling doesn't work in IE8 and below as <code>:nth-child</code> CSS selector isn't supported.</p>-->
        </div>
        <div class="table-responsive">
            @if(auth()->user()->subscription('main'))
            <table class="table">
                <thead class="thead-dark text-center">
                    <tr class="text-center" >
                        <th scope="col">{{ __("Suscription") }}</th>
                        <th scope="col">{{ __("Date") }}</th>
                        <th scope="col">{{ auth()->user()->subscription('main')->ends_at ? __("Ends in") : __("Status") }}</th>
                        <th scope="col">{{ __("Cancel / Reopen") }}</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <td>{{ strtoupper(auth()->user()->subscription('main')->stripe_plan) }}</td>
                    <td>{{ auth()->user()->subscription('main')->created_at->format('d/m/Y') }}</td>

                    {{-- si la suscripción no está activa por stripe probablemente es que se deba confirmar el pago SCA --}}
                    @if(auth()->user()->hasIncompletePayment('main'))
                        <td class="text-center">{!! __("Pending confirmation, click <a href=':link'>here</a> to confirm.", [
                                "link" => route('cashier.payment', auth()->user()->subscription('main')->latestPayment()->id)
                            ]) !!}
                        </td>
                    @else
                        <td class="text-center">{{ auth()->user()->subscription('main')->ends_at ? auth()->user()->subscription('main')->ends_at->format('d/m/Y') : __("Active Subscription") }}</td>
                    @endif

                    <td class="text-center">
                        @if(auth()->user()->subscription('main')->ends_at)
                            @if( ! auth()->user()->subscribed('main'))
                                {{ __("The plan is no longer in effect, hire a new one!") }}
                            @else
                                @if(auth()->user()->hasIncompletePayment('main'))
                                    <button class="btn btn-warning">
                                        {{ __("Pending confirmation") }}
                                    </button>
                                @else
                                    <form action="{{ route('plans.resume') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="plan" value="{{ auth()->user()->subscription('main')->name }}" />
                                        <button class="btn btn-success">
                                            {{ __("Reopen") }}
                                        </button>
                                    </form>
                                @endif
                            @endif
                        @else
                            @if(auth()->user()->hasIncompletePayment('main'))
                                <button class="btn btn-warning">
                                    {{ __("Pending confirmation") }}
                                </button>
                            @else
                                <form action="{{ route('plans.cancel') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="plan" value="{{ auth()->user()->subscription('main')->name }}" />
                                    <button class="btn btn-danger">
                                        {{ __("Cancel automatic renewal.") }}
                                    </button>
                                </form>
                            @endif
                        @endif
                    </td>
                </tbody>
            </table>
            @else
                <div class="alert alert-danger text-center">
                    <span class="fa fa-exclamation-circle"></span> {{ __("You currently have no subscription!") }}
                </div>
            @endif
        </div>
    </div>
</div>