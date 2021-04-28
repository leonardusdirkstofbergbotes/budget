<?php

namespace App\View\Components\Modal;

use Illuminate\View\Component;

class SmallCenter extends Component
{

    public $headerText;
    public $subText;
    public $icon;
    public $color;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($headerText = "Please define headerText", $subText = "Please Define SubText", $icon = 'fas fa-plus-circle', $color = 'blue')
    {
        $this->headerText = $headerText;
        $this->subText  = $subText;
        $this->icon = $icon;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal.small-center');
    }
}
