<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class BuscarUser extends Component
{
    public $select;
    public $dataSearch;

    protected $rules = [
        'select' => 'required',
        'dataSearch' => 'required',
    ];


    public function render()
    {
        
        return view('livewire.buscar-user');
        
    }
}
