<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use Livewire\Component;


class Users extends Component
{
    //use WithPagination;
    //public $users;

    public function mount()
    {
        //$this->users = User::all();
        //$this->users = User::paginate(15);
    }
    
    public function render()
    {
        return view('livewire.users',[
            'users' => User::paginate(3),
        ]);
    }
}
