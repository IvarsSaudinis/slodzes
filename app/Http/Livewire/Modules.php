<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;


class Modules extends Component
{
    use WithPagination;

    public $searchTerm;

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';

        $modules = \App\Models\Modules::where('name','like', $searchTerm)->orWhere('code', 'like', $searchTerm)->paginate(20);

        return view('livewire.modules', compact('modules'));
    }
}
