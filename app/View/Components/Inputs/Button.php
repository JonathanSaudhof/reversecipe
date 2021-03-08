<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $style;

    public function __construct($version)
    {
        $styles=[
            "primary"=> "border border-solid rounded border-blue-400 bg-blue-400 text-white p-2 font-bold",
            "secondary"=> "border border-solid rounded border-gray-400 bg-gray-400 text-white p-2 font-bold"
        ];

        if (isset($styles[$version])) {
            $this->style=$styles[$version];
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.inputs.button');
    }
}
