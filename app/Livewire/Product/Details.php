<?php

namespace App\Livewire\Product;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeUnit\FunctionUnit;

class Details extends Component
{
    public $products;

    public function mount($id)
    {
        $this->products = Product::with('category')->find($id);
    }

    public function addToCart()
    {
        $cart = session()->get('cart', []);
        $productId = $this->products->id;
        $existingIndex = collect($cart)->search(function ($item) use ($productId) {
            return $item['product_id'] == $productId;
        });

        if ($existingIndex !== false) {
            // Product already in cart, extend rental by 1 day
            $cart[$existingIndex]['end_date'] = Carbon::parse($cart[$existingIndex]['end_date'])->addDay()->toDateString();
            $cart[$existingIndex]['duration'] += 1;
            $cart[$existingIndex]['total_price'] += $this->products->price;
            session()->flash('message', 'Rental duration extended by 1 day!');
        } else {
            // Add new item
            $startDate = Carbon::now();
            $endDate = Carbon::now()->addDay();
            $days = 1; // price for 1 day only
            $totalPrice = $this->products->price * $days;

            $cart[] = [
                'product_id' => $productId,
                'start_date' => $startDate->toDateString(),
                'end_date' => $endDate->toDateString(),
                'duration' => $days,
                'total_price' => $totalPrice,
            ];
            $this->dispatch('cartUpdated');
            session()->flash('message', 'Product added to cart successfully!');
        }

        session()->put('cart', $cart);
    }

    public function render()
    {
        return view('livewire.product.details');
    }
}
