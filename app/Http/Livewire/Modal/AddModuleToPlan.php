<?php

namespace App\Http\Livewire\Modal;

use App\Models\Modules;
use App\Models\Plan;
use App\Models\PlanData;
use App\Models\PlanDistribution;
use LivewireUI\Modal\ModalComponent;

class AddModuleToPlan extends ModalComponent
{

    public $plan;

    public $module;

    public $theory1, $theory2, $theory3, $theory4;

    public $practice1, $practice2, $practice3, $practice4;

    public function mount($plan, $module = null, $theory1 = null, $theory2 = null, $theory3 = null, $theory4 = null, $practice1 =null, $practice2 = null, $practice3 = null, $practice4 = null)
    {
        // vieta autorizācijai ...

        $this->plan = $plan;
        $this->module = $module;

        $this->theory1 = $theory1;
        $this->practice1 = $practice1;

        $this->theory2 = $theory2;
        $this->practice2 = $practice2;

        $this->theory3 = $theory3;
        $this->practice3 = $practice3;

        $this->theory4 = $theory4;
        $this->practice4 = $practice4;
    }

    public function render()
    {
        $plan = $this->plan;

        $modules = Modules::all();

        return view('livewire.modal.add-module-to-plan', compact('plan', 'modules'));
    }

    public function addModule()
    {
        $plan_data = new PlanData();
        $plan_data->plan_id = $this->plan['id'];
        $plan_data->module_id = $this->module;
        $plan_data->save();

        if(isset($this->theory1) || isset($this->practice1) ) {
            $plan_distribution               = new PlanDistribution();
            $plan_distribution->plan_data_id = $plan_data->id;
            $plan_distribution->course       = 1;
            $plan_distribution->theory       = $this->theory1;
            $plan_distribution->practice     = $this->practice1;
            $plan_distribution->save();
        }

        if(isset($this->theory2) || isset($this->practice2) ) {
            $plan_distribution               = new PlanDistribution();
            $plan_distribution->plan_data_id = $plan_data->id;
            $plan_distribution->course       = 2;
            $plan_distribution->theory       = $this->theory2;
            $plan_distribution->practice     = $this->practice2;
            $plan_distribution->save();
        }

        if(isset($this->theory3) || isset($this->practice3) ) {
            $plan_distribution               = new PlanDistribution();
            $plan_distribution->plan_data_id = $plan_data->id;
            $plan_distribution->course       = 3;
            $plan_distribution->theory       = $this->theory3;
            $plan_distribution->practice     = $this->practice3;
            $plan_distribution->save();
        }

        if(isset($this->theory4) || isset($this->practice4) ) {
            $plan_distribution               = new PlanDistribution();
            $plan_distribution->plan_data_id = $plan_data->id;
            $plan_distribution->course       = 4;
            $plan_distribution->theory       = $this->theory4;
            $plan_distribution->practice     = $this->practice4;
            $plan_distribution->save();
        }

        $this->emitTo('livewire-toast', 'show', 'Modulis plānam pievienoti veiksmīgi');
    }
}
