@inject('cart', 'App\Classes\Cart')

        <div class="table-responsive">
            <table class="table">
                <tbody class="text-center">
                    @forelse($cart->getContent() as $product)
                        <tr>
                            <td class="text-left">{{ $product->name }}</td>
                            <td>{{ $cart->totalAmountForProduct($product) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">
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
                            <td colspan="1">
                                {{ __("Taxes") }}
                            </td>
                            <td class="text-center">
                                {{ $cart->taxes() }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1">
                                {{ __("Total Cost") }}
                            </td>
                            <td class="text-center">
                                {{ $cart->totalAmount() }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1">
                                {{ __("Total Cost with Taxes") }}
                            </td>
                            <td class="text-center">
                                {{ $cart->totalAmountWithTaxes() }}
                            </td>
                        </tr>
                    </tfoot>
                @endif
            </table>
        </div>
