<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $searchTerm;

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';

        $users = User::where('name','like', $searchTerm)->orWhere('surname', 'like', $searchTerm)->paginate(10);

        return view('livewire.users' , ['users'=>$users]);
    }


}
