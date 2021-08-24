<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use Livewire\Component;
use Livewire\WithPagination;

class Plans extends Component
{
    use WithPagination;

    public $searchTerm;

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';

        $plans = Plan::where('name','like', $searchTerm)->paginate(10);

        return view('livewire.plans' , ['plans'=>$plans]);
    }
}
