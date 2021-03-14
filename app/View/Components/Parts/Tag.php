<?php

namespace App\View\Components\Parts;

use Illuminate\View\Component;

class Tag extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $style;
    public function __construct($type=null)
    {
        $styles=[
            "alert"=> "red",
            "primary"=> "green"
        ];

        $color=$styles[$type] ?? "gray";
        // dd($color);
        $this->style="flex items-center border border-solid rounded border-{$color}-400 border-2 text-{$color}-500 px-2 py-1 whitespace-nowrap";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.parts.tag');
    }
}
