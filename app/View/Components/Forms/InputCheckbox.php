<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class InputCheckbox extends Component
{
    public $value;
    public $systemName;
    public $options;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($value, $systemName, $options)
    {
        $this->value = $value;
        $this->systemName = $systemName;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input-checkbox');
    }
}
