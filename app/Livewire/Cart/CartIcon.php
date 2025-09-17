<?php

namespace App\Livewire\Cart;

use Livewire\Component;

class CartIcon extends Component
{

    public $cartCount = 0;

    protected $listeners = ['cartUpdated' => 'updateCount'];

    public function mount()
    {
        $this->updateCount();
    }

    public function updateCount()
    {
        $cart = session()->get('cart', []);
        $this->cartCount = count($cart);
    }

    public function render()
    {
        return view('livewire.cart.cart-icon');
    }
}
