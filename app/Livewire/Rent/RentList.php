<?php

namespace App\Livewire\Rent;

use App\Models\Rent;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class RentList extends Component
{
    use WithPagination;

    public $rent_details, $total_price, $rental_duration_days, $user_id, $product_id;
    public $status_rent = 'unpaid';
    public $snapToken;
    public $params;
    public $rent_payment;

    public function mount()
    {
        if (Auth::user()->role == 'admin') {
            $this->rent_details = Rent::with('product', 'user')
                ->latest()
                ->get();
            return;
        } else {
            $this->rent_details = Rent::with('product', 'user')
                ->latest()
                ->where('user_id', Auth::id()) //tampilkan masing masing data dari user login
                ->get();
        }
    }
    public function payRent($rentId)
    {
        if (Auth::user()->role == 'admin') {
            $this->rent_payment = Rent::with(['product', 'user'])
                ->find($rentId);
        } else {
            $this->rent_payment = Rent::with(['product', 'user'])
                ->where('user_id', Auth::id()) //tampilkan masing masing data dari user login
                ->find($rentId);
        }

        // dd($this->rent_payment);
        $this->user_id = Auth::id();
        $this->product_id = $this->rent_payment->product_id;
        $this->rental_duration_days = $this->rent_payment->rental_duration_days;
        $this->total_price = $this->rent_payment->total_price;
        $this->status_rent = $this->rent_payment->status_rent;

        // dd($this->rent_payment->product_id);

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $this->params = [
            'transaction_details' => [
                'order_id' => 'RENT-' . $this->rent_payment->id . '-' . time(),
                'duration' => $this->rental_duration_days,
                'gross_amount' => $this->total_price,
            ],
            'customer_details' => [
                'name' => Auth::user()->name,
            ],
        ];
        // dd($this->params);

        $this->snapToken = \Midtrans\Snap::getSnapToken($this->params);
        $this->dispatch('startPayment', token: $this->snapToken);
        // dd($this->snapToken);
    }

    public function delete($id)
    {
        if (Auth::user()->role === 'admin') {
            $rent = Rent::find($id);
            $rent->delete();
            session()->flash('message', 'Rent deleted successfully.');
        } else {
            $rent = Rent::find($id);
            $rent->delete();
            session()->flash('message', 'Rent deleted successfully.');
        }
        return redirect()->route('rentList');
    }

    public function render()
    {
        if (Auth::user()->role == 'admin') {
            $rents = Rent::with('product', 'user')
                ->latest()
                ->paginate(10);
            return view('livewire.rent.rent-list', compact('rents'));
        } else {
            $rents = Rent::with('product', 'user')
                ->where('user_id', Auth::id())
                ->latest()
                ->paginate(10);
        }
        return view('livewire.rent.rent-list', compact('rents'));
    }
}
