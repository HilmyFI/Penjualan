<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Retur;

class returDelete extends Component
{
    public $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.retur.retur-delete');
    }

    public function retur()
    {
        return Retur::find($this->id);
    }
}
