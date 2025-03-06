<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TextInput extends Component
{
    public $name;
    public $type;
    public $value;
    public $required;
    public $autocomplete;

    public function __construct($name, $type = 'text', $value = '', $required = false, $autocomplete = 'off')
    {
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
        $this->required = $required;
        $this->autocomplete = $autocomplete;
    }

    public function render()
    {
        return view('components.text-input');
    }
}
