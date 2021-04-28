<?php

namespace App\View\Components\Input\Stacked;

use Illuminate\View\Component;

class Text extends Component
{
    public $field, $required, $placeholder;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($field, $required = false, $placeholder = '')
    {
        $this->field = $field;
        $this->required = $required;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.stacked.text');
    }
}
