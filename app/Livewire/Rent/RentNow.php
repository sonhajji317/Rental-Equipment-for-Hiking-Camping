<?php

namespace App\Livewire\Rent;

use App\Models\Product;
use App\Models\Rent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RentNow extends Component
{
    public $products, $name, $category_id, $description, $price, $image, $start_date, $end_date, $status, $stock, $quantity, $total_price, $rental_duration_days, $user_id, $product_id;
    public $snapToken;
    public $params;
    public $rent_payment;


    public $status_rent = 'unpaid';

    public function mount($id)
    {
        $this->products = Product::with('category')->find($id);
        $this->name = $this->products->name;
        $this->category_id = $this->products->category_id;
        $this->description = $this->products->description;
        $this->price = $this->products->price;
        $this->image = $this->products->image;
        $this->start_date = $this->products->start_rent;
        $this->end_date = $this->products->end_rent;
        $this->status = $this->products->status;
        $this->stock = $this->products->stock;

        // Check if product is in cart and use cart data
        $cart = session()->get('cart', []);
        $cartItem = collect($cart)->firstWhere('product_id', $id);
        if ($cartItem) {
            $this->start_date = $cartItem['start_date'];
            $this->end_date = $cartItem['end_date'];
            $this->rental_duration_days = $cartItem['duration'];
            $this->total_price = $cartItem['total_price'];
        } else {
            $this->start_date = now()->toDateString();
            $this->end_date = now()->addDays(1)->toDateString();
            // Hitung harga awal
            $this->calculateTotalPrice();
        }
    }

    public function updatedStartDate($value)
    {
        $this->calculateTotalPrice();
    }

    public function updatedEndDate($value)
    {
        $this->calculateTotalPrice();
    }

    public function calculateTotalPrice()
    {
        if ($this->start_date && $this->end_date) {
            $start = Carbon::parse($this->start_date);
            $end = Carbon::parse($this->end_date);

            if ($end->greaterThan($start)) {
                $this->rental_duration_days = $start->diffInDays($end);
                $this->total_price = $this->rental_duration_days * $this->price;
            } else {
                $this->rental_duration_days = 0;
                $this->total_price = 0;
            }
        } else {
            $this->rental_duration_days = 0;
            $this->total_price = 0;
        }
    }

    public function addRent()
    {
        $this->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        $this->user_id = Auth::id();
        $this->product_id = $this->products->id;

        $rent =  Rent::create([
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
            'rental_duration_days' => $this->rental_duration_days,
            'total_price' => $this->total_price,
            'status_rent' => $this->status_rent,
        ]);

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => 'RENT-' . $rent->id . '-' . time(),
                'gross_amount' => $this->total_price,
            ],
            'customer_details' => [
                'name' => Auth::user()->name,
            ],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // dd($this->snapToken);
        // Emit ke browser supaya langsung trigger snap
        $this->dispatch('startPayment', token: $snapToken);


        session()->flash('message', 'Rent added successfully.');
        // Redirect ke halaman home
        // return redirect()->to("/rent/{$this->product_id}/payment");
    }

    public function render()
    {
        return view('livewire.rent.rent-now');
    }
}
