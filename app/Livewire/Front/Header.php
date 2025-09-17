<?php

namespace App\Livewire\Front;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Header extends Component
{
    public function render()
    {
        $users = Auth::user();
        return view('livewire.front.header', compact('users'));
    }
}
