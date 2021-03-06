<?php

namespace App\View\Components\Loader;

use Illuminate\View\Component;

class Ring extends Component
{

    public $target;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($target)
    {
        $this->target = $target;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.loader.ring');
    }
}
