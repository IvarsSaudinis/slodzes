<?php

namespace App\Http\Livewire;

use App\Models\Modules;
use Carbon\Carbon;
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

       // TODO: izmantot kaut kādu autorizāciju


       $usersid = explode(',', $this->users);

       /*               $table->integer('user_id')->unsigned();
            $table->integer('modules_id')->unsigned();
            $table->integer('editor_id')->unsigned();    */

       // \Auth::user()->can('create')

        $editor_id = \Auth::id();


       foreach ($usersid as $id)
       {
           \Log::info("ievietots userID: " . $id);

           \DB::table('modules_users')->updateOrInsert(
               ['user_id' => $id, 'modules_id' => $this->modalmodule],
               ['editor_id' => $editor_id, 'updated_at' => Carbon::now()]
           );

       }

        $this->emitTo('livewire-toast', 'show', 'Lietotāji modulim pievienoti veiksmīgi');
    }


/*    public static function destroyOnClose(): bool
    {
        return true;
    }*/

}
