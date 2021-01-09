<?php
namespace App\Classes;
use App\Product;
use Illuminate\Support\Collection;

/**
 * Class Cart
 * @package App\Classes
 */
class Cart {

    /**
     * @var Collection
     */
    protected $cart;

    public function __construct()
    {
        if (session()->has("cart")) {
            $this->cart = session("cart");
        } else {
            $this->cart = new Collection;
        }
    }

    public function getContent() {
        return $this->cart;
    }

    protected function save() {
        session()->put("cart", $this->cart);
        session()->save();
    }

    public function addProduct(Product $product) {
        $productFormattedPrice = null;
        $productInCart = $this->cart->firstWhere('id', $product->id);
        if ($productInCart) {
            //$productInCart->quantity++;
            $product->quantity = 1;
        } else {
            $product->quantity = 1;
            $this->cart->push($product);
        }
        $this->save();
    }

    public function removeProduct(int $id) {
        $this->cart = $this->cart->reject(function (Product $product, $key) use ($id) {
            return $product->id === $id;
        });
        $this->save();
    }

    /**
     *
     * calculates the total cost for product
     *
     * @param Product $product
     * @return mixed
     */
    public function totalAmountForProduct(Product $product) {
        $amount = $product->quantity * $product->price;
        return format_currency_helper($amount);
    }

    /**
     *
     * calculates the total cost in the cart
     *
     * @param bool $formatted
     * @return mixed
     */
    public function totalAmount($formatted = true) {
        $amount = $this->cart->sum(function (Product $product) {
            return $product->quantity * $product->price;
        });
        if ($formatted) {
            return format_currency_helper($amount);
        }
        return $amount;
    }

    /**
     *
     * all taxes for cart
     *
     * @param bool $formatted
     * @return float|int|string
     */
    public function taxes($formatted = true) {
        $total = $this->totalAmount(false);
        if ($total) {
            $total = ($total * env('STRIPE_TAXES')) / 100;
            if ($formatted) {
                return format_currency_helper($total);
            }
            return $total;
        }
        return 0;
    }

    /**
     *
     * calculates the total cost in the cart with taxes
     *
     * @return mixed
     */
    public function totalAmountWithTaxes() {
        return format_currency_helper($this->totalAmount(false), true);
    }

    /**
     *
     * Total products in cart
     *
     * @return int
     */
    public function hasProducts() {
        return $this->cart->count();
    }

    public function clear() {
        $this->cart = new Collection;
        $this->save();
    }
}