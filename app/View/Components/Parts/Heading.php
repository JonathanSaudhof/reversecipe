<?php

namespace App\View\Components\Parts;

use Illuminate\View\Component;
use Mockery\Undefined;

class Heading extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $type;

    // Here you add the associated styles
    public $style=[
        'h1'=>'text-4xl font-bold',
        'h2'=>'text-2xl font-bold',
    ];

    public function __construct($type='h1')
    {
        $this->type=$type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.parts.heading');
    }
}
