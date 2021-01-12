@inject('cart', 'App\Classes\Cart')
<div class="card">
    <div class="card-content">
        <div class="table-responsive">
            <table class="table">
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
                            <td class="text-left">{{ $product->name }}</td>
                            <td>{{ $cart->totalAmountForProduct($product) }}</td>
                            <td>
                                <form method="POST" action="{{ route('service.delete', ["id" => $product->id]) }}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="alert alert-danger">
                                        <i class="fa fa-trash"></i>
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
                @if($cart->hasProducts())
                    <tfoot>
                        <tr>
                            <td colspan="2">
                                {{ __("Taxes") }}
                            </td>
                            <td class="text-center">
                                {{ $cart->taxes() }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                {{ __("Total Cost") }}
                            </td>
                            <td class="text-center">
                                {{ $cart->totalAmount() }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                {{ __("Total Cost with Taxes") }}
                            </td>
                            <td class="text-center">
                                {{ $cart->totalAmountWithTaxes() }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                @guest
                                    <a href="{{ route('login') }}">{{ __("Login to make payment") }}</a>
                                @else
                                    <form method="POST" action="{{ route('orders.process') }}">
                                    @csrf
                                        <button type="submit" class="btn btn-success btn-block place-order waves-effect waves-light">
                                            <i class="fa fa-credit-card"></i> {{ __("PLACE ORDER") }}
                                        </button>
                                    </form>
                                @endguest
                            </td>
                        </tr>
                    </tfoot>
                @endif
            </table>
        </div>
    </div>
</div>