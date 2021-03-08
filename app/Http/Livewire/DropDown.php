<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DropDown extends Component
{
    public $open=false;
    public $title;
    public $items;

    public function toggle()
    {
        $this->open=!$this->open;
    }

    public function render()
    {
        return view('livewire.drop-down');
    }
}
