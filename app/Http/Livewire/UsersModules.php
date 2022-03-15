<?php

namespace App\Http\Livewire;

use App\Models\Modules;
use LivewireUI\Modal\ModalComponent;
use App\Models\User;

class UsersModules extends ModalComponent
{
    public $users;

    public $user_count;

    public $modalusers;

    public $modalmodule;

    public function mount($users, $user_count)
    {
        $this->users = $users;

        $this->user_count = $user_count;
    }
    public function render()
    {
         $modules = Modules::all();

         return view('livewire.users-modules', compact('modules'));
    }

    public function saveInfo()
    {

       \Log::info("Moduļa id: " . $this->modalmodule);

       \Log::info("Useri: " . $this->users);

      //  $this->closeModal();

    }


/*    public static function destroyOnClose(): bool
    {
        return true;
    }*/

}
