<?php

namespace App\Http\Livewire\Recipes;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use App\Classes\Spoonacular;

class Show extends Component
{
    public $recipes=null;
    public $ingredient;
    private $spoonacular;
    public $ingredientsList=[];

    public function __construct()
    {
        $this->spoonacular = new Spoonacular();
    }

    public function mount()
    {
    }

    public function addToIngredientsList()
    {
        $input = trim(trim($this->ingredient, " "));
        if (strlen($input)>0) {
            array_push($this->ingredientsList, $input);
        }
        $this->ingredient="";
    }
    public function clear()
    {
        $this->ingredientsList=array();
        $this->ingredient="";
    }

    public function searchRecipes()
    {
        $this->recipes = $this->spoonacular->getReciepeForIngredient(implode(", ", $this->ingredientsList));
    }

    public function removeFromIngredientsList($ingredientId)
    {
        if ($ingredientId >=0 && $ingredientId <= sizeof($this->ingredientsList)) {
            unset($this->ingredientsList[$ingredientId]);
        }
    }

    public function render()
    {
        return view('livewire.recipes.show');
    }
}
