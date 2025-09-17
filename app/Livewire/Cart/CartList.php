<?php

namespace App\Livewire\Cart;

use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;

class CartList extends Component
{
    public $cartItems = [];

    public function mount()
    {
        $this->loadCartItems();
    }

    public function loadCartItems()
    {
        $cart = session()->get('cart', []);
        $productIds = collect($cart)->pluck('product_id')->unique()->toArray();
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

        $this->cartItems = collect($cart)->map(function ($item) use ($products) {
            $product = $products->get($item['product_id']);
            $startDate = $item['start_date'] ?? now()->toDateString();
            $endDate = $item['end_date'] ?? now()->addDay()->toDateString();
            $duration = $item['duration'] ?? 1;
            $price = $product ? $product->price : 0;
            $totalPrice = $item['total_price'] ?? ($price * $duration);

            return [
                'product_id' => $item['product_id'],
                'name' => $product ? $product->name : 'Unknown Product',
                'start_date' => $startDate,
                'end_date' => $endDate,
                'duration' => $duration,
                'price' => $price,
                'total_price' => $totalPrice,
            ];
        })->toArray();
    }

    public function updateStartDate($index, $value)
    {
        $today = now()->toDateString();
        if ($value < $today) {
            $value = $today;
        }
        $this->cartItems[$index]['start_date'] = $value;
        // Ensure end_date is at least start_date +1
        $start = Carbon::parse($value);
        $end = Carbon::parse($this->cartItems[$index]['end_date']);
        if ($end <= $start) {
            $this->cartItems[$index]['end_date'] = $start->addDay()->toDateString();
        }
        $this->recalculateTotal($index);
        $this->saveCartToSession();
    }

    public function updateEndDate($index, $value)
    {
        $start = Carbon::parse($this->cartItems[$index]['start_date']);
        $end = Carbon::parse($value);
        if ($end <= $start) {
            $value = $start->addDay()->toDateString();
        }
        $this->cartItems[$index]['end_date'] = $value;
        $this->recalculateTotal($index);
        $this->saveCartToSession();
    }

    private function recalculateTotal($index)
    {
        $startDate = Carbon::parse($this->cartItems[$index]['start_date']);
        $endDate = Carbon::parse($this->cartItems[$index]['end_date']);
        $days = $startDate->diffInDays($endDate); // exclusive end date
        $this->cartItems[$index]['duration'] = $days;
        $this->cartItems[$index]['total_price'] = $this->cartItems[$index]['price'] * $days;
    }

    public function removeItem($index)
    {
        unset($this->cartItems[$index]);
        $this->cartItems = array_values($this->cartItems); // reindex
        $this->saveCartToSession();
        $this->dispatch('cartUpdated');
    }

    private function saveCartToSession()
    {
        $cart = collect($this->cartItems)->map(function ($item) {
            return [
                'product_id' => $item['product_id'],
                'start_date' => $item['start_date'],
                'end_date' => $item['end_date'],
                'duration' => $item['duration'],
                'total_price' => $item['total_price'],
            ];
        })->toArray();
        session()->put('cart', $cart);
    }

    public function render()
    {
        return view('livewire.cart.cart-list');
    }
}
