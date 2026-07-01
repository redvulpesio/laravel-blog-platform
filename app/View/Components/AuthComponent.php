<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AuthComponent extends Component
{
    public $name;
    public $type;
    public $class;
    public $placeholder;
    public function __construct($name, $type, $class, $placeholder)
    {
        $this->name = $name;
        $this->type = $type;
        $this->class = $class;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.auth-component');
    }
}
