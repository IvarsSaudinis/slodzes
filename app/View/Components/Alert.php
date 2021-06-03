<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * The alert color.
     *
     * @var string
     */
    public $color;

    /**
     * The alert title.
     *
     * @var string
     */
    public $title;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($color, $title)
    {
        $this->color = $color;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
