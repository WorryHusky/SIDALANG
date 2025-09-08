<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select2 extends Component
{

    public $name;
    public $value;
    public $id;

    public function __construct($id, $name, $value=null)
    {
        $this->name = $name;
        $this->id = $id;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        return view('components.select2');
    }
}
