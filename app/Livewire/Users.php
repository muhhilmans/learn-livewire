<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public function createUser()
    {
        User::create([
            'name' => 'New User' . rand(1, 1000),
            'email' => 'newuser' . rand(1, 1000) . '@example.com',
            'password' => bcrypt('password'),
        ]);
    }

    public function render()
    {
        return view('livewire.users', [
            'title' => 'User List',
            'users' => User::all(),
        ]);
    }
}
