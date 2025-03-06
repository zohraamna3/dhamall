<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputLabel extends Component
{
    public $for;
    public $value;

    public function __construct($for = '', $value = '')
    {
        $this->for = $for;
        $this->value = $value;
    }

    public function render()
    {
        return view('components.input-label');
    }
}
