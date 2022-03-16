<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use Carbon\Carbon;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ModulesPlansModal extends ModalComponent
{

    public $modules_count;

    public $modalplan;

    public $modules;

    public function mount($modules, $modules_count)
    {
         $this->modules_count = $modules_count;

         $this->modules = $modules;
    }

    public function render()
    {
        $plans = Plan::all();

        return view('livewire.modules-plans-modal', compact('plans'));
    }

    public function saveInfo()
    {

        \Log::info("Plan: " . $this->modalplan);

        \Log::info("Modal id: " . $this->modules);

        $modules = explode(',', $this->modules);

        foreach ($modules as $id)
        {
            \Log::info("ievietots userID: " . $id);

            \DB::table('plan_data')->updateOrInsert(
                ['plan_id' => $this->modalplan, 'module_id' => $id],
                ['updated_at' => Carbon::now()]
            );

        }

        $this->emitTo('livewire-toast', 'show',  'Moduļi plānam pievienoti veiksmīgi');

    }

}
