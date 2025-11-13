<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Users extends Component
{
    use WithFileUploads;

    #[Validate('required|string|min:3')]
    public $name = '';

    #[Validate('required|email:rfc,dns|unique:users,email')]
    public $email = '';
    
    #[Validate('required|string|min:3')]
    public $password = '';

    #[Validate('image|max:1024')]
    public $avatar;

    public function createUser()
    {
        $validated = $this->validate();

        if ($this->avatar) {
            $validated['avatar'] = $this->avatar->store('avatars', 'public');
        }

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'avatar' => $validated['avatar'],
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
