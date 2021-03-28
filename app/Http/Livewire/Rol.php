<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class Rol extends Component
{
    public $user;
    public $rol;

    public function mount()
    {
        $this->user = Auth::user();
        $this->rol = $this->user->roles->implode('name', ',');
    }

    public function render()
    {
        return view('livewire.rol');
    }
}
