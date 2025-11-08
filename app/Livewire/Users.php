<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Users extends Component
{
    #[Validate('required|string|min:3')]
    public $name = '';

    #[Validate('required|email:rfc,dns|unique:users,email')]
    public $email = '';
    
    #[Validate('required|string|min:3')]
    public $password = '';

    public function createUser()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $this->reset();

        session()->flash('success', 'User has been created.');
    }

    public function render()
    {
        return view('livewire.users', [
            'title' => 'User List',
            'users' => User::all(),
        ]);
    }
}
