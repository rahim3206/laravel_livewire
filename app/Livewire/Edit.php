<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public $userId;
    public $user;
    public $name;
    public $email;
    public $password;

    public function mount($userId)
    {

        $this->userId = $userId;
        $this->user = User::find($userId);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function update()
    {
        $this->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$this->userId,
        ]);
        if($this->password != null) {
            $this->validate([
                'password'=>'required | min:8',
            ]);
        }
        $fuser = User::find($this->userId);
        $fuser->name = $this->name;
        $fuser->email = $this->email;
        if($this->password) {
            $fuser->password = bcrypt($this->password);
        }
        $fuser->update();
        return redirect()->to('/');

    }
    public function render()
    {
        return view('livewire.edit');
    }
}
