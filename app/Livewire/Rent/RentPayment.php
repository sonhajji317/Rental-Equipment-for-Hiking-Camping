<?php

namespace App\Livewire\Rent;

use App\Models\Rent;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class RentPayment extends Component
{
    // public $rent_payment, $user_id, $product_id, $rental_duration_days, $total_price, $status_rent;
    // public $snapToken;
    // public $params;

    // public function mount($id)
    // {
    //     $this->rent_payment = Rent::with(['product', 'user'])
    //         ->where('id', $id)
    //         ->first();
    //     $this->user_id = Auth::id();
    //     $this->product_id = $this->rent_payment->product_id;
    //     $this->rental_duration_days = $this->rent_payment->rental_duration_days;
    //     $this->total_price = $this->rent_payment->total_price;
    //     $this->status_rent = $this->rent_payment->status_rent;

    //     // Set your Merchant Server Key
    //     \Midtrans\Config::$serverKey = config('midtrans.server_key');
    //     // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    //     \Midtrans\Config::$isProduction = false;
    //     // Set sanitization on (default)
    //     \Midtrans\Config::$isSanitized = true;
    //     // Set 3DS transaction for credit card to true
    //     \Midtrans\Config::$is3ds = true;

    //     $this->params = [
    //         'transaction_details' => [
    //             'order_id' => 'RENT-' . $this->rent_payment->id . '-' . time(),
    //             'duration' => $this->rental_duration_days,
    //             'gross_amount' => $this->total_price,
    //         ],
    //         'customer_details' => [
    //             'name' => Auth::user()->name,
    //         ],
    //     ];
    //     $this->snapToken = \Midtrans\Snap::getSnapToken($this->params);
    //     // dd($this->snapToken);
    // }

    public function render()
    {
        return view('livewire.rent.rent-payment');
    }
}
