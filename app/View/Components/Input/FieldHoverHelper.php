<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class FieldHoverHelper extends Component
{
    public $text;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text = 'Set the text')
    {
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.field-hover-helper');
    }
}
