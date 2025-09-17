<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminHeader extends Component
{
    public function render()
    {
        $users = Auth::user();
        return view('livewire.admin.admin-header', compact('users'));
    }
}
