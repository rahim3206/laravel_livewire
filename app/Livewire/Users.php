<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $search = '';
    public $count = 0;
    // public $users ;


    // public function mount()
    // {
    //     $this->users = User::paginate(1);
    // }
    // public function fetchUsers()
    // {
    //     $this->users = User::all();
    // }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
    }



    public function placeholder()
    {
        return <<<'HTML'
        <div style="height:100vh;background-color:#f5f5f5:position:absolute;top:0px;left:0px;width:100%;" class="d-flex justify-content-center align-items-center">
            <h1 class="text-center text-muted">Loading...</h1>
        </div>
        HTML;
    }
    // public function increment()
    // {
    //     $this->count++;
    //     $this->title='Users '.$this->count;
    // }

    public function render()
    {
        return view('livewire.users',[
            'users' => User::where('name', 'like', '%' . $this->search . '%')->orwhere('email', 'like', '%' . $this->search . '%' )->simplePaginate(5)
        ]);
    }
}
