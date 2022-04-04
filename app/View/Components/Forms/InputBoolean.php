<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class InputBoolean extends Component
{
    public $value;
    public $systemName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($value, $systemName)
    {
        $this->value = $value;
        $this->systemName = $systemName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input-boolean');
    }
}
