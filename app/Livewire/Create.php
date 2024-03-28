<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $email;
    public $password;
    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required | min:8'
        ]);

        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = bcrypt($this->password);
        $user->save();
        $this->reset(['name', 'email', 'password']);
        return redirect()->to('/');

    }
    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required | min:8'
        ]);
    }
    public function render()
    {
        return view('livewire.create');
    }
}
