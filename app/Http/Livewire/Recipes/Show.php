<?php

namespace App\Http\Livewire\Recipes;

use Livewire\Component;
use App\Classes\Spoonacular;

class Show extends Component
{
    public $recipe;

    public function mount(Spoonacular $spoonacular, $recipe)
    {
        $this->recipe = $spoonacular->getRecipe($recipe);
    }

    public function render()
    {
        return view('livewire.recipes.show');
    }
}
