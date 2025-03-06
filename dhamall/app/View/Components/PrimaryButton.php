<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PrimaryButton extends Component
{
    public $type;

    public function __construct($type = 'submit')
    {
        $this->type = $type;
    }

    public function render()
    {
        return view('components.primary-button');
    }
}
